<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'UF', 'email'];

    public function produtos(){
        return $this->hasMany(Produto::class, 'fornecedor_id', 'id');
    }
}
