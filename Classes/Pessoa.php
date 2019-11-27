<?php
require_once('Endereco.php');


abstract class Pessoa
{
    private $nome = "";
    private $email = "";
    private $endereco;

    /**
     * Pessoa constructor
     */
    public function __construct()
    {
        $this->endereco = new Endereco();
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public abstract function validaDocumento();
    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return Endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }


}