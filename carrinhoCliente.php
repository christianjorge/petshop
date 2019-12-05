<?php
require_once ('Classes/AppDB.php');
require_once ('Classes/Financeiro.php');
session_start();
if (isset($_GET['limpar']) && $_GET['limpar'] == '1'){
    $bd = new AppDB();
    $bd->executeQuery("DELETE FROM `financeiro` WHERE idCliente='".$_SESSION['id_cliente']."'");
    header('Location: '.'carrinhoCliente.php');
}else if (isset($_GET['finalizar']) && $_GET['finalizar'] == '1'){
    $bd = new AppDB();
    $bd->executeQuery("DELETE FROM `financeiro` WHERE idCliente='".$_SESSION['id_cliente']."'");
    header('Location: '.'buscarCliente.php');
}
include_once('topCliente.php');
$bd = new AppDB();
$rs = $bd->executeQuery("SELECT * FROM produto_servico WHERE tipo='produto'");
$prods = array();
while ($dados = $rs->fetch_array()){
    $p['id'] = $dados['id'];
    $p['descricao'] = $dados['descricao'];
    $p['valor'] = $dados['valor'];
    array_push($prods, $p);
}
$rs = $bd->executeQuery("SELECT * FROM produto_servico WHERE tipo='serviço'");
$servs = array();
while ($dados = $rs->fetch_array()){
    $s['id'] = $dados['id'];
    $s['descricao'] = $dados['descricao'];
    $s['valor'] = $dados['valor'];
    array_push($servs, $s);
}
if(isset($_POST['funcao'])){
    if($_POST['funcao'] == 'AddProduto' && is_numeric($_POST['id'])){
        $fin = new Financeiro(0,0,0);
        $fin->setIdCliente($_SESSION['id_cliente']);
        $fin->setIdServicoProduto($_POST['id']);
        $fin->setQuantidade($_POST['quantidade']);
        $fin->comprar();
    }
}
$rs = $bd->executeQuery("SELECT financeiro.id AS id_F, financeiro.quantidade, produto_servico.* FROM financeiro INNER JOIN produto_servico ON financeiro.idServico_produto = produto_servico.id WHERE idCliente='".$_SESSION['id_cliente']."'");
$itens = array();
$somaCompra = 0;
while ($dados = $rs->fetch_array()){
    $item['id'] = $dados['id_F'];
    $item['descricao'] = $dados['descricao'];
    $item['tipo'] = $dados['tipo'];
    $item['quantidade'] = $dados['quantidade'];
    $item['valorParcial'] = $dados['valor']*$dados['quantidade'];
    $somaCompra += $item['valorParcial'];
    array_push($itens, $item);
}
?>
<style>
    *{
        /*border:1px solid black;*/
    }
</style>
<div class="row"><div class="col-sm-12 text-center pt-2 border"><h2>Compra do <?=$_SESSION['nome_cliente']?></h2></div></div>
<div class="row p-3">
    <div class="col-sm-3" style="padding-top: 20px">
        <h5>Lista de Produtos</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($prods as $f){ ?>
                <tr>
                    <th scope="row"><?=$f['id']?></th>
                    <td><?=$f['descricao']?></td>
                    <td>R$ <?=$f['valor']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <hr style="border: #000 1px solid"/>
        <h5>Lista de Serviços</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($servs as $f){ ?>
                <tr>
                    <th scope="row"><?=$f['id']?></th>
                    <td><?=$f['descricao']?></td>
                    <td>R$ <?=$f['valor']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-9">
        <form id="formProduto" action="./carrinhoCliente.php?datetime=000" method="post" novalidate="novalidate">
            <input type="hidden" name="funcao" value="AddProduto">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputDesc">ID do Produto/Serviço</label>
                    <input type="text" class="form-control" name="id" id="inputDesc" placeholder="N°">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputVal">Quantidade</label>
                    <input type="text" class="form-control" name="quantidade" id="inputVal" placeholder="">
                </div>
            </div>
            <button type="submit" name="submit2" class="btn btn-primary" form="formProduto">Adicionar no Carrinho</button>
        </form>
        <hr style="border: #000 1px solid"/>
        <h5>Carrinho</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tipo</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor Parcial</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($itens as $item){ ?>
                <tr>
                    <th scope="row"><?=$item['id']?></th>
                    <td><?=$item['descricao']?></td>
                    <td><?=$item['tipo']?></td>
                    <td><?=$item['quantidade']?></td>
                    <td>R$ <?=$item['valorParcial']?></td>
                </tr>
            <?php } ?>
            <tr class="bg-secondary" style="text-align: center;color: aliceblue;font-weight: bold">
                <th colspan="3" scope="row">Total</th>
                <td colspan="2">R$ <?=$somaCompra?></td>
            </tr>
            <tr class="bg-info" style="text-align: center;color: aliceblue;font-weight: bold">
                <th colspan="3" scope="row">Opções</th>
                <td>
                    <a class="btn btn-danger" href="./carrinhoCliente.php?limpar=1" role="button">
                        Limpar Carrinho
                    </a>
                </td>
                <td>
                    <a class="btn btn-success" href="./carrinhoCliente.php?finalizar=1" role="button">
                        Finalizar Compra
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
