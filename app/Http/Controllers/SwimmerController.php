<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
        $request->validate([
            'name' => ['required','string'],
            'address' => ['required','string'],
            'religion' => ['nullable','in:muslim,christian'],
            'membership_type' => ['required','string'],
            'phone' => ['required', 'regex:/^01[0-9]{9}$/'],
            'whatsapp_phone' => ['required', 'regex:/^01[0-9]{9}$/'],
            'father_phone' => ['required', 'regex:/^01[0-9]{9}$/'],
            'educational_qualification' => ['nullable','string'],
            'father_job' => ['nullable','string'],
            'birthdate' => ['nullable', 'date', 'before_or_equal:today'],
            'national_ID' => ['required', 'digits:14', 'unique:swimmers,national_ID'],
            'membership_number' => ['required', 'unique:swimmers,membership_number'],
            'current_work' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:30720'],
        ]);
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
}
