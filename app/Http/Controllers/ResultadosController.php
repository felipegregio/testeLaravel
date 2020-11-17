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
    
    function deleteArtigo($id)
    {
        
        $conn = ModelResultados::connectDbArtigos();
        
        $sql = "DELETE FROM artigos WHERE id='$id'";
        $resultado_sql = $conn->query($sql)->fetch();
    }
}
