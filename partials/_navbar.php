<?php if ( has_nav_menu( 'navbar' ) ) : ?>
  
  <section class="navbar-bg">

    <?php wp_nav_menu( array(
      'theme_location'  => 'navbar',
      'container'       => 'nav',
      'container_class' => 'navbar wrapper',
    ) ); ?>

  </section>

<?php else : ?>

  <section class="navbar-bg">

    <nav class="navbar wrapper">
      <ul>
        <li><a href="#">Główna</a></li>
        <li><a href="#">Kontakt</a></li>
        <li>
          <a href="#">Zwierzęta</a>
          <ul>
            <li><a href="#">Psy do adopcji</a></li>
            <li><a href="#">Szczeniaki</a></li>
            <li><a href="#">Koty do adopcji</a></li>
            <li><a href="#">Kocięta</a></li>
            <li><a href="#">Znalazły dom</a></li>
            <li><a href="#">Za tęczowym mostem</a></li>
            <li><a href="#">Zaginione zwierzęta ogłoszenia</a></li>
          </ul>
        </li>
        <li><a href="#">Inspektorat</a></li>
        <li><a href="#">Wolontariat</a></li>
        <li><a href="#">Darczyncy</a></li>
        <li><a href="#">1% Podatku</a></li>
        <li><a href="#">Informacje adopcyjne</a></li>
      </ul>
    </nav>

  </section>

<?php endif; ?>


