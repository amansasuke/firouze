# Create a Custom WordPress Theme with a Custom Home Page

> WordPress is already installed and connected to the database — this guide only covers building the theme and home page.

---

## Step 1: Create the Theme Folder

Go to your WordPress themes directory:

```
C:\xampp\htdocs\<your-site>\wp-content\themes\
```

Create a new folder:

```
mytheme/
```

Inside it, create these files:

```
mytheme/
├── style.css          → theme info + all styles (required)
├── index.php          → fallback template (required)
├── front-page.php     → your custom HOME PAGE
├── header.php         → site header
├── footer.php         → site footer
└── functions.php      → theme setup
```

---

## Step 2: style.css

The comment block at the top is what makes WordPress recognize your theme:

```css
/*
Theme Name: My Custom Theme
Author: Your Name
Description: Custom theme with a custom home page.
Version: 1.0
Text Domain: mytheme
*/

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Arial, sans-serif;
  line-height: 1.6;
  color: #333;
}

.container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 20px;
}

/* ---- Header ---- */
.site-header {
  background: #1a1a2e;
  color: #fff;
  padding: 20px 0;
}

.site-header .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.site-header a {
  color: #fff;
  text-decoration: none;
}

.main-nav ul {
  display: flex;
  gap: 24px;
  list-style: none;
}

/* ---- Hero (Home Page) ---- */
.hero {
  background: linear-gradient(135deg, #1a1a2e, #16213e);
  color: #fff;
  text-align: center;
  padding: 100px 20px;
}

.hero h1 {
  font-size: 2.8rem;
  margin-bottom: 16px;
}

.hero .btn {
  display: inline-block;
  margin-top: 24px;
  padding: 12px 32px;
  background: #e94560;
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
}

/* ---- Sections & Cards ---- */
.section {
  padding: 60px 0;
}

.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 24px;
  margin-top: 32px;
}

.card {
  background: #f5f5f5;
  padding: 24px;
  border-radius: 8px;
}

/* ---- Footer ---- */
.site-footer {
  background: #1a1a2e;
  color: #fff;
  text-align: center;
  padding: 24px 0;
  margin-top: 60px;
}
```

---

## Step 3: header.php

```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="container">
    <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
    <nav class="main-nav">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'fallback_cb'    => false,
      ) );
      ?>
    </nav>
  </div>
</header>
```

---

## Step 4: footer.php

```php
<footer class="site-footer">
  <div class="container">
    <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
```

---

## Step 5: functions.php

```php
<?php
function mytheme_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );

  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'mytheme' ),
  ) );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

function mytheme_styles() {
  wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'mytheme_styles' );
```

---

## Step 6: front-page.php — YOUR CUSTOM HOME PAGE ⭐

WordPress **automatically** uses `front-page.php` as the home page. No settings needed.

```php
<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero">
  <div class="container">
    <h1>Welcome to <?php bloginfo( 'name' ); ?></h1>
    <p><?php bloginfo( 'description' ); ?></p>
    <a href="#services" class="btn">Get Started</a>
  </div>
</section>

<!-- Services Section -->
<section class="section" id="services">
  <div class="container">
    <h2>Our Services</h2>
    <div class="cards">
      <div class="card">
        <h3>Web Design</h3>
        <p>Beautiful, responsive websites for your business.</p>
      </div>
      <div class="card">
        <h3>Development</h3>
        <p>Custom WordPress themes and plugins.</p>
      </div>
      <div class="card">
        <h3>SEO</h3>
        <p>Get found on search engines and grow traffic.</p>
      </div>
    </div>
  </div>
</section>

<!-- Latest Posts -->
<section class="section">
  <div class="container">
    <h2>Latest Posts</h2>
    <div class="cards">
      <?php
      $latest = new WP_Query( array( 'posts_per_page' => 3 ) );
      if ( $latest->have_posts() ) :
        while ( $latest->have_posts() ) : $latest->the_post();
      ?>
        <div class="card">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
```

---

## Step 7: index.php (Required Fallback)

WordPress requires this file to exist:

```php
<?php get_header(); ?>

<main class="section">
  <div class="container">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
    ?>
      <article>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
      </article>
    <?php
      endwhile;
    else :
      echo '<p>No content found.</p>';
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>
```

---

## Step 8: Activate the Theme

1. Open `http://localhost/<your-site>/wp-admin`
2. Go to **Appearance → Themes**
3. Click **Activate** on **My Custom Theme**
4. Visit `http://localhost/<your-site>` → your custom home page is live 🎉

**Optional — add a menu:** Appearance → Menus → create menu → check **Primary Menu** location → Save.

---

## Quick Fixes

| Problem | Fix |
|---|---|
| Theme not listed in admin | `style.css` must have the comment header at the top |
| Blank page | Set `define( 'WP_DEBUG', true );` in `wp-config.php` to see errors |
| CSS not loading | `wp_head()` must be in header.php, `wp_footer()` in footer.php |
| Home page shows blog instead | Make sure the file is named exactly `front-page.php` |
