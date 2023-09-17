<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
	{
		
		$user = session()->get('user_id');
		$operation['data'] = DB::table('v_detail_users')->where('id', $user)->first();
		// $operation['profile'] = $operation['data']->picture;
		$operation['detail'] = User::where('id', $user)->first();
		return $this->response($operation);
	}
}
