<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    use HasFactory;

    protected $table = 'epreuve';


    protected $fillable = ['name'];

    public function poule()
    {
        return $this->hasMany(Poule::class);
    }

   

    public function classement()
    {
        return $this->hasOne(Classement::class);
    }

}
