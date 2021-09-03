<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
Use App\Imports\RateImport;
use App\Models\Contract;
class ContractController extends Controller
{
    


    /**
     * 
     * Se realizan las validaciones para los formularios.
     */
    private function validar(request $request){

        $request->validate(

            [
                'nombre' => 'required|min:2|max:30',
                'date'=> 'required',
                'archivo' => 'mimes:xlsx,xlsm,xlsb,xls,csv|required', //Obligaciones
            ],
            [
                'nombre.required' => 'El campo "Nombre", es obligatorio',
                'date.required' => 'El campo fecha es obligatorio',
                'archivo.required'=>'El campo archivo es obligatorio',//Mensajes
                'archivo.mimes'=>'Debe ser un archivo excel',
                'archivo.min'=>'Debe ser un archivo de 2MB como minimo'
            ]
            );
     }


     /**
      * Vista de formulario.
      */

     public function create(){

        return view('agregarExcel');

        
    }

     /**
      * Metodo store para poder crear la importacion del formulario
      */

    public function store(Request $request){

        
        
        $this->validar($request); //validacion

        $contract = Contract::create($request->all()); //Se llama al modelo.
        $nombre = $request->nombre;

       

        
        if($contract){
                Excel::import(new RateImport($contract->id), $request->file('archivo')); //importacion

                

                return redirect("adminTablas")->with(["mensaje"=>"Excel $nombre agregado correctamente"]); //redireccion con mensaje de alta correctamente.

        }

    }



    /**
     * 
     * Vista de los contratos generales.
     */



    public function index(){
    

        $contracts = Contract::all();

        return view('adminTablas', compact('contracts')); 
    }

    
    /**
     * 
     * Vista de las tablas por ID. en especifico
     */

    public function show($id){
    



        $contract = Contract::find($id);

        return view('vistaTablas', compact('contract'));
    }


    
    /**
     * 
     * Antes de eliminar se pregunta si se quiere ser eliminado
     */
    public function confirmarBaja($id){



        $contract = Contract::find($id);


        return view('eliminarContrato', compact('contract'));
    }

    
    /**
     * 
     * Se elimina y mensaje de eliminacion correctamente.
     */

    public function destroy(Request $request){


        $nombre = $request->nombre;
        $idContract = $request->id;


       $nombre =  Contract::find($idContract)->delete();

    


        return redirect('adminTablas')->with(["mensaje"=>"Contrato $nombre eliminado correctamente"]);
        

    }


}




