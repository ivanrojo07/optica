@extends('layouts.test')
@section('content1')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- scripts --}}
	<div class="container">
		@if ($edit == true)
		{{-- true expr --}}
		<form role="form" method="POST" action="{{ route('sucursales.update',['sucursal'=>$sucursal]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
	@else
		{{-- false expr --}}
		<form role="form" id="form-sucursal" method="POST" action="{{ route('sucursales.store') }}" name="form">
			{{ csrf_field()}}
	@endif

			<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Datos de la Sucursal:
					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="btn btn-info" href="{{ route('sucursales.create') }}"><strong>Ver Sucursales</strong></a>
				</h4></div>

				<div class="panel-body">
					<div class="col-xs-12 offset-md-2 mt-3">

						<div class="form-group col-xs-4">
							<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre:</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{ $sucursal->nombre }}" placeholder="Nombre de Sucursal">
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="responsable"><i class="fa fa-asterisk" aria-hidden="true"></i> Responsable :</label>
							<input type="text" class="form-control" id="responsable" name="responsable" required="required" value="{{ $sucursal->responsable }}" placeholder="Nombre del Responsable">
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="claveid"><i class="fa fa-asterisk" aria-hidden="true"></i> Clave ID :</label>
							<input type="text" class="form-control" id="claveid" name="claveid" required="required" value="{{ $sucursal->claveid }}" placeholder="ID de Sucursal">
						</div>


					</div>


					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
						<label class="control-label" for="region">Región:</label>
			    					<select type="select" name="region" class="form-control" 
			    					        id="region" >
			    					<option id="Region 1" value="Region 1">Region 1</option>
			    					<option id="Region 2" value="Region 2">Region 2</option>
			    					<option id="Region 3" value="Region 3">Region 3</option>
			    					<option id="Region 4" value="Region 4">Region 4</option>
			    					</select>
						</div>

						


					</div>
					
				   </div>


				</div>

			</div>


<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Detalles de Sucursal :
					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos&nbsp;&nbsp;
					<!-- <a class="btn btn-info" href="{{ route('sucursales.create') }}"><strong>Nueva Sucursal</strong></a> -->
				</h4></div>

                  
                   <div class="panel-body">
                   	 <ul class="nav nav-pills ">

    <li class="active">
    	<a data-toggle="tab" href="#dir" class="btn-info">Dirección  
    		
    	</a>
    </li>

    <li>
    	<a data-toggle="tab" href="#gas" class="btn-info">Gastos
    		
    	</a>

    </li>

    <li><a data-toggle="tab" href="#emp" class="btn-info">Empleados
    	
       </a>
   </li>
    
  </ul>




  <div class="tab-content">

  	<div id="dir" class="tab-pane fade in active">
			
			 	 <br />
    	
      

      		<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
			    					<input type="text" class="form-control" id="calle" name="calle" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
			    					<input type="text" class="form-control" id="numext" name="numext" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<input type="text" class="form-control" id="numint" name="numint">
			  					</div>
			  					
							</div>

								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
			  						<input type="text" class="form-control" id="colonia" name="colonia" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="delegacion"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
			  						<input type="text" class="form-control" id="delegacion" name="delegacion" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"> <i class="fa fa-asterisk" aria-hidden="true"></i>Ciudad:</label>
			  						<input type="text" class="form-control" id="ciudad" name="ciudad" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"> <i class="fa fa-asterisk" aria-hidden="true"></i>Estado:</label>
			  						<input type="text" class="form-control" id="estado" name="estado" required>
			  					</div>
							</div>


								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<input type="text" class="form-control" id="calle1" name="calle1">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<input type="text" class="form-control" id="calle2" name="calle2">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<input type="text" class="form-control" id="referencia" name="referencia">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" align="right">
							<button type="submit" 
									        class="btn btn-success">
									 <strong>Guardar</strong>
								</button>
						</div>
							</div>


    </div>





    <div id="gas" class="tab-pane fade ">
    	<iframe src="/gastos.create" >
    		
    	</iframe>
    </div>


    <div id="emp" class="tab-pane fade ">
    	<iframe src="empleados.index" >
    		
    	</iframe>
    </div>



  	
  </div>
             

                   </div>



					
				</div>
			</div>




	  </form>
	</div>
@endsection