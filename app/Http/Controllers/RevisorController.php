<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $appointments_to_check = Appointment::where('is_accepted', null)->first();
        return view('revisor.index', compact('appointments_to_check'));
    }
    
    public function accept(Appointment $appointment)
    {
        $appointment->setAccepted(true);
        return redirect()->back()->with('message', "Hai confermato l'appuntamento $appointment->service");
    }

    public function reject(Appointment $appointment)
    {
        $appointment->setAccepted(false);
        return redirect()->back()->with('message', "Hai rifiutato l'appuntamento $appointment->service");
    }
}
