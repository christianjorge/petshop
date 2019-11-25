<?php


class AppDB {

    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $database = "petshop";

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param string $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }


    function _constructor(){

    }

    function connect(){
        $this->link=mysqli_connect($this->host,$this->user,$this->password);
        if(!$this->link) {
            echo "Falha na conexao com o Banco de Dados!<br />";
            echo "Erro: " . mysqli_error();
            die();
        } elseif(!mysqli_select_db($this->database, $this->link)) {
            echo "O Banco de Dados solicitado não pode ser aberto!<br />";
            echo "Erro: " . mysqli_error();
            die();
        }
    }
}