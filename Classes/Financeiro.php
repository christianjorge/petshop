<?php


class Financeiro implements iFinanceiro {
    private $idCliente;
    private $idServico_produto;
    private $quantidade;

    /**
     * Financeiro constructor.
     * @param $idCliente
     * @param $idServico_produto
     * @param $quantidade
     */
    public function __construct($idCliente, $idServico_produto, $quantidade)
    {
        $this->idCliente = $idCliente;
        $this->idServico_produto = $idServico_produto;
        $this->quantidade = $quantidade;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return mixed
     */
    public function getIdServicoProduto()
    {
        return $this->idServico_produto;
    }

    /**
     * @param mixed $idServico_produto
     */
    public function setIdServicoProduto($idServico_produto)
    {
        $this->idServico_produto = $idServico_produto;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function comprar() {
        $bd = new AppDB();
        $bd->executeQuery("INSERT INTO `financeiro` (`idCliente`, `idServico_produto`, `quantidade`) VALUES (".$this->getIdCliente().", ".$this->getIdServicoProduto().", ".$this->getQuantidade().");");
    }

    public function reduzirQuantidade($quant) {
        $bd = new AppDB();
        $bd->executeQuery("UPDATE financeiro SET quantidade=".$quant." WHERE idServico_produto=".$this->getIdServicoProduto()." AND idCliente=".$this->getIdCliente());
    }

    public function removerItem() {
        $bd = new AppDB();
        $bd->executeQuery("DELETE FROM financeiro WHERE idServico_produto=".$this->getIdServicoProduto()." AND idCliente=".$this->getIdCliente());
    }
}