<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Información del Piloto</h3>
			</div>
			{!! Form::model($piloto, [ "class" => "form-horizontal"]) !!}
			@include('pilotos.partials.form', ["disabled" =>"disabled"])
			{!! Form::close() !!}
		</div>
	</div>
</div>