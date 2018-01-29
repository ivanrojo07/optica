<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosDatosLab extends Model
{
    //
    use Sortable;

    protected $table='empleadosdatoslab';
    protected $fillable=['id',
                         'empleado_id',
                         'fechacontratacion',
                         'fechaactualizacion',
                         'contrato_id',
                         'area_id',
                         'puesto_id',
                         'salarionom',
                         'salariodia',
                         
                         'periodopaga',
                         'prestaciones',
                         'regimen',
                         'hentrada',
                         'hsalida',
                         'hcomida',
                         'lugartrabajo',
                         'banco',
                         'cuenta',
                         'clabe',
                         'fechabaja',
                         'tipobaja_id',
                         'comentariobaja',
                         'sucursal_id',
                         'almacen_id'];
        
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado', 'empleado_id');
    }
    public function tipocontrato(){
    	return $this->hasOne('App\TipoContrato', 'contrato_id');
    }
    public function tipobaja(){
    	return $this->hasOne('App\TipoBaja','tipobaja_id');
    }
     public function sucursal(){
        return $this->belongsTo('App\Sucursal', 'sucursal_id');
    }
    public function areas(){
        return $this->hasOne('App\Area','area_id');
    }
    public function puestos(){ 
        return $this->hasOne('App\Puesto','puesto_id');
    }
     public function almacen(){
        return $this->belongsTo('App\Almacen', 'almacen_id');
    }


}
