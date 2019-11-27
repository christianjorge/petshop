<?php
include_once('topCliente.php');
?>
<style>
    *{
        /*border:1px solid black;*/
    }
</style>
<div class="row"><div class="col-sm-12 text-center pt-2 border"><h2>Cadastrar Novo Animal</h2></div></div>
<div class="row p-3">
    <div class="col-sm-3">
        <div class="text-center">
            <img src="/img/gatovector.png" class="rounded img-thumbnail" title="Inserir foto" alt="Inserir Imagem" style="cursor: pointer">
        </div>
    </div>
    <div class="col-sm-9">
        <form id="formAnimal" action="./infoCliente.php" method="post" novalidate="novalidate">
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Fellps Felpudo">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputRaca">Raça</label>
                    <input type="text" class="form-control" name="raca" id="inputRaca">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEspecie">Espécie</label>
                    <input type="text" class="form-control" name="especie" id="inputEspecie" placeholder="Gato, Cachorro, Leão...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputNasc">Nascimento</label>
                    <input type="date" class="form-control" id="inputNasc" name="dataNasc">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCor">Cor</label>
                    <select id="inputCor" name="cor" class="form-control">
                        <option selected>--- Escolha ---</option>
                        <option value="Branco">Branco</option>
                        <option value="Preto">Preto</option>
                        <option value="Amarelo">Amarelo</option>
                        <option value="Marron">Marron</option>
                        <option value="Bege">Bege</option>
                        <option value="Misto">Misto</option>
                        <option value="Tingido">Tingido</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPeso">Peso</label>
                    <input type="text" class="form-control" id="inputPeso" name="peso">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputSexo">Sexo</label>
                    <select id="inputSexo" name="sexo" class="form-control">
                        <option selected>--- Escolha ---</option>
                        <option value="F">Fêmea</option>
                        <option value="M">Macho</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Observações</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='obs' rows="3"></textarea>
            </div>
            <input type="hidden" name="funcao" value="cadAnimal">
            <button type="submit" name="submit" class="btn btn-primary" form="formAnimal">Salvar</button>
        </form>
    </div>
</div>
