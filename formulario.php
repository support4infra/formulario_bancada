<?php
//Evitar erros no site
	include_once 'erro.php';
//Receber as informações do banco de dados
	include_once 'pesquisa_ticket.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Retirada de Equipamento</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo-4infra.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main3.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/3.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" id="formulario" action="concluido.php" enctype="multipart/form-data">
					<span class="login100-form-title p-b-49">
						<img class="logo-4infra" src="images/icons/logo-4infra.png"><br><br>
						Retirada de Equipamento
					</span>

					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Número do Chamado</span>
						<input class="input100" type="number" name="numero_chamado" value="<?php echo $row_chamado['ticket'];?>" readonly>
						<i class="fa fa-list-ol fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Nome do Cliente</span>
						<input class="input100" type="text" name="nome_cliente" value="<?php echo $row_chamado['cliente'];?>" readonly>
						<i class="fa fa-user fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "">
						<span class="label-input100">E-mail do cliente</span>
						<input class="input100" type="text" name="email_cliente" value="<?php echo $emails;?>" readonly>
						<i class="fa fa-envelope fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Data da retirada é obrigatorio">
						<span class="label-input100">Data da Retirada</span>
						<input class="input100" type="date" id="data_retirada" name="data_retirada" placeholder="">
						<span class="focus-input100"></span>
						<i class="fa fa-calendar  fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Nome do responsável pela retirada é obrigatorio">
						<span class="label-input100">Nome da Pessoa que está Retirando (Obrigatório)</span>
						<input class="input100" type="text" maxlength="" maxlength="80" name="nome_resposavel_retirada" placeholder="">
						<span class="focus-input100"></span>
						<i class="fa fa-user fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 m-b-23">
						<span class="label-input100">CPF/RG da Pessoa que está Retirando</span>
						<input class="input100" type="text" maxlength="20" id="documento_resposavel_retirada" name="documento_resposavel_retirada" placeholder="">
						<span class="focus-input100"></span>
						<i class="fa fa-address-card fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Telefone da Pessoa que está Retirando</span>
						<input class="input100" type="text" maxlength="16" id="telefone_resposavel_retirada" onkeyup="handlePhone(event)" name="telefone_resposavel_retirada" placeholder="" maxlength="13">
						<span class="focus-input100"></span>
						<i class="fa fa-phone fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Tecnico responsável pela entrega é obrigatorio">
						<span class="label-input100">Tecnico Responsável pela Entrega (Obrigatório)</span>
						<input class="input100" type="text" maxlength="80" name="tecnico_resposavel_entrega" placeholder="">
						<span class="focus-input100"></span>
						<i class="fa fa-user fa-lg fa-fw"></i>
					</div>

					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Observação</span>
						<input class="input100" type="text" maxlength="300" name="observacao" placeholder="">
						<span class="focus-input100"></span>
						<i class="fa fa-sticky-note   fa-lg fa-fw"></i>
					</div><br>
					
					<div class="wrap-input1000 validate-input m-b-23">
						<span class="label-input100">Foto da Ficha da Máquina (Obrigatório)</span><br><br>
						<center><label class="fa fa-camera fa-lg" for="arquivo" style="width: 20px;"></label></center>
						<input class="input100" type="file" id="arquivo" name="arquivo" placeholder="" style="display: none;">
						<span class="focus-input100"></span>
					</div><br>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="enviar" id="enviar">
								Enviar
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<script>
		new Cleave('#telefone_resposavel_retirada', {
      blocks: [0, 2, 1, 4, 4],
      delimiters: ['(', ') ', ' ', '-'],
      numericOnly: true
    });
	</script>
	

	<!--Mascara para o telefone do responsavel pela retirada-->
	<script>
		const handlePhone = (event) => {
			let input = event.target
			input.value = phoneMask(input.value)
  		}
  
  		const phoneMask = (value) => {
			if (!value) return ""
			value = value.replace(/\D/g,'')
			value = value.replace(/(\d{2})(\d)/,"($1) $2 ")
			value = value.replace(/(\d)(\d{4})$/,"$1-$2")
			return value
  		}
		
	</script>

	<!--Mascara para o CPF/RG do responsavel pela retirada-->
	
	</script>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
	<script src="js/data_atual.js"></script>
<!--===============================================================================================-->
	<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>

</body>
</html>