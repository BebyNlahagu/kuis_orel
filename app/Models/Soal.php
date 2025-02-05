<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soals';
    protected $guarded = [];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'soal_id');
    }
}
