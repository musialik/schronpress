<aside class="pager">
    <?php previous_posts_link( "Wstecz" ); ?>
    <?php if ( $paged > 0 ): ?>
    	<span class="pager-page">Strona: <?php echo $paged; ?></span>
    <?php endif; ?>
    <?php next_posts_link( "Dalej" ); ?>
</aside>