<?php
require ('iAnimal.php');
class Animal implements iAnimal {
    private $id = 0;
    private $nome = "";
    private $sexo = "";
    private $especie = "";
    private $raca = "";
    private $cor = "";

    public function excluiAnimal()
    {
        // TODO: Implement excluiAnimal() method.
    }

    public function editaAnimal()
    {
        // TODO: Implement editaAnimal() method.
    }

    public function cadastraAnimal() {
        $bd = new AppDB();
        $this->setPeso(str_replace(',', '.',$this->getPeso()));
        $bd->executeQuery("INSERT INTO `animal` (`especie`, `raca`, `cor`, `peso`, `dataNasc`, `observacao`, `idCliente`) VALUES ('".$this->getEspecie()."', '".$this->getRaca()."', '".$this->getCor()."', '".$this->getPeso()."', '".$this->getDataNasc()."', '".$this->getObservacao()."', ".$this->getIdCliente().");");
    }

    /**
     * @return string
     */
    public function atendeAnimal() {
        // TODO: Implement vacinaAnimal() method.
    }

    public function getSexo()
    {
        if($this->sexo == 'M'){
            return "Macho";
        }else{
            return "Femea";
        }
    }

    /**
     * @param string $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    private $peso = 0.0;
    private $dataNasc;
    private $observacao = "";
    private $idCliente = 0;

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
     * Animal constructor.
     * @param $idCliente
     */
    public function __construct($idCliente)
    {
        $this->idCliente = $idCliente;
        $this->dataNasc = new DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param int $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
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
