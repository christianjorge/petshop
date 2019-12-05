<?php
require_once ('Classes/AppDB.php');
include_once('top.php');
if(isset($_POST['funcao']) && $_POST['funcao'] == 'Cadastrar' && !isset($_SESSION['inseriu'])){
    $bd = new AppDB();
    $bd->executeQuery("INSERT INTO produto_servico (tipo, descricao, valor) VALUES ('". 'serviço' . "','"  . $_POST['descricao'] . "','" . $_POST['valor'] . "')");
    $_SESSION['inseriu'] = 'sim';
    unset($_POST['funcao']);
}else if(isset($_POST['funcao']) && $_POST['funcao'] == 'Remover'){
    try {
        $ids = explode(",", $_POST['ids']);
        $bd = new AppDB();
        foreach ($ids as $id) {
            if (is_numeric($id))
                $bd->executeQuery("DELETE FROM produto_servico WHERE id=$id");
        }
    }catch (Exception $e){ ?>
        <div class="alert alert-danger" role="alert">
            Erro ao Remover!!!
        </div>

    <?php }
}
if(isset($_SESSION['inseriu']) && $_SESSION['inseriu'] == 'sim'){?>
    <div class="alert alert-success" role="alert">
        Cadastrado com Sucesso!!!
    </div>
    <?php
}
$bd = new AppDB();
$rs = $bd->executeQuery("SELECT * FROM produto_servico WHERE tipo='serviço'");
$funcs = array();
while ($dados = $rs->fetch_array()){
    $f['id'] = $dados['id'];
    $f['descricao'] = $dados['descricao'];
    $f['valor'] = $dados['valor'];
    array_push($funcs, $f);
}
?>
    <h2>Cadastrar Novo Serviço</h2>
    <form id="formServico" action="./buscarServico.php?datetime=000" method="post" novalidate="novalidate">
        <input type="hidden" name="funcao" value="Cadastrar">
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputDesc">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="inputDesc" placeholder="banho...">
            </div>
            <div class="form-group col-md-4">
                <label for="inputVal">Valor</label>
                <input type="text" class="form-control" name="valor" id="inputVal" placeholder="56.89">
            </div>
        </div>
        <button type="submit" name="submit2" class="btn btn-primary" form="formServico">Salvar</button>
    </form>
    <hr style="border: #000 1px solid"/>
    <h2>Remover Serviços</h2>
    <div class="alert alert-warning" role="alert">
        Digite os ids separados por virgula.
    </div>
    <form id="formServico1" action="./buscarServico.php?datetime=000" method="post" novalidate="novalidate">
        <input type="hidden" name="funcao" value="Remover">
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputIds">IDS</label>
                <input type="text" class="form-control" name="ids" id="inputIds" placeholder="1,2,3,4">
            </div>
        </div>
        <button type="submit" name="submit3" class="btn btn-primary" form="formServico1">Salvar</button>
    </form>
    <hr style="border: #000 1px solid"/>
    <h2>Lista de Serviços</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($funcs as $f){ ?>
            <tr>
                <th scope="row"><?=$f['id']?></th>
                <td><?=$f['descricao']?></td>
                <td>R$ <?=$f['valor']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
unset($_SESSION['inseriu']);
include_once('footer.php');
?>