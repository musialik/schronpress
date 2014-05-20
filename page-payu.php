<?php
/*
Template Name: Payu
*/
?>

<?php get_header(); ?>

<section class="wrapper white">

  <section class="content">

    <?php if ( have_posts() ) : ?>

      <?php while ( have_posts() ) : the_post(); ?>

        <article class="entry page">

          <div class="single-entry-title">
            <h1><?php the_title() ?></h1>
          </div>

          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'img-single', array( 'class' => 'single-thumbnail' ) ); ?>
          <?php endif; ?>

          <?php the_content(); ?>

          <?php require('lib/payu.php');  ?>

          <?php if (isset($_POST['kwota']) && $_POST['kwota'] > 0 ) : ?>
            <?php
            $amount = str_replace(',', '.', $_POST['kwota']);
            $amount = floatval($amount) * 100;
            $form = array(
              'CustomerIp'                    => $_SERVER['REMOTE_ADDR'], 
              'MerchantPosId'                 => '168043', 
              'Description'                   => 'Darowizny',
              'TotalAmount'                   => $amount, 
              'CurrencyCode'                  => 'PLN',
              'Products.Product[0].Name'      => 'Darowizna',
              'Products.Product[0].UnitPrice' => $amount,
              'Products.Product[0].Quantity'  => '1'
            ); ?>

            <form method="POST" action="https://secure.payu.com/api/v2/orders">
              <?php foreach ($form as $name => $value) : ?>
                <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
              <?php endforeach; ?>
              <input type="hidden" name="OpenPayu-Signature" value="<?php echo generate_signature($form, '126e6435f9276cb659ab90a192ec4cc1', '168043'); ?>">
              <p>
                Kwota do przekazania: <?php echo number_format($amount/100, 2, ",", " ") . 'zł'; ?>  
              </p>
              <p>
                <button type="submit" class="btn-payu"></button>
              </p>
            </form>
          <?php elseif ( isset($_POST['kwota']) ) : ?>
            <p>Podano niepoprawną kwotę. Wpisz poprawną kwotę w formularzu w prawym górnym rogu.<small></p>
          <?php else : ?>
            <p>Wpisz kwotę darowizny w formularzu w prawym górnym rogu.</p>
          <?php endif; ?>

        <img src="<?php bloginfo('template_url'); ?>/assets/images/payu-banki-660.png" alt="" class="payu-banki">

        </article>

      <?php endwhile; ?>

    <?php else : ?>

      Nic nie znaleziono

    <?php endif; ?>

  </section>

  <?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>