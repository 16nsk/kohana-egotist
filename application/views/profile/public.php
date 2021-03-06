<h2>Public Profile for <?php echo $user->username; ?></h2>

<h3>Recent Messages:</h3>

<?php if ( count($messages) ) : ?>
	<?php foreach($messages as $message) : ?>

<p class="message">
	<?php echo HTML::chars($message->content); ?>
	<br />
	<span class="published">
		<?php echo Date::fuzzy_span($message->date_published); ?>
	</span>
	<?php if (time() - $message->date_published < 900) : ?>
		<a href="<?php echo url::site("messages/edit/{$message->user_id}/{$message->id}") ?>">Edit message</a>
		<a href="<?php echo url::site("messages/delete/{$message->user_id}/{$message->id}") ?>">Delete message</a>
	<?php endif; ?>
</p>
<hr />

	<?php endforeach; ?>

<?php else: ?>
	<p>We have no messages in the system.</p>
<?php endif; ?>

<?php echo $pager_links; ?>
