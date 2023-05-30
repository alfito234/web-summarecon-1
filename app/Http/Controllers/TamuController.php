<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tamu;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TamuController extends Controller
{

    public function getGuests(Request $request)
    {
        // $request->session()->put('start_date', $request->start_date);
        $endDate = $request->input('end_date');
        $startDate = $request->input('start_date');

        $pintu = Room::whereBetween('created_at', [$startDate, $endDate])->sum('pintu');
        $ruangTamuDepan = Room::whereBetween('created_at', [$startDate, $endDate])->sum('ruangTamuDepan');
        $ruangMakan = Room::whereBetween('created_at', [$startDate, $endDate])->sum('ruangMakan');
        $halamanDepan = Room::whereBetween('created_at', [$startDate, $endDate])->sum('halamanDepan');
        $lantai2 = Room::whereBetween('created_at', [$startDate, $endDate])->sum('lantai2');
        $balkon = Room::whereBetween('created_at', [$startDate, $endDate])->sum('balkon');
        $kamar = Room::whereBetween('created_at', [$startDate, $endDate])->sum('kamar');
        $toilet = Room::whereBetween('created_at', [$startDate, $endDate])->sum('toilet');

        //time
        $timePintu = Time::whereBetween('created_at', [$startDate, $endDate])->sum('pintu');
        $timeRuangTamuDepan = Time::whereBetween('created_at', [$startDate, $endDate])->sum('RuangTamuDepan');
        $timeRuangMakan = Time::whereBetween('created_at', [$startDate, $endDate])->sum('RuangMakan');
        $timeHalamanDepan = Time::whereBetween('created_at', [$startDate, $endDate])->sum('HalamanDepan');
        $timeLantai2 = Time::whereBetween('created_at', [$startDate, $endDate])->sum('Lantai2');
        $timeBalkon = Time::whereBetween('created_at', [$startDate, $endDate])->sum('Balkon');
        $timeKamar = Time::whereBetween('created_at', [$startDate, $endDate])->sum('Kamar');
        $timeToilet = Time::whereBetween('created_at', [$startDate, $endDate])->sum('Toilet');

        $data = Tamu::all();
        $menit = 60;

        if(Time::count() > 0){
            return view('guest.list',[
                'title' => 'List | Summarecon',
                'model' => 'summarecon',
                'data' => $data, 
                'roomPintu' => Room::sum('pintu'),
                'roomRuangTamuDepan' => Room::sum('ruangTamuDepan'),
                'roomRuangMakan' => Room::sum('ruangMakan'),
                'roomHalamanDepan' => Room::sum('halamanDepan'),
                'roomLantai2' => Room::sum('lantai2'),
                'roomBalkon' => Room::sum('balkon'),
                'roomKamar' => Room::sum('kamar'),
                'roomToilet' => Room::sum('toilet'),
                'timePintu' => $timePintu / Time::count() / $menit,
                'timeRuangTamuDepan' => $timeRuangTamuDepan / Time::count() / $menit,
                'timeRuangMakan' => $timeRuangMakan / Time::count() / $menit,
                'timeHalamanDepan' => $timeHalamanDepan / Time::count() / $menit,
                'timeLantai2' => $timeLantai2 / Time::count() / $menit,
                'timeBalkon' => $timeBalkon / Time::count() / $menit,
                'timeKamar' => $timeKamar / Time::count() / $menit,
                'timeToilet' => $timeToilet / Time::count() / $menit,
            ]);
        }

        return view('guest.list',[
            'title' => 'List | Summarecon',
            'model' => 'summarecon',
            'data' => $data, 
            'roomPintu' => Room::sum('pintu'),
            'roomRuangTamuDepan' => Room::sum('ruangTamuDepan'),
            'roomRuangMakan' => Room::sum('ruangMakan'),
            'roomHalamanDepan' => Room::sum('halamanDepan'),
            'roomLantai2' => Room::sum('lantai2'),
            'roomBalkon' => Room::sum('balkon'),
            'roomKamar' => Room::sum('kamar'),
            'roomToilet' => Room::sum('toilet'),
            'timePintu' => $timePintu ,
            'timeRuangTamuDepan' => $timeRuangTamuDepan ,
            'timeRuangMakan' => $timeRuangMakan ,
            'timeHalamanDepan' => $timeHalamanDepan ,
            'timeLantai2' => $timeLantai2 ,
            'timeBalkon' => $timeBalkon ,
            'timeKamar' => $timeKamar ,
            'timeToilet' => $timeToilet ,
        ]);

        // return view('guest.list', [
        //     'starDate'=>$startDate,
        //     'title' => 'List | Summarecon',
        //     'model' => 'summarecon',
        //     'data' => $data,
        //     'roomPintu' => $pintu,
        //     'roomRuangTamuDepan' => $ruangTamuDepan,
        //     'roomRuangMakan' => $ruangMakan,
        //     'roomHalamanDepan' => $halamanDepan,
        //     'roomLantai2' => $lantai2,
        //     'roomBalkon' => $balkon,
        //     'roomKamar' => $kamar,
        //     'roomToilet' => $toilet,
        //     'timePintu' => Time::sum('Pintu') / Time::count() / $menit,
        //     'timeRuangTamuDepan' => Time::sum('RuangTamuDepan') / Time::count() / $menit,
        //     'timeRuangMakan' => Time::sum('RuangMakan') / Time::count() / $menit,
        //     'timeHalamanDepan' => Time::sum('HalamanDepan') / Time::count() / $menit,
        //     'timeLantai2' => Time::sum('Lantai2') / Time::count() / $menit,
        //     'timeBalkon' => Time::sum('Balkon') / Time::count() / $menit,
        //     'timeKamar' => Time::sum('Kamar') / Time::count() / $menit,
        //     'timeToilet' => Time::sum('Toilet') / Time::count() / $menit,


        // ]);
    }

    public function saveRegister(Request $request)
    {
        // @dd($request->all());
        Tamu::create([
            'name' => $request->name,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'gender' => $request->gender
        ]);

        $url = 'https://summarecon-content.virtualreality-lab.com/';
        return redirect()->away($url);
    }
}
