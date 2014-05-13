<?php $template_url = get_bloginfo('template_url'); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<title><?php wp_title(); ?></title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,700,800&subset=latin-ext" rel="stylesheet" type="text/css">
		<?php wp_head(); ?>
	</head>
	<body>

		<header class="wrapper header">
			<a href="<?php bloginfo( 'url' ); ?>" class="header-left-widget">
				<img src="<?php echo $template_url; ?>/assets/images/otoz-animals-oswiecim-logo.png" alt="OTOZ Animals Oświęcim logo">
			</a>
		<!-- 	<a href="<?php bloginfo( 'url' ); ?>/1-procent/" class="right header-right-widget">
				<img src="<?php echo $template_url; ?>/assets/images/1procent-header-widget.jpg" alt="1 procent na schronisko">
			</a> -->
			<?php if (!isset($_POST['kwota'])) : ?>
				<aside class="right header-right-widget payu-widget">
					<form action="/payu" method="post">
		              	<input type="currency" name="kwota" class="kwota" placeholder="wpisz kwotę">
		              	<br>
		              	<button type="submit" value="" class="">Przekaż darowiznę</button>
		            </form>
				</aside>
			<?php endif; ?>
		</header>

		<?php get_template_part( 'lib/partials/_navbar' ); ?>

		<div class="content-bg">