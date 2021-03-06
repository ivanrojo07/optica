<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class PacienteOcular extends Model
{
    use Sortable, SoftDeletes;

    protected $table = 'paciente_oculars';
    protected $fillable=[
      	              'paciente_id',
      	              'cirugias',
                          'padecimientos',
      	              'cirug_1',
      	              'cirug_2',
      	              'cirug_3',
      	              'padecimientos_array',
      	              'problema_visual',
      	              'usuario_lentes',
      	              'edad_lentes',
      	              'molestia_luz',
      	              'usuario_computadora',
      	              'antecedente_array',
      	              'snellen_1',
      	              'snellen_2',
                          'unilateral_lejos',
                          'unilateral_cerca',
                          'alternamente_lejos',
                          'alternamente_cerca',
                          'queratometria_od_plana',
                          'queratometria_od_curva',
                          'queratometria_od_eje',
                          'queratometria_oi_plana',
                          'queratometria_oi_curva',
                          'queratometria_oi_eje',
                          'vision_estereo',
                          'papila_od',
                          'papila_oi',
                          'excavacion_od',
                          'excavacion_oi',
                          'radio_od',
                          'radio_oi',
                          'profundidad_od',
                          'profundidad_oi',
                          'vasos_od',
                          'vasos_oi',
                          'rel_od',
                          'rel_oi',
                          'macula_od',
                          'macula_oi',
                          'reflejo_od',
                          'reflejo_oi',
                          'retina_od',
                          'retina_oi',
                          'anexos',
                          'archivo_imagen',
                          'fecha_tono',
                          'hora_tono',
                          'tonometria_od',
                          'tonometria_oi',
                          'esf_od',
                          'cil_od',
                          'eje_od',
                          'av_od',
                          'dnp_od_lejos',
      	              'dnp_od_cerca',
                          'esf_oi',
                          'cil_oi',
                          'eje_oi',
                          'add_od',
                          'add_oi',
                          'av_oi',
                          'dnp_oi_lejos',
      	              'dnp_oi_cerca',
                          'refractivo',
                          'patologico',
                          'binocularidad',
                          'optometrista',
      	              'opciones'];

    protected $hidden=[ 'deleted_at'];

    public $sortable=['id','paciente_id','created_at', 'updated_at','cirugias','usuario_lentes','tipo_anteojo'];

   public function paciente(){
      
        return $this->belongsTo('App\Paciente', 'paciente_id');
    }
}
