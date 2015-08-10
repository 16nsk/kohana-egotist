<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Messages extends Controller {
	
	public function action_index()
	{
		
		// URL::redirect was in Kohana 2.x; this is how we do in 3.x:
		$this->request->redirect(URL::site(), 301);
		
	}
	
	public function action_get_messages()
	{
		
		$id = (int) $this->request->param('id');
		
		$messages = array(
			1 => array(
				'This is test message one for user 1',
				'This is test message two for user 1',
				'This is test message three for user 1'
			),
			2 => array(
				'This is test message one for user 2',
				'This is test message two for user 2',
				'This is test message three for user 2'
			)
		);
		
		$messages = array_key_exists($id, $messages) ? $messages[$id] : NULL;
		
		$this->request->response = View::factory('profile/messages')
			->set('messages', $messages);
		
	}
	
}
