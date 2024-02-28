<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class ActivityController extends ApiController
{
    public function index()
    {
        $activities = Activities::all();
        $data['activities'] = $activities;

        return $this->sendResponse($data, 'Activities retrieved successfully.');
    }

    public function store(Request $request)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'name' => ['required', 'min:3', 'max:255', 'unique:activities,name'],
            // 'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
            'description' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date']

        ]);
    
        try {
            $validator->validate();            
            
            $activity= Activities::create($data);

            $data = ["activities" => $activity];

            $response = ["data"=>$data];

            return $this->sendResponse($response, "Successfully registered activity");            

        } catch (ValidationException $e) {
            return $this->sendError("Failed to register activity", $e->errors(), 422);            
        }
    }

    public function update(Request $request, Activities $activity)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'name' => ['required', 'min:3', 'max:255'],
            // 'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg' ,'max:2048'],
            'description' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date']
        ]);
    
        try {
            if ($activity === null) {
                return $this->sendError("Activity not found");
            }

            $validator->validate();
            
            $activity->update($data);            


            $response = ["activities" => $activity];
            

            return $this->sendResponse($response, "Successfully modificated activity");            

        } catch (ValidationException $e) {
            return $this->sendError("Failed to modificated activity", $e->errors(), 422);            
        }        
    }

    //Do: SHOW devolver las actividades y los usuarios inscritos en ella
    public function show(Activities $activity)
    {
        $usersInscribeds= DB::table('confirmations')
                            ->where('activity_id',$activity->id)
                            ->join('user_data','user_data.id','=','confirmations.user_id')                            
                            ->select('user_data.*')
                            ->get();
        
        $data = ["activity" => $activity, "users" => $usersInscribeds];

        return $this->sendResponse($data,'Showing activity');
    }

    
    public function deactiveActivity(Activities $activity, Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'active' => ['required', 'boolean', 'max:1']
        ]);
        try {
            $validator->validate();
            
            $active = $activity->update($data);

            return $this->sendResponse($active, "Successfully modificated activity");

        } catch (ValidationException $e) {
            return $this->sendError("Failed to modificated activity", $e->errors(), 422);

        }
        
        
    }
}
