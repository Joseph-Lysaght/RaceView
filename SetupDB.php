<?php include ('header.php'); ?>
<script> <!-- Set the Active link in the header -->
document.getElementById('SetupDB').setAttribute("class", "nav-link active"); 
</script>
<div class="tab">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" data-bs-toggle="tab" href="#chassis">Chassis</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="tab" href="#suspension">Suspension</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="tab" href="#powertrain">Powertrain</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="tab" href="#weather">Weather</a>
		</li>
	</ul>
</div>

<!-- Tab content -->
<div class="tab-content">
	<div class="tab-pane container active" id="chassis">
		<h1>Chassis Parameters</h1>
		<p>Test1</p>
		 
	</div>
	<div class="tab-pane container fade" id="suspension">
		<p>Test2</p>
	</div>
	<div class="tab-pane container fade" id="powertrain"><!-- Powertrain Tab -->
	
	</div>
	<div class="tab-pane container-fluid fade" id="weather"><!-- Weather Tab -->
		<form class="form-horizontal p-3">
			<div class="form-group">
				<label class="col-sm-2 control-label">Air Pressure (mbar):</label>
				<div class="col-sm-3">
					<input class="form-control" id="pAir" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Air Temperature (degC):</label>
				<div class="col-sm-3">
					<input class="form-control" id="TAir" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Relative Humidity (%):</label>
				<div class="col-sm-3">
					<input class="form-control" id="rHumidity" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Wind Speed (kph):</label>
				<div class="col-sm-3">
					<input class="form-control" id="vWind" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Wind Direction (deg):</label>
				<div class="col-sm-3">
					<input class="form-control" id="aWind" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Track Temperature (degC):</label>
				<div class="col-sm-3">
					<input class="form-control" id="TTrack" type="text">
				</div>
			</div>
		</form>
	</div>
</div>
<?php include ('footer.php'); ?>