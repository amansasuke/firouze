<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="header-bar">
    <div class="site-branding">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <span class="logo-fa">فیروزه</span>
          <span class="logo-en"><?php bloginfo( 'name' ); ?></span>
        </a>
      <?php endif; ?>
    </div>
    <nav class="main-nav">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'fallback_cb'    => 'mytheme_nav_fallback',
      ) );
      ?>
    </nav>
  </div>
</header>
