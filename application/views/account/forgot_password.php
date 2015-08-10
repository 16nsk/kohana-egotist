<h1>Reset password</h1>
<p>Input your email address and a reset link will be sent for you.</p>

<?php echo Form::open(); ?>
<div class="form-field">
	<?php echo Form::label('email_address', 'Email address'); ?>
	<?php echo Form::input('email_address'); ?>
</div>
<div class="form-field">
	<?php echo Form::submit('submit', 'Send'); ?>
</div>
<?php echo Form::close(); ?>