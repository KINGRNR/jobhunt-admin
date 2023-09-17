<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Example;

class ExampleController extends Controller
{

    public function index(Request $request)
    {
        
        // return DataTables::of(Example::all())->toJson();
        $data = Example::select('*');
        return Datatables::of($data)
            ->toJson();
    }

    public function show(Request $request)
    {
        $data = $request->post();
        $operation = Example::find($data['example_id']);

        if ($operation) {
            return response()->json([
                'status' => 'success',
                'data' => $operation,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found.',
            ]);
        }
    }



    public function create(Request $request)
    {
        try {
            $dataArray = $request->all();
            $data = $dataArray['data'];

            $data['example_id'] = Example::generateExampleid();
            $data['example_active'] = $dataArray['example_active'];
            $operation = Example::create($data);

            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' =>  false,
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Terjadi Kesalahan di Sistem!',
            ]);
        }
    }

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

            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Terupdate!',
                'code' => 201
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' =>  false,
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Terjadi Kesalahan di Sistem!',
            ]);
        }
    }

    public function delete(Example $example)
    {
        try {
            $example = Example::find(request()->example_id);
            $operation = $example->delete();
            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Terdelete!',
                'code' => 201
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' =>  false,
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Terjadi Kesalahan di Sistem!',
            ]);
        }
    }
}
