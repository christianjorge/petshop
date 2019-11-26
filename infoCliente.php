<?php
include_once('topCliente.php');
require_once('Classes/Cliente.php');
//Busca cliente, salva código em sessão
if(isset($_POST['funcao']) && $_POST['funcao'] == 'Buscar'){
//    $cliente = new Cliente();
//    $cliente->getByName($_POST['filtroNome']);

//    $_SESSION['cliente'] = $cliente->getId();
}

?>


        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Nome do Cliente</h1>
                <p class="lead text-muted">Exibir aqui resumo e dados cadastrais do cliente.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Iniciar Compra</a>
                    <a href="#" class="btn btn-secondary my-2">Cadastrar Animais</a>
                    <a href="#" class="btn btn-danger my-2">Excluir Cadastro</a>
                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <h3>Animais do Cliente</h3>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=FotoIlustrativa" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Exibir aqui uma prévia de um animal cadastrado. Inserir imagem ilustrativa apenas</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Editar Animal</button>
                                        <button type="button" class="btn btn-sm btn-outline-success">Realizar Atendimento</button>
                                    </div>
                                    <!--                                    <small class="text-muted">9 mins</small>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=FotoIlustrativa" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Exibir aqui uma prévia de um animal cadastrado. Inserir imagem ilustrativa apenas</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Editar Animal</button>
                                        <button type="button" class="btn btn-sm btn-outline-success">Realizar Atendimento</button>
                                    </div>
                                    <!--                                    <small class="text-muted">9 mins</small>-->
                                </div>
                            </div>
                        </div>
                    </div>
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