<div class="col-sm-4 invoice-col">
	<!-- Precio del Dolar -->
	<div class="box box-info confGeneralBox">
		<div class="box-header">
			<h5>Dólar Oficial</h5>
		</div>
		<div class="box-body">
			<!-- Precio Diurno-->
			<div class="form-group">
				<label>Precio por Dólar: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsS. 
					</div>
						{!! Form::text('dolar_oficial', null, [ 'class'=>"form-control dolar_oficial", "placeholder"=>"Dolar Oficial (BsF)"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->					
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->

<div class="col-sm-4 invoice-col">
	<!-- Precio del Dolar -->
	<div class="box box-info confGeneralBox">
		<div class="box-header">
			<h5>Euro Oficial</h5>
		</div>
		<div class="box-body">
			<!-- Precio Diurno-->
			<div class="form-group">
				<label>Precio por Euro: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsS. 
					</div>
						{!! Form::text('euro_oficial', null, [ 'class'=>"form-control euro_oficial", "placeholder"=>"Euro Oficial (BsF)"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->					
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->

<div class="col-sm-4 invoice-col">
	<!-- Precio del Dolar -->
	<div class="box box-info confGeneralBox">
		<div class="box-header">
			<h5>Petro Oficial</h5>
		</div>
		<div class="box-body">
			<!-- Precio Diurno-->
			<div class="form-group">
				<label>Precio por Petro: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsS. 
					</div>
						{!! Form::text('petro_oficial', null, [ 'class'=>"form-control petro_oficial", "placeholder"=>"Petro Oficial (BsF)"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->					
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->