<?php get_header(); ?>

<section class="wrapper white">

    <section class="content">

        <?php if ( have_posts() ) : ?>
    
            <?php while ( have_posts() ) : the_post(); ?>
                
                <article class="entry">
    
                    <h1><?php the_title() ?></h1>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'img-single', array( 'class' => 'single-thumbnail' ) ); ?>
                    <?php endif; ?>

                    <?php the_content(); ?>

                    <div class="meta">Dodano: <?php echo get_the_date('j F Y'); ?>, kategoria: <?php the_category( ', ' ); ?></div>

                </article>

            <?php endwhile; ?>
            
            <?php get_template_part( 'partials/_pagination' ); ?>

        <?php else : ?>

            Nic nie znaleziono

        <?php endif; ?>

    </section>

    <?php get_sidebar(); ?>
        
</section>

<?php get_footer(); ?> 