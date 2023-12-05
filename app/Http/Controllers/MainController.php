<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use App\Models\Menu;
use Exception;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index($menu_code = 'dashboard')
    {
        try {
            session(['Rules' => $this->getRoles(auth()->user()->id)]);
            session(['user_id' => auth()->user()->id]);
            session(['user_name' => auth()->user()->username]);


            $menu = $this->getMenu(auth()->user()->id);

            $menu_code = str_replace(" ", "-", ucwords(str_replace("-", " ", $menu_code)));

            // Check role menu permissions
            $currentMenu = DB::table('menus')->where('menu_code', ucfirst($menu_code))->first();

            if (!$currentMenu) {
                abort(404);
            }

            $role_menu = DB::table('v_role_menus')
                ->where(['menu_code' => ucfirst($menu_code), 'menu_active' => 1, 'user_id' => auth()->user()->id])
                ->first();

            if (!$role_menu) {
                abort(401);
            }

            $data = [
                'sidebar' => $menu['sidebar'],
                'roles' => array_column(session()->get('Rules')->toArray(), 'menu_code'),
                'menu_id' => $role_menu->menu_id,
                'menu_code' => strtolower($menu_code),
            ];
            $temp = Configuration::where('config_tipe', 'app')->orderBy('config_order', 'ASC')->get();
            if ($temp != []) {
                foreach ($temp as $k => $v) {
                    session([$v->config_code => $v->config_value]);
                }
            }
            // print_r($data); exit;
            return view('layouts.main', $data);
        } catch (Exception $e) {
            $statusCode = $e->getMessage();

            if ($statusCode === 404) {
                return view('error.404');
            } else if ($statusCode === 401) {
                return view('error.401');
            }

            return view('error.500');
        }
    }

    public function getPage(Request $request)
    {
        $data               = $request->post();
        $operation          = Menu::find($data['menu_id']);
        $module             = explode('.', $operation->menu_code);
        $fileView           = (count($module) == 1) ? 'index' : $module[1];
        $viewPath           = strtolower($module[0]) . '.' . $fileView;
        $renderData['view']     = base64_encode(view($viewPath));
        $renderData['isLogin']  = (session()->get('user_id') != '') ? true : false;
        $renderData['menu_title'] = $operation->menu_title;
        $renderData['menu_id'] = $data['menu_id'];
        $renderData['url_path'] =  getenv('APP_URL') . '/' . strtolower($operation->menu_code);
        $renderData['breadcrumb'] = base64_encode($this->get_breadcrumb($operation));
        // print_r($renderData);
        // exit;

        return $this->responsePage($renderData);
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

    public function get_breadcrumb($value)
    {
        if (empty($value['menu_parent']) && empty($value['menu_module'])) {
            return '
            <ul class="breadcrumb breadcrumb-line fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-gray-400">' . $value['menu_title'] . '</li>
            </ul>';
        } elseif (empty($value['menu_parent'])) {
            return '
            <ul class="breadcrumb breadcrumb-line fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-gray-400">' . $value['menu_title'] . '</li>
                <li class="breadcrumb-item text-gray-400">' . $value['menu_module'] . '</li>
            </ul>';
        } else {
            $parent = Menu::find($value->menu_parent);

            return '
            <ul class="breadcrumb breadcrumb-line fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-gray-400">' . $parent['menu_title'] . '</li>
                <li class="breadcrumb-item text-light">' . $value['menu_title'] . '</li>
            </ul>';
        }
    }


    public function getMenu($userId)
    {
        $operation = Menu::getRoleMenus($userId);
        $collection = collect($operation);
        return [
            //            'navbar' => $this->getNavbar($collection->where('menu_navbar', 1)->all()),
            'sidebar' => $this->getSidebar($collection->where('menu_navbar', 0)->all())
        ];
    }

    /**
     * @return html menu navbar
     * */
    public function getNavbar($data)
    {
        $collect    = collect($data);
        $menuNavbar = $collect->where('menu_level', 1)->where('menu_navbar', 1)->all();
        $htmlNavbar = '';
        foreach ($menuNavbar as $keyNavbars => $menuNavbars) {
            // $menuIcon = ($menuNavbars->menu_icon != '') ? "<span class=\"svg-icon svg-icon-2\"><span class=\"material-icons-outlined\"> {$menuNavbars->menu_icon} </span></span>" : "";
            if ($menuNavbars->menu_hassub == 1) {
                $htmlNavbar .= "
                    <div data-kt-menu-trigger=\"{default:'click', lg: 'hover'}\" data-kt-menu-placement=\"bottom-start\" class=\"menu-item menu-accordion\">
                        <span class=\"menu-link py-3\">

                            <span class=\"menu-title\">{$menuNavbars->menu_title}</span>
                            <span class=\"menu-arrow d-lg-none\"></span>
                        </span>
                        <div class=\"menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px\"> ";
                foreach ($collect->where('menu_level', 2)->where('menu_parent', $menuNavbars->menu_id)->all() as $keySub => $valueSub) {
                    $iconSub = ($valueSub->menu_icon) ? "<span class=\"svg-icon svg-icon-2\"><span class=\"material-icons-outlined\"> {$valueSub->menu_icon} </span></span>" : "";
                    if ($valueSub->menu_hassub == 1) {
                        $htmlNavbar .= "<div data-kt-menu-trigger=\"{default:'click', lg: 'hover'}\" data-kt-menu-placement=\"right-start\" class=\"menu-item menu-lg-down-accordion\">
                                        <span class=\"menu-link py-3\">
                                            {$iconSub}
                                            <span class=\"menu-title fs-6 text-light\">{$valueSub->menu_title}</span>
                                            <<span class=\"menu-expand material-icons-outlined\">chevron_right</span>
                                        </span>
                                        <div class=\"menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px\">";
                        foreach ($collect->where('menu_level', 3)->where('menu_parent', $valueSub->menu_id)->all() as $keySub3 => $valueSub3) {
                            $htmlNavbar .= "
                                                    <div class=\"menu-item\">
                                                        <a class=\"menu-link py-3\" href=\"javascript:;\" data-con=\"{$valueSub3->menu_id}\" onclick=\"loadPage(this)\">
                                                            <span class=\"menu-bullet\">
                                                                <span class=\"bullet bullet-dot\"></span>
                                                            </span>
                                                            <span class=\"menu-title\">{$valueSub3->menu_title}</span>
                                                        </a>
                                                    </div>
                                                ";
                        }
                        $htmlNavbar .= "</div>
                                    </div>";
                    } else {
                        $htmlNavbar .= "
                                        <div class=\"menu-item\">
                                            <a class=\"menu-link py-3\" href=\"javascript:;\" data-con=\"{$valueSub->menu_id}\" onclick=\"loadPage(this)\" title=\"{$valueSub->menu_description}\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-dismiss=\"click\" data-bs-placement=\"right\">
                                                {$iconSub}
                                                <span class=\"menu-title text-light\">{$valueSub->menu_title}</span>
                                            </a>
                                        </div>
                                    ";
                    }
                }
                $htmlNavbar .= "</div>
                    </div>
                ";
            } else {
                $htmlNavbar .= "
                    <div class=\"menu-item me-lg-1\">
                        <a class=\"menu-link py-3\" href=\"javascript:;\" data-con=\"{$menuNavbars->menu_id}\" onclick=\"loadPage(this)\">
                            {$menuIcon}
                            <span class=\"menu-title\">{$menuNavbars->menu_title}</span>
                        </a>
                    </div>
                ";
            }
        }

        return $htmlNavbar;
    }

    public function getSidebar($data = '')
    {
        $collect = collect($data);
        $html = '';
        foreach ($collect->where('menu_level', 1)->where('menu_navbar', 0)->all() as $key => $value) {
            $menuIcon = ($value->menu_icon != '') ? "<span class=\"menu-icon\"><i class=\"{$value->menu_icon} fs-2x text-gray-400\"></i></span>" : "";
            if ($value->menu_hassub == 1) {
                $html .= "
                        <div data-kt-menu-trigger=\"click\" data-kt-menu-placement=\"right-start\" class=\"menu-item py-3\">
                        <span class=\"menu-link\" title=\"{$value->menu_title}\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-dismiss=\"click\" data-bs-placement=\"right\">
                                 <span class=\"menu-icon\">
                                     <span class=\"svg-icon svg-icon-2x\">
                                            {$value->menu_icon}
                                      </span>
                                 </span>

                        </span>
                        <div class=\"menu-sub menu-sub-dropdown w-225px px-1 py-4\">
                            <div class=\"menu-item\">
                                <div class=\"menu-content\">
                                    <span class=\"menu-section fs-5 fw-bolder ps-1 py-1\">{$value->menu_title}</span>
                                </div>
                            </div>

                   ";

                foreach ($collect->where('menu_level', 2)->where('menu_parent', $value->menu_id)->all() as $keySub => $valueSub) {
                    if (auth()->user()->role_id != 'ynpklxjdwndask2p' && $value->menu_id == '851cjgng5kp9xi69' && !in_array(strtolower($valueSub->menu_code), session())) continue;
                    // $iconSub = ($valueSub->menu_icon) ? "<span class=\"menu-icon\"><i class=\"{$valueSub->menu_icon} fs-2x text-gray-400\"></i></span>" : "";
                    $html .= "
                                    <div class=\"menu-item\">
                                        <a class=\"menu-link\" href=\"javascript:;\" data-con=\"{$valueSub->menu_id}\" data-type=\"sub\" onclick=\"loadPage(this)\">
                                             <span class=\"menu-bullet\">
                                                <span class=\"bullet bullet-dot\"></span>
                                            </span>
                                            <span class=\"menu-title\">{$valueSub->menu_title}</span>
                                        </a>
                                    </div>
                                ";
                }

                $html .= " </div></div>";
            } else {
                $html .= "
                    <div class=\"menu-item py-3\">
                            <a class=\"menu-link menu-title\" href=\"javascript:;\" data-con=\"{$value->menu_id}\" data-type=\"main\" onclick=\"loadPage(this)\" title=\"{$value->menu_title}\" data-judul=\"{$value->menu_title}\" data-bs-toggle=\"tooltip\" data-bs-trigger=\"hover\" data-bs-dismiss=\"click\" data-bs-placement=\"right\">
                                        <span class=\"menu-icon\">
                                            <span class=\"svg-icon svg-icon-2x \">{$value->menu_icon}
                                            </span>
                                        </span>

                            </a>
                        </div>
                ";
            }
        }
        return $html;
    }

    public function getRoles($userId)
    {
        $operation = DB::table('v_role_menus')->where('user_id', $userId)->where('menu_code', 'IS NOT', null)->get();

        return $operation;
    }
}
