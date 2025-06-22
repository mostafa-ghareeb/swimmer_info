<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHealthRequest;
use App\Http\Requests\UpdateHealthRequest;
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

    public function edit(HealthCondition $health){
        return view('health.edit' , compact('health'));
    }

    public function update(UpdateHealthRequest $request , HealthCondition $health){

        $health->weight = $request->weight;
        $health->height = $request->height;
        if(!empty($request->chronic_diseases)){
            $health->chronic_diseases = $request->chronic_diseases;
        }
        if(!empty($request->please_mention)){
            $health->please_mention = $request->please_mention;
        }
        if(!empty($request->undergoes_surgery)){
            $health->undergoes_surgery = $request->undergoes_surgery;
        }
        if(!empty($request->type_of_operation)){
            $health->type_of_operation = $request->type_of_operation;
        }
        if(!empty($request->sports_injuries)){
            $health->sports_injuries = $request->sports_injuries;
        }
        if(!empty($request->type_of_injury)){
            $health->type_of_injury = $request->type_of_injury;
        }
        $health->swimmer_id = $health->swimmer->id;
        $health->save();
        return redirect()->route('swimmers.health.view',$health->swimmer->id);
    }

    public function delete(HealthCondition $healthCondition){
        $swimmer_id = $healthCondition->swimmer->id;
        $healthCondition->delete();
        return redirect()->route('swimmers.view' , $swimmer_id);
    }
}
