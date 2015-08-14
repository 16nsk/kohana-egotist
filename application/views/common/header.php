<div id="logo">
    <img src="<?php echo URL::base(); ?>media/img/logo.png" alt="<?php echo $site_name; ?>" />
</div>

<p id="tagline">
    <em>Because it's all about you!</em>
</p>

<ul id='main_nav'>
    <li><a href="<?php echo URL::site(); ?>">Home</a></li>
    <li><a href="<?php echo URL::site('page/about'); ?>">About <?php echo $site_name; ?></a></li>
    <li><a href="<?php echo URL::site('page/why_egotist'); ?>">Why use Egotist?</a></li>
</ul>

<p id="account">

	<?php if (Auth::instance()->logged_in() AND $user = Auth::instance()->get_user()) : ?>
	Logged in as <?php echo $user->username; ?>. <?php echo HTML::anchor('logout', 'Logout'); ?>

	<?php else : ?>
		<?php echo HTML::anchor('login', 'Login'); ?> | <?php echo HTML::anchor('signup', 'Signup'); ?>

	<?php endif; ?>

</p>
