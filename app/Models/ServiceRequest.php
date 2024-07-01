<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'device',
        'model',
        'service_type',
        'problem_description',
        'payment_method',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}