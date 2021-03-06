<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<h5>Datos Generales:</h5>
			</div>
			<div class="col-sm-4 text-center">
				@if($paciente->generales)
					<a id="modificar" class="btn btn-warning" href="{{ route('pacientes.datosgenerales.edit', ['paciente' => $paciente, 'datosgenerale' => $paciente->generales]) }}">
						<i class="fa fa-pencil"></i><strong> Editar</strong>
					</a>
				@else
					<a class="btn btn-success" href="{{ route('pacientes.datosgenerales.create', ['paciente' => $paciente]) }}">
						<i class="fa fa-plus"></i><strong> Agregar</strong>
					</a>
				@endif
			</div>
		</div>
	</div>
	@if($paciente->generales == null)
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-12">
					<h4>Aún no se han agregado los datos generales.</h4>
				</div>
			</div>
		</div>
	@else
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label class="control-label">Ocupación:</label>
					<dd>{{$paciente->generales->ocupacion ? $paciente->generales->ocupacion : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Convenio:</label>
					<dd>{{$paciente->generales->convenio ? $paciente->generales->convenio : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Número de Trabajo:</label>
					<dd>{{$paciente->generales->trabajo ? $paciente->generales->trabajo : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Número de Servicio:</label>
					<dd>{{$paciente->generales->servicio ? $paciente->generales->servicio : 'N/A' }}</dd>
				</div>
			</div>		
		</div>
		<div class="panel-heading">
			<div class="row">
				<div class="col-sm-4">
					<h5>Dirección:</h5>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label class="control-label">Calle:</label>
					<dd>{{$paciente->generales->calle ? $paciente->generales->calle : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Número Interior:</label>
					<dd>{{ $paciente->generales->numint ? $paciente->generales->numint : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Número Exterior:</label>
					<dd>{{ $paciente->generales->numext ? $paciente->generales->numext : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Codigo Postal:</label>
					<dd>{{ $paciente->generales->cp ? $paciente->generales->cp : 'N/A' }}</dd>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-3">
					<label class="control-label">Delegación/Municipio:</label>
					<dd>{{ $paciente->generales->municipio ? $paciente->generales->municipio : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Estado:</label>
					<dd>{{ $paciente->generales->estado ? $paciente->generales->estado : 'N/A' }}</dd>
				</div>
			</div>	
		</div>
		<div class="panel-heading">
			<div class="row">
				<div class="col-sm-4">
					<h5>Contacto:</h5>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3">
					<label class="control-label">Teléfono de Casa:</label>
					<dd>{{ $paciente->generales->telcasa ? $paciente->generales->telcasa : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Teléfono de Oficina:</label>
					<dd>{{ $paciente->generales->teloficina ? $paciente->generales->teloficina : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Teléfono Celular:</label>
					<dd>{{ $paciente->generales->telcelular ? $paciente->generales->telcelular : 'N/A' }}</dd>
				</div>
				<div class="col-sm-3">
					<label class="control-label">E-Mail:</label>
					<dd>{{ $paciente->generales->email ? $paciente->generales->email : 'N/A' }}</dd>
				</div>
			</div>
			<br>
		</div>
		<div class="panel-heading">
			<div class="row">
				<div class="col-sm-4">
					<h5>Tutores:</h5>
				</div>
				<div class="col-sm-4 text-center">
					<a href="{{ route('pacientes.tutores.index', ['paciente' => $paciente]) }}" class="btn btn-success">
						<i class="fa fa-plus"></i><strong> Agregar Tutor</strong>
					</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-12">
					@if(count($paciente->relaciones) > 0)
	        			@include('paciente.datos.tablas.tutores')
	        		@else
	        			<h4>Aún no tiene tutores registrados.</h4>
	        		@endif
				</div>
			</div>
		</div>
	@endif
</div>