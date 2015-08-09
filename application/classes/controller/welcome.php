<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application {

	public function action_index()
	{
		
		// $this->request->response = 'hello, world!';
		
//		$data = array();
//		$data['site_name'] = 'Egotist';
//		$data['random'] = rand(1,10);
//		$this->request->response = View::factory('welcome', $data);
		
//		$view = View::factory('welcome');		
//		$view->site_name = 'Egotist';
//		$view->random = rand(1,10);
//		$this->request->response = $view;
		
//		$view = View::factory('welcome')
//			->set('site_name', 'Egotist')
//			->set('random', rand(1,10));
//		$this->request->response = $view;
		
//		$view = View::factory('welcome')
//			->bind('site_name', $site_name)
//			->bind('random', $random);
//		$site_name = 'Egotist';
//		$random = rand(1, 10);
//		$this->request->response = $view;
		
//		$view = View::factory('welcome')
//			->bind('random', $random);
//		$content = View::factory('welcome')
//			->bind('random', $random);
//		$random = rand(1, 10);
//		$view->site_name = 'Egotist Beta';
//		$content->site_name = 'Egotist Beta';
//		$this->request->response = $view;
//		$this->template->content = $content;
		
//		View::set_global('site_name', 'Egotist Beta');
		$content = View::factory('welcome')
			->bind('random', $random);
		$random = rand(1, 10);
		
		$this->template->content = $content;
		
//		View::bind_global('site_name', $site_name);
//		$site_name = 'Egotist Beta';
		
	}

} // End Welcome
