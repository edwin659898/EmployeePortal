<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Http\Resources\EmployeeResource;
use App\Models\EmergencyC;
use App\Models\EmployeeTemplate;
use App\Models\Image;
use App\Models\JobInfo;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeTemplateController extends Controller
{


    public function index()
    {
        $user = User::findOrFail(auth()->id())->load('Employees', 'jobInfos', 'emergency', 'Images', 'Assets', 'trainings');
        $canwrite = false;
        return response()->json(['user' => $user, 'canwrite' => $canwrite]);
    }

    //personal Docs view
    public function file($id)
    {
        $image = Image::findOrFail($id);
        $filename = $image->file;
        $path = storage_path('app/public/images/' . $filename);

        //  $path = storage_path('app/public/images/Trainings/' . $filename);

        return response()->file($path);
    }

    //Training Docs view
    public function TrainingFile($id)
    {
        $image = Training::findOrFail($id);
        $filename = $image->file;
        // $path = storage_path('app/public/images/' . $filename);

        $path = storage_path('app/public/images/Trainings/' . $filename);
        
        return response()->file($path);
    }


    public function SelectedDept()
    {
        $dept = request('dept');
        $filter = User::where('department', 'like', '%' . request('dept') . '%')->get();
        return response()->json(['filter' => $filter]);
    }

    public function selectall()
    {
        $dept = request('dept');
        return User::where('department', 'like', '%' . $dept  . '%')
            ->when(request('site', '') != '', function ($query) {
                $query->where('site', 'like', '%' . request('site') . '%');
            })
            ->pluck('id');
    }

    public function export($employees)
    {
        $employees = explode(',', $employees);
        return (new EmployeeExport($employees))->download('Employees.xlsx');
    }
}
