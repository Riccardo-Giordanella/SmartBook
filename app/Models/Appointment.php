<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'day',
        'month',
        'year',
        'hour',
        'minute',
        'type',
        'service',
    ];

    // Relazione con l'utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->set_accepted = $value;
        $this->save();
        return true;
    }
}
