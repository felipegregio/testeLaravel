<?php

namespace App\Http\Controllers;

use App\ModelResultados;

use Illuminate\Http\Request;

class ControllerSucesso extends Controller
{
    public function telaSucesso()
    {
        return view('sucesso');
    }

    function deleteArtigo($id)
    {
        
        $conn = ModelResultados::connectDbArtigos();
        
        $sql = "DELETE FROM artigos WHERE id='$id'";
        $resultado_sql = $conn->query($sql)->fetch();
    }
}
