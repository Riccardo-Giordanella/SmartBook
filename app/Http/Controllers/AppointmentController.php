<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    
    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        // Valida i dati del form 
        $validatedData = $request->validate([ 
            'day' => 'required|integer|min:1|max:31',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer',
            'hour' => 'required|integer|min:0|max:23',
            'minute' => 'required|integer|min:0|max:59',
            'type' => 'required|string',
            'service' => 'required|string',
        ]);
        
        // Aggiungi l'ID utente autenticato 
        $validatedData['user_id'] = Auth::id();
        
        // Crea l'appuntamento 
        Appointment::create($validatedData);
        
        // Reindirizza con un messaggio di successo
        
        return redirect()->route('homepage')->with('successMessage', 'Appuntamento creato con successo, attendi che un amministratore lo confermi!');
    }
    
    public function show(Appointment $appointment)
    {
        //
    }
    
    public function edit(Appointment $appointment)
    {
        //
    }
    
    public function update(Request $request, Appointment $appointment)
    {
        //
    }
    
    public function destroy(Appointment $appointment)
    {
        //
    }  
}
