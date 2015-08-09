<h2>Public Profile for <?php echo $username; ?></h2>

<h3>Recent Messages:</h3>
<?php foreach ($messages as $message) : ?>
<p class="message">
	<?php echo $message; ?>
</p>
<?php endforeach; ?>
