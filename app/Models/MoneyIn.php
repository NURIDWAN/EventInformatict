<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyIn extends Model
{
    use HasFactory;
    protected $table = 'moneyins';
    protected $fillable = ['user_id', 'payment_id', 'nominal', 'is_confirmed'];

    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }
}