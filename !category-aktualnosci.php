<?php get_header(); ?>

<section class="wrapper white">

	<section class="content">

		<h1 class="archive-header"><?php single_cat_title(); ?></h1>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article class="entry">

					<div class="entry-title">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
						<span class="meta-date"><?php echo get_the_date('j F Y'); ?></span>
					</div>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'index-thumbnail alignleft' ) ); ?>
					<?php endif; ?>

					<?php the_content('Czytaj dalej'); ?>

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