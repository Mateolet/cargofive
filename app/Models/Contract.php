<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{


    
    protected $table = 'contracts';
    
    public $timestamps = false;
    protected $fillable = ['nombre', 'date']; //Validacion para el inyeccion de SQL
  


//El contrato tiene muchas rutas.
//PADRE
    public function rates()
    {
        return $this->hasMany(Rate::class);

       
    }
}

