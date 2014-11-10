
<div style="padding: 20px;">
	<h4><b>Question #<?= $question->ID; ?></b></h4>
	<h5><?= $question->Text ?></h5>
	
	<br />
	
	<form action="<?= $this->config->base_url(); ?>/index.php/test/question" method="POST">
		<input type="radio" name="answer" /> <b>Introvert</b> - You are shy, keep to yourself, have no friends, and don't socialize
		<br />
		<input type="radio" name="answer" /> <b>Extrovert</b> - You are very outgoing, sometimes loud.
	</form>

	<br />
	
	<input type="submit" class="btn btn-primary btn-sm" value="Next" />
	
	<br /><br />
	
	<div class="progress">
		<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
			<span class="sr-only">20% Complete</span>
		</div>
	</div>
</div>
