<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Time;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function AvgTime($entity)
    {
        $avg = (Time::sum($entity)) / (Time::count());
        return $avg;
    }

    public function RoomSumEntity($entity){
        $sum = Room::sum($entity);

        return $sum;
    }
}
