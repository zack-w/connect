
<?php
	if( isset( $error ) ) {
		echo '
			<div class="alert alert-danger" role="alert">
				' . $error . '
			</div>
		';
	}
?>

<div style="padding: 20px;">
	<h4><b>Identify Yourself</b></h4>
	<hr />
	
	<form class="col-sm-6 form-horizontal" role="form" method="post">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-4 control-label">First Name</label>
			<div class="col-sm-8" style="display: inline;">
				<input type="text" name="fname" class="form-control" style="width: 180px;display: inline;" />
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-4 control-label">Birthday</label>
			<div class="col-sm-8">
				<select class="form-control" name="month" style="width: 120px;display: inline;">">
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				
				<select class="form-control" name="day" style="width: 70px;display: inline;">">
					<?php
						for( $i = 1; 32 > $i; $i++ ) {
							echo '
								<option value"' . $i . '">' . $i . '</option>
							';
						}
					?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-4"></div>
			
			<div class="col-sm-8">
				<br />
				<input type="submit" class="btn btn-primary btn-sm" value="Login" />
			</div>
		</div>
	</form>
</div>
