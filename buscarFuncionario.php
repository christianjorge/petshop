<?php
require_once ('Classes/AppDB.php');
include_once('top.php');
if(isset($_POST['funcao']) && $_POST['funcao'] == 'Cadastrar' && !isset($_SESSION['inseriu'])){
    $bd = new AppDB();
    $bd->executeQuery("INSERT INTO endereco (cep, rua, bairro, cidade, estado, numero, complemento) VALUES ('" . $_POST['cep'] . "','" . $_POST['rua'] . "','" . $_POST['bairro'] . "','" . $_POST['cidade'] . "','" . $_POST['estado'] . "','" . $_POST['numero'] . "','" . $_POST['complemento'] . "')");
    $rs = $bd->executeQuery("SELECT max(id) id FROM endereco");
    $row = mysqli_fetch_array($rs);
    $idendereco = $row['id'];
    $bd->executeQuery("INSERT INTO funcionario (nome, email, senha, idEndereco, cpf, cargo, dataCont) VALUES ('" . $_POST['nome'] . "','" . '123' . "','" . $_POST['email'] . "', $idendereco,'" . $_POST['Cpf'] . "','" . $_POST['cargo'] . "','" . $_POST['dataCont'] . "')");
    $_SESSION['inseriu'] = 'sim';
    unset($_POST['funcao']);
}else if(isset($_POST['funcao']) && $_POST['funcao'] == 'Remover'){
    try {
        $ids = explode(",", $_POST['ids']);
        $bd = new AppDB();
        foreach ($ids as $id) {
            if (is_numeric($id))
                $bd->executeQuery("DELETE FROM funcionario WHERE id=$id");
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
$rs = $bd->executeQuery("SELECT * FROM funcionario");
$funcs = array();
while ($dados = $rs->fetch_array()){
    $f['id'] = $dados['id'];
    $f['nome'] = $dados['nome'];
    $f['cpf'] = $dados['cpf'];
    $f['cargo'] = $dados['cargo'];
    array_push($funcs, $f);
}
?>
    <h2>Cadastrar Novo Funcionario</h2>
    <form id="formFuncionario" action="./buscarFuncionario.php?datetime=000" method="post" novalidate="novalidate">
        <input type="hidden" name="funcao" value="Cadastrar">
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="João LW Fonseca">
            </div>
            <div class="form-group col-md-4">
                <label for="inputData">Data Contratação</label>
                <input type="text" class="form-control" name="dataCont" id="inputData" placeholder="0000/00/00">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCpfCnpj">CPF</label>
                <input type="text" class="form-control" name="Cpf" id="inputCpfCnpj" placeholder="CPF">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
                <label for="inputCargo">Cargo</label>
                <input type="text" class="form-control" name="cargo" id="inputCargo" placeholder="Cargo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Rua</label>
                <input type="text" class="form-control" id="inputAddress" name="rua" placeholder="Rua, Avenida etc">
            </div>
            <div class="form-group col-md-2">
                <label for="inputNum">Número</label>
                <input type="text" class="form-control" id="inputNum" name="numero" maxlength="10" placeholder="Número">
            </div>
            <div class="form-group col-md-4">
                <label for="inputBairro">Bairro</label>
                <input type="text" class="form-control" id="inputBairro" name="bairro" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress2">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento" name="complemento" placeholder="Apartamento, casa, ou andar">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCidade">Cidade</label>
                <input type="text" class="form-control" id="inputCidade" name="cidade">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEstado">Estado</label>
                <select id="inputEstado" name="estado" class="form-control">
                    <option selected>--- Escolha ---</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="MA">Maranhão</option>
                    <option value="TO">Tocantins</option>
                    <option value="MG">São Paulo</option>
                    <option value="MG">Rio de Janeiro</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputCep">CEP</label>
                <input type="text" class="form-control" name="cep" id="inputCep" placeholder="00000-000">
            </div>
        </div>
        <button type="submit" name="submit2" class="btn btn-primary" form="formFuncionario">Salvar</button>
    </form>
    <hr style="border: #000 1px solid"/>
    <h2>Remover Funcionarios</h2>
    <div class="alert alert-warning" role="alert">
        Digite os ids separados por virgula.
    </div>
    <form id="formServico1" action="./buscarFuncionario.php?datetime=000" method="post" novalidate="novalidate">
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
    <h2>Lista de Funcionarios</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Cargo</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($funcs as $f){ ?>
            <tr>
                <th scope="row"><?=$f['id']?></th>
                <td><?=$f['nome']?></td>
                <td><?=$f['cpf']?></td>
                <td><?=$f['cargo']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
unset($_SESSION['inseriu']);
include_once('footer.php');
?>