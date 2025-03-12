<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class Randevu extends Model
{
    use HasFactory;

    protected $table = 'randevular';

    protected $fillable = [
        'email',
        'tarih',
        'durum',
    ];

    protected $casts = [
        'tarih' => 'datetime',
    ];

    public function setTarihAttribute($value)
    {
        if ($value instanceof Carbon) {
            $this->attributes['tarih'] = $value;
        } else {
            $this->attributes['tarih'] = Carbon::parse($value);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($randevu) {
            if (empty($randevu->durum)) {
                $randevu->durum = 'Aktif';
            }
        });
        static::saving(function ($randevu) {
            // Randevu tarihi geçmişse durum 'Pasif' olacak
            if ($randevu->tarih < now()) {
                $randevu->durum = 'Pasif';
            }
        });
    }
}
