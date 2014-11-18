<?php defined('SYSPATH') or die('No direct script access.');

class Model_Country extends Model
{
	protected $_tableArticles = 'country';
	protected $_tableArticlesChild = 'city';

	/**
	 * Get all user
	 * @return array
	 */
	public function getAll() {
		$query = DB::select('*')
			->from($this->_tableArticles);

		$result = $query->execute()->as_array();

		foreach($result as &$r) {
			$r['city'] = $this->getCity($r['country_id']);
		}

		return $result;
	}


	public function getCity($country_id) {
		$query = DB::select('city.city_id', 'city.city')
			->from($this->_tableArticlesChild)
			->where('country_id', '=', (int)$country_id);

		$result = $query->execute()->as_array();
		return $result;
	}

}
