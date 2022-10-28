<?php

include('../../../controller/protect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ScheduleIt - Comprar Sala</title>
  <link href="assets/style.css" rel="stylesheet">
  <script src="assets/js.js"></script>
</head>

<body class="bg-light">
<?php include "../parts/header.php"; ?>
  <div class="mt-5 container border rounded bg-white">
    <div>
      <h4 class="my-2 text-center pb-2 border-bottom">
        Publicar Sala
      </h4>
      <div class="mt-5 row mx-3 mb-4">
        <div class="col-7">
          <form class="needs-validation" method="post" name="formPublicar" action='../../../controller/editarSala/publicarSala.php?idSala=<?php echo $_GET['idSala']?>' enctype="multipart/form-data">
            <h4 class="label2">
              Configurações
            </h4>
            <div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="limiteSala">Limite de salas</label>
                </div>
                <select class="custom-select" id="limiteSalas">
                  <option selectec value="1Sala">1</option>
                  <option value="5Sala">até 5</option>
                  <option value="ilimitadoSala">Ilimitado</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="limiteFuncionario">Limite de funcionários por sala</label>
                  </div>
                  <select class="custom-select" id="limiteFuncionarios">
                    <option Selected value="1Funcionario">1</option>
                    <option value="5Funcionario">até 5</option>
                    <option value="ilimitadoFuncionario">Ilimitado</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="plano">Plano</label>
                  </div>
                  <select class="custom-select" id="plano" required="">
                    <option selected>Selecione...</option>
                    <option value="mensal">Mensal</option>
                    <option value="trimestral">Trimestral</option>
                    <option value="semestral">Semestral</option>
                    <option value="anual">Anual</option>
                  </select>
                </div>
              </div>
              <h4 class="label2">
                Pagamento
              </h4>
              <div class="my-3">
                <div class="form-check">
                  <input id="credito" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                  <label class="label2" for="credito">
                    Cartão de crédito
                  </label>
              </div>
              <div class="form-check">
                <input id="debito" name="paymentMethod" type="radio" class="form-check-input" required="">
                <label class="label2" for="debito">
                  Cartão de débito
                </label>
              </div>
              <div class="form-check">
                <input id="pix" name="paymentMethod" type="radio" class="form-check-input">
                <label class="label2" for="pix">
                  Pix
                </label>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="cc-name" class="label2">
                  Nome do cartão
                </label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="cc-number" class="label2">
                  Número do cartão
                </label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-3">
                <label for="cc-expiration" class="label2">
                  Vencimento
                </label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-3">
                <label for="cc-cvv" class="label2">CVV</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Continuar</button>
          </form>
        </div>
        
        <div class="col-5 px-3">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">
              Seu carrinho
            </span>
            <span class="badge bg-primary rounded-pill" id="Contador">0</span>
          </h4>
          <ul class="list-group mb-3">
            <div id="MS" style="display:none">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">
                  Limite Funcionário  
                </h6>
                <small class="text-muted">
                  Proprietário pode possuir mais de uma sala
                </small>
              </div>
              <span class="text-muted">
                $12
              </span>
            </li>
          </div>
          <div id="MF" style="display:none">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">
                  Multiplos funcionários
                </h6>
                <small class="text-muted">
                  Proprietário pode possuir mais de um funcionário
                </small>
              </div>
              <span class="text-muted">
                $8
              </span>
            </li>
            </div>
            <div id="AF" style="display:none">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">
                  Agendamento fixo
                </h6>
                <small class="text-muted">
                  Cliente pode criar uma rotina
                </small>
              </div>
              <span class="text-muted">
                $5
              </span>
            </li>
            </div>
            <div id="PC" style="display:none">
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">
                  Promo code
                </h6>
                <small>
                  ScheduleIt
                </small>
              </div>
              <span class="text-success">
                −$5
              </span>
            </li>
          </div>
            <li class="list-group-item d-flex justify-content-between">
              <span>
                Total (BRL)
              </span>
              <script type="text/javascript">
                document.getElementById("Total").textContent=valor;
              </script>
              <span id="Total">
                R$ 0
              </span>
            </li>
          </ul>
          <form class="card p-2">
            <div class="input-group">
              <input type="text" id="PromoTXT" class="form-control" placeholder="Promo code">
              <button type="radio" id="ButtonPC" class="btn btn-secondary" onclick="PromoCode()">
                Enviar
              </button>
            </div>
          </form>
        </div>
      </div> 
    </div>
  </div>
  <?php include "../parts/footer.php"; ?>  
</body>
</html>