<?php
//pra exibir erros php:
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
//error_reporting(E_ALL);
require_once('Classes/ClienteF.php');
require_once ('Classes/AppDB.php');
if(isset($_GET['delIdAnimal'])){
    $id = !is_numeric($_GET['delIdAnimal']) ? 0 : $_GET['delIdAnimal'];
    $bd = new AppDB();
    $bd->executeQuery("DELETE FROM animal WHERE id=$id");
    header('Location: '.'infoCliente.php');
}
session_start();
//print_r($_POST);
//Busca cliente, salva código em sessão
if(isset($_POST['funcao'])){
    if($_POST['funcao'] == 'Buscar'){
        $cliente = new ClienteF();
        $cliente->getByName($_POST['filtroNome']);
    } else if($_POST['funcao'] == 'cadAnimal'){
        $animal = new Animal($_SESSION['id_cliente']);
        $animal->setNome($_POST['nome']);
        $animal->setSexo($_POST['sexo']);
        $animal->setEspecie($_POST['especie']);
        $animal->setRaca($_POST['raca']);
        $animal->setCor($_POST['cor']);
        $animal->setPeso($_POST['peso']);
        $animal->setDataNasc($_POST['dataNasc']);
        $animal->setObservacao($_POST['obs']);
        $animal->cadastraAnimal();
        $cliente = new ClienteF();
        $cliente->getByName($_SESSION['nome_cliente']);
    } else {
        if (!isset($_SESSION['inseriu']) || $_SESSION['inseriu'] == "") {
            if ($_POST['funcao'] == 'Cadastrar') {
                $bd = new AppDB();
                $bd->executeQuery("INSERT INTO endereco (cep, rua, bairro, cidade, estado, numero, complemento) VALUES ('" . $_POST['cep'] . "','" . $_POST['rua'] . "','" . $_POST['bairro'] . "','" . $_POST['cidade'] . "','" . $_POST['estado'] . "','" . $_POST['numero'] . "','" . $_POST['complemento'] . "')");
                $rs = $bd->executeQuery("SELECT max(id) id FROM endereco");
                $row = mysqli_fetch_array($rs);
                $idendereco = $row['id'];
                $bd->executeQuery("INSERT INTO cliente (nome, email, idEndereco, cpf_cnpj, tipo) VALUES ('" . $_POST['nome'] . "','" . $_POST['email'] . "', $idendereco,'" . $_POST['CpfCnpj'] . "','" . $_POST['tipo'] . "')");
                $cliente = new ClienteF();
                $cliente->getByName($_POST['nome']);
                $_SESSION['inseriu'] = 'sim';
                unset($_POST['funcao']);
            }
        } else {
            $cliente = new ClienteF();
            $cliente->getByName($_POST['nome']);
        }
    }
}else{
    $cliente = new ClienteF();
    $cliente->getByName($_SESSION['nome_cliente']);
}

$_SESSION['id_cliente'] = $cliente->getId();
$_SESSION['nome_cliente'] = $cliente->getNome();

include_once('topCliente.php');
?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?=$cliente->getNome();?></h1>
            <p class="lead text-muted">
                <?=$cliente->getEndereco()->getRua() ?> Nº <?=$cliente->getEndereco()->getNumero() ?> <?=$cliente->getEndereco()->getBairro() ?>   <?=$cliente->getEndereco()->getCidade() ?> - <?=$cliente->getEndereco()->getEstado() ?>
                <br>
                <?=$cliente->getCpf()."<br>".$cliente->getEmail();?></p>
            <p>
                <a href="./carrinhoCliente.php" class="btn btn-primary my-2">Iniciar Compra</a>
                <a href="./cadastrarAnimal.php" class="btn btn-secondary my-2">Cadastrar Animais</a>
                <a href="./buscarCliente.php?removeId=<?=$cliente->getId()?>" class="btn btn-danger my-2">Excluir Cadastro</a>
            </p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <h3>Animais do Cliente</h3>
            <div class="row">
                <?php
                foreach($cliente->getAnimais() as $animal) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 src="img/<?=$animal->getEspecie()?>.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4><?=ucfirst($animal->getNome())?> </h4>
                                <p class="card-text">
                                    Espécie: <?=$animal->getEspecie();?>
                                    <br>
                                    Raça: <?=$animal->getRaca();?>
                                    <br>
                                    Cor: <?=$animal->getCor();?>
                                    <br>
                                    Nascido em: <?=$animal->getDataNasc();?>
                                    <br>
                                    <?=$animal->getSexo() == 'M'? 'Macho' : 'Femea'?>
                                    <br>
                                    Peso: <?=$animal->getPeso();?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="infoCliente.php?delIdAnimal=<?=$animal->getId()?>" type="button" class="btn btn-sm btn-outline-secondary">Excluir
                                            Animal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>

    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/vendor/holder.min.js"></script>
    </body>
    </html>



<?php
//include_once('footer.php');
?>