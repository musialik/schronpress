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

				</article>

			<?php endwhile; ?>

		<?php else : ?>

			Nic nie znaleziono

		<?php endif; ?>

	</section>

	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>