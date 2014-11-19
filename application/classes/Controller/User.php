<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template {

	public function action_index() {

		$user = new Model_User();
		$user_list = $user->getAll();

		$country = new Model_Country();
		$country_list = $country->getAll();
		$country_city_list = array();
		foreach($country_list as $co) {
			foreach($co['city'] as $c) {
				$country_city_list[$co['country_id']][] = $c;
			}
		}

		$content = View::factory('user', array(
			'user_list' => $user_list,
			'country_list' => $country_list,
			'country_city_list' => $country_city_list,
			'action' => URL::site('user/edit'),
		));

		$this->template->title = __('title');
		$this->template->description = 'Учимся передавать данные в шаблоны';
		$this->template->content = $content;
	}

	public function action_edit() {
		$response = array('success' => false,);
		$data = $this->request->post();
		$user = new Model_User();

		if (isset($data['type']) && $data['type'] == 'delete') {
			$user->delete();

			$response = array(
				'success' => true,
				'message' => __('row_delete'),
			);
		} else {
			if (!empty($data['user_id'])) {
				$result = $user->edit($data);
			} else {
				$result = $user->add($data);
			}

			if ($result !== true) {
				$messages = array();
				foreach($result as $key=>$value) {
					$messages[] = $value;
				}

				$response = array(
					'success' => false,
					'message' => implode('\n', $messages),
				);
			} else {
				$response = array(
					'success' => true,
					'message' => __('row_add'),
				);
			}
		}

		$this->auto_render = false;
		echo json_encode($response);
	}

}
