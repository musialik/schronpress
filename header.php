<?php $template_url = get_bloginfo('template_url'); ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|Open+Sans:400,300,600,700,800&subset=latin,latin-ext" rel="stylesheet" type="text/css">
  </head>
  <body>

    <header class="wrapper">
      <a href="<?php bloginfo( 'url' ); ?>">
        <img src="<?php echo $template_url; ?>/img/otoz-animals-oswiecim-logo.png" alt="OTOZ Animals Oświęcim logo">
      </a>
    </header>

    <?php get_template_part( 'partials/_navbar' ); ?>

    <div class="content-bg">