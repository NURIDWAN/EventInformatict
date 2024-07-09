<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', 'code_payment', 'account_name', 'account_number', 'nominal', 'proof_of_payment', 'description', 'status'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code_payment = self::generateInvoiceId();
        });
    }

    private static function generateInvoiceId()
    {
        $prefix = 'INV';
        $randomNumber = mt_rand(100000, 999999);
        $invoiceId = $prefix . $randomNumber;

        // Pastikan invoice ID unik
        if (self::where('code_payment', $invoiceId)->exists()) {
            return self::generateInvoiceId();
        }

        return $invoiceId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class);
    }
}