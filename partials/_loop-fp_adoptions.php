<?php 
  /*
   * Display latest post from each of the adoption categories
   */
  $categories = array( 
    'psy' => 'psy-do-adopcji',
    'szczeniaki' => 'szczeniaki',
    'koty' => 'koty-do-adopcji',
    'kocięta' => 'kocieta'
  );

  foreach ( $categories as $link_text => $category_slug ) :
    $category = new WP_Query( array(
      'category_name' => $category_slug,
      'ignore_sticky_posts' => 1,
      'posts_per_page' => 1
    ) );

?>

  <?php if ( $category->have_posts() ) : $category->the_post() ?>

      <article class="adoptions-item">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-link">
          <div class="overlay"></div>
          <?php the_thumbnail_or_placeholder( 'img-small', 'adoptions-item-img' ); ?>
          <h3 class="box-item-header"><?php the_title(); ?></h3>
          <div class="adoptions-item-content">
            <?php the_short_excerpt(); ?>
            <?php $category_url = get_category_link( get_cat_ID( $category_slug ) ); ?>
            <a href="<?php echo $category_url; ?>">Wszystkie <?php echo $link_text; ?>...</a>
          </div>
        </a>
      </article>

  <?php endif; ?>

<?php endforeach; ?>