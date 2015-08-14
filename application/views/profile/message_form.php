<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php $form_type = Request::instance()->action == 'add' ? 'Create new' : 'Edit'; ?>
<?php if (isset($errors) AND $errors != '') : ?>
<h2 class="error">There were form errors</h2>
	<ul class="errors">
		<?php foreach($errors as $error) : ?>
			<li><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
<h2><?php echo $form_type; ?> message</h2>
<?php echo Form::open(); ?>
<div class="field">
    <?php
    $body = isset($value) ? $value : '';
    echo Form::textarea('content', $body);
    ?>
</div>
<div class="field">
    <?php echo Form::submit('message_form', "{$form_type}"); ?>
</div>
<?php echo Form::close(); ?>
