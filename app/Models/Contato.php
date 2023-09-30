<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;

class Contato extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'contatos';

    
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero');
    }
    public function contatos()
{
    return $this->hasMany(Contato::class, 'genero'); // Substitua 'genero_id' pelo nome correto do seu campo de chave estrangeira.
}


}
