<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    protected $fillable = ['nome', 'usuario', 'senha'];

    public function relDespesas(){
    	return $this->hasMany('App\Models\Despesas', 'despesas_id');
    }
}
