<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHealthRequest;
use App\Models\HealthCondition;
use App\Models\Swimmer;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function view(Swimmer $swimmer){
        $health = $swimmer->healthConditions;
        if(!$health){
            return redirect()->back()->withErrors(['message' => 'Health condition not found for this swimmer']);
        }
        return view('health.view' , compact('health'));
    }

    public function create(Swimmer $swimmer){
        return view('health.create' , compact('swimmer'));
    }

    public function store(StoreHealthRequest $request , Swimmer $swimmer){
        $health = new HealthCondition();
        $health->weight = $request->weight;
        $health->height = $request->height;
        $health->chronic_diseases = $request->chronic_diseases;
        $health->please_mention = $request->please_mention;
        $health->undergoes_surgery = $request->undergoes_surgery;
        $health->type_of_operation = $request->type_of_operation;
        $health->sports_injuries = $request->sports_injuries;
        $health->type_of_injury = $request->type_of_injury;
        $health->swimmer_id = $swimmer->id;
        $health->save();
        return redirect()->route('swimmers.health.view',$swimmer->id);
    }
}
