<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;
use PDO;

class ModelLogin extends Model
{
    private string $db = "mysql";
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbname = "dashboard";
    //public int $port = 3308;
    public static $connect;
    public $conn;
    
    public function connectDbLogin() {
        try {
          
          self::$connect = new PDO('mysql: host=localhost; dbname=usuarios;', 'root', '');
          return self::$connect;

        } catch (Exception $ex) {
            die('Erro: Erro ao acessar base de dados de Login Dashboard. Caso o problema persista, entre em contato o administrador adm@empresa.com');
        }
    }
}
