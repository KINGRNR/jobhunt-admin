<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseResponse extends Controller
{
    protected function successResponse($data, $customData = null, $code = 200): JsonResponse
    {
        return $this->jsonResponse(true, 'Success', $customData, $code);
    }

    protected function errorResponse($customData = null, $code = 400): JsonResponse
    {
        return $this->jsonResponse(false, 'error', $customData, $code);
    }

    protected function jsonResponse($success, $status, $customData, $code): JsonResponse
    {
        if ($code == 201) {
            $response = [
                'success' => $success,
                'status' => $status,
                'title' => 'Sukses!',
                'message' => 'Data berhasil disimpan'
            ];
        } else {
            $response = [
                'success' => $success,
                'status' => $status,
                'title' => 'Gagal!',
                'message' => 'Terjadi Error Pada Sistem'
            ];
        }
       
        // print_r($response); exit;

        if ($customData !== null) {
            $response = array_merge($response, $customData);
        }

        if ($code !== null) {
            $response['code'] = $code;
        }
        // print_r($response); exit;
        return response()->json($response, $code);
    }
}
