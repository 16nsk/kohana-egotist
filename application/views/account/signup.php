<h1>Sign up for Egotist... You know you want to!</h1>

<?php Form::open(); ?>
<div class="form-field">
	<?php echo Form::label('first_name', 'First name'); ?>
	<?php echo Form::input('first_name'); ?>
</div>
<div class="form-field">
	<?php echo Form::label('last_name', 'Last name'); ?>
	<?php echo Form::input('last_name'); ?>
</div>
<div class="form-field">
	<?php echo Form::label('email', 'Email address'); ?>
	<?php echo Form::input('email'); ?>
</div>
<div class="form-field">
	<?php echo Form::label('password', 'Password'); ?>
	<?php echo Form::password('password'); ?>
</div>
<div class="form-field">
	<?php echo Form::label('password_confirm', 'Password'); ?>
	<?php echo Form::password('password_confirm'); ?>
</div>
<div class="form-field">
	<?php echo Form::submit('submit', 'Create new account'); ?>
</div>
<?php echo Form::close(); ?>