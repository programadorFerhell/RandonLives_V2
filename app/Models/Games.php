<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Games extends Model
{
    use HasFactory;

    protected $table = 'tbl_games';



    protected $fillable = [
        'nome',
        'genero_id',
    ];

    protected $hidden = ['created_at','updated_at'];

    public function genero()
    {
        return $this->belongsTo(GeneroGames::class, 'genero_id');
    }
}
