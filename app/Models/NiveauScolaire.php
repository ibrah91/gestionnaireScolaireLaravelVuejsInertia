<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauScolaire extends Model
{
    use HasFactory;
    protected $fillable = ['nom'];

    public function etudiant(){
        return $this->hasMany(Etudiant::class,'');
    }
}