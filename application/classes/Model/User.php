<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model
{
	protected $_tableArticles = 'user';

	/**
	 * Get all user
	 * @return array
	 */
	public function getAll() {
		$query = DB::select('*')
			->from('get_user_all');

		$result = $query->execute()->as_array();
		return $result;
	}

	/**
	 * Изменение пользователя
	 * @param array
	 * @return mixed (bool | array)
	 */
	public function edit($data) {
		$valid = $this->validate($data);

		if ($valid !== true) {
			return $valid;
		}

		$query = DB::query(Database::SELECT, 'SELECT edit_user(:user_id, :firstname, :lastname, :email, :private_code, :address, :city_id)')
			->bind(':user_id', $data['user_id'])
			->bind(':firstname', $data['firstname'])
			->bind(':lastname', $data['lastname'])
			->bind(':email', $data['email'])
			->bind(':private_code', $data['private_code'])
			->bind(':address', $data['address'])
			->bind(':city_id', $data['city']);

		try {
			$query->execute();
		} catch(Database_Exception $e) {
			if (strpos($e->getMessage(), 'E_EXISTING_USER_PRIVATE_CODE')) {
				return array(__('E_EXISTING_USER_PRIVATE_CODE'));
			} elseif (strpos($e->getMessage(), 'E_NOT_EXISTING_USER')) {
				return array(__('E_NOT_EXISTING_USER'));
			} elseif (strpos($e->getMessage(), 'E_NOT_EXISTING_CITY')) {
				return array(__('E_NOT_EXISTING_CITY'));
			} else {
				return array(__('E_DATABASE'));
			}
		}

		return true;
	}

	/**
	 * Создание пользователя
	 * @param array
	 * @return mixed (bool | array)
	 */
	public function add($data) {
		$valid = $this->validate($data);

		if ($valid !== true) {
			return $valid;
		}

		$query = DB::query(Database::SELECT, 'SELECT create_user(:firstname, :lastname, :email, :private_code, :address, :city_id)')
			->bind(':firstname', $data['firstname'])
			->bind(':lastname', $data['lastname'])
			->bind(':email', $data['email'])
			->bind(':private_code', $data['private_code'])
			->bind(':address', $data['address'])
			->bind(':city_id', $data['city']);

		try {
			$query->execute();
		} catch(Database_Exception $e) {
			if (strpos($e->getMessage(), 'E_EXISTING_USER_PRIVATE_CODE')) {
				return array(__('E_EXISTING_USER_PRIVATE_CODE'));
			} elseif (strpos($e->getMessage(), 'E_NOT_EXISTING_USER')) {
				return array(__('E_NOT_EXISTING_USER'));
			} elseif (strpos($e->getMessage(), 'E_NOT_EXISTING_CITY')) {
				return array(__('E_NOT_EXISTING_CITY'));
			} else {
				return array(__('E_DATABASE'));
			}
		}

		return true;
	}

	/**
	 * Delete user
	 * @param int user_id
	 * @return bool
	 */
	public function delete($user_id = 0) {
		$query = DB::delete($this->_tableArticles)
			->where('user_id', '=', (int)$user_id);
		$result = $query->execute();

		return true;
	}

	public function validate($data = array()) {
		$post = Validation::factory($data);
		$post ->rule('firstname', 'not_empty')
				->rule('firstname', 'min_length', array(':value', 2))
				->rule('firstname', 'max_length', array(':value', 45))

				->rule('lastname', 'not_empty')
				->rule('lastname', 'min_length', array(':value', 2))
				->rule('lastname', 'max_length', array(':value', 45))

				->rule('email', 'email')

				->rule('address', 'not_empty')
				->rule('address', 'min_length', array(':value', 2))
				->rule('address', 'max_length', array(':value', 45))

				->rule('private_code', 'not_empty')
				->rule('private_code', 'min_length', array(':value', 2))
				->rule('private_code', 'max_length', array(':value', 45))

				->rule('city', 'numeric')

				->rule('user_id', 'numeric');

		if($post->check()) {
			return true;
		} else {
			return $post -> errors('validation');
		}
	}

}
