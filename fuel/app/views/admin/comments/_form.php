<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($comment) ? $comment->name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Email', 'email'); ?>

			<div class="input">
				<?php echo Form::input('email', Input::post('email', isset($comment) ? $comment->email : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Website', 'website'); ?>

			<div class="input">
				<?php echo Form::input('website', Input::post('website', isset($comment) ? $comment->website : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Message', 'message'); ?>

			<div class="input">
				<?php echo Form::textarea('message', Input::post('message', isset($comment) ? $comment->message : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Post id', 'post_id'); ?>

			<div class="input">
				<?php echo Form::input('post_id', Input::post('post_id', isset($comment) ? $comment->post_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>