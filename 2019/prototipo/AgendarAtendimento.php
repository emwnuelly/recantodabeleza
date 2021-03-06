<?php 
	session_start();
	if ($_SESSION["teste"]!="true") {
		echo "<script> alert('Acesso negado!'); location.href='Login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agendar Atendimento - Recanto Beleza</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/select2.min.css" />
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Cadastrar.css">
	<link rel="stylesheet" href="css/AgendarAtendimento.css">

</head>
<body>
	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>

	<?php 
	include_once("MenuSuperior.php");
	?>

	<div id="areaFormulario" >
		<form id="formularioCliente" action="#" method="post" >
			<div id="tituloCad"><h2><img src='imagens/usuarioNovo.png' title="Cadastrar Clientes" alt="Cadastrar Clientes"> CADASTRAR CLIENTE</h2></div>
			<div class="container">
				<fieldset>
					<h4> Dados Pessoais </h4>
					<div class="col-12" id="subtitulo"></div>
					<div>
						<div class="row form-group">
							<div class="col-md-8">
								<input class="form-control" name="cdCliente" id="cdCliente" type="hidden" required value="" >
								
								<label for="nmCliente">Nome Completo: <span> * </span></label>  
								<input class="form-control" id="nmCliente" name="nmCliente" type="text" autofocus required value="" >
							</div>

							<div class="col-md-4">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Sexo: <span> * </span></legend>	
									<div class="form-check ">
										<input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F" >
										<label class="form-check-label" for="sexoF">Feminino</label>	
										<input class="form-check-input" style="margin-left: 5%;" type="radio" name="sexo" 
										id="sexoM" value="M" >
										<label class="form-check-label" for="sexoM" style="margin-left: 15%;">Masculino</label>
									</div>

								</fieldset>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="dtNascimento">Data de Nascimento: <span> * </span></label>
								<input class="form-control" id="dtNascimento" name="dtNascimento" type="date" required value="" >	
							</div>

							<div class="col-md-6">
								<label for="cpf">CPF: <span> * </span></label>  				
								<input class="form-control" id="cpf" name="cpf" type="text" placeholder="000.000.000-00" required value="" onblur="testaCpf()" onfocus="teste()">
								<div id="msnErroCpf">
						  			Digite um CPF válido
								</div>   
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="rg">RG: <span> * </span></label>  
								<input class="form-control" id="rg" name="rg" type="text" required value="">
							</div>

							<div class="col-md-6">
								<label for="telefone">Telefone: <span> * </span></label>  
								<input class="form-control" id="telefone" name="telefone" type="text" placeholder="(00)00000-0000" required value="" >
							</div>						
						</div>	

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">E-mail: <span> * </span></label>		
								<input id="email" name="email" type="email" class="form-control" required value="" placeholder="exemplo@exemplo">
							</div>										
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="senha">Senha: <span> * </span></label>
								<input class="form-control" id="senha" name="senha" type="password" required value="" >
							</div>			

							<div class="col-md-6">
								<label for="senhaC">Confirmar Senha: <span> * </span></label>
								<input class="form-control" id="senha2" name="senha2" type="password" required value="">					
							</div>		
						</div>
					</div>			
				</fieldset>
			</div>
			<div class="container">
				<fieldset>
					<h4> Endereço </h4>
					<div class="col-12" id="subtitulo"></div>
					<div>
						<div class="row form-group">
							<div class="col-md-6">
								<label for="rua">Rua: <span> * </span></label>  
								<input class="form-control" id="rua" name="rua" type="text" required value=""> 
							</div>

							<div class="col-md-6">
								<label for="numero">Nº: <span> * </span></label>  
								<input class="form-control" id="numero" name="numero" type="text" required value="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="complemento">Complemento:</label>  
								<input class="form-control" id="complemento" name="complemento" type="text" value="">
							</div>

							<div class="col-md-6">
								<label for="bairro">Bairro: <span> * </span></label>  
								<input class="form-control" id="bairro" name="bairro" type="text" required value="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="cep">Cep: <span> * </span></label>  
								<input class="form-control" id="cep" name="cep" type="text" required value="">
							</div>

							<div class="col-md-5">
								<label for="cdCidade">Cidade: <span> * </span></label>
								<select id="cdCidade" name="cdCidade" class="form-control" required="">
									<option value="" disabled selected>Selecione uma cidade</option>
								</select>				
							</div>
							<div class="col-1">
								<button type="button" id="novaCidade" class="btn" data-toggle='tooltip' data-placement='right' title='Adicionar Cidade' onclick="addCidadeExibirModal()">+</button>	
							</div>
						</div>
					</div>
				</fieldset>	
			</div>

			<div class="row form-group">
				<div class="col-md-12">	
					<button class="btn btn-success" type="submit" name="submit" >Salvar</button>	
					<a href="AgendarAtendimento.php" class="btn btn-primary">Cancelar</a>
				</div>											
			</div>			
		</form >
	</div>

	<div id="areaAgendamento">
		<div id="mensagem">
			<div id="msnSucessoCad" class="alert alert-success" role="alert" >
		  		Cliente cadastrado com sucesso!
			</div>

			<div id="msnErroCad" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu cadastrar o cliente.
			</div>
		</div>
		<h2><span><img src="imagens/calendarioNovo.png" title="Agendar Atendimento"></span> Agendar Atendimento</h2>
		<form id="formularioAgendamento" action="HomeFuncionario.php " method="post" enctype="multipart/form-data">
			<div class="row form-group ">
				<div class="row col-12">
					<div class="col-5">
						<input type="hidden" name="cdAgendamento" id="cdAgendamento">

						<label for="dtAgendamento">Data:</label>  
						<input class="form-control" id="dtAgendamento" name="dtAgendamento" type="date" placeholder="dd/mm/aaaa" >
					</div>
					
					<div class="col-4" id="divHoraInicial" align="center">
						<label for="horaInicial" >Horário Inicial:</label>  
						<input class="form-control" id="horaInicial" name="horaInicial" type="time">
					</div>

					<div class="col-3" align="center" >
						<label for="horaFinal">Horário Final:</label>  
						<input class="form-control" id="horaFinal" name="horaFinal" type="time">
					</div>
				</div>
				
				
				<div class="row col-12">
					<div class="col-6">
						<label for="cliente">Cliente/Telefone:</label>
						<select id="cliente" name="cliente" class="form-control">	  
							<option value="" disabled selected>Selecione um cliente</option>
						</select>
					</div>

					<div class="col-1">
						<button type="button" id="adicionar" class="btn btn-secondary" name="adicionar" data-toggle='tooltip' data-placement='right' title='Cadastrar Cliente' onclick="exibirCadastrarCliente()">+</button>
					</div>
				</div>
			</div>

			<h4> Serviços:</h4>
			<div class="col-12" id="subtitulo"></div>

			<div class="row form-group col-12" id="divServico">

				
					<div class="col-4 divServico_1">
						<label for="servico_1">Serviço:</label>
						<select id="servico_1" name="servico_1" class="form-control selectServico"> 
							<option value="" disabled selected>Selecione um servico</option>	
						</select>
					</div>

					<div class="col-1 divServico_1"></div>

					<div class="col-4 divServico_1">
						<label for="profissional_1">Profissional:</label>
						<select id="profissional_1" name="profissional_1" class="form-control selectProfissional">	
							<option value="" disabled selected>Selecione um profissional</option>	
						</select>
					</div>

					<div class="col-3 divServico_1">
						<button id="btnServico_1" value="1" class="btnServico" type="button" title='Adicionar Serviço' onclick="inserirDado(2)"><img src="imagens/tabelaInserir3.png" class="imgServico" id="imgServico"></button>
						<!--
						<button id="addAgenda" type="button" onclick="inserirDado()"><img src="imagens/tabelaInserir.png" id="tabelaInserir"></button>
						<button id="delAgenda" type="button" onclick="apagarDado()"><img src="imagens/tabelaRemover.png" id="tabelaRemover"></button>
						-->
					</div>

				
			</div>			

			<div class="row form-group">
				<div class="col-md-12" align="right" style="margin-top: 2%;">	
					<button class="btn btn-success" type="submit" name="submit" id="salvarA" onclick="salvarAgendamento()">Salvar</button>
					<button class="btn btn-primary" type="button" name="cancelar" onClick="JavaScript: window.history.back()">Cancelar</button>	
				</div>											
			</div>
		</form>
	</div>	

	<div id="addCidadeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tituloCidade">Cadastrar Cidade</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="insert_form">
						<div class="form-group row">
							<div class="col-1">
								<label class="col-form-label">Nome: </label>
							</div>
							<div class="col-11">
								<input name="nome" type="text" class="form-control" id="nome" autofocus>
							</div>
							
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<button type="button" name="cadCidade" id="cadCidade" onclick="addCidade()"class="btn btn-success"> Cadastrar </button> 
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	

	<footer class="col-12">
		<?php
		include_once("Rodape.php");
		?>
	</footer>

</body>

<script src="jQuery/jquery.js"></script>
<script src="jQuery/jquery.mask.js"></script>
<script src="jQuery/jquery.validate.js"></script>
<script src="js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/select2.min.js"></script> <!--Filtro no select-->
<script src="js/agendarAtendimento.js"></script>
<script src="js/cliente2.js"></script>
</html>