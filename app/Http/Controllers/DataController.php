<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function dataView()
    {
        return Data::all();
    }

    public function makeData(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name' => 'required',
            'other_names' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|unique:data',
            'nationality' => 'required',
            'phone_number' => 'required|unique:data|min:10|max:10',
            'state_of_origin' => 'required',
            'lga' => 'required',
            'clan' => 'required',
            'family_name' => 'required',
            'nin' => 'required|unique:data|max:11|min:11',
            'passport' => 'required|mimes:jpg,png,jpeg|max:5048',

        ]);


        $newImageName = time().'_'.$request->file('passport')->getClientOriginalName();

        $request->passport->move(public_path('images'), $newImageName);

        Data::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_names' => $request->other_names,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'email' => $request->dob,
            'nationality' => $request->dob,
            'phone_number' => $request->dob,
            'state_of_origin' => $request->state_of_origin,
            'lga' => $request->lga,
            'clan' => $request->clan,
            'family_name' => $request->family_name,
            'nin' => $request->nin,
            'passport_path' =>$newImageName,
            'user_id' => Auth::id()


        ]);

        return 'success';
    }
}
