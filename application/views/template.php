<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<title><?php echo (isset($title)) ? $title : '';?></title>

		<!--<link rel="stylesheet" href="<?php echo URL::base()."resource/css/style.css";?>">-->

		<script src="https://yandex.st/jquery/1.8.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo URL::base()."resource/js/jquery-1.8.3.min.js";?>"><\/script>')</script>

		<link rel="stylesheet" href="<?php echo URL::base()."resource/css/bootstrap-3.1.0.min.css";?>">
		<script type='text/javascript' src="https://yandex.st/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<!-- Неточное определение успешной загрузки bootstrap -->
		<script>window.jQuery.fn.carousel || document.write('<script src="<?php echo URL::base()."resource/js/bootstrap-3.1.0.min.js";?>"><\/script>')</script>

		<link rel="stylesheet" href="<?php echo URL::base()."resource/js/jquery-ui-1.10.4/css/ui-lightness/jquery-ui-1.10.4.min.css";?>">
		<script src="https://yandex.st/jquery-ui/1.10.4/jquery-ui.min.js"></script>
		<script>window.jQuery.ui || document.write('<script src="<?php echo URL::base()."resource/js/jquery-ui-1.10.4/js/jquery-ui-1.10.4.min.js";?>"><\/script>')</script>

	</head>

	<body>

	<!-- Шапка -->
	<div id="header">
		<p>Шапка</p>
	</div>

	<div class="container-fluid">
		<div class="row">
			<?php echo (!empty($content)) ? $content : ''; ?>

		</div>
	</div>

	<footer>
		<div class='container'>

			<p class='text-muted'>
				<a href="mailto:barbass1025@gmail.com">barbass1025@gmail.com</a>
			</p>
		</div>
	</footer>

	</body>

</html>
