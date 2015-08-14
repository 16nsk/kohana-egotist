<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'        => 'ORM',
	'hash_method'   => 'sha1',
	'salt_pattern'  => '1, 3, 5, 9, 13, 15, 19, 21, 29, 31',
	'lifetime'      => 1209600,
	'session_key'   => 'auth_user',
	'autologin_key' => 'auth_autologin',
	'forced_key'    => 'auth_forced',

	// Username/password combinations for the Auth File driver
	'users' => array(
		// 'admin' => 'b3154acf3a344170077d11bdb5fff31532f679a1919e716a02',
	),

);