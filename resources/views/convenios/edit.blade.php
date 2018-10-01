@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<form role="form" id="form-cliente" method="POST" action="{{ route('convenios.update',['convenio'=>$convenio]) }}" name="form">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		<div role="application" class="panel panel-group" >
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-3">
							<h4>Datos del Convenio: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Requerido</small></h4>
						</div>
						<div class="col-sm-3 text-center">
							<a class="btn btn-success" href="{{ route('convenios.create')}}"><strong>Agregar Convenio</strong></a>
						</div>
						<div class="col-sm-3 text-center">
							<a class="btn btn-warning" href="{{ route('convenios.edit', ['id' => $convenio->id]) }}"><strong>Editar Convenio</strong></a>
						</div>
						<div class="col-sm-3 text-center">
							<a class="btn btn-info" href="{{ route('convenios.index') }}"><strong>Lista de Convenios</strong></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="tipopersona"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Persona:</label>
	    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
	    						<option id="Fisica" value="Fisica" @if ($convenio->tipopersona == "Fisica")
	    							{{-- expr --}}
	    							selected="selected" 
	    						@endif>Fisica</option>
	    						<option id="Moral" value="Moral" @if ($convenio->tipopersona == "Moral")
	    							selected="selected" 
	    						@endif>Moral</option>
	    					</select>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="alias"><i class="fa fa-asterisk" aria-hidden="true"></i> Alias:</label>
	  						<input type="text" class="form-control" id="alias" name="alias" value="{{ $convenio->alias }}" required autofocus>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc"><i class="fa fa-asterisk" aria-hidden="true"></i> RFC:</label>
	  						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $convenio->rfc }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="vendedor">Vendedor:</label>
	  						<input type="text" class="form-control" id="vendedor" name="vendedor" value="{{ $convenio->vendedor }}">
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
	  						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $convenio->nombre }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidopaterno"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido Paterno:</label>
	  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" value="{{ $convenio->apellidomaterno }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
	  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" value="{{ $convenio->apellidomaterno }}">
	  					</div>
	
					</div>

					<div class="row" id="permoral" style="display:none;">
						<div class="form-group col-sm-3">

	  						<label class="control-label" for="razonsocial"><i class="fa fa-asterisk" aria-hidden="true"></i> Razon Social:</label>
	  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $convenio->razonsocial }}">
	  					</div>
					</div>
				</div>
			</div>
			<ul role="tablist" class="nav nav-tabs">
				<li class="active"><a href="#tab1">Dirección Fisica:</a></li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a></li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-4">Tipo de Convenio:</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5>Dirección Fisica: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h5>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $convenio->calle }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $convenio->numext }}" required>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Numero interior:</label>
	    					<input type="text" class="form-control" id="numinter" name="numinter" value="{{ $convenio->numinter }}">
	  					</div>	
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $convenio->colonia }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $convenio->municipio }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $convenio->ciudad }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $convenio->estado }}" required>
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $convenio->calle1 }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $convenio->calle2 }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $convenio->referencia }}">
	  					</div>
					</div>
					<div class="row text-center">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-success">
						        <strong>Guardar</strong>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection