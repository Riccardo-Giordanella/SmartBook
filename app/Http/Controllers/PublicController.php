<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage(){
        $user = Auth::user();

        if ($user)
        {
            $appointments = Appointment::where('user_id', Auth::id())->where('is_accepted', true)->get();
        }else { 
            $appointments = collect(); 
        }

        return view('homepage', compact('appointments'));
    }

    public function prenota(){
        return view('prenota');
    }
}
