<?php
require_once('Fisica.php');
require_once('Animal.php');
require_once ('ContatoCliente.php');
require_once('Endereco.php');
require_once('AppDB.php');

class ClienteF extends Fisica {
    private $id = 0;
    private $animais;
    private $contatos;

    /**
     * ClienteF constructor.
     */
    public function __construct()
    {
        $this->animais = array();
        $this->contatos = array();
    }

    public function getByName($nome){
        $db = new AppDB();
        $nome = addslashes($nome);
        $clienteQ = $db->executeQuery("SELECT * FROM cliente WHERE nome LIKE '%$nome%'");
        if($dados = $clienteQ->fetch_array()){
            $this->setId($dados['id']);
            $this->setNome($dados['nome']);
            $this->setEmail($dados['email']);
            $this->setCpf($dados['cpf_cnpj']);
            $idEndereco = $dados['idEndereco'];
            $enderecoQ = $db->executeQuery("SELECT * FROM endereco WHERE id = '$idEndereco'");
            if($dados = $enderecoQ->fetch_array()){
                $endereco = new Endereco();
                $endereco->setId($dados['id']);
                $endereco->setCep($dados['cep']);
                $endereco->setRua($dados['rua']);
                $endereco->setBairro($dados['bairro']);
                $endereco->setCidade($dados['cidade']);
                $endereco->setEstado($dados['estado']);
                $endereco->setNumero($dados['numero']);
                $endereco->setComplemento($dados['complemento']);
                $this->setEndereco($endereco);
            }
            $animaisQ = $db->executeQuery("SELECT * FROM animal WHERE idCliente = '$this->id'");
            while ($dados = $animaisQ->fetch_array()){
                $animal = new Animal($dados['idCliente']);
                $animal->setId($dados['id']);
                $animal->setEspecie($dados['especie']);
                $animal->setRaca($dados['raca']);
                $animal->setCor($dados['cor']);
                $animal->setPeso($dados['peso']);
                $animal->setDataNasc($dados['dataNasc']);
                $animal->setObservacao($dados['observacao']);
                array_push($this->animais, $animal);
            }
            $contatosQ = $db->executeQuery("SELECT * FROM contatocliente WHERE idCliente = '$this->id'");
            while ($dados = $contatosQ->fetch_array()){
                $contato = new ContatoCliente();
                $contato->setId($dados['id']);
                $contato->setEmail($dados['email']);
                $contato->setTelefone($dados['telefone']);
                $contato->setTipo($dados['tipo']);
                $contato->setIdCliente($dados['idCliente']);
                array_push($this->contatos, $contato);
            }
            return true;
        }else return false;
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
     * @return array
     */
    public function getAnimais()
    {
        return $this->animais;
    }

    /**
     * @param array $animais
     */
    public function setAnimais($animais)
    {
        $this->animais = $animais;
    }

    /**
     * @return array
     */
    public function getContatos()
    {
        return $this->contatos;
    }

    /**
     * @param array $contatos
     */
    public function setContatos($contatos)
    {
        $this->contatos = $contatos;
    }


}