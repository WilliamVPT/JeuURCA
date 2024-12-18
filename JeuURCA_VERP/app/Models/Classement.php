<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classement extends Model
{
    use HasFactory;


    protected $table = 'classement';

    protected $fillable = ['epreuve_id', 'medaille', 'equipe', 'points'];


public function epreuve()
    {
        return $this->belongsTo(Epreuve::class, 'epreuve_id');
    }

    public static function getSortedData($column, $order)
    {
        return self::orderBy($column, $order)->get();
    }
}