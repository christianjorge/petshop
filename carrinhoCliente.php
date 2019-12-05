<?php
require_once ('Classes/AppDB.php');
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
?>
<style>
    *{
        /*border:1px solid black;*/
    }
</style>
<div class="row"><div class="col-sm-12 text-center pt-2 border"><h2>Compra</h2></div></div>
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
    </div>
</div>
