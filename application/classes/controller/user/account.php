<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Account extends Controller_Application {
	
	public function action_login()
	{

		if (Auth::instance()->logged_in())
		{
			Request::instance()->redirect('profile/private');
		}

		$this->template->content = View::factory('account/login')
			->bind('user', $user)
			->bind('errors', $errors);

		if ($_POST)
		{
			$user = ORM::factory('user');
			$status = $user->login($_POST);

			if ($status)
			{
				Request::instance()->redirect('profile/private');
			}
			else
			{
				$errors = $_POST->errors('login');
			}
		}
		
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		Request::instance()->redirect('login');
	}
	
	public function action_signup()
	{
		
		$this->template->content = View::factory('account/signup');

		if ($_POST)
		{
			$user = new Model_User;
			$post = $user->validate_create($_POST);

			if ($post->check())
			{
				$user->values($post);
				$user->save();
				$user->add('roles', ORM::factory('role')->find(1));
			}
			else
			{
				$this->errors = $post->errors('signup');
				Request::instance()->redirect('signup');
			}

			Request::instance()->redirect('');
		}

	}
	
	public function action_forgot_password() {
    
		$this->template->content = View::factory('account/forgot_password');
		
	}
	
}
