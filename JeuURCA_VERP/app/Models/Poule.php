<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poule extends Model
{
    use HasFactory;

    protected $table = 'poules';


    protected $fillable = [
        'team_id', 'name', 'equipe1', 'equipe2', 'equipe3', 'equipe4',
    ];

    public function epreuve()
    {
        return $this->belongsTo(Epreuve::class, 'epreuve_id');
    }
}
