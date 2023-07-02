<?php

namespace App\Core;

use App\Models\Kota;
use App\Models\UnitKerja;
use App\Models\Moka;
use App\Models\Configuration;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Config;
use GuzzleHttp\Client;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Allows child classes to override the
     * status code that is used in their API.
     *
     * @var array<string, int>
     */

    protected $_user;
    protected $codes = [
        'created'                   => 201,
        'deleted'                   => 200,
        'updated'                   => 200,
        'no_content'                => 204,
        'invalid_request'           => 400,
        'unsupported_response_type' => 400,
        'invalid_scope'             => 400,
        'temporarily_unavailable'   => 400,
        'invalid_grant'             => 400,
        'invalid_credentials'       => 400,
        'invalid_refresh'           => 400,
        'no_data'                   => 400,
        'invalid_data'              => 400,
        'access_denied'             => 401,
        'unauthorized'              => 401,
        'invalid_client'            => 401,
        'forbidden'                 => 403,
        'resource_not_found'        => 404,
        'not_acceptable'            => 406,
        'resource_exists'           => 409,
        'conflict'                  => 409,
        'resource_gone'             => 410,
        'payload_too_large'         => 413,
        'unsupported_media_type'    => 415,
        'too_many_requests'         => 429,
        'server_error'              => 500,
        'unsupported_grant_type'    => 501,
        'not_implemented'           => 501,
    ];
    protected $client_id = "";
    private $secret = "";
    private $code = "";
    private $redirect_uri = "";
    private $baseurl = "";
    private $bussiness_id = "";
    private $headers = [];
    private $client = "";

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->_user = \Auth::user();
            \View::share('_user', \Auth::user());

            return $next($request);
        });

    }


    public function getAdaTidak()
    {
        $ada_tidak = [
            'Tidak ada',
            'Ada',
        ];

        return $ada_tidak;
    }

    public function getKota()
    {
        if (isset($this->_user->unit_kerja->kota)) {
            $kota = Kota::select('nama', 'id')->whereIn('id', $this->_user->unit_kerja->kota)->orderBy('nama', 'asc')->get();
        } else {
            $kota = Kota::select('nama', 'id')->orderBy('nama', 'asc')->get();
        }

        return $kota;
    }

    public function getUnitKerjaDropdown()
    {
        $unit_kerja = UnitKerja::select('nama', 'id')->get()->toArray();
        return $unit_kerja;
    }

    public function getBulanNumber($name)
    {
        return array_search($name, BaseModel::BULAN);
    }

    public function responseShow($data, $status = '', string $message = '')
    {
        if ($data === null && $status === null) {
            $status = 404;
            $output = null;
        } elseif ($data === null && is_numeric($status)) {
            $output = null;
        } else {
            $status = empty($status)
                ? 200
                : (array_search($status, $this->codes)
                    ? $status
                    : 400
                );
            $output = $data;
        }
        $output['message'] = $data['message'] ?? $message;
        return response()->json($output, $status);

    }

    public function response($data, $code = '', string $message = '')
    {
        if ($data === null && $code === null) {
            $message = 'Data Not Found';
            $code = 404;
            $output = null;
        } elseif ($data === null && is_numeric($code)) {
            $message = 'Data Not Found';
            $output = null;
        } else {

            $code = empty($code)
                ? 201
                : (array_search($code, $this->codes)
                    ? $code
                    : 422
                );

            if($code == 201){
                $message = 'Data Already Exists';
            }else{
                $message = 'Data Not Found';
            }
            $output = $data;
        }

        return response()->json([
            'status'=> $code == 201 ? 'Success' : 'Error',
            'message' => $message,
            'code' => $code,
            'data' => $output
        ]);
    }

    public function responsePage($data, $status = '', string $message = '')
    {
        if ($data === null && $status === null) {
            $status = 404;
            $output = null;
        } elseif ($data === null && is_numeric($status)) {
            $output = null;
        } else {
            $status = empty($status)
                ? 200
                : (array_search($status, $this->codes)
                    ? $status
                    : 400
                );
            $output = $data;
        }
        $output['message'] = $data['message'] ?? $message;
        return response()->json($output, $status);
    }


    protected function respondCreated($data = '')
    {
        if (is_array($data)) {
            return response()->json([
                'success' => ($data['success'] ? true : false),
                'status' => ($data['success'] ? 'Success' : 'Error'),
                'message' => (($data['success']) ? 'Successfully saved data.' : ((isset($data['message']) && $data['message'] != '') ? $data['message'] : 'Failed to save data.')) ,
                'code' => (($data['success']) ? 201 : 422)
            ]);
        }else{
            return response()->json([
                'success' => ($data ? true : false),
                'status' => ($data ? 'Success' : 'Error'),
                'message' => ($data ? 'Successfully saved data.' : 'Failed to save data.'),
                'code' => (($data) ? 201 : 422)
            ]);
        }
    }

    protected function respondUpdated($data = '')
    {

        if (is_array($data)) {
            return response()->json([
                'success' => ($data['success'] ? true : false),
                'status' => ($data['success'] ? 'Success' : 'Error'),
                'message' => (($data['success']) ? 'Successfully update data.' : ((isset($data['message']) && $data['message'] != '') ? $data['message'] : 'Failed to update data.')) ,
                'code' => (($data['success']) ? 201 : 422)
            ]);
        }else {
            return response()->json([
                'success' => ($data ? true : false),
                'status' => ($data ? 'Success' : 'Error'),
                'message' => ($data ? 'Successfully update data.' : 'Failed to update data.'),
                'code' => (($data) ? 201 : 422)
            ]);
        }
    }

    protected function respondDeleted($data = '')
    {
        if (is_array($data)) {
            return response()->json([
                'success' => ($data['success'] ? true : false),
                'status' => ($data['success'] ? 'Success' : 'Error'),
                'message' => (($data['success']) ? 'Successfully deleted data.' : ((isset($data['message']) && $data['message'] != '') ? $data['message'] : 'Failed to deleted data.')) ,
                'code' => (($data['success']) ? 201 : 422)
            ]);
        }else {
            return response()->json([
                'success' => ($data ? true : false),
                'status' => ($data ? 'Success' : 'Error'),
                'message' => ($data ? 'Successfully deleted data.' : 'Failed to deleted data, There was an error on the server.'),
                'code' => (($data) ? 201 : 422)
            ]);
        }
    }

    protected function respondLogin($data = '')
    {
        return response()->json([
            'status'=> (($data['success']) ? 'Success' : 'Error'),
            'message' => $data['message'],
            'code' => (($data['success']) ? 201 : 422),
            'redirect' => $data['redirect']
        ]);
    }

    /**
     * Used for generic failures that no custom methods exist for.
     *
     * @param array|string $messages
     * @param int          $status   HTTP status code
     * @param string|null  $code     Custom, API-specific, error code
     *
     * @return Response
     */
    protected function fail($messages, int $status = 400, ?string $code = null, string $customMessage = '')
    {
        if (!is_array($messages)) {
            $messages = ['error' => $messages];
        }

        $response = [
            'status'   => $status,
            'error'    => $code ?? $status,
            'messages' => $messages ?? $customMessage,
        ];

        return $this->response($response, $status);
    }

    /**
     * Used after a command has been successfully executed but there is no
     * meaningful reply to send back to the client.
     *
     * @return Response
     */
    protected function respondNoContent(string $message = 'No Content')
    {
        return $this->response(null, $this->codes['no_content'], $message);
    }

    /**
     * Used when the client is either didn't send authorization information,
     * or had bad authorization credentials. User is encouraged to try again
     * with the proper information.
     *
     * @return Response
     */
    protected function failUnauthorized(string $description = 'Unauthorized', ?string $code = null, string $message = '')
    {
        return $this->fail($description, $this->codes['unauthorized'], $code, $message);
    }

    /**
     * Used when access is always denied to this resource and no amount
     * of trying again will help.
     *
     * @return Response
     */
    protected function failForbidden(string $description = 'Forbidden', ?string $code = null, string $message = '')
    {
        return $this->fail($description, $this->codes['forbidden'], $code, $message);
    }

    /**
     * Used when a specified resource cannot be found.
     *
     * @return Response
     */
    protected function failNotFound(string $description = 'Not Found', ?string $code = null, string $message = '')
    {
        return $this->fail($description, $this->codes['resource_not_found'], $code, $message);
    }

    /**
     * Used when the data provided by the client cannot be validated.
     *
     * @return Response
     *
     * @deprecated Use failValidationErrors instead
     */
    protected function failValidationError(string $description = 'Bad Request', ?string $code = null, string $message = '')
    {
        return $this->fail($description, $this->codes['invalid_data'], $code, $message);
    }

    /**
     * Used when the data provided by the client cannot be validated on one or more fields.
     *
     * @param string|string[] $errors
     *
     * @return Response
     */
    protected function failValidationErrors($errors, ?string $code = null, string $message = '')
    {
        return $this->fail($errors, $this->codes['invalid_data'], $code, $message);
    }

    /**
     * Use when trying to create a new resource and it already exists.
     *
     * @return Response
     */
    protected function failResourceExists(string $description = 'Conflict', ?string $code = null, string $message = '')
    {
        return $this->fail($description, $this->codes['resource_exists'], $code, $message);
    }

    /**
     * Use when a resource was previously deleted. This is different than
     * Not Found, because here we know the data previously existed, but is now gone,
     * where Not Found means we simply cannot find any information about it.
     *
     * @return Response
     */
    protected function failResourceGone(string $description = 'Gone', ?string $code = null, string $message = '')
    {
        return $this->fail($description, $this->codes['resource_gone'], $code, $message);
    }

    /**
     * Used when the user has made too many requests for the resource recently.
     *
     * @return Response
     */
    protected function failTooManyRequests(string $description = 'Too Many Requests', ?string $code = null, string $message = '')
    {
        return $this->fail($description, $this->codes['too_many_requests'], $code, $message);
    }

    /**
     * Used when there is a server error.
     *
     * @param string      $description The error message to show the user.
     * @param string|null $code        A custom, API-specific, error code.
     * @param string      $message     A custom "reason" message to return.
     *
     * @return Response The value of the Response's send() method.
     */
    protected function failServerError(string $description = 'Internal Server Error', ?string $code = null, string $message = ''): Response
    {
        return $this->fail($description, $this->codes['server_error'], $code, $message);
    }


    protected function requestSnakeToCamel($data)
    {
        $replaced = [];
        foreach ($data as $key => $value) {
            $replaced[Str::snake($key)] = $value;
        }
        return $replaced;
    }

    protected function generatePassword($value = null)
    {
        return password_hash($value, PASSWORD_BCRYPT);
    }

    protected function keyAddPrefix($obj, $prefix, $snake = false)
    {
        if ($obj == []) return [];
        return array_combine(
            array_map(function ($k) use ($prefix, $snake) {
                if (!$snake) return $prefix . $k;
                return $prefix . Str::snake($k);
            }, array_keys($obj)),
            $obj
        );
    }

    protected function keyRemovePrefix($obj, $prefix)
    {
        if ($obj == []) return [];
        return array_combine(
            array_map(function ($k) use ($prefix) {
                return preg_replace("/$prefix/", '', $k, 1);
            }, array_keys($obj)),
            $obj
        );
    }

    protected function respondToCamel($obj, $prefix = null,  $code = null)
    {
        if ($obj === null && $code === null) {
            $message = 'Data Not Found';
            $code = 404;
            $output = '';
        } elseif ($obj === null && is_numeric($code)) {
            $message = 'Data Not Found';
            $output = '';
        } else {

            $code = empty($code)
                ? 201
                : (array_search($code, $this->codes)
                    ? $code
                    : 422
                );

            if($code == 201){
                $message = 'Data Already Exists';
            }else{
                $message = 'Data Not Found';
            }

            if ($obj == []) return [];
            $output = array_combine(
                array_map(function ($k) use ($prefix) {
                    if ($prefix == null) return Str::camel($k);
                    return Str::camel(preg_replace("/$prefix/", '', $k, 1));
                }, array_keys($obj)),
                $obj
            );
        }


        return response()->json([
            'status'=> $code == 201 ? 'Success' : 'Error',
            'message' => $message,
            'code' => $code,
            'data' => $output
        ]);
    }


    function ilog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);

        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'insert',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function ulog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);
        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'update',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function dlog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);
        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'delete',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function lilog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);
        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'login',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function lolog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);
        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'logout',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function iflog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);
        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'info',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function relog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);
        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'read',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function slog($msg, $request, $data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();

        $findme = "Physical";
        $pmac   = strpos($mycom, $findme);
        $_HASIL = substr($mycom, ($pmac + 36), 17);
        $data = array(
            'act_id'            => Str::random(32),
            'act_tipe'          => 'set',
            'act_ip'            => $request->ip(),
            'act_date'          => now(),
            'act_data'          => $msg . ' ' . $this->parse_text($data, $hidden, $hidall, $hidallShow),
            'act_user_id'       => session()->get('user_id'),
            'act_user_nama'     => session()->get('user_name'),
            'act_user_tipe'     => '',
            'act_user_agent'    => $request->header('User-Agent'),
            'act_adress'        => $_HASIL,
        );
        DB::table('activity')->insert($data);
    }

    function parse_text($data, $hidden = null, $hidall = false, $hidallShow = null)
    {
        if ($hidden != null) {
            if (is_array($hidden)) {
                foreach ($hidden as $key => $value) {
                    unset($data[$value]);
                }
            } else {
                unset($data[$hidden]);
            }
        }

        if ($hidall) {
            foreach ($data as $key => $value) {
                if ($key != $hidallShow) {
                    unset($data[$key]);
                }
            }
        }

        $_data = "<ol>";
        foreach ($data as $key => $value) {
            // $_data .= "[".$key.":".$value."] ";
            $_data .= "<li>" . ucfirst(str_replace('_', ' ', $key)) . ":" . $value . "</li>";
        }
        $_data .= "</ol>";
        return $_data;
    }

    public function getTahun($returnArray = true)
    {
        $years = range(date('Y'), 2017);
        if (!$returnArray) {
            $res = [];
            foreach ($years as $key => $value) {
                $res[] = [
                    'year' => $value
                ];
            }
            return $res;
        }

        return $years;
    }

    public function UpdateDataBulananAcces($data)
    {
        define('RULES', array_column(session('Rules')->toArray(), 'menu_code'));
        if (!(in_array('DataBulanan.Access.insert', RULES) || in_array('DataBulanan.Access.update', RULES))) throw new Exception("Maaf Anda tidak memiliki akses untuk mengubah data", 1);

        $all = (in_array('DataBulanan.Access.insert.all', RULES) || in_array('DataBulanan.Access.update.all', RULES));
        $pm = (in_array('DataBulanan.Access.insert.pm', RULES) || in_array('DataBulanan.Access.update.pm', RULES));
        $tm = (in_array('DataBulanan.Access.insert.tm', RULES) || in_array('DataBulanan.Access.update.tm', RULES));
        $nm = (in_array('DataBulanan.Access.insert.nm', RULES) || in_array('DataBulanan.Access.update.nm', RULES));

        $year = date('Y');
        $date_tm = intval(date('n'));
        $date_pm = $date_tm - 1;
        $date_nm = $date_tm + 1;

        if (!$all) {
            foreach ($data as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    if ($pm) {
                        if (request()->tahun == $year) {
                            if ($k1 == $date_pm) continue;
                        } elseif (request()->tahun == $year - 1) {
                            if ($k1 == 12) continue;
                        }
                    }
                    if (request()->tahun == $year && $k1 == $date_tm && $tm) continue;
                    if (request()->tahun == $year && $k1 == $date_nm && $nm) continue;

                    $bulan = array(
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
                    throw new Exception("Maaf Anda tidak memiliki akses untuk mengubah data pada bulan " . $bulan[$k1 - 1] . ' tahun ' . request()->tahun, 1);
                }
            }
        }
    }


}
