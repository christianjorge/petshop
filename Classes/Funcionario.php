<?php

class Funcionario{
    private $id = "";
    private $nome = "";
    private $email = "";
    private $senha = "";
    private $idEndereco = "";
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
    public function getEmail()
    {
        return $this->email;
    }

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
    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

    /**
     * @param string $idEndereco
     */
    public function setIdEndereco($idEndereco)
    {
        $this->idEndereco = $idEndereco;
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