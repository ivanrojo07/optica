@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel-default">
		<div class="panel-heading">
			<div class="row">
				<form id="buscarpaciente" action="busqueda" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" list='browsers' id="pacienteBusqueda" name="query" class="form-control" placeholder="Buscar..." autofocus>
					        <span class="input-group-btn">
								<a class="btn btn-default" id="trigger" onclick="buscar()"><i class="fa fa-search" aria-hidden="true"></i></a>
							</span>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('pacientes.create')}}">
							<strong>Agregar Paciente</strong>
						</a>
					</div>
				</form>
			</div>
		</div>
		<div id="datos" name="datos" class="panel-body">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
					<tr class="info">
						<th>@sortablelink('identificador','Identificador')</th>
						<th>@sortablelink('nombre','Nombre')</th>
						<th>@sortablelink('appaterno','Apellido Paterno')</th>
						<th>@sortablelink('apmaterno','Apellido Materno')</th>
						
						<th>Acciones</th>
					</tr>
					@foreach ($pacientes as $paciente)
					<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{$paciente->id}}">
						<td>{{ $paciente->identificador }}</td>
						<td>{{ $paciente->nombre }}</td>
						<td>{{ $paciente->appaterno }}</td>
						<td>{{ $paciente->apmaterno }}</td>
						<td class="text-center">
							<a class="btn btn-primary btn-sm" href="{{ route('pacientes.show', ['paciente'=>$paciente]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
							</a>
							<a class="btn btn-warning btn-sm" href="{{ route('pacientes.edit', ['paciente'=>$paciente]) }}">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
						</td>
					</tr>
					@endforeach
				</table>
				{{ $pacientes->links() }}
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function buscar() {
		var val2 = $('#pacienteBusqueda').val();
		$.ajax({
			url : "buscarpaciente",
			type : "GET",
			dataType : "html",
			data : {
				busqueda : val2
			},
		}).done(function(resultado){
			$("#datos").html(resultado);
		});
	}

</script>

@endsection