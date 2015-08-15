<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Application extends Controller_Template {

	public $assert_auth = false;

	public $assert_auth_actions = false;
	
	public function before()
	{
		
		parent::before();

		$this->_user_auth();

		View::set_global('site_name', 'Egotist Beta');
		
		$this->template->content = '';

		$this->template->styles = array(
		    'reset',
		    'style'
		);
		$this->template->scripts = array();
		
	}

	protected function _user_auth()
	{

		$action_name = Request::instance()->action;

		if (($this->assert_auth !== false AND Auth::instance()->logged_in($this->assert_auth) === false)
		    OR (is_array($this->assert_auth_actions)
		        AND array_key_exists($action_name, $this->assert_auth_actions)
		        AND Auth::instance()->logged_in($this->assert_auth_actions[$action_name]) === false
		    ))
		{
			if (Auth::instance()->logged_in())
			{
				Request::instance()->redirect('noaccess');
			}
			else
			{
				Request::instance()->redirect('login');
			}
		}

	}

	public function action_noaccess()
	{
		$content = View::factory('account/noaccess');
	}
	
}
