<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Profile extends Controller_Application {
	
	public function action_index()
	{
		
		$content = View::factory('profile/public')
			->set('username', 'Test User')
			->bind('messages', $messages);
		$messages = array(
			'This is test message one',
			'This is test message two',
			'This is test message three'
		);
		
		$this->template->content = $content;
		
	}
	
}
