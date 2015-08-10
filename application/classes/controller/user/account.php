<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Account extends Controller_Application {
	
	public function action_login()
	{
		
		$this->template->content = View::factory('account/login');
		
	}
	
	public function action_signup()
	{
		
		$this->template->content = View::factory('account/signup');
		
	}
	
	public function action_forgot_password() {
    
		$this->template->content = View::factory('account/forgot_password');
		
	}
	
}
