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
        try {
            $this->mysqli = new mysqli($this->host,$this->user,$this->password, $this->database);
            if(!$this->mysqli) {
                throw new Exception('Falha na conexao com o Banco de Dados!<br/>');
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function disconnect(){
        $this->mysqli->close();
    }

    public function executeQuery($query) {
        $this->connect();
        try{
            $result = mysqli_query($this->mysqli, $query);
            if($result) {
                $this->disconnect();
                return $result;
            } else {
                throw new Exception("Ocorreu um erro na execução da SQL! Verificar conexão com o banco. SQL: [$query]<br/>");
                $this->disconnect();
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}