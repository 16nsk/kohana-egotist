<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/London');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_GB.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

//-- Configuration and initialization -----------------------------------------

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 */
if (isset($_SERVER['APP_ENV']))
{
	Kohana::$environment = $_SERVER['APP_ENV'];
}
Kohana::$environment = Kohana::DEVELOPMENT;

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
	'base_url'   => '/',
        'index_file' => ''
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'oauth'      => MODPATH.'oauth',      // OAuth authentication
	'pagination' => MODPATH.'pagination', // Paging of results
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	'mailer'     => MODPATH.'mailer',
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('noaccess', 'noaccess')
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'account',
		'action'     => 'noaccess',
	));
Route::set('forgot_password', 'forgot_password')
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'account',
		'action'     => 'forgot_password',
	));
Route::set('signup', 'signup')
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'account',
		'action'     => 'signup',
	));
Route::set('login', 'login')
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'account',
		'action'     => 'login',
	));
Route::set('logout', 'logout')
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'account',
		'action'     => 'logout',
	));
Route::set('profile-private', 'profile/private')
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'profile',
		'action'     => 'private',
	));
Route::set('profile', 'profile/<id>(/<optional>)',
	array(
		'id' => '[0-9]+',
		'optional'   => '.*',
	))
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'profile',
		'action'     => 'index',
	));
Route::set('user-add-message', 'messages/add(/<id>)',
	array(
		'id'         => '[0-9]+',
	))
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'messages',
		'action'     => 'add',
	));
Route::set('user-edit-message', 'messages/edit(/<user_id>(/<message_id>))',
	array(
		'user_id'         => '[0-9]+',
		'message_id'      => '[0-9]+',
	))
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'messages',
		'action'     => 'edit',
	));
Route::set('user-delete-message', 'messages/delete(/<user_id>(/<message_id>))',
	array(
		'user_id'         => '[0-9]+',
		'message_id'      => '[0-9]+',
	))
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'messages',
		'action'     => 'delete',
	));
Route::set('user-messages', 'messages/<action>/<id>(/<optional>)',
	array(
		'id'         => '[0-9]+',
		'optional'   => '.*',
	))
	->defaults(array(
		'directory'  => 'user',
		'controller' => 'messages',
		'action'     => 'index',
	));
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'welcome',
		'action'     => 'index',
	));

/**
 * Execute the main request using PATH_INFO. If no URI source is specified,
 * the URI will be automatically detected.
 */
$request = Request::instance();

try
{
	// Attempt to execute the response
	$request->execute();
}
catch (Exception $e)
{
	if (Kohana::$environment == Kohana::PRODUCTION)
	{
		throw $e;
	}

	// Log the error
	Kohana::$log->add(Kohana::ERROR, Kohana::exception_text($e));

	// Create a 404 response
	$request->status = 404;
	View::set_global('site_name', 'Egotist Beta');
	$request->response = View::factory('template')
		->set('title', '404')
		->set('styles', array(
			'reset',
			'style',
		))
		->set('scripts', array())
		->set('content', View::factory('errors/404'));
}

/**
 * Display the request response.
 */
echo $request->send_headers()->response;
