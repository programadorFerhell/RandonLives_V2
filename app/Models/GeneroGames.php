<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneroGames extends Model
{
    use HasFactory;

    protected $table = 'tbl_genero_games';

    protected $fillable = ['nome'];

    protected $hidden = ['created_at','updated_at'];

    public function games()
    {
        return $this->hasMany(Games::class, 'genero_id');
    }

}
