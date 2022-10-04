<?php

include('../../../controller/protect.php');

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Editar Sala</title>
    
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../../styles/css/cover.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light">
    <!-- HEADER -->
    <?php 
    include '../parts/header.php';
    require_once '../../../model/conexaobd.php';
    require_once '../../../model/salasDAO.php';
    //require_once '../../../model/editarSalaDAO.php';

    $conexao = conectarBD();
    $dados = carregarMinhasSalas($conexao, $_SESSION['id']);
    ?>
    <div class="pt-5">
      <div style="width: 40rem;" class="pb-3 bg-white rounded container border">
        <div class="py-2 text-center">
          <h2>Ediçao de Sala</h2>
        </div>
        <div class="text-left">
          <?php
              // Exibir a mensagem de ERRO caso OCORRA
              if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
                $mensagem = $_GET["msg"];
                if ($mensagem=="Editado com sucesso.") {
                  echo "<div class='alert alert-success' role='alert'>
                          $mensagem
                        </div>";
                } else {
                  echo "<div class='alert alert-danger' role='alert'>
                          $mensagem
                        </div>";
                }
                  
              }

              $idSala = $_GET["idSala"];
          ?>
          <form class="needs-validation" method="post" name="formEditarSala" action="../../../controller/editarSala/attSala.php?idSala=<?php echo $idSala;?>" enctype="multipart/form-data">
            
            <input style="display:none;" name="idProprietario" type="text" value="<?php echo $_SESSION['id'];?>"> 

            <div class="row g-3">

              <div class="col-sm-6">
                <label for="nomeFantasia" class="form-label mb-0">Nome do Estabelecimento</label>
                <input name="txtNome" type="text" class="form-control" id="nomeFantasia" placeholder="" value="<?php echo $dados['nomeFantasia'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="cnpj" class="form-label mb-0">CNPJ</label>
                <input name="txtCNPJ" oninput="mascara(this)" type="text" class="form-control" id="cnpj" placeholder="" value="<?php echo $dados['cnpj'];?>" required="" >
              </div>

              <div class="col-12">
                <label for="telefone" class="form-label mb-0">Telefone</label>
                <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="txtTelefone" type="tel" class="form-control" id="numero" placeholder="" value="<?php echo $dados['telefone'];?>" maxlength="15" required="">
              </div>

              <div class="col-sm-6">
                <label for="cep" class="form-label mb-0">CEP</label>
                <input name="txtCEP" type="text" class="form-control" id="cep" placeholder="" value="<?php echo $dados['cep'];?>" onblur="pesquisacep(this.value);" required="">
              </div>

              <div class="col-sm-6">
                <label for="endereco" class="form-label mb-0">Estado </label>
                <input name="txtEstado" class="form-control" id="uf" placeholder="" value="<?php echo $dados['estado'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="cidade" class="form-label mb-0">Cidade </label>
                <input name="txtCidade" class="form-control" id="cidade" placeholder="" value="<?php echo $dados['cidade'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="bairro" class="form-label mb-0">Bairro </label>
                <input name="txtBairro" class="form-control" id="bairro" placeholder="" value="<?php echo $dados['bairro'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="rua" class="form-label mb-0">Rua </label>
                <input name="txtRua" class="form-control" id="rua" placeholder="" value="<?php echo $dados['rua'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="numero" class="form-label mb-0">Número </label>
                <input name="txtNumero" class="form-control" id="numero" placeholder="" value="<?php echo $dados['numero'];?>" required="">
              </div>

              <div class="col-12">
                <label for="complemento" class="form-label mb-0">Complemento </label>
                <input name="txtComplemento" class="form-control" id="complemento" placeholder="" value="<?php echo $dados['complemento'];?>" required=""> 
              </div>

              <div class="col-12">
                <label for="email" class="form-label mb-0">E-mail </label>
                <input name="txtEmail" type="email" class="form-control" id="email" placeholder="" value="<?php echo $dados['email'];?>" required=""> 
              </div>

              <div class="col-12">
                <label for="descricao" class="form-label mb-0">Descrição</label>
                <textarea name="txtDescricao" rows="3" class="form-control" id="descricao" placeholder=""  maxlength="300" required=""><?php echo $dados['descricao'];?></textarea>
              </div>

          

            </div>
            <hr class="my-4">
            <div class="d-flex">
            <button type="button" class="mx-auto btn btn-primary btn-sm w-25" data-bs-toggle="modal" data-bs-target="#inserirSenhaModal">Salvar</button>
          </div>
        </div>
        <div class="modal fade" id="inserirSenhaModal" tabindex="-1" role="dialog" aria-labelledby="inserirSenhaModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="inserirSenhaModal">Confirmar alterações</h5>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input name="senhaModal" class="form form-control" type="password" placeholder="Insira sua senha"></input>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
              </div>
            </div>
          </div>
        </div>
          </form>
        </div>
      </div>

      <!-- FOOTER -->
      <?php include '../parts/footer.php';?>
    </div>         
  </body>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous"></script>

</html>
