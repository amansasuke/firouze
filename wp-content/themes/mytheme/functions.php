<?php
function mytheme_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'custom-logo' );

  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'mytheme' ),
  ) );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

function mytheme_styles() {
  wp_enqueue_style(
    'mytheme-fonts',
    'https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Playfair+Display:wght@400;500;600&display=swap',
    array(),
    null
  );
  wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array( 'mytheme-fonts' ), filemtime( get_stylesheet_directory() . '/style.css' ) );

  wp_enqueue_script(
    'mytheme-main',
    get_template_directory_uri() . '/assets/js/main.js',
    array(),
    filemtime( get_stylesheet_directory() . '/assets/js/main.js' ),
    true
  );
}
add_action( 'wp_enqueue_scripts', 'mytheme_styles' );

/*
 * On product pages, mirror the theme class onto <body> so the per-tea colour
 * variables (--pp-*) cascade to shared components that live outside the
 * .product-page wrapper (e.g. the footer), keeping each page's palette
 * consistent top to bottom. The homepage is unaffected and keeps its own look.
 */
function mytheme_body_classes( $classes ) {
	if ( is_page_template( 'template-product.php' ) && is_singular() ) {
		$classes[] = 'is-product';
		$classes[] = 'product-' . get_post()->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'mytheme_body_classes' );

/* Default menu shown until a Primary Menu is assigned in Appearance → Menus */
function mytheme_nav_fallback() {
  $items = array( 'Story', 'Collection', 'Heritage', 'Wholesale', 'Gallery', 'Contact' );
  echo '<ul>';
  foreach ( $items as $item ) {
    printf( '<li><a href="#%s">%s</a></li>', esc_attr( strtolower( $item ) ), esc_html( $item ) );
  }
  echo '</ul>';
}
