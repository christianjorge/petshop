<?php
require ('Pessoa.php');

abstract class Juridica extends Pessoa{
    private $cnpj = "";

    /**
     * Juridica constructor.
     * @param string $cnpj
     */
    public function __construct($cnpj = "")
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

}