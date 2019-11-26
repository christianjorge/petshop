<?php


class AppDB {

    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $database = "petshop";
    private $mysqli;

    function _constructor(){

    }

    private function connect(){
        $this->mysqli = new mysqli($this->host,$this->user,$this->password, $this->database);
        print_r($this->mysqli);
        if(!$this->mysqli) {
            echo "Falha na conexao com o Banco de Dados!<br />";
            echo "Erro: " . mysqli_error($this->mysqli);
            die();
        }
    }

    public function disconnect(){
        $this->mysqli->close();
    }

    public function executeQuery($query) {
        $this->connect();
        $result = mysqli_query($this->mysqli, $query);
        if($result) {
            $this->disconnect();
            return $result;
        } else {
            echo "Ocorreu um erro na execução da SQL";
            echo "Erro :" . mysqli_error($this->mysqli);
            echo "SQL: " . $query;
            die();
            $this->disconnect();
        }
    }
}