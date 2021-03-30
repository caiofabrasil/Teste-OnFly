<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesas extends Model
{
    protected $fillable = ['descricao', 'data', 'arquivoImg', 'valor', 'despesas_id'];

    public function relUsers(){
    	return $this->hasOne('App\Models\ModelUser', 'id', 'despesas_id');
    }

}
