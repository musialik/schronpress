<section class="sidebar">

	<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	<?php else: ?>
		<aside class="sidebar-widget">
			<h4 class="sidebar-header">Inne zwierzęta</h4>
			<ul class="sidebar-content">
				<li><a href="#">Psy do adopcji</a></li>
				<li><a href="#">Szczeniaki</a></li>
				<li><a href="#">Koty do adopcji</a></li>
				<li><a href="#">Kocięta</a></li>
				<li><a href="#">Adoptowane</a></li>
			</ul>
		</aside>

		<aside class="sidebar-widget">
			<h4 class="sidebar-header">Inne kategorie</h4>
			<ul class="sidebar-content">
				<li><a href="#">Wydarzenia</a></li>
				<li><a href="#">Rozprawy</a></li>
				<li><a href="#">Podziękowania</a></li>
				<li><a href="#">Ogłoszenia</a></li>
			</ul>
		</aside>
	<?php endif; ?>

</section>