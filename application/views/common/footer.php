<p>Copyright &copy; <?php echo date("Y"); ?> - <?php echo $site_name; ?></p>

<?php if (Kohana::$environment == Kohana::DEVELOPMENT) : ?>

<div id="kohana-profiler">
	<?php echo View::factory('profiler/stats'); ?>
</div>

<?php endif; ?>
