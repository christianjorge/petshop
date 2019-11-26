<?php


abstract class Pessoa
{
    private $nome = "";
    private $endereco;

    /**
     * Pessoa constructor.
     * @param $endereco
     */
    public function __construct($endereco)
    {
        $this->endereco = $endereco;
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
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * Pessoa constructor.
     */

}