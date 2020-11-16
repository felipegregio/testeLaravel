<?php

namespace App\Http\Controllers;

use App\ModelInicio;
use DOMDocument;
use DOMXPath;
use Exception;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function telaInicio()
    {
        return view('telaInicio');
    }

    public function pesquisa(Request $request)
    {
        $termoBusca = $request->input('pesquisa');

        $urlPesquisa = 'https://www.questmultimarcas.com.br/estoque?termo='.$termoBusca;

        ob_start();
        $ch = curl_init($urlPesquisa);
        //curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36");
        curl_setopt($ch, CURLOPT_URL, $urlPesquisa);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HEADER, true);
        $result = curl_exec($ch);
        $out = ob_get_clean();
        curl_close($ch);

        // var_dump($result);

            $dom = new DOMDocument('1.0', 'utf-8');
            libxml_use_internal_errors(true);
            $dom->loadHTML($result);

            $cars = array();
            foreach ($dom->getElementsByTagName('article') as $article) {
            if ($article->getAttribute('class') == 'card clearfix') {
                $cars['id'] = $article->getAttribute('id');
                //$cars['img'] = $article->getElementsByTagName('img')->item(0)->getAttribute('src');
                $cars['title'] = $article->getElementsByTagName('h2')->item(0)->nodeValue;
                $cars['link'] = $article->getElementsByTagName('a')->item(0)->getAttribute('href');

                $cars['details'] = array();
                foreach ($article->getElementsByTagName('ul')->item(0)->getElementsByTagName('li') as $detail) {
                $key = $detail->getElementsByTagName('span')->item(0)->nodeValue;
                $value = $detail->getElementsByTagName('span')->item(1)->nodeValue;

                $key = trim($key);
                $value = trim($value);
                $cars['details'][$key] = $value;
                }
            }

            if ($result === "") {
              throw new \Exception("Erro ao consultar " . $urlPesquisa);
            }

        try{
            $conn = ModelInicio::connectDbArtigos();

            $stmt = $conn->prepare("INSERT INTO artigos (id_usuario, nome_veiculo, link, ano, combustivel, portas, quilometragem, cambio, cor) VALUES (?,?,?,?,?,?,?,?,?)");
            
            $stmt -> bindParam(1, $cars["id"]);
            $stmt -> bindParam(2, $cars["title"]);
            $stmt -> bindParam(3, $cars["link"]);
            $stmt -> bindParam(4, $cars["details"]["Ano:"]);
            $stmt -> bindParam(5, $cars["details"]["Combustível:"]);
            $stmt -> bindParam(6, $cars["details"]["Portas:"]);
            $stmt -> bindParam(7, $cars["details"]["Quilometragem:"]);
            $stmt -> bindParam(8, $cars["details"]["Câmbio:"]);
            $stmt -> bindParam(9, $cars["details"]["Cor:"]);
            $stmt -> execute();	
            
            unset($dom);

            return view('sucesso');


        } catch (Exception $e){
            die('Erro: Erro ao acessar base de dados de artigos. Caso o problema persista, entre em contato o administrador adm@empresa.com');

            return back()->with('error', 'Problema ao inserir dados para a base de dados');
        }

        } 
    }  
    
    public function telaResultados()
    {
        return view('resultados');
    }
}