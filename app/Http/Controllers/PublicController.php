<?php 

namespace App\Http\Controllers; 

use Carbon\Carbon; 
use App\Models\Appointment;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 

class PublicController extends Controller { 
    public function homepage()
    {
        $user = Auth::user();
        
        if ($user) {
            // Recuperiamo tutti gli appuntamenti accettati dell'utente
            $appointments = Appointment::where('user_id', Auth::id())->where('is_accepted', true)->get();
            
            // Aggiorniamo lo stato degli appuntamenti se la data e l'ora previste sono passate
            foreach ($appointments as $appointment) {
                // Creiamo un oggetto Carbon per la fine della giornata dell'appuntamento
                $endOfAppointmentDay = Carbon::create($appointment->year, $appointment->month, $appointment->day)->endOfDay();
                
                // Se l'ora attuale è maggiore della fine del giorno dell'appuntamento, settiamo is_accepted a false
                if (Carbon::now()->greaterThan($endOfAppointmentDay)) {
                    $appointment->is_accepted = false;
                    $appointment->save();
                }
            }
            
            // Recuperiamo nuovamente gli appuntamenti aggiornati
            $appointments = Appointment::where('user_id', Auth::id())->where('is_accepted', true)->get();
        } else {
            $appointments = collect();
        }
        
        return view('homepage', compact('appointments'));
    }
    
    
    
    
    public function prenota(){ 
        return view('prenota'); 
    } 
}