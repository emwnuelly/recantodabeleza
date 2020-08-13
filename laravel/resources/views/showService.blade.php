@extends('templates.adm')

@section('title') Visualizar Serviço @endsection('title')

@section('icon') <img src='{{url("/img/icons/seeService.png")}}' width='35px'> @endsection('icon')

@section('content')
    <!-- Service section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-7'>
					<div class='cart-table'>
						<div class='sup'>
                            <h3>{{$services->descricao}}</h3>
                            <br>
                            <b>Valor: </b>R${{$services->valor}} <b> <b class='pink'> |</b> Comissão: </b> {{$services->comissao}}%
                            <br><br><b> Funcionários aptos:</b>
                            <div class='total-cost mt-3'>
                                <a href='{{url("adm/service")}}' class='site-btn sb-dark'>Voltar</a>	
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Services section end -->

@endsection('content')