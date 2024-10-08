<?php

namespace App\Listeners;

use App\Events\NewUserAdded;
use App\Models\EmployeeTemplate;
use App\Models\JobInfo;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendDataToMessageApp
{
    public function handle(NewUserAdded $event)
    {
        $user = User::select('name', 'email', 'site', 'department')->find($event->user->id);

        $user_personal_details = EmployeeTemplate::select('id', 'Hphone','status', 'dob')
                    ->where('user_id', $event->user->id)->first();

        $job_info = JobInfo::where('user_id', $event->user->id)
        ->select('id', 'title', 'Wlocation','user_id','EmployeeId')
        ->first();

        $response = Http::post('https://messaging.betterglobeforestry.co.ke/api/create/user', [
            'user' => $user,
            'job_information' => $job_info,
            'personal_information' => $user_personal_details
        ]);
        
        $responseData = $response->json();

        if($responseData['success'] == true){
            Log::info('User Created');
        }else{
            Log::info('Something went wrong for user'.$user->name);
        }
    }
}
