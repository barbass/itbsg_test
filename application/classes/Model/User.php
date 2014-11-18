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


	public function edit($data) {
		$valid = $this->validate($data);

		if ($valid !== true) {
			return $valid;
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
				->rule('firstname', 'min_length', array(':value', 76))
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

				->rule('city', 'numeric');

		if($post->check()) {
			return true;
		} else {
			return $post -> errors('validation');
		}
	}

}
