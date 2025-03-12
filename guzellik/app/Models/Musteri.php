<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musteri extends Model
{
    use HasFactory;

    protected $table = 'musteriler';
    protected $primaryKey = 'id';

    protected $fillable = [
        'adsoyad',
        'email',
        'telefon'
    ];

    // Randevular ile ilişki
    public function randevular()
    {
        return $this->hasMany(Randevu::class, 'musteriID');
    }
}
