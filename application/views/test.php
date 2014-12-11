
<div style="padding: 20px;">
	<h4><b>Question #<?= $question->ID; ?></b></h4>
	<h5><?= $question->Text ?></h5>
	
	<br />
	
	<form action="<?= $this->config->base_url(); ?>/index.php/test" method="POST">
		<input type="hidden" name="didanswer" value="yes" />
		<?php
			if( $question->Type == 1 ) {
				// Ratio Button
				foreach( $options as $option ) {
					echo '<input type="radio" name="answer" value="' . $option[ "ID" ] . ' " /> ' . $option[ "Text" ] . '<br />';
				}
			} elseif( $question->Type == 2 ) {
				// 
				foreach( $options as $option ) {
					echo '<input type="checkbox" name="answer_' . $option[ "ID" ] . '" /> ' . $option[ "Text" ] . '<br />';
				}
			}
		?>
		<br />
		<input type="submit" class="btn btn-primary btn-sm" value="Next" />
	</form>
	
	<br /><br />
	
	<div class="progress">
		<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= ( $question->ID / $numq ) * 100; ?>%">
			&nbsp;
		</div>
	</div>
</div>
