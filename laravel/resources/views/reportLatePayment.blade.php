@extends('templates.adm')


	@section('title') Pagamentos Atrasados @endsection('title')
	@section('icon') <img src='{{url("/img/icons/payment-light.png")}}' width='35px'> @endsection('icon')

@section('content')

<!-- Contact section -->
<section class='contact-section'>
		<div class='container'>
			<div class='col-lg-10 offset-md-1'>
	            <form class='contact-form' name='cadastro' id='cadastro' method='post' action='{{url("adm/paymentReport")}}' enctype='multiform/form-data'>
					@csrf
					<div class='col-md-12 col-xs-12'>
                        <div class='cf-title'><h4>Dados de Filtragem</h4></div>
                        <hr class='pink'>
                    </div>

					<div class='row'>
					<div class='col-md-6 col-xs-12'>
						<div class='form-group'>
							<label for='dtInicial'>Data Inicial</label>
							<input type='text' name='dtInicial' id='dtInicial' placeholder='00/00/0000' value='' >
							<small id='verificarDtRelatorios' class='verificar'>
								A data inicial é maior do que a data final.
							</small>
						</div>
					</div>

					<div class='col-md-6 col-xs-12'>
							<div class='form-group'>
								<label for='dtFinal'>Data Final</label>
								<input type='text' name='dtFinal' id='dtFinal' placeholder='00/00/0000' value='<?php echo date('d/m/Y'); ?>' >
							</div>
						</div>		
					</div>
                    
                    <div class='row justify-content-end mt-3 mb-4'>
						<a onclick='confirmarCancelar()' class='site-btn sb-dark mr-3' id='white'>Cancelar</a>
						<button type='submit' class='site-btn'>Gerar</button>
					</div>

            </form>	
            </div>
		</div>
	</section>
	<!-- Contact section end -->

	<!-- Confirm cancel section -->
	<div class='modal fade' id='confirmCancelModal' tabindex='-1' role='dialog' aria-labelledby='confirmCancelLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h5 class='modal-title' id='confirmCancelLabel'>Confirmar cancelamento</h5>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
				</div>
				<div class='modal-body'>
					<h5>Deseja voltar para a página inicial?</h5>
					Se confirmar, os dados alterados serão perdidos.
				</div>
				<div class='modal-footer'>
					<button type='button' class='site-btn sb-dark' data-dismiss='modal'>Não</button>
					<a href='{{url("adm")}}' class='site-btn' id='white' name='confirmar'>Sim</a>
				</div>
			</div>
		</div>
	<!-- Confirm cancel section end -->

	<script> 
        window.confirmarCancelar = function(){
            if(verificarCampos()){
                $('#confirmCancelModal').modal();
                $('confirmar').on('click', function(){
                    window.location.href= '{{url("/adm")}}';
                });
            } else {
                window.location.href= '{{url("/adm")}}';
            }  
		}
		
		function verificarCampos(){
            if ($('#dtInicial').val() == '' && $('#dtFinal').val() == '')
            {
                return false;
            }
            return true;
        }
    </script>
@endsection('content')

@section('del') latePaymentReport @endsection('del')