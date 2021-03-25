<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Food;
use Carbon\Carbon;


class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'food_id', 'qty', 'total', 'status', 'paymentUrl'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function food() {
        return $this->hasOne(Food::class, 'id', 'food_id');
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }

}
