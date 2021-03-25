<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'ingredients' , 'price', 'rate', 'type', 'picturePath'
    ];

    public function transaction() {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }

    public function toArray() {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute() {
        return url('http://foodmarket-backend.codehater.net') . Storage::url($this->attributes['picturePath']);
    }

}
