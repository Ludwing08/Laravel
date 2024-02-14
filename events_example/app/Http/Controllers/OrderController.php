<?php

namespace App\Http\Controllers;

use App\Events\CreateOrderEvent;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OrderController extends Controller
{
    public function create()
    {
        // $newOrder = Order::create([
        //     "user_id" => 3,
        //     "total_amount" => 40.5
        // ]);

        // //informar que se creo la nueva orden
        // CreateOrderEvent::dispatch($newOrder);

        // return response()->json(["message"=>"Order created successfully!",
        //                         "order"=>$newOrder]);

        $newOrder=Artisan::call('make:order', ['user_id' => 60, 'total_amount' => 190]);

        return response()->json(["message"=>"Order created successfully!",
                                "order"=>$newOrder]);

    }
}
