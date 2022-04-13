<?php

namespace App\Models;
use App\Models\car;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $table="bookings";
    protected $fillable=['tarikh_tempah','car_id','user_id'];

    public function car() {

        return $this->belongsTo(car::class);

    }

    public function user() {

        return $this->belongsTo(User::class);

    }
}