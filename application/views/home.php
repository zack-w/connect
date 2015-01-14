<h3><b>MTH Connect!</b></h3>

<br />

<?php
	if( isset( $user ) ) {
		echo '
			<div class="alert alert-info" role="alert">
				Hello <b>' . $user->FirstName . ' ' . $user->LastName .'</b> [Grade: <b>' . $user->Grade . '</b>]
			</div>
		';
	}
?>

<div class="panel panel-default" style="width: 80%;">
	<div class="panel-heading"><b>What?</b></div>
	<div class="panel-body">
		MTH Connect! is a service which connects you with other people at Mount Hebron High School
		based on your personality.
	</div>
</div>

<br />

<div class="panel panel-default" style="width: 80%;">
	<div class="panel-heading"><b>How?</b></div>
	<div class="panel-body">
		It's simple, click the "<i>Take Test!</i>" button below, login, and then complete the test.
		The results will be available on <b>February 14th</b>. You can get them at lunch. The
		results will cost $1.00 for the personality results, and $1.00 for the matchmaker results.
	</div>
</div>

<br />

<a href="<?= $this->config->base_url(); ?>/index.php/test">
	<button type="button" class="btn btn-primary btn">Take Test!</button>
</a>