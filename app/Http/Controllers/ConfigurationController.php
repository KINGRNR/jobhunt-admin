<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Configuration;

class ConfigurationController extends BaseResponse
{
    public function getConfig(Request $request)
    {

        $data = $request->post();
        $operation = Configuration::where('config_group', $data['group'])->orderBy('config_order', 'ASC')->get();

        return response()->json([
            'config' => $operation,
        ]);
    }

    // public function save(Request $request)
    // {
    //     $data = $request->all();

    //     try {
    //         foreach ($data as $key => $value) {
    //             if (count(explode('_', $key)) == 1) {
    //                 Configuration::where('config_id', $key)->update([
    //                     'config_value' => $value,
    //                 ]);
    //             }
    //         }

    //         return response()->json([
    //             'success' =>  true,
    //             'status' =>  'Success',
    //             'title' => 'Sukses!',
    //             'message' => 'Data Berhasil Tersimpan!',
    //             'code' => 201
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'success' =>  false,
    //             'status' =>  'error',
    //             'title' => 'Gagal!',
    //             'message' => 'Terjadi Kesalahan di Sistem!',
    //         ]);
    //     }
    // }
    public function save(Request $request)
    {
        $data = $request->all();

        try {
            foreach ($data as $key => $value) {
                if (count(explode('_', $key)) == 1) {
                    Configuration::where('config_id', $key)->update([
                        'config_value' => $value,
                    ]);
                }
            }

            return $this->successResponse($data,[],201);
        } catch (\Throwable $th) {
            return $this->errorResponse();
        }
    }
}
