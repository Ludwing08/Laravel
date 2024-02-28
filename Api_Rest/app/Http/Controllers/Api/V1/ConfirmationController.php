<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Activities;
use App\Models\Confirmation;
use App\Models\UserData;
use Berkayk\OneSignal\OneSignalFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConfirmationController extends ApiController
{
    //crud
    // do: agregar (tener en cuenta que no puede agregarse dos veces a la misma actividad)
    // show verificar que exita confirmacion y actividad 
    //recuperar info de usuarios en comun actividades
    // do: confirmaciones por usuario
    // 
    public function confirmationsByUser(UserData $user)
    {
        $activities = DB::table('confirmations')
            ->where('user_data.id', '=', $user->id)
            ->join('user_data', 'confirmations.user_id', '=',  'user_data.id')
            ->join('activities', 'confirmations.activity_id', '=', 'activities.id')
            ->select('activities.*')
            ->get();

        $data = ["user" => $user, "activitiesByUser" => $activities];

        return $this->sendResponse($data, 'Confirmations retrieved successfully');
    }

    public function confirmationsByActivities(Activities $activity)
    {
        $usersInscribeds = DB::table('confirmations')
            ->where('activity_id', $activity->id)
            ->join('user_data', 'confirmations.user_id', '=', 'user_data.id')
            ->select('user_data.*')
            ->get();

        $data = ["activity" => $activity, "usersInscribeds" => $usersInscribeds];

        return $this->sendResponse($data, 'Users Inscritos Retrieved Successfully');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => ['required'],
            'activity_id' => ['required']

        ]);

        if ($validator->fails()) {
            return $this->sendError("Failed to modificated confirmation", $validator->errors(), 422);
        }


        $existConfirmations = DB::table('confirmations')
            ->where('user_id', '=', $request->get('user_id'))
            ->where('activity_id', '=', $request->get('activity_id'))
            ->first();


        if ($existConfirmations) {
            return $this->sendError("Failed to modificated confirmation", ['Confirmated already exist'], 402);
        }

        $confirmation = Confirmation::create($data);

        $activity = Activities::find($request->get('activity_id'));

        $usersInscribeds = DB::table('confirmations')
            ->join('user_data', 'user_data.id', '=', 'confirmations.user_id')
            ->where('activity_id', $activity->id)
            ->select('user_data.idOneSingal')
            ->get();

            foreach ($usersInscribeds as $user) {
            $id = $user->idOneSingal;
            if (!empty($id) && !is_null($id)) {                       
                OneSignalFacade::sendNotificationToUser(
                    "Nuevo integrante a la actividad",                    
                    $id,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
            }
           
        }


        return $this->sendResponse($confirmation, "Successfully registered confirmation");
    }

    public function destroy(Confirmation $confirmation)
    {   
        $confirmation->delete();

        return $this->sendResponse(["status" => "Ok"], "Successfully destroy confirmation");

    }
}
