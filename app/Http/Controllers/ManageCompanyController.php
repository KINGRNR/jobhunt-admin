<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\DetailUser;
use App\Models\ManageCompany;
use App\Models\Role;

use function PHPUnit\Framework\isNull;

class ManageCompanyController extends BaseResponse
{

    public function index(Request $request)
    {
        $filter = $request->post();
        
        if (isset($filter['date']) && isset($filter['status'])) {
            $dateRange = explode(' - ', $filter['date']);
            $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[0])->startOfDay();
            $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[1])->endOfDay();

            $data = DB::table('v_detail_company')
                ->whereBetween('created_at', [$startDate, $endDate])->where('company_isverif', $filter['role'])
                ->get();
        } else if (isset($filter['status'])) {
            $data = DB::table('v_detail_company')->where('company_isverif', $filter['status'])->get();
        } else if (isset($filter['date'])) {
            $dateRange = explode(' - ', $filter['date']);
            $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[0])->startOfDay();
            $endDate = \Carbon\Carbon::createFromFormat('m/d/Y', $dateRange[1])->endOfDay();

            $data = DB::table('v_detail_company')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();
        } else {
            $data = DB::table('v_detail_company')->get();
        }
        return Datatables::of($data)->toJson();
    }
    public function jobIndex(Request $request)
    {
        $id = $request->post();
        $company_id = $id['id'];

        // dd($company_id);
        $data = DB::table('v_job')->where('job_company_id', $id['id'])->get();
        // dd($data);
        return Datatables::of($data)->toJson();
    }
    public function show(Request $request)
    {
        $data = $request->post();

        $company_id = $data['id'];

        $companyData = DB::table('v_company')->where('company_id', $company_id)->first();
        // $userData = ManageUser::join('detail_users', 'users.id', '=', 'detail_users.user_id')
        //     ->where('users.id', $user_id)
        //     ->first();
        // If the user with the provided ID exists
        if ($companyData) {
            return response()->json([
                'status' => 'success',
                'data' => $companyData,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }
    }
    public function rejacc(Request $request)
    {
        try {
            $data = $request->post();
            if (!isset($data['alasan'])) {
                $data['alasan'] = '-';
            }
            $read =  ManageCompany::where('company_id', $data['id'])->update([
                'company_isverif' => $data['cond'],
                'company_reject_reason' => $data['alasan'],
            ]);
            $notification = Notification::create([
                'notification_title' => 'Company Request',
                'notification_message' => $data['msg'],
                'notification_reason' => $data['alasan'],
                'notification_by' => 'Admin',
                'notification_jenis' => 3,
                'notification_to' => $data['user_id'],
                'notification_read' => 0,
            ]);
            return $this->successResponse($read, [], 201);
        } catch (\Throwable $th) {
            return $this->errorResponse();
        }
    }
    // public function create(Request $request)
    // {
    //     try {
    //         $dataArray = $request->all(); // Mendapatkan seluruh data dari request

    //         // Memisahkan elemen "data" dari array
    //         $data = $dataArray['data'];

    //         $data['example_id'] = Example::generateExampleid();
    //         $data['example_active'] = $dataArray['example_active'];
    //         // print_r($data);
    //         // exit;
    //         $operation = Example::create($data);

    //         return $this->respondCreated([
    //             'success' => true,
    //             'message' => 'Successfully saved data.',
    //         ]);;
    //     } catch (\Throwable $th) {
    //         return $this->respondCreated([
    //             'success' => false,
    //             'message' => $th->getMessage()
    //             // 'message' => 'Failed to update data, There was an error on the server.'
    //         ]);
    //     }
    // }

    // public function update(Request $request, Example $example)
    // {
    //     try {
    //         $dataArray = $request->all(); // Mendapatkan seluruh data dari request


    //         $data = $dataArray['data'];
    //         $exampleId  = $data['example_id'];
    //         // print_r($example); exit;

    //         $data['example_active'] = $request->example_active ?? 0;
    //         $operation = $example->update($data);

    //         return $this->respondUpdated([
    //             'success' => true,
    //             'message' => 'Successfully updated data.',
    //         ]);
    //     } catch (\Throwable $th) {
    //         return $this->respondUpdated([
    //             'success' => false,
    //             'message' => $th->getMessage()
    //         ]);
    //     }
    // }
    public function update(Request $request, Example $example)
    {
        try {
            $dataArray = $request->all();
            $data = $dataArray['data'];
            $exampleId = $data['example_id'];
            $exampleCode = $data['example_code'];
            $exampleName = $data['example_name'];
            $exampleActive = $dataArray['example_active'] ?? 0;

            $data = [
                'example_code' => $exampleCode,
                'example_name' => $exampleName,
                'example_active' => $exampleActive,
            ];

            $operation = $example->where('example_id', $exampleId)->update($data);

            return $this->respondUpdated([
                'success' => true,
                'message' => 'Successfully updated data.',
            ]);
        } catch (\Throwable $th) {
            return $this->respondUpdated([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function delete(Example $example)
    {
        try {
            $example = Example::find(request()->example_id);
            $operation = $example->delete();
            return $this->respondDeleted([
                'success' => true,
                'message' => 'Successfully deleted data.',
            ]);
        } catch (\Throwable $th) {
            return $this->respondDeleted([
                'success' => false,
                'message' => 'Failed to delete data, There was an error on the server.'
            ]);
        }
    }
}
