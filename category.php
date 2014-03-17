<?php get_header(); ?>

<section class="wrapper white">

	<section class="content">

		<h1 class="archive-header"><?php single_cat_title(); ?></h1>

	</section>

  	<?php get_sidebar(); ?>

	<section class="boxes boxes3">

		<?php if ( have_posts() ) : ?>

			  <?php while ( have_posts() ) : the_post(); ?>

				<article class="box3">

					<a href="<?php the_permalink(); ?>" class="box-link">
						<div class="overlay"></div>
						<div class="box-img-container">
							<?php the_thumbnail_or_placeholder( 'img-small', 'box3-img' ); ?>
						</div>
						<h2 class="box-item-header"><?php the_title(); ?></h2>
						<div class="box3-content"><?php the_short_excerpt(); ?></div>
						<span class="box-date"><?php echo get_the_date('j F Y'); ?></span>
					</a>

				</article>

			  <?php endwhile; ?>

			  <?php get_template_part( 'lib/partials/_pagination' ); ?>

			<?php else : ?>

				Nic nie znaleziono

			<?php endif; ?>

	</section>

</section>

<?php get_footer(); ?>