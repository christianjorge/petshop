<?php
include_once('top.php');
?>
    <h2>Buscar Cliente</h2>
    <form id="formBuscar" action="./infoCliente.php" method="post">
        <div class="form-group">
            <label for="filtroNome">Nome</label>
            <input type="text" class="form-control" id="filtroNome" name="filtroNome" placeholder="Digite o cliente desejado">
            <input type="hidden" name="funcao" value="Buscar">
        </div>
        <button type="submit" name="submit" class="btn btn-success" form="formBuscar">Buscar</button>
    </form>
    <hr>

    <h2>Cadastrar Novo Cliente</h2>
    <form id="formCliente" action="./infoCliente.php" method="post">
        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" class="form-control" name="nome" id="inputNome" placeholder="João LW Fonseca">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="senha" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Endereço</label>
            <input type="text" class="form-control" id="inputAddress" name="endereco" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Complemento</label>
            <input type="text" class="form-control" id="inputComplemento" name="complemento" placeholder="Apartment, studio, or floor">
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
                <input type="text" class="form-control" name="cep" id="inputCep">
            </div>
        </div>
        <button type="submit" name="submit2" class="btn btn-primary" form="formCliente">Salvar</button>
    </form>

<?php
include_once('footer.php');
?>