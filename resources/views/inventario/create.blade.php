@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Inventario:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('inventarios.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Inventario</strong>
						</a>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ route('inventarios.store') }}">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4 col-sm-offset-2">
							<label class="control-label">✱Producto</label>
							<select name="producto_id" class="form-control" required="">
								<option value="" selected="">Seleccionar</option>
								@foreach($productos as $producto)
									<option value="{{ $producto->id }}">{{ $producto->sku_interno }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">✱Cantidad:</label>
							<input type="number" class="form-control" step="1" min="0" name="cantidad" required="">
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check-circle"></i> Guardar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection