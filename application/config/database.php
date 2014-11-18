<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array(
		'type'       => 'PDO',
		'connection' => array(
			/**
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'dsn'        => 'pgsql:host=localhost;port=5432;dbname=itbsg',
			'username'   => 'postgres',
			'password'   => 'root',
			'persistent' => FALSE,
		),
		/**
		 * The following extra options are available for PDO:
		 *
		 * string   identifier  set the escaping identifier
		 */
		'table_prefix' => 'public.',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
);
