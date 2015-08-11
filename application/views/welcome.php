<h1>Welcome to <?php echo isset($site_name) ? $site_name : 'Egotist'; ?></h1>
<?php foreach($messages as $message) : ?>
    <p class="message">
        <?php echo $message['content']; ?>
        <span class="published">
            <?php echo Date::fuzzy_span($message['date_published']); ?>
        </span>
    </p>
    <hr />
<?php endforeach; ?>
<?php echo $pager_links; ?>
