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
    <form id="formCliente" action="./infoCliente.php" method="post" novalidate="novalidate">
        <input type="hidden" name="funcao" value="Cadastrar">
        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" class="form-control" name="nome" id="inputNome" placeholder="João LW Fonseca">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCpfCnpj">CPF/CNPJ</label>
                <input type="text" class="form-control" name="CpfCnpj" id="inputCpfCnpj" placeholder="CPF ou CNPJ">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
                <label for="inputTipo">Pessoa</label>
                <select id="inputTipo" name="tipo" class="form-control">
                    <option selected>--- Escolha ---</option>
                    <option value="fisica">Física</option>
                    <option value="juridica">Jurídica</option>
                </select>
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
        <button type="submit" name="submit2" class="btn btn-primary" form="formCliente">Salvar</button>
    </form>

<?php
include_once('footer.php');
?>