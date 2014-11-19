<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-11-19 00:23:58 --- CRITICAL: ErrorException [ 8 ]: Undefined index: type ~ APPPATH\classes\Controller\User.php [ 36 ] in C:\xampp5.5\htdocs\test_itbsg\application\classes\Controller\User.php:36
2014-11-19 00:23:58 --- DEBUG: #0 C:\xampp5.5\htdocs\test_itbsg\application\classes\Controller\User.php(36): Kohana_Core::error_handler(8, 'Undefined index...', 'C:\xampp5.5\htd...', 36, Array)
#1 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Controller.php(84): Controller_User->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp5.5\htdocs\test_itbsg\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp5.5\htdocs\test_itbsg\application\classes\Controller\User.php:36
2014-11-19 00:24:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_User::edit() ~ APPPATH\classes\Controller\User.php [ 45 ] in file:line
2014-11-19 00:24:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-11-19 00:27:40 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: reslut ~ APPPATH\classes\Controller\User.php [ 50 ] in C:\xampp5.5\htdocs\test_itbsg\application\classes\Controller\User.php:50
2014-11-19 00:27:40 --- DEBUG: #0 C:\xampp5.5\htdocs\test_itbsg\application\classes\Controller\User.php(50): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\xampp5.5\htd...', 50, Array)
#1 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Controller.php(84): Controller_User->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp5.5\htdocs\test_itbsg\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp5.5\htdocs\test_itbsg\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp5.5\htdocs\test_itbsg\application\classes\Controller\User.php:50
2014-11-19 13:40:41 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Model\User.php [ 33 ] in file:line
2014-11-19 13:40:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-11-19 14:27:04 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\classes\Model\User.php [ 32 ] in file:line
2014-11-19 14:27:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-11-19 14:28:07 --- CRITICAL: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\classes\Model\User.php [ 32 ] in file:line
2014-11-19 14:28:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line