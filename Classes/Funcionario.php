<?php

class Funcionario extends Pessoa {
    private $id = 0;
    private $senha = "";
    private $cpf = "";
    private $cargo = "";
    private $carteiraTrab = "";
    private $habilitacao = "";
    private $dataCont;

    /**
     * Funcionario constructor.
     */
    public function __construct()
    {
        $this->dataCont = new DateTime();
    }
    public function validaDocumento()
    {
        return "CPF válido";
    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
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

    /**
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param string $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return string
     */
    public function getCarteiraTrab()
    {
        return $this->carteiraTrab;
    }

    /**
     * @param string $carteiraTrab
     */
    public function setCarteiraTrab($carteiraTrab)
    {
        $this->carteiraTrab = $carteiraTrab;
    }

    /**
     * @return string
     */
    public function getHabilitacao()
    {
        return $this->habilitacao;
    }

    /**
     * @param string $habilitacao
     */
    public function setHabilitacao($habilitacao)
    {
        $this->habilitacao = $habilitacao;
    }

    /**
     * @return DateTime
     */
    public function getDataCont()
    {
        return $this->dataCont;
    }

    /**
     * @param DateTime $dataCont
     */
    public function setDataCont($dataCont)
    {
        $this->dataCont = $dataCont;
    }


}