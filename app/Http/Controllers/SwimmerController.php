<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSwimmerRequest;
use App\Http\Requests\UpdateSwimmerRequest;
use App\Models\Swimmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SwimmerController extends Controller
{
    public function view(Swimmer $swimmer)
    {
        return view('swimmers.view', compact('swimmer'));
    }
    public function create()
    {
        return view('swimmers.create');
    }

    public function store(StoreSwimmerRequest $request){
        $swimmer = new Swimmer();
        $swimmer->name = $request->name;
        $swimmer->address = $request->address;
        $swimmer->phone = $request->phone;
        $swimmer->whatsapp_phone = $request->whatsapp_phone;
        $swimmer->father_phone = $request->father_phone;
        $swimmer->religion = $request->religion;
        $swimmer->membership_type = $request->membership_type;
        $swimmer->educational_qualification = $request->educational_qualification;
        $swimmer->father_job = $request->father_job;
        $swimmer->birthdate = $request->birthdate;
        $swimmer->national_ID = $request->national_ID;
        $swimmer->membership_number = $request->membership_number;
        $swimmer->current_work = $request->current_work;
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('swimmer_image' , $image , 'swimmers');
        $swimmer->image = 'images/'.$path;
        $swimmer->user_id = Auth::user()->id;
        $swimmer->save();
        return redirect()->route('dashboard');
    }

    public function edit(Swimmer $swimmer){
        return view('swimmers.edit' , compact('swimmer'));
    }

    public function update(UpdateSwimmerRequest $request , Swimmer $swimmer)
    {
        if ($request->national_ID !== $swimmer->national_ID) {
            if (Swimmer::where('national_ID', $request->national_ID)->exists()) {
                return redirect()->back()->withErrors(['national_ID' => 'This National ID already exists.'])->withInput();
            }
            $swimmer->national_ID = $request->national_ID;
        }
        if ($request->membership_number !== $swimmer->membership_number) {
            if (Swimmer::where('membership_number', $request->membership_number)->exists()) {
                return redirect()->back()->withErrors(['membership_number' => 'This Membership Number already exists.'])->withInput();
            }
            $swimmer->membership_number = $request->membership_number;
        }
        $swimmer->name = $request->name;
        $swimmer->address = $request->address;
        $swimmer->phone = $request->phone;
        $swimmer->whatsapp_phone = $request->whatsapp_phone;
        $swimmer->father_phone = $request->father_phone;
        $swimmer->religion = $request->religion;
        $swimmer->membership_type = $request->membership_type;
        $swimmer->educational_qualification = $request->educational_qualification;
        $swimmer->father_job = $request->father_job;
        $swimmer->birthdate = $request->birthdate;
        $swimmer->current_work = $request->current_work;
        $swimmer->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('swimmer_image', $image, 'swimmers');
            $swimmer->image = 'images/' . $path;
        }
        $swimmer->save();
        return redirect()->route('dashboard')->with('success', 'Swimmer updated successfully');
    }


    public function delete(Swimmer $swimmer){
        $swimmer->delete();
        return redirect()->route('dashboard');
    }
}
