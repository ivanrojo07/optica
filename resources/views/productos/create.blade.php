@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Producto:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('productos.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Productos</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<select class="form-control" id="selector">
							<option value="">Seleccionar</option>
							<option value="ortopedia">Ortopedia</option>
							<option value="micas">Micas</option>
							<option value="armazones">Armazones</option>
							<option value="contacto">Lentes de Contacto</option>
							<option value="generales">General</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<form id="orto" class="formu" style="display: none;" role="form" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="seccion" value="ortopedia">
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱SKU Proveedor:</label>
	  					<input type="text" class="form-control" id="sku1" name="sku">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Negocio:</label>
	  					<input type="text" class="form-control" id="negocio1" name="negocio">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Proveedor:</label>
						<select class="form-control" id="proveedor1" name="provedor_id">
							<option value="">Seleccionar</option>
							@foreach($proveedores as $proveedor)
								<option value="{{ $proveedor->id }}">{{ $proveedor->razonsocial }}{{ $proveedor->nombre . ' ' . $proveedor->apellidopaterno }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Categoría:</label>
	  					<input type="text" class="form-control" id="categoria1" name="categoria">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
						<input type="text" class="form-control" id="categoria_abr1" name="categoria_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Producto:</label>
	  					<input type="text" class="form-control" id="producto1" name="producto">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="producto_abr1" name="producto_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Marca:</label>
						<input type="text" class="form-control" id="marca1" name="marca">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
						<input type="text" class="form-control" id="marca_abr1" name="marca_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Modelo:</label>
						<input type="text" class="form-control" id="modelo1" name="modelo">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
						<input type="text" class="form-control" id="modelo_abr1" name="modelo_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Talla:</label>
						<input type="text" class="form-control" id="talla" name="talla">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Color:</label>
						<input type="text" class="form-control" id="color1" name="color">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
						<input type="text" class="form-control" id="color_abr1" name="color_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Unidad de medida:</label>
						<select name="unidad" id="unidad1" class="form-control">
							<option value="">Seleccionar</option>
							<option value="m">Metros</option>
							<option value="cm">Centímetros</option>
							<option value="mm">Milímetros</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱¿Para renta?</label>
						<div class="row text-center">
							<div class="col-sm-6">
								Sí <input type="radio" name="renta" value="Sí" style="top: 0px;">
							</div>
							<div class="col-sm-6">
								No <input type="radio" name="renta" value="No" style="top: 0px;">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 1:</label>
	  					<input type="file" class="form-control" id="foto11" name="foto1" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 2:</label>
	  					<input type="file" class="form-control" id="foto21" name="foto2" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 3:</label>
	  					<input type="file" class="form-control" id="foto31" name="foto3" style="font-size: 9px;">
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
		<form id="mica" class="formu" style="display: none;" role="form" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="seccion" value="micas">
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱SKU Proveedor:</label>
	  					<input type="text" class="form-control" id="sku2" name="sku">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Negocio:</label>
	  					<input type="text" class="form-control" id="negocio2" name="negocio">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Proveedor:</label>
						<select class="form-control" id="proveedor2" name="provedor_id">
							<option value="">Seleccionar</option>
							@foreach($proveedores as $proveedor)
								<option value="{{ $proveedor->id }}">{{ $proveedor->razonsocial }}{{ $proveedor->nombre . ' ' . $proveedor->apellidopaterno }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Tipo de lente:</label>
	  					<input type="text" class="form-control" id="tipo2" name="tipo">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="tipo_abr2" name="tipo_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Familia:</label>
	  					<input type="text" class="form-control" id="familia" name="familia">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="familia_abr" name="familia_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Materiales:</label>
	  					<input type="text" class="form-control" id="materiales" name="materiales">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="materiales_abr" name="materiales_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Tratamiento:</label>
	  					<input type="text" class="form-control" id="tratamiento" name="tratamiento">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="tratamiento_abr" name="tratamiento_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Color:</label>
						<input type="text" class="form-control" id="color2" name="color">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
						<input type="text" class="form-control" id="color_abr2" name="color_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Unidad de medida:</label>
						<select name="unidad" id="unidad2" class="form-control">
							<option value="">Seleccionar</option>
							<option value="m">Metros</option>
							<option value="cm">Centímetros</option>
							<option value="mm">Milímetros</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div style="background: #f5f5f5;" class="col-sm-12 form-group">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h4>Rangos:</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 form-group">
								<label class="control-label">ESF:</label>
								<div class="row">
									<div class="col-sm-6 text-center">
										<select class="form-control" name="esf_min" id="esf_min">
											<option value="">Desde</option>
											@for($i = 25; $i >= -25; $i -= 0.25)
												<option value="{{ $i > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}">{{ number_format($i, 2) > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}</option>
											@endfor
										</select>
									</div>
									<div class="col-sm-6 text-center">
										<select class="form-control" name="esf_max" id="esf_max">
											<option value="">Hasta</option>
											@for($i = 25; $i >= -25; $i -= 0.25)
												<option value="{{ $i > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}">{{ number_format($i, 2) > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">CIL:</label>
								<div class="row">
									<div class="col-sm-6 text-center">
										<select class="form-control" name="cil_min" id="cil_min">
											<option value="">Desde</option>
											@for($i = -0.25; $i >= -15; $i -= 0.25)
												<option value="{{ $i > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}">{{ number_format($i, 2) > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}</option>
											@endfor
										</select>
									</div>
									<div class="col-sm-6 text-center">
										<select class="form-control" name="cil_max" id="cil_max">
											<option value="">Hasta</option>
											@for($i = -0.25; $i >= -15; $i -= 0.25)
												<option value="{{ $i > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}">{{ number_format($i, 2) > 0 ? '+' . number_format($i, 2) : number_format($i, 2) }}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Combinado Máximo:</label>
								<input class="form-control" type="text" name="com_max" placeholder="Hasta" id="com_max">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">ADD:</label>
								<div class="row">
									<div class="col-sm-6 text-center">
										<select class="form-control" name="add_min" id="add_min">
											<option value="">Desde</option>
											@for($i = 1; $i <= 3.5; $i += 0.25)
												<option value="+{{ number_format($i, 2) }}">+{{ number_format($i, 2) }}</option>
											@endfor
										</select>
									</div>
									<div class="col-sm-6 text-center">
										<select class="form-control" name="add_max" id="add_max">
											<option value="">Hasta</option>
											@for($i = 1; $i <= 3.5; $i += 0.25)
												<option value="+{{ number_format($i, 2) }}">+{{ number_format($i, 2) }}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 1:</label>
	  					<input type="file" class="form-control" id="foto12" name="foto1" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 2:</label>
	  					<input type="file" class="form-control" id="foto22" name="foto2" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 3:</label>
	  					<input type="file" class="form-control" id="foto32" name="foto3" style="font-size: 9px;">
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
		<form id="arma" class="formu" style="display: none;" role="form" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="seccion" value="armazones">
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱SKU Proveedor:</label>
	  					<input type="text" class="form-control" id="sku3" name="sku">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Negocio:</label>
	  					<input type="text" class="form-control" id="negocio3" name="negocio">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Proveedor:</label>
						<select class="form-control" id="proveedor3" name="provedor_id">
							<option value="">Seleccionar</option>
							@foreach($proveedores as $proveedor)
								<option value="{{ $proveedor->id }}">{{ $proveedor->razonsocial }}{{ $proveedor->nombre . ' ' . $proveedor->apellidopaterno }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Marca:</label>
	  					<input type="text" class="form-control" id="marca3" name="marca">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="marca_abr3" name="marca_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Modelo:</label>
	  					<input type="text" class="form-control" id="modelo3" name="modelo">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="modelo_abr3" name="modelo_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Color:</label>
	  					<input type="text" class="form-control" id="color3" name="color">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="color_abr3" name="color_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Medidas:</label>
	  					<input type="text" class="form-control" id="medidas" name="medidas">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Unidad de medida:</label>
						<select name="unidad" id="unidad3" class="form-control">
							<option value="">Seleccionar</option>
							<option value="m">Metros</option>
							<option value="cm">Centímetros</option>
							<option value="mm">Milímetros</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 1:</label>
	  					<input type="file" class="form-control" id="foto13" name="foto1" style="font-size: 9px;">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 2:</label>
	  					<input type="file" class="form-control" id="foto23" name="foto2" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 3:</label>
	  					<input type="file" class="form-control" id="foto33" name="foto3" style="font-size: 9px;">
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
		<form id="cont" class="formu" style="display: none;" role="form" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="seccion" value="contacto">
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱SKU Proveedor:</label>
	  					<input type="text" class="form-control" id="sku4" name="sku">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Negocio:</label>
	  					<input type="text" class="form-control" id="negocio4" name="negocio">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Proveedor:</label>
						<select class="form-control" id="proveedor4" name="provedor_id">
							<option value="">Seleccionar</option>
							@foreach($proveedores as $proveedor)
								<option value="{{ $proveedor->id }}">{{ $proveedor->razonsocial }}{{ $proveedor->nombre . ' ' . $proveedor->apellidopaterno }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Categoría:</label>
	  					<input type="text" class="form-control" id="categoria4" name="categoria">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="categoria_abr4" name="categoria_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Marca:</label>
	  					<input type="text" class="form-control" id="marca4" name="marca">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="marca_abr4" name="marca_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Tipo de lente:</label>
	  					<input type="text" class="form-control" id="tipo4" name="tipo">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="tipo_abr4" name="tipo_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Periodicidad:</label>
	  					<input type="text" class="form-control" id="periodo" name="periodo">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="periodo_abr" name="periodo_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Unidad de medida:</label>
						<select name="unidad" id="unidad4" class="form-control">
							<option value="">Seleccionar</option>
							<option value="m">Metros</option>
							<option value="cm">Centímetros</option>
							<option value="mm">Milímetros</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 1:</label>
	  					<input type="file" class="form-control" id="foto14" name="foto1" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 2:</label>
	  					<input type="file" class="form-control" id="foto24" name="foto2" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 3:</label>
	  					<input type="file" class="form-control" id="foto34" name="foto3" style="font-size: 9px;">
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
		<form id="gene" class="formu" style="display: none;" role="form" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="seccion" value="generales">
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱SKU Proveedor:</label>
	  					<input type="text" class="form-control" id="sku5" name="sku">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Negocio:</label>
	  					<input type="text" class="form-control" id="negocio5" name="negocio">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Proveedor:</label>
						<select class="form-control" id="proveedor5" name="provedor_id">
							<option value="">Seleccionar</option>
							@foreach($proveedores as $proveedor)
								<option value="{{ $proveedor->id }}">{{ $proveedor->razonsocial }}{{ $proveedor->nombre . ' ' . $proveedor->apellidopaterno }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Producto:</label>
	  					<input type="text" class="form-control" id="producto5" name="producto">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="producto_abr5" name="producto_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Marca:</label>
	  					<input type="text" class="form-control" id="marca5" name="marca">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="marca_abr5" name="marca_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Modelo:</label>
	  					<input type="text" class="form-control" id="modelo5" name="modelo">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="modelo_abr5" name="modelo_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Color:</label>
	  					<input type="text" class="form-control" id="color5" name="color">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" id="color_abr5" name="color_abr" maxlength="3">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Unidad de medida:</label>
						<select name="unidad" id="unidad5" class="form-control">
							<option value="">Seleccionar</option>
							<option value="m">Metros</option>
							<option value="cm">Centímetros</option>
							<option value="mm">Milímetros</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 1:</label>
	  					<input type="file" class="form-control" id="foto15" name="foto1" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 2:</label>
	  					<input type="file" class="form-control" id="foto25" name="foto2" style="font-size: 9px;">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Foto 3:</label>
	  					<input type="file" class="form-control" id="foto35" name="foto3" style="font-size: 9px;">
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

<script>

	function seleccionar(tipo) {

		for(i = 1; i <= 5; i++) {
			// REQUIRED
			$('#sku' + i).prop('required', false);
			$('#negocio' + i).prop('required', false);
			$('#proveedor' + i).prop('required', false);
			if(i == 1 || i == 4) {
				$('#categoria' + i).prop('required', false);
				$('#categoria_abr' + i).prop('required', false);
			}
			$('#familia').prop('required', false);
			$('#familia_abr').prop('required', false);
			$('#materiales').prop('required', false);
			$('#materiales_abr').prop('required', false);
			$('#rangos').prop('required', false);
			if(i !== 2) {
				$('#marca' + i).prop('required', false);
				$('#marca_abr' + i).prop('required', false);
				if(i != 4) {
					$('#modelo' + i).prop('required', false);
					$('#modelo_abr' + i).prop('required', false);
				}
			}
			$('#talla').prop('required', false);
			if(i != 4) {
				$('#color' + i).prop('required', false);
				$('#color_abr' + i).prop('required', false);
			}
			$('#tratamiento').prop('required', false);
			$('#tratamiento_abr').prop('required', false);
			$('#medidas').prop('required', false);
			if(i == 2 || i == 4) {
				$('#tipo' + i).prop('required', false);
				$('#tipo_abr' + i).prop('required', false);
			}
			if(i == 1 || i == 5){
				$('#producto' + i).prop('required', false);
				$('#producto_abr' + i).prop('required', false);			
			}
			$('#periodo').prop('required', false);
			$('#periodo_abr').prop('required', false);
			$('#unidad' + i).prop('required', false);
			$('[name="renta"]').prop('required', false);

			// VALUE
			$('#sku' + i).val('');
			$('#negocio' + i).val('');
			$('#proveedor' + i).val('');
			if(i == 1 || i == 4) {
				$('#categoria' + i).val('');
				$('#categoria_abr' + i).val('');
			}
			$('#familia').val('');
			$('#familia_abr').val('');
			$('#materiales').val('');
			$('#materiales_abr').val('');
			$('#rangos').val('');
			if(i !== 2) {
				$('#marca' + i).val('');
				$('#marca_abr' + i).val('');
				if(i != 4) {
					$('#modelo' + i).val('');
					$('#modelo_abr' + i).val('');
				}
			}
			$('#talla').val('');
			if(i != 4) {
				$('#color' + i).val('');
				$('#color_abr' + i).val('');
			}
			$('#tratamiento').val('');
			$('#tratamiento_abr').val('');
			$('#medidas').val('');
			if(i == 2 || i == 4) {
				$('#tipo' + i).val('');
				$('#tipo_abr' + i).val('');
			}
			if(i == 1 || i == 5){
				$('#producto' + i).val('');
				$('#producto_abr' + i).val('');			
			}
			$('#periodo').val('');
			$('#periodo_abr').val('');
			$('#unidad' + i).val('');
			$('[name="renta"]').prop('checked', false);
		}

		$('#sku' + tipo).prop('required', true);
		$('#negocio' + tipo).prop('required', true);
		$('#proveedor' + tipo).prop('required', true);
		if(tipo != 4) {
			$('#color' + tipo).prop('required', true);
			$('#color_abr' + tipo).prop('required', true);
		}
		$('#unidad' + tipo).prop('required', true);

		if(tipo === 1) {
			$('#categoria' + tipo).prop('required', true);
			$('#categoria_abr' + tipo).prop('required', true);
			$('#producto' + tipo).prop('required', true);
			$('#producto_abr' + tipo).prop('required', true);
			$('#marca' + tipo).prop('required', true);
			$('#marca_abr' + tipo).prop('required', true);
			$('#modelo' + tipo).prop('required', true);
			$('#modelo_abr' + tipo).prop('required', true);
			$('#talla').prop('required', true);
			$('[name="renta"]').prop('required', true);
		} else if(tipo === 2) {
			$('#familia').prop('required', true);
			$('#familia_abr').prop('required', true);
			$('#materiales').prop('required', true);
			$('#materiales_abr').prop('required', true);
			$('#rangos').prop('required', true);
			$('#tratamiento').prop('required', true);
			$('#tratamiento_abr').prop('required', true);
			$('#tipo' + tipo).prop('required', true);
			$('#tipo_abr' + tipo).prop('required', true);
		} else if(tipo === 3) {
			$('#marca' + tipo).prop('required', true);
			$('#marca_abr' + tipo).prop('required', true);
			$('#modelo' + tipo).prop('required', true);
			$('#modelo_abr' + tipo).prop('required', true);
			$('#medidas').prop('required', true);
		}  else if(tipo === 4) {
			$('#categoria' + tipo).prop('required', true);
			$('#categoria_abr' + tipo).prop('required', true);
			$('#marca' + tipo).prop('required', true);
			$('#marca_abr' + tipo).prop('required', true);
			$('#periodo').prop('required', true);
			$('#periodo_abr').prop('required', true);
			$('#tipo' + tipo).prop('required', true);
			$('#tipo_abr' + tipo).prop('required', true);
		} else if(tipo === 5) {
			$('#producto' + tipo).prop('required', true);
			$('#producto_abr' + tipo).prop('required', true);
			$('#marca' + tipo).prop('required', true);
			$('#marca_abr' + tipo).prop('required', true);
			$('#modelo' + tipo).prop('required', true);
			$('#modelo_abr' + tipo).prop('required', true);
		}

	}

	$(document).ready(function() {

		$('#selector').change(function() {
			switch($(this).val()) {
				case 'ortopedia':
					$('.formu').hide();
					$('#orto').show();
					seleccionar(1);
					break;
				case 'micas':
					$('.formu').hide();
					$('#mica').show();
					seleccionar(2);
					break;
				case 'armazones':
					$('.formu').hide();
					$('#arma').show();
					seleccionar(3);
					break;
				case 'contacto':
					$('.formu').hide();
					$('#cont').show();
					seleccionar(4);
					break;
				case 'generales':
					$('.formu').hide();
					$('#gene').show();
					seleccionar(5);
					break;
				default:
					$('.formu').hide();
					seleccionar(0);
					break;
			}
		});

	});
</script>

@endsection