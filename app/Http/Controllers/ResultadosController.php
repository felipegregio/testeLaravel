<?php

namespace App\Http\Controllers;

use App\ModelResultados;
use Illuminate\Http\Request;
use mysqli;

class ResultadosController extends Controller
{        

    public function telaResultado(){
        return view('resultados');
    }

    public static function retornaResultado()
    {
        

        $conn = ModelResultados::connectDbArtigos();
        $sql = "SELECT * FROM artigos";
        $resultado_sql = $conn->query($sql)->fetchAll();
        $row_artigo = $resultado_sql;

        //var_dump($resultado_sql);

        foreach($row_artigo as $artigo){
            echo ("ID: {$artigo['id']} -------------------- <button type='submit' name='id' value='{$artigo['id']}'>Deletar Artigo</button> <br>");
            echo ("Modelo: " . $artigo['nome_veiculo'] . '<br>');
            echo ("Link: " . $artigo['link'] . '<br>');
            echo ("Ano: " . $artigo['ano'] . '<br>');
            echo ("Combustível: " . $artigo['combustivel'] . '<br>');
            echo ("Portas: " . $artigo['portas'] .'<br>');
            echo ("Km: " . $artigo['quilometragem'] . '<br>');
            echo ("Câmbio: " . $artigo['cambio'] . '<br>');
            echo ("Cor: " . $artigo['cor'] . '<br>');
            echo ("</form>");

            echo ("----------------------------------" . '<br>');
        }
        
    }
    
    function deleteArtigo($id)
    {
        
        $conn = ModelResultados::connectDbArtigos();
        
        $sql = "DELETE FROM artigos WHERE id='$id'";
        $resultado_sql = $conn->query($sql)->fetch();
    }
}
