<?php
/*
Template Name: Nowo przybyłe
*/
?>

<?php
  $ids = array_map('get_cat_ID', ['psy do adopcji', 'szczeniaki', 'koty do adopcji', 'kocieta']);

  $query = new WP_Query( array(
    'category__in' => $ids,
    'ignore_sticky_posts' => 1,
    'posts_per_page' => 12,
    'orderby' => 'modified'
  ) );
?>

<?php get_header(); ?>

<section class="wrapper white">

  <section class="content">

    <h1 class="archive-header"><?php the_title(); ?></h1>

  </section>

    <?php get_sidebar(); ?>

  <section class="boxes boxes3">

    <?php if ( $query->have_posts() ) : ?>

        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

        <article class="box3">

          <a href="<?php the_permalink(); ?>" class="box-link">
            <div class="overlay"></div>
            <div class="box-img-container">
              <?php the_thumbnail_or_placeholder( 'img-small', 'box3-img' ); ?>
            </div>
            <h2 class="box-item-header"><?php the_title(); ?></h2>
            <div class="box3-content"><?php the_short_excerpt(); ?></div>
            <span class="box-date"><?php the_modified_date('j F Y'); ?></span>
          </a>

        </article>

        <?php endwhile; ?>

        <?php get_template_part( 'partials/_pagination' ); ?>

      <?php else : ?>

        Nic nie znaleziono

      <?php endif; ?>

  </section>

</section>

<?php get_footer(); ?>
