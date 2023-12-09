<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;

class NotificationController extends BaseResponse
{
    // public function saveToken(Request $request)
    //     {
    //         auth()->user()->update(['device_token'=>$request->token]);
    //         return response()->json(['token saved successfully.']);
    //     }
    public function index()
    {
        // $id = Session::get('user_id');
        // $notif = DB::table('notification')->where('notification_to', 'FOV4Qtgi5lcQ9kCY')->findAll();
        $notif['unread'] = DB::table('notification')->where('notification_to', 'FOV4Qtgi5lcQ9kCY')->orderBy('notification_created_at', 'DESC')->where('notification_read', 0)->get();
        $notif['read'] = DB::table('notification')->where('notification_to', 'FOV4Qtgi5lcQ9kCY')->orderBy('notification_created_at', 'DESC')->where('notification_read', 1)->get();

        return response()->json([
            'status' => 'success',
            'data' => $notif
        ]);
    }
    public function read(Request $request)
    {
        try {
            $id = $request->post();
            if (isset($id['id'])) {
                $read =  Notification::where('notification_id', $id['id'])->update([
                    'notification_read' => 1,
                ]);
            } else {
                $read =  Notification::where('notification_to', $id['role'])->update([
                    'notification_read' => 1,
                ]);
            }
            return $this->successResponse($read, [], 201);
        } catch (\Throwable $th) {
            return $this->errorResponse();
        }
    }
    public function saveToken(Request $request)
    {

        $user = Auth::user();
        $user->device_token = $request->token;
        $user->save();

        return response()->json(['token saved successfully.']);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAAWVVUeEc:APA91bGr6dPTpLHlIJE6fF-JAyEU1nd-68DnBj3jL1-ii-SjjAbG5bBmxA-iYb1-4aVRKYo0gcY3OrBytq8Z2tEAUvi9IPkvj6B9HAkMqZdZxv9OKEsDgbTJDo2LyJNfMfFJsSg2krOr';


        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        // dd($response);
        // print_r($response);
    }
}
