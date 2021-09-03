<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
      
    protected $table = 'rates';
    
    public $timestamps = false;
    protected $fillable = ['origin', 'destination','currency','twenty','forty','fortyhc','contract_id']; //Validacion para el inyeccion de SQL

    //La ruta pertenece a un contrato.
    public function contract()
    {
        return $this->belongsTo(Contract::class,'contract_id');

       
    }
}
