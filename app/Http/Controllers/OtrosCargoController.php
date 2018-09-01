<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\OtrosCargo;
use App\Concepto;
use App\TipoMatricula;
use App\NacionalidadVuelo;

class OtrosCargoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$nacionalidades_vuelos = NacionalidadVuelo::lists('nombre','id');
		$tipos_matriculas = TipoMatricula::lists('nombre','id');

		if($request->ajax()){
			
			$sortName     = $request->get('sortName','nombre_cargo');
			$sortName     =($sortName=="")?"nombre_cargo":$sortName;
			
			$sortType     = $request->get('sortType','ASC');
			$sortType     =($sortType=="")?"ASC":$sortType;
			
			$nombre_cargo = $request->get('nombre_cargo', '%');
			$nombre_cargo =($nombre_cargo=="")?"%":$nombre_cargo;

			 \Input::merge([
	            'sortName'=>$sortName,
	            'sortType'=>$sortType]);


			$otros_cargos = OtrosCargo::with("conceptos")
										->where('nombre_cargo', 'like', $nombre_cargo)
										->orderBy($sortName, $sortType)
										->paginate(3);


			return view('configuracionPrecios.confOtrosCargos.partials.table', compact('otros_cargos','tipos_matriculas', 'nacionalidades_vuelos'));
		}
		else
		{
			return view('configuracionPrecios.confOtrosCargos.index', compact('otros_cargos', 'tipos_matriculas', 'nacionalidades_vuelos'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$cantidad_unidades = $request->unidades;
		$nacionalidad_matricula = $request->nacionalidad_matricula;
		$aeropuerto_id = $request->aeropuerto_id;
		$precio_cargo = 0;
		$peso_desde = $request->peso_desde;
		$peso_hasta = $request->peso_hasta;

		foreach ($request->conceptos_id as $key => $concepto_id) {
			$concepto = Concepto::find($concepto_id);
			$nombre_cargo = $concepto->nompre;
			foreach ($request->tipos_matriculas_id as $key => $tipo_matricula_id) {
				foreach ($request->procedencias_id as $key => $procedencia_id) {
					$otros_cargos = OtrosCargo::create([
						'nombre_cargo' => $nombre_cargo,
						'precio_cargo' => $precio_cargo,
						'aeropuerto_id' => $aeropuerto_id,
						'cantidad_unidades' => $cantidad_unidades,
						'concepto_id' => $concepto_id,
						'conceptoCredito_id' => $concepto_id,
						'conceptoContado_id' => $concepto_id,
						'peso_desde' => $peso_desde,
						'peso_hasta' => $peso_hasta,
						'tipo_matricula' => $tipo_matricula_id,
						'nacionalidad_matricula' => $nacionalidad_matricula,
						'procedencia' => $procedencia_id
					]);
				}
			}
		}

		/*$otros_cargos = OtrosCargo::create([
			'nombre_cargo' => $concepto->nompre,
			'precio_cargo' => 0,
			'aeropuerto_id' => $request->input('aeropuerto_id'),
			'cantidad_unidades' => $request->input('unidades'),
			'concepto_id' => $request->input('concepto_id'),
			'conceptoCredito_id' => $request->input('concepto_id'),
			'conceptoContado_id' => $request->input('concepto_id'),
			'peso_desde' => $request->input('peso_desde'),
			'peso_hasta' => $request->input('peso_hasta'),
			'tipo_matricula' => $request->input('tipo_matricula'),
			'nacionalidad_matricula' => $request->input('nacionalidad_matricula'),
			'procedencia' => $request->input('procedencia')
		]);*/
		
		if ($otros_cargos){
			return response()->json(array("text"=>'Registro realizado exitósamente',
										  "otros_cargos"=>$otros_cargos,
										  "success"=>1));
		}else{
			response()->json(array("text"=>'Error registrando el cargo',"success"=>0));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$otrosCargo = OtrosCargo::find($id);
		$nacionalidades_vuelos = NacionalidadVuelo::lists('nombre','id');
		$tipos_matriculas = TipoMatricula::lists('nombre','id');
		return view('configuracionPrecios.confOtrosCargos.partials.edit', compact('otrosCargo', 'tipos_matriculas', 'nacionalidades_vuelos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$oc         = OtrosCargo::find($id);
		$otrosCargo = $oc->update($request->all());
		if($otrosCargo){
            return ["success"=>1, "text" => "Registro modificado con éxito."];
        }else{
            return ["success"=>0, "text" => "Error modificando el registro."];
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        if(\App\OtrosCargo::destroy($id)){
            return ["success"=>1, "text" => "Registro eliminado con éxito."];
        }else{
            return ["success"=>0, "text" => "Error eliminando el registro."];
        }
    }

}
