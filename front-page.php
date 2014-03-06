<?php get_header(); ?>

<section class="wrapper white">

    <?php 
        // Get sticky posts
        $sticky = get_option( 'sticky_posts' );
        // Get top 5 sticky posts
        $sticky = array_slice( $sticky, 0, 5 );
        // Query sticky posts
        $carousel = new WP_Query( array(
            'post__in' => $sticky,
            'ignore_sticky_posts' => 1
        ) );
    ?>

    <?php if ( $carousel->have_posts() ) : ?>

        <div class="carousel-container">
            

            <section class="carousel" id="carousel">
            
                <?php while ( $carousel->have_posts() ) : $carousel->the_post() ?>

                    <article class="carousel-item">
                        <?php the_thumbnail_or_placeholder( 'img-single', 'carousel-item-img' ); ?>
                        <section class="carousel-item-content-box">
                            <div class="carousel-item-content">
                                <h2 class="carousel-item-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </section>
                    </article>

                <?php endwhile; ?>

            </section>          

            <a class="carousel-prev" id="carousel-prev" href="#"><span>wstecz</span></a>
            <a class="carousel-next" id="carousel-next" href="#"><span>dalej</span></a>

        </div>

        

    <?php endif; ?>


    <section class="news">

        <?php $news_url = get_category_link( get_cat_ID( 'aktualnosci' ) ); ?>
        <h2 class="fp-header">Aktualności <a href="<?php echo $news_url; ?>">Przeglądaj wszystkie</a></h2>

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
                    <a href="<?php the_permalink(); ?>" class="box-link">
                        <div class="overlay"></div>
                        <div class="box-img-container">
                            <?php the_thumbnail_or_placeholder( 'img-medium', 'news-item-img' ); ?>
                        </div>
                        <h3 class="box-item-header"><?php the_title(); ?></h3>
                        <div class="news-item-content"><?php the_excerpt(); ?></div>
                    </a>
                </article>

            <?php endwhile; ?>
        <?php endif; ?>
        
    </section>


    <section class="adoptions">

        <h2 class="fp-header">Zwierzęta do adopcji</h2>

        <?php 
            /*
             * Display latest post from each of the adoption categories
             */
            $categories = array( 
                'psy' => 'psy do adopcji',
                'szczeniaki' => 'szczeniaki',
                'koty' => 'koty do adopcji',
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
                        <a href="<?php the_permalink(); ?>" class="box-link">
                            <div class="overlay"></div>
                            <div class="box-img-container">
                                <?php the_thumbnail_or_placeholder( 'img-small', 'adoptions-item-img' ); ?>
                            </div>
                            <h3 class="box-item-header"><?php the_title(); ?></h3>
                            <div class="adoptions-item-content">
                                <?php the_short_excerpt(); ?>
                                <?php $category_url = get_category_link( get_cat_ID( $category_slug ) ); ?>
                                <a href="<?php echo $category_url; ?>" class="adoptions-item-more-link">Wszystkie <?php echo $link_text; ?>...</a>
                            </div>
                        </a>
                    </article>

            <?php endif; ?>

        <?php endforeach; ?>

    </section>

</section>

<?php get_footer(); ?> 