<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OtrosCargo extends Model {

    protected $fillable = ['nombre_cargo', 'precio_cargo', 'peso_desde', 'peso_hasta', 'conceptoCredito_id', 'conceptoContado_id', 'concepto_id', 'cantidad_unidades', 'tipo_matricula', 'nacionalidad_matricula', 'procedencia', 'aeropuerto_id'];
    
    protected $guarded = [];

    public function conceptos()
    {
        return $this->belongsTo('App\Concepto');
    }

    public function despegue()
    {
        return $this->belongsToMany('App\Despegue', 'despegue_otros_cargo', 'otrosCargo_id', 'despegue_id')
                    ->withPivot('monto')
                    ->withTimestamps();
    }

}
