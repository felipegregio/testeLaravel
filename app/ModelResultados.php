<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PDO;
use Exception;

class ModelResultados extends Model
{
    public static $connect;
    
    public static function connectDbArtigos() {
        try {
          
          self::$connect = new PDO('mysql: host=localhost; dbname=usuarios;', 'root', '');
          return self::$connect;

        } catch (Exception $ex) {
            die('Erro: Erro ao acessar base de dados de artigos. Caso o problema persista, entre em contato o administrador adm@empresa.com');
        }
    }
}
