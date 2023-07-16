<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

use App\Models\ManageUser;
use App\Models\Role;

class ListUserController extends \App\Core\BaseController
{

    public function index(Request $request)
    {
        // $data = ManageUser::select('*');
        // return DataTables::of(Example::all())->toJson();
        // $data = DB::table('users')
        //     ->join('roles', 'users.role_id', '=', 'role.id')
        //     ->select('users.*', 'role.name AS role_name')
        //     ->get();
            $data = ManageUser::join('roles', 'users.role_id', '=', 'roles.role_id')->get(['users.*', 'roles.*']);
            return DataTables::of($data)->toJson();
    }

    // public function show(Request $request)
    // {
    //     $data = $request->post();
    //     // print_r($data); exit;
    //     $operation = Example::find($data['example_id']);
    //     return $this->response($operation);
    // }

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
