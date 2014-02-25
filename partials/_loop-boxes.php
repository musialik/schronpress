<?php if ( have_posts() ) : ?>
  
  <?php while ( have_posts() ) : the_post(); ?>
    
    <article class="animal">

      <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="box-link">
        <div class="overlay"></div>
        <?php the_post_thumbnail( 'img-small', array( 'class' => 'animal-img' ) ); ?>
        <h2 class="box-item-header"><?php the_title() ?></h2>
        <div class="animal-content"><?php the_excerpt() ?></div>
      </a>

    </article>

  <?php endwhile; ?>
  
  <?php get_template_part( 'partials/_pagination' ); ?>

<?php else : ?>

  Nic nie znaleziono

<?php endif; ?>
