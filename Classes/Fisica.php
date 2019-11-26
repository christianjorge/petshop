<?php
require ('Pessoa.php');

abstract class Fisica extends Pessoa
{
    private $cpf = "";

    /**
     * Fisica constructor.
     * @param string $cpf
     */
    public function __construct($cpf = "")
    {
        $this->cpf = $cpf;
    }

    public function validarCpf()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

}