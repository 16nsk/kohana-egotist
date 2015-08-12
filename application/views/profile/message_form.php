<?php $form_type = Request::instance()->action == 'add' ? 'Create new' : 'Edit'; ?>
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
