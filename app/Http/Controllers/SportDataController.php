<?php

namespace App\Http\Controllers;

use App\Models\Sportdata;
use App\Models\Swimmer;
use Illuminate\Http\Request;

class SportDataController extends Controller
{
    public function view(Swimmer $swimmer){
        if(empty($swimmer->sportdatas)){
            return redirect()->back()->withErrors(['message' => 'there is no sport data'])->withInput();
        }
        return view('sport_data.view' , compact('swimmer'));
    }

    public function create(Swimmer $swimmer){
        return view('sport_data.create' , compact('swimmer'));
    }

    public function store(Request $request , Swimmer $swimmer){
        return response()->json([
            'data' => $request
        ]);
        $sportdatas = new Sportdata();
        $sportdatas->member_of_other_clubs = $request->member_of_other_clubs;
        $sportdatas->other_clubs = $request->other_clubs;
        $sportdatas->did_you_play_for_other_club = $request->did_you_play_for_other_club;
        $sportdatas->have_you_obtained_the_star_tests_and_their_number = $request->have_you_obtained_the_star_tests_and_their_number;
        $sportdatas->where_to_get_star_tests = $request->where_to_get_star_tests;
        $sportdatas->union_registration_number = $request->union_registration_number;
        $sportdatas->swimmer_id = $swimmer->id;;
        $sportdatas->save();
        return redirect()->route('swimmers.sport.data.view' , $swimmer->sportdatas->id);
    }
}
