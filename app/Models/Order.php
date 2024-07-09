<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['menus', 'total_price', 'user_id'];
    protected $table = 'orders';

    protected $casts = [
        'menus' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class);
    }


}
