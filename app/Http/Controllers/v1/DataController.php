<?php

namespace App\Http\Controllers\v1;

use App\Models\JobInfo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeTemplate;
use App\Models\Letter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DataController extends Controller
{

    public function user(Request $request){

        $get_user_details = JobInfo::where('EmployeeId', $request->get('employee_id'))
            ->select('id', 'title', 'Wlocation','user_id')
            ->first();

        if ($get_user_details) {

            $user = User::select('name', 'email', 'site', 'department')->where('id',$get_user_details->user_id)->first();

            $user_personal_details = EmployeeTemplate::select('id', 'Hphone','status', 'dob')->where('user_id', $get_user_details->user_id)->first();
       
            return response()->json([
                'success' => true,
                'user' => $user,
                'job_information' => $get_user_details,
                'personal_information' => $user_personal_details
            ]);

        }else{ 
                return response()->json([
                    'success' => false,
                    'message' => 'user not found'
                ], 403);
        }

    }  

    public function storeLetter(Request $request){

        $data = $request->validate([
            'type' => 'required|string',
            'file' => 'required',
            'employee_id' => 'required',
        ]);

        $get_user_details = JobInfo::where('EmployeeId', $request->get('employee_id'))
        ->select('id', 'title', 'Wlocation','user_id')
        ->first();

        $user_exists = User::select('name', 'email', 'site', 'department')->where('id',$get_user_details->user_id)->first();

        if ($user_exists == '') {

            $letter = Letter::create([
                "type" =>  $data['type'],
                "file" =>  $data['file'],
                "user_id" => $user_exists->id,
            ]);
        }

        return response([
            'message' => 'Request received successfully'
        ]);
    }
}
