<?php get_header(); ?>

<section class="wrapper white">

  <section class="content">

		<h1><?php single_cat_title(); ?></h1>
        
    <section class="animals">
	
	    <?php if ( have_posts() ) : ?>
  
			  <?php while ( have_posts() ) : the_post(); ?>
			    
			    <article class="animal">

			      <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="box-link">
			        <div class="overlay"></div>
			        <div class="box-img-container">
				        <?php the_thumbnail_or_placeholder( 'img-small', 'animal-img' ); ?>
			        </div>
			        <h2 class="box-item-header"><?php the_title(); ?></h2>
			        <div class="animal-content"><?php the_short_excerpt(); ?></div>
			      </a>

			    </article>

			  <?php endwhile; ?>
			  
			  <?php get_template_part( 'partials/_pagination' ); ?>

			<?php else : ?>

			  Nic nie znaleziono

			<?php endif; ?>
			
    </section>

  </section>

  <?php get_sidebar(); ?>
    
</section>

<?php get_footer(); ?> 