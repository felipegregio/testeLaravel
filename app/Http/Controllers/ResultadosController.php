<?php

namespace App\Http\Controllers;

use App\ModelResultados;
use Illuminate\Http\Request;
use mysqli;

class ResultadosController extends Controller
{        
 
    private $objResultado;
 
    public function __construct()
    {
        $this->objResultado=new ModelResultados;
    }

    public function index(){
        $resultados=$this->objResultado->all();
        //dd($this->objResultado);
        return view('resultados', [
            'resultados' => $resultados
        ]);
    }
    
    public function deleteArtigo(Request $id)
    {
        $artigo = $this->objResultado->find($id);

        $delete = $artigo->delete();

        if($delete)
            return redirect()->route['resultados'];
        else
            return redirect()->route['resultados'];
    }
}
