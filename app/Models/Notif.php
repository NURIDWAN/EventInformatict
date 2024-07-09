<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notif extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCreatedAtTrace()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}