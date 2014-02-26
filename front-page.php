<?php get_header(); ?>

<section class="wrapper white">

  <section class="carousel">

    <article class="carousel-item">
      <img src="http://lorempixel.com/620/350/cats/8" alt="" class="carousel-item-img">
      <section class="carousel-item-content-box">
        <div class="carousel-item-content">
          <h1>Test</h1>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#">Something more</a>
        </div>
      </section>
    </article>

    <article class="carousel-item">
      <img src="http://lorempixel.com/620/350/cats/9" alt="" class="carousel-item-img">
      <section class="carousel-item-content-box">
        <div class="carousel-item-content">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </div>
      </section>
    </article>

    <article class="carousel-item">
      <img src="http://lorempixel.com/620/350/cats/10" alt="" class="carousel-item-img">
      <section class="carousel-item-content-box">
        <div class="carousel-item-content">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </div>
      </section>
    </article>

  </section>


  <section class="news">

    <?php $news_url = get_category_link( get_cat_ID( 'aktualnosci' ) ); ?>
    <h2 class="fp-header">Aktualności <a href="<?php echo $news_url; ?>">Przeglądaj wszystkie</a></h2>

    <?php get_template_part( 'partials/_loop', 'fp_news' ); ?>
    
  </section>


  <section class="adoptions">

    <h2 class="fp-header">Zwierzęta do adopcji</h2>

    <?php get_template_part( 'partials/_loop', 'fp_adoptions' ); ?>

  </section>

</section>

<?php get_footer(); ?> 