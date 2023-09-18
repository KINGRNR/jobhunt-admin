<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

use App\Models\DetailUser;
use App\Models\ManageUser;
use App\Models\Role;

class ListuserController extends Controller
{

    public function index(Request $request)
    {

        $data = ManageUser::leftJoin('detail_users', 'users.id', '=', 'detail_users.user_id')->get(['users.*', 'detail_users.*']);
        return DataTables::of($data)->toJson();
    }

    public function show(Request $request)
    {
        $data = $request->post();
        $user_id = $data['id'];

        $userData = ManageUser::leftJoin('detail_users', 'users.id', '=', 'detail_users.user_id')
            ->where('users.id', $user_id)
            ->first();

        if ($userData) {
            return response()->json([
                'status' => 'success',
                'data' => $userData,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }
    }

    public function detailJob(Request $request)
    {
        $data = $request->post();
        $user_id = $data['id'];

        $userData = DB::table('v_users_job')
            ->where('job_users_users_id', $user_id)
            ->get();

        if ($userData->count() > 0) {
            $responseData = [
                'draw' => 1,
                'recordsTotal' => $userData->count(),
                'recordsFiltered' => $userData->count(),
                'data' => $userData
            ];

            return response()->json($responseData);
        } else {
            return response()->json(['message' => 'User belum punya pekerjaan', 'data' => []]);
        }
    }
}
