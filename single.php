<?php get_header(); ?>

<section class="wrapper white">

    <section class="content">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <article class="entry single">

                    <div class="single-entry-title">
                        <span class="meta-category"><?php echo the_category(', '); ?></span>
                        <h1><?php the_title() ?></h1>
                        <span class="meta-date"><?php echo get_the_date('j F Y'); ?></span>
                        <div class="fb-like fb-like-top" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div>
                    </div>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'img-single', array( 'class' => 'single-thumbnail' ) ); ?>
                    <?php endif; ?>

                    <?php the_content(); ?>

                </article>

                <div class="fb-like fb-like-bottom" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="recommend" data-show-faces="true" data-share="true"></div>

                <?php get_template_part( 'lib/partials/_pagination', 'single' ); ?>

            <?php endwhile; ?>

        <?php else : ?>

            Nic nie znaleziono

        <?php endif; ?>

    </section>

    <?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>