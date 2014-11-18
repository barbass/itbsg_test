<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template {

	public function action_index() {

		$user = new Model_User();
		$user_list = $user->get_all();

		$content = View::factory('user', array(
			'user_list' => $user_list,
		));

		$this->template->title = __('title');
		$this->template->description = 'Учимся передавать данные в шаблоны';
		$this->template->content = $content;
	}

}
