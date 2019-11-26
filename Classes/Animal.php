<?php


class Animal{
  private $codigo;
  private $especie = "";
  private $raca = "";
  private $cor = "";
  private $peso = 0.0;
  private $dataNasc;
  private $observacao = "";

    /**
     * Animal constructor.
     * @param $codigo
     */
    public function __construct($codigo)
    {
        $this->codigo = $codigo;
        $this->dataNasc = new Date();
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return string
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * @param string $especie
     */
    public function setEspecie($especie)
    {
        $this->especie = $especie;
    }

    /**
     * @return string
     */
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * @param string $raca
     */
    public function setRaca($raca)
    {
        $this->raca = $raca;
    }

    /**
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param string $cor
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    /**
     * @return float
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param float $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return Date
     */
    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    /**
     * @param Date $dataNasc
     */
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;
    }

    /**
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param string $observacao
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }
}
