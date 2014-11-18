<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model
{
	protected $_tableArticles = 'user';
	protected $_tableScheme = 'user';

	/**
	 * Get all articles
	 * @return array
	 */
	public function get_all()
	{
		$query = DB::select('*')
			->from('get_user_all');

		$result = $query->execute()->as_array();
		return $result;
    }
}
