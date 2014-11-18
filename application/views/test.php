
<div style="padding: 20px;">
	<h4><b>Question #<?= $question->ID; ?></b></h4>
	<h5><?= $question->Text ?></h5>
	
	<br />
	
	<form action="<?= $this->config->base_url(); ?>/index.php/test/question" method="POST">
		<?php
			if( $question->Type == 1 ) {
				// Ratio Button
				foreach( $options as $option ) {
					echo '<input type="radio" name="answer" /> ' . $option[ "Text" ] . '<br />';
				}
			} elseif( $question->Type == 2 ) {
				// Ratio Button
				foreach( $options as $option ) {
					echo '<input type="checkbox" name="' . $option[ "ID" ] . '" /> ' . $option[ "Text" ] . '<br />';
				}
			}
		?>
	</form>
	
	<br />
	
	<input type="submit" class="btn btn-primary btn-sm" value="Next" />
	
	<br /><br />
	
	<div class="progress">
		<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= ( $question->ID / $numq ) * 100; ?>%">
			&nbsp;
		</div>
	</div>
</div>
