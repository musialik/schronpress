<?php if ( have_posts() ) : ?>
  
  <?php while ( have_posts() ) : the_post(); ?>
    
    <article class="entry">

      <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>

      <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'img-single', array( 'class' => 'single-thumbnail' ) ); ?>
      <?php endif; ?>

      <!-- <img src="http://lorempixel.com/220/145/cats/5" alt="" class="index-thumbnail"> -->

      <?php the_content( 'Czytaj dalej...' ); ?>

      <div class="meta">Dodano: <?php echo get_the_date('j F Y'); ?>, kategoria: <?php the_category( ', ' ); ?></div>

    </article>

  <?php endwhile; ?>
  
  <?php get_template_part( 'partials/_pagination' ); ?>

<?php else : ?>

  Nic nie znaleziono

<?php endif; ?>