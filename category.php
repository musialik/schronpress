<?php get_header(); ?>

<section class="wrapper white">

  <section class="content">

		<h1><?php single_cat_title(); ?></h1>
        
    <section class="animals">
	
	    <?php get_template_part( 'partials/_loop', 'boxes' ); ?>

    </section>

  </section>

  <?php get_sidebar(); ?>
    
</section>

<?php get_footer(); ?> 