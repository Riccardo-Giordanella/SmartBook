<?php

namespace App\Providers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        //
    }
    
    public function boot(): void
    {
        View::composer('components.navbar', function ($view) { 
            $appointments = collect();
            if (Auth::check()) { 
                $appointments = Appointment::where('user_id', Auth::id())->where('is_accepted', true)->get(); 
            } 
            $view->with('appointments', $appointments); }); 
    }
}
    
    