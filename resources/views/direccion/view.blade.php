@extends('layouts.infocliente')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"> <a href="{{ route('clientes.show',['cliente'=>$personal]) }} ">Dirección Fìsica:</a> </li>
			<li class="active"> <a href=" {{ route('clientes.direccionfisica.index',['cliente'=>$personal]) }} ">Dirección Fiscal:</a> ></li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"> <a href="{{ route('clientes.contacto.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a> </li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"> <a href="<{{ route('clientes.datosgenerales.index', ['cliente'=>$personal]) }} " role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a> </li>
		</ul>
					<div class="panel-default">

						<div class="panel-heading">Dirección Fisica:</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Calle:</label>
			    					<dd> {{$direccion->calle}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Numero exterior:</label>
			    					<dd> {{$direccion->numext}} </dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<dd> {{$direccion->numint}} </dd>

			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Colonia:</label>

			  						<dd> {{$direccion->colonia}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
			  						<dd> {{$direccion->municipio}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ciudad:</label>
			  						<dd> {{$direccion->ciudad}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">Estado:</label>
			  						<dd> {{$direccion->estado}}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>

			  						<dd> {{$direccion->calle1}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd> {{$direccion->calle2}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd> {{$direccion->referencia}} </dd>
			  					</div>
							</div>
						<a class="btn btn-info" href=" {{ route('clientes.direccionfisica.edit',['cliente'=>$personal, 'direccionfisica'=>$direccion]) }} ">Editar</a>
						</div>
					</div>
  				</div>
			</form>
		</div>
		@endsection