<?php 
  $aktualnosci = new WP_Query( array(
    'category_name' => 'aktualnosci',
    'ignore_sticky_posts' => 1,
    'posts_per_page' => 3
  ) );
?>

<?php if ( $aktualnosci->have_posts() ) : ?>
  <?php while ( $aktualnosci->have_posts() ) : $aktualnosci->the_post() ?>

    <article class="news-item">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-link">
        <div class="overlay"></div>
        <?php the_thumbnail_or_placeholder( 'img-medium', 'news-item-img' ); ?>
        <h3 class="box-item-header"><?php the_title(); ?></h3>
        <div class="news-item-content"><?php the_excerpt(); ?></div>
      </a>
    </article>

  <?php endwhile; ?>
<?php endif; ?>
