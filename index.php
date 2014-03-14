<?php get_header(); ?>

<section class="wrapper white">

	<section class="content no-header">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article class="entry">

					<div class="entry-title">
						<span class="meta-category"><?php the_category( ', ' ); ?></span>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
						<span class="meta-date"><?php echo get_the_date('j F Y'); ?></span>
					</div>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'index-thumbnail alignright' ) ); ?>
					<?php endif; ?>

					<!-- <img src="http://lorempixel.com/220/145/cats/5" alt="" class="index-thumbnail"> -->

					<?php // the_content( 'Czytaj dalej...' ); ?>

					<?php the_excerpt(); ?>

					<?php /*
					<div class="meta">Dodano: <?php echo get_the_date('j F Y'); ?>, kategoria: <?php the_category( ', ' ); ?></div>
					*/ ?>

				</article>

			<?php endwhile; ?>

			<?php get_template_part( 'lib/partials/_pagination' ); ?>

		<?php else : ?>

			Nic nie znaleziono

		<?php endif; ?>

	</section>

	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>