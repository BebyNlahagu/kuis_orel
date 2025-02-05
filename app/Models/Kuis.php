<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;

    protected $table = 'kuis';
    protected $guarded = [];

    public function soal()
    {
        return $this->hasMany(Soal::class,'kuis_id');
    }
}
