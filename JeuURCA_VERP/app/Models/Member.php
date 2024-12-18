<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';


    protected $fillable = [
        'team_id', 'name', 'prenom', 'composante', 'genre', 'handicap',
    ];

    // Si vous voulez définir des relations avec d'autres tables, vous pouvez le faire ici
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_id');
    }

    
}
