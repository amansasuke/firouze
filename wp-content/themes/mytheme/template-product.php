<?php
/**
 * Template Name: Product Page
 */

$cinnamon_hero = content_url( '/uploads/2026/07/ChatGPT-Image-Jul-12-2026-02_47_27-PM-1-2-scaled.png' );
$cinnamon_cup  = content_url( '/uploads/2026/07/bd5e540933c271213e1da99b277fefd6e1564c05.png' );
$pavilion_bg   = content_url( '/uploads/2026/07/e623358bab84b181381c659d90af66bcfa58751b-1.png' );
$green_hero    = content_url( '/uploads/2026/07/ChatGPT-Image-Jul-12-2026-02_47_27-PM-1-scaled.png' );
$black_bg      = content_url( '/uploads/2026/07/ChatGPT-Image-Jul-12-2026-02_47_27-PM-1-1-scaled.png' );
$black_cup     = content_url( '/uploads/2026/07/ba369650cc7b7486b5c765c848994b6436dcb67c-1.png' );
$black_field   = content_url( '/uploads/2026/07/412cc54f1caf5550d0a852b0e777a16156a1258c.png' );
$frame_tall    = content_url( '/uploads/2026/07/0e921a899f808ad73137d6eac8aedab5c101cfc3-1.png' );
$frame_wide    = content_url( '/uploads/2026/07/4531f10802ccb31f0a1e700bc7d2fc189b592139-1.png' );
$cardamom_hero = content_url( '/uploads/2026/07/ChatGPT-Image-Jul-12-2026-02_47_27-PM-1-3-scaled.png' );
$cardamom_about = content_url( '/uploads/2026/07/7db8a7ba5081f946a83473636dc6c99677e63c77.png' );
$cardamom_brew = content_url( '/uploads/2026/07/ff0352052163ac8368e4d8c2379ff51b819b2f6c.png' );
$saffron_hero  = content_url( '/uploads/2026/07/ChatGPT-Image-Jul-12-2026-02_47_27-PM-1-4-scaled.png' );
$saffron_scene = content_url( '/uploads/2026/07/257b0e672947120d42ea6d2e33f37a4bc17e810b-1.png' );
$saffron_brew  = content_url( '/uploads/2026/07/409ef681becb0447e1764ef2cb8eab2e349f7af9.png' );

/*
 * Illustrated icon set from the media library. The hero badges are bare gold
 * artwork; the highlight icons already carry their own gold ring, so neither
 * needs the CSS circle the entity fallbacks are drawn in.
 */
$icon = array(
	'tea_leaves' => content_url( '/uploads/2026/07/Handpicked-Leaves.png' ),
	'cinnamon'   => content_url( '/uploads/2026/07/Global-Distribution.png' ),
	'smooth'     => content_url( '/uploads/2026/07/Premium-Packaging.png' ),
	'leaf'       => content_url( '/uploads/2026/07/ri_leaf-fill.png' ),
	'health'     => content_url( '/uploads/2026/07/solar_health-bold.png' ),
	'pure'       => content_url( '/uploads/2026/07/icon-park-solid_pure-natural-1.png' ),
	'tea_cup'    => content_url( '/uploads/2026/07/solar_tea-cup-bold.png' ),
);

/*
 * Product Details icons. The six detail slots carry the same meaning on every
 * product, so the set is indexed against the specs order rather than repeated
 * in each product's data.
 */
$spec_icons = array(
	content_url( '/uploads/2026/07/ri_leaf-fill.png' ),             // Ingredients
	content_url( '/uploads/2026/07/boxicons_location-filled.png' ), // Origin
	content_url( '/uploads/2026/07/ph_medal-fill.png' ),            // Grade / Weight
	content_url( '/uploads/2026/07/ph_jar-label-fill.png' ),        // Packaging
	content_url( '/uploads/2026/07/solar_calendar-bold.png' ),      // Shelf Life
	content_url( '/uploads/2026/07/fa7-solid_jar-wheat.png' ),      // Storage
);

/*
 * Brewing Guide icons, indexed the same way: dose, water, steep, serve.
 */
$brew_icons = array(
	content_url( '/uploads/2026/07/icon-park-solid_pure-natural.png' ),      // 1 TSP
	content_url( '/uploads/2026/07/streamline-ultimate_tea-pot-bold.png' ),  // 200ML
	content_url( '/uploads/2026/07/icon-park-solid_time.png' ),              // 3-5 MINS
	content_url( '/uploads/2026/07/solar_tea-cup-bold.png' ),                // Strain & Enjoy
);

/**
 * Print one icon badge. Products carrying `icon_img` render the artwork; the
 * rest fall back to the HTML entity they have always used.
 */
$render_icon = static function ( array $item, $base_class ) {
	if ( ! empty( $item['icon_img'] ) ) {
		printf(
			'<span class="%1$s %1$s--img"><img src="%2$s" alt="" loading="lazy" decoding="async"></span>',
			esc_attr( $base_class ),
			esc_url( $item['icon_img'] )
		);
		return;
	}

	printf( '<span class="%s">%s</span>', esc_attr( $base_class ), $item['icon'] );
};

$products = array(
	'cinnamon-tea' => array(
		'name'              => 'Cinnamon Tea',
		'tagline'           => 'Warm Persian Infusion',
		'hero_image'        => $cinnamon_hero,
		'description'       => 'A comforting blend of premium Persian black tea and fragrant cinnamon, carefully crafted to deliver gentle warmth, rich aroma, and a naturally smooth finish in every cup.',
		'long_description'  => 'Firouze Cinnamon Tea combines the bold character of authentic Persian black tea with the comforting aroma of natural cinnamon. Inspired by centuries of Persian tea traditions, this carefully balanced blend delivers warmth, depth, and elegance in every sip.',
		'about_bg'          => $pavilion_bg,
		'card_frame_v'      => $frame_tall,
		'card_frame_h'      => $frame_wide,
		'features'          => array(
			array( 'icon_img' => $icon['tea_leaves'], 'label' => '100% Persian<br>Tea Leaves' ),
			array( 'icon_img' => $icon['cinnamon'], 'label' => 'Natural<br>Cinnamon' ),
			array( 'icon_img' => $icon['smooth'], 'label' => 'Smooth &amp;<br>Comforting' ),
		),
		'highlights'        => array(
			array( 'icon_img' => $icon['leaf'], 'title' => 'Warm &amp; Comforting', 'text' => 'Natural cinnamon creates a rich, cozy cup that&rsquo;s perfect for moments of relaxation.' ),
			array( 'icon_img' => $icon['health'], 'title' => 'Pure Ingredients', 'text' => 'Made with premium Persian tea leaves and carefully selected natural cinnamon.' ),
			array( 'icon_img' => $icon['pure'], 'title' => 'Rich in Antioxidants', 'text' => 'A nourishing blend naturally rich in antioxidants to support everyday wellness.' ),
			array( 'icon_img' => $icon['tea_cup'], 'title' => 'Perfect Anytime', 'text' => 'Ideal for any time of the day to refresh, relax and recharge your body.' ),
		),
		'brewing'           => array(
			array( 'icon' => '&#129348;', 'title' => '1 TSP', 'text' => 'FIROUZE Cinnamon Tea Leaves.' ),
			array( 'icon' => '&#128167;', 'title' => '200ML', 'text' => 'Boiling Water (90&ndash;95&deg;C).' ),
			array( 'icon' => '&#129750;', 'title' => '3&ndash;5 MINS', 'text' => 'Steep to Perfection.' ),
			array( 'icon' => '&#9749;', 'title' => 'Strain &amp; Enjoy', 'text' => 'Best Enjoyed Hot.' ),
		),
		'brew_photo'        => $cinnamon_cup,
		'brew_bare'         => true,
		'quote_fa'          => 'عطر اصالت، طعم ماندگار',
		'quote_en'          => 'The aroma of authenticity, the taste that lingers.',
		'specs'             => array(
			array( 'icon' => '&#127811;', 'label' => 'Ingredients', 'value' => 'Black Tea &amp; Natural Cinnamon' ),
			array( 'icon' => '&#128205;', 'label' => 'Origin', 'value' => 'Lahijan, Iran' ),
			array( 'icon' => '&#9878;', 'label' => 'Weight', 'value' => '150g' ),
			array( 'icon' => '&#127895;', 'label' => 'Packaging', 'value' => 'Premium Glass Jar' ),
			array( 'icon' => '&#8987;', 'label' => 'Shelf Life', 'value' => '24 Months' ),
			array( 'icon' => '&#128230;', 'label' => 'Storage', 'value' => 'Cool &amp; Dry Place' ),
		),
	),
	'green-tea' => array(
		'name'              => 'Green Tea',
		'tagline'           => 'Fresh &amp; Revitalizing',
		'hero_image'        => $green_hero,
		'description'       => 'Fresh, light and revitalizing tea crafted from carefully selected Persian tea leaves, delicately processed to preserve every note of freshness for a naturally uplifting cup.',
		'long_description'  => 'Grown on the misty hillsides of Lahijan and harvested at their peak, our green tea leaves are gently processed to preserve their natural freshness. Each batch is hand-inspected to ensure a light, crisp cup full of character.',
		'about_bg'          => content_url( '/uploads/2026/07/e487a95b6912e10eb3b7ce4fffd37a4a3049799d.png' ),
		'card_frame_v'      => $frame_tall,
		'card_frame_h'      => $frame_wide,
		'features'          => array(
			array( 'icon_img' => $icon['tea_leaves'], 'label' => 'Fresh &amp;<br>Light' ),
			array( 'icon_img' => $icon['cinnamon'], 'label' => 'Rich in<br>Antioxidants' ),
			array( 'icon_img' => $icon['smooth'], 'label' => '100% Pure<br>&amp; Natural' ),
		),
		'highlights'        => array(
			array( 'icon_img' => $icon['leaf'], 'title' => 'Fresh &amp; Light', 'text' => 'A crisp, delicate cup that refreshes the senses at any time of day.' ),
			array( 'icon_img' => $icon['health'], 'title' => 'Rich in Antioxidants', 'text' => 'Naturally rich in antioxidants to support everyday wellness.' ),
			array( 'icon_img' => $icon['pure'], 'title' => '100% Pure &amp; Natural', 'text' => 'Handpicked leaves with no additives, just pure Persian green tea.' ),
			array( 'icon_img' => $icon['tea_cup'], 'title' => 'Perfect Anytime', 'text' => 'Ideal for any time of the day to refresh, relax and recharge your body.' ),
		),
		'brewing'           => array(
			array( 'icon' => '&#129348;', 'title' => '1 TSP', 'text' => 'Firouze Green Tea per cup.' ),
			array( 'icon' => '&#128167;', 'title' => '75&ndash;80&deg;C Water', 'text' => 'Let boiled water cool slightly before pouring.' ),
			array( 'icon' => '&#129750;', 'title' => 'Steep 2&ndash;3 Minutes', 'text' => 'A short steep keeps the flavor light and fresh.' ),
			array( 'icon' => '&#9749;', 'title' => 'Strain &amp; Serve', 'text' => 'Enjoy warm, plain or with a touch of honey.' ),
		),
		'brew_photo'        => content_url( '/uploads/2026/07/befd6ced23b16f5aaa25a4ee869c09c9939eb048.png' ),
		'brew_bare'         => true,
		'quote_fa'          => 'گرمای فنجان، آرامش هر لحظه',
		'quote_en'          => 'The warmth of every cup brings peace to every moment.',
		'specs'             => array(
			array( 'icon' => '&#127807;', 'label' => 'Ingredients', 'value' => '100% Persian Green Tea' ),
			array( 'icon' => '&#128205;', 'label' => 'Origin', 'value' => 'Lahijan, Iran' ),
			array( 'icon' => '&#9878;', 'label' => 'Weight', 'value' => '150g' ),
			array( 'icon' => '&#127895;', 'label' => 'Packaging', 'value' => 'Premium Glass Jar' ),
			array( 'icon' => '&#8987;', 'label' => 'Shelf Life', 'value' => '24 Months' ),
			array( 'icon' => '&#128230;', 'label' => 'Storage', 'value' => 'Cool &amp; Dry Place' ),
		),
	),
	'black-tea' => array(
		'name'              => 'Black Tea',
		'tagline'           => 'Royal Persian Blend',
		'hero_image'        => $black_bg,
		'description'       => 'Firouze Special Blend Black Tea offers a bold aroma, deep amber color, and a smooth finish that transforms every cup into a timeless ritual.',
		'long_description'  => 'Our Special Blend Black Tea is inspired by centuries of Persian tea culture. Grown in the fertile hills of Lahijan and carefully processed to preserve its natural character, every leaf is selected to deliver exceptional aroma, vibrant color, and a refined taste.',
		'about_art'         => $black_field,
		'card_frame_v'      => $frame_tall,
		'card_frame_h'      => $frame_wide,
		'features'          => array(
			array( 'icon_img' => $icon['tea_leaves'], 'label' => '100% Persian<br>Tea Leaves' ),
			array( 'icon_img' => $icon['cinnamon'], 'label' => 'Naturally Rich<br>in Antioxidants' ),
			array( 'icon_img' => $icon['smooth'], 'label' => 'Bold &amp;<br>Full-Bodied' ),
		),
		'highlights'        => array(
			array( 'icon_img' => $icon['leaf'], 'title' => 'Bold &amp; Rich', 'text' => 'A deep, full-bodied tea with remarkable character and a satisfying finish.' ),
			array( 'icon_img' => $icon['health'], 'title' => 'Aromatic', 'text' => 'Delicate floral notes balanced with rich roasted aromas in every brew.' ),
			array( 'icon_img' => $icon['pure'], 'title' => 'Rich in Antioxidants', 'text' => 'Naturally abundant in antioxidants for a wholesome daily cup.' ),
			array( 'icon_img' => $icon['tea_cup'], 'title' => 'Perfect Anytime', 'text' => 'Enjoy hot during quiet mornings or iced on warm afternoons.' ),
		),
		'brewing'           => array(
			array( 'icon' => '&#129348;', 'title' => '1 TSP', 'text' => 'FIROUZE Black Tea Leaves.' ),
			array( 'icon' => '&#128167;', 'title' => '200ML', 'text' => 'Boiling Water (90&ndash;95&deg;C).' ),
			array( 'icon' => '&#129750;', 'title' => '3&ndash;5 MINS', 'text' => 'Steep to Perfection.' ),
			array( 'icon' => '&#9749;', 'title' => 'Strain &amp; Enjoy', 'text' => 'Best Enjoyed Hot.' ),
		),
		'brew_photo'        => $black_cup,
		'brew_bare'         => true,
		'quote_fa'          => 'هر فنجان چای، قصه‌ای از آرامش',
		'quote_en'          => 'Every cup of tea tells a story of serenity.',
		'specs'             => array(
			array( 'icon' => '&#127811;', 'label' => 'Ingredients', 'value' => '100% Premium Black Tea' ),
			array( 'icon' => '&#128205;', 'label' => 'Origin', 'value' => 'Lahijan, Iran' ),
			array( 'icon' => '&#127895;', 'label' => 'Grade', 'value' => 'Premium Whole Leaf' ),
			array( 'icon' => '&#127895;', 'label' => 'Packaging', 'value' => 'Premium Glass Jar' ),
			array( 'icon' => '&#8987;', 'label' => 'Shelf Life', 'value' => '24 Months' ),
			array( 'icon' => '&#128230;', 'label' => 'Storage', 'value' => 'Cool &amp; Dry Place' ),
		),
	),
	'cardamom-tea' => array(
		'name'              => 'Cardamom Tea',
		'tagline'           => 'Fresh &amp; Revitalizing',
		'hero_image'        => $cardamom_hero,
		'description'       => 'Cool, aromatic and refreshing, blended with premium Persian cardamom for a smooth, uplifting cup.',
		'long_description'  => 'Our Cardamom Tea combines the finest Persian tea leaves with hand-selected cardamom pods, creating a harmonious blend that soothes the senses, refreshes the palate, and uplifts your mood.',
		'about_bg'          => $cardamom_about,
		'card_frame_v'      => $frame_tall,
		'card_frame_h'      => $frame_wide,
		'features'          => array(
			array( 'icon_img' => $icon['tea_leaves'], 'label' => 'Premium<br>Cardamom' ),
			array( 'icon_img' => $icon['cinnamon'], 'label' => 'Refreshing &amp;<br>Aromatic' ),
			array( 'icon_img' => $icon['smooth'], 'label' => 'Smooth &amp;<br>Calming Cup' ),
		),
		'highlights'        => array(
			array( 'icon_img' => $icon['leaf'], 'title' => 'Cool &amp; Refreshing', 'text' => 'Cardamom brings a naturally cooling, refreshing lift to every cup.' ),
			array( 'icon_img' => $icon['health'], 'title' => 'Natural Goodness', 'text' => 'Made with premium Persian tea leaves and carefully selected cardamom pods.' ),
			array( 'icon_img' => $icon['pure'], 'title' => 'Aromatic &amp; Pure', 'text' => 'A fragrant blend with no additives, just pure Persian cardamom tea.' ),
			array( 'icon_img' => $icon['tea_cup'], 'title' => 'Perfect Anytime', 'text' => 'Ideal for any time of the day to refresh, relax and recharge your body.' ),
		),
		'brewing'           => array(
			array( 'icon' => '&#129348;', 'title' => '1 TSP', 'text' => 'FIROUZE Cardamom Tea Leaves.' ),
			array( 'icon' => '&#128167;', 'title' => '200ML', 'text' => 'Boiling Water (80&ndash;85&deg;C).' ),
			array( 'icon' => '&#129750;', 'title' => '2&ndash;3 MINS', 'text' => 'Steep to Perfection.' ),
			array( 'icon' => '&#9749;', 'title' => 'Strain &amp; Enjoy', 'text' => 'Best Enjoyed Hot.' ),
		),
		'brew_photo'        => $cardamom_brew,
		'brew_bg'           => true,
		'quote_fa'          => 'لحظه‌های ناب، با هر فنجان چای',
		'quote_en'          => 'Pure moments begin with every cup of tea.',
		'specs'             => array(
			array( 'icon' => '&#127811;', 'label' => 'Ingredients', 'value' => 'Black Tea &amp; Cardamom Pods' ),
			array( 'icon' => '&#128205;', 'label' => 'Origin', 'value' => 'Lahijan, Iran' ),
			array( 'icon' => '&#127895;', 'label' => 'Grade', 'value' => 'Premium Whole Leaf' ),
			array( 'icon' => '&#127895;', 'label' => 'Packaging', 'value' => 'Premium Glass Jar' ),
			array( 'icon' => '&#8987;', 'label' => 'Shelf Life', 'value' => '24 Months' ),
			array( 'icon' => '&#128230;', 'label' => 'Storage', 'value' => 'Cool &amp; Dry Place' ),
		),
	),
	'saffron-tea' => array(
		'name'              => 'Saffron Tea',
		'tagline'           => 'Fresh &amp; Revitalizing',
		'hero_image'        => $saffron_hero,
		'description'       => 'Golden, fragrant and delicately infused with premium Persian saffron for a luxurious tea experience.',
		'long_description'  => 'Our Saffron Tea is a masterpiece of nature, combining the finest Persian black tea leaves with handpicked saffron strands. The result is a golden infusion with a delicate aroma, smooth taste and uplifting warmth in every sip.',
		'about_bg'          => $saffron_scene,
		'card_frame_v'      => $frame_tall,
		'card_frame_h'      => $frame_wide,
		'features'          => array(
			array( 'icon_img' => $icon['tea_leaves'], 'label' => 'Premium<br>Saffron' ),
			array( 'icon_img' => $icon['cinnamon'], 'label' => 'Rich<br>Aroma' ),
			array( 'icon_img' => $icon['smooth'], 'label' => 'Luxurious' ),
		),
		'highlights'        => array(
			array( 'icon_img' => $icon['leaf'], 'title' => 'Premium Saffron', 'text' => 'Handpicked saffron threads sourced for their exceptional color and purity.' ),
			array( 'icon_img' => $icon['health'], 'title' => 'Rich Aroma', 'text' => 'A naturally fragrant infusion that fills every cup with warmth.' ),
			array( 'icon_img' => $icon['pure'], 'title' => 'Golden Infusion', 'text' => 'Steeps into a radiant golden hue with a smooth, delicate character.' ),
			array( 'icon_img' => $icon['tea_cup'], 'title' => 'Luxurious', 'text' => 'Perfect for the special moments that deserve a refined, elegant cup.' ),
		),
		'brewing'           => array(
			array( 'icon' => '&#129348;', 'title' => '1 TSP', 'text' => 'FIROUZE Saffron Tea Leaves.' ),
			array( 'icon' => '&#128167;', 'title' => '200ML', 'text' => 'Boiling Water (80&ndash;85&deg;C).' ),
			array( 'icon' => '&#129750;', 'title' => '2&ndash;3 MINS', 'text' => 'Steep to Perfection.' ),
			array( 'icon' => '&#9749;', 'title' => 'Strain &amp; Enjoy', 'text' => 'Golden, fragrant and luxurious.' ),
		),
		'brew_photo'        => $saffron_brew,
		'brew_bg'           => true,
		'quote_fa'          => 'میراثی از طعم، هدیه‌ای از طبیعت',
		'quote_en'          => 'A heritage of flavor, a gift from nature.',
		'specs'             => array(
			array( 'icon' => '&#127811;', 'label' => 'Ingredients', 'value' => 'Black Tea &amp; Saffron Threads' ),
			array( 'icon' => '&#128205;', 'label' => 'Origin', 'value' => 'Lahijan, Iran' ),
			array( 'icon' => '&#127895;', 'label' => 'Grade', 'value' => 'Premium Whole Leaf' ),
			array( 'icon' => '&#127895;', 'label' => 'Packaging', 'value' => 'Premium Glass Jar' ),
			array( 'icon' => '&#8987;', 'label' => 'Shelf Life', 'value' => '24 Months' ),
			array( 'icon' => '&#128230;', 'label' => 'Storage', 'value' => 'Cool &amp; Dry Place' ),
		),
	),
);

$product_slug = get_post()->post_name;
$p            = isset( $products[ $product_slug ] ) ? $products[ $product_slug ] : reset( $products );

get_header();
?>

<div class="product-page product-<?php echo esc_attr( $product_slug ); ?>">

<!-- Product Hero -->
<section class="product-hero" style="--hero-bg: url('<?php echo esc_url( $p['hero_image'] ); ?>');">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <span class="crumb-sep">&rsaquo;</span>
      <a href="<?php echo esc_url( home_url( '/#collection' ) ); ?>">Collection</a>
      <span class="crumb-sep">&rsaquo;</span>
      <span class="current"><?php echo esc_html( $p['name'] ); ?></span>
    </div>
    <div class="breadcrumb-rule"></div>

    <div class="product-hero-content">
      <p class="hero-eyebrow"><?php echo $p['tagline']; ?></p>
      <h1><?php echo esc_html( $p['name'] ); ?></h1>

      <p class="product-desc-short"><?php echo esc_html( $p['description'] ); ?></p>

      <div class="product-features">
        <?php foreach ( $p['features'] as $i => $f ) : ?>
          <?php if ( $i > 0 ) : ?><span class="feature-sep">&#10022;</span><?php endif; ?>
          <div class="product-feature">
            <?php $render_icon( $f, 'feature-icon-circle' ); ?>
            <p><?php echo $f['label']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="hero-actions">
        <a href="#wholesale-cta" class="btn btn-gold">Request Wholesale Catalogue</a>
      </div>
    </div>
  </div>

  <?php if ( ! empty( $p['hero_fg_image'] ) ) : ?>
    <img class="hero-product-cutout" src="<?php echo esc_url( $p['hero_fg_image'] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?> jar">
  <?php endif; ?>
</section>

<!-- Highlights Cards -->
<section class="product-highlights">
  <div class="container-wide">
    <div class="highlights-panel">
      <?php foreach ( $p['highlights'] as $h ) : ?>
        <div class="highlight-item">
          <?php $render_icon( $h, 'highlight-icon' ); ?>
          <h4><?php echo $h['title']; ?></h4>
          <p><?php echo $h['text']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- About + Brewing Guide Cards -->
<?php
/*
 * Optional decorative treatments, opted into per product via the data above:
 *   card_frame_v / card_frame_h  ornate gold frame (portrait / landscape art)
 *   about_art                    faint engraving bled into the about card
 *   about_bg                     full-colour photo bled into the about card
 *   brew_bare                    brewing photo as a cutout, with no frame
 *   brew_bg                      brewing photo as a full-bleed card background,
 *                                with the steps overlaid on its darker side
 * A bare/background brewing photo is wide, so the grid gains --wide.
 */
$about_classes = 'detail-card about-card';
$about_style   = '';
if ( ! empty( $p['card_frame_v'] ) ) {
	$about_classes .= ' detail-card--framed';
	$about_style   .= '--card-frame:url(' . esc_url( $p['card_frame_v'] ) . ');';
}
if ( ! empty( $p['about_bg'] ) ) {
	$about_classes .= ' about-card--photo';
	$about_style   .= '--about-art:url(' . esc_url( $p['about_bg'] ) . ');';
} elseif ( ! empty( $p['about_art'] ) ) {
	$about_classes .= ' about-card--art';
	$about_style   .= '--about-art:url(' . esc_url( $p['about_art'] ) . ');';
}

$brew_classes = 'detail-card brew-card';
$brew_style   = '';
if ( ! empty( $p['card_frame_h'] ) ) {
	$brew_classes .= ' detail-card--framed';
	$brew_style   .= '--card-frame:url(' . esc_url( $p['card_frame_h'] ) . ');';
}
if ( ! empty( $p['brew_bg'] ) ) {
	$brew_classes .= ' brew-card--bg';
	$brew_style   .= '--brew-bg:url(' . esc_url( $p['brew_photo'] ) . ');';
}

$brew_photo_classes = 'brew-photo';
if ( ! empty( $p['brew_bare'] ) ) {
	$brew_photo_classes .= ' brew-photo--bare';
} elseif ( ! empty( $p['brew_contain'] ) ) {
	$brew_photo_classes .= ' brew-photo--contain';
}

$grid_classes = 'container-wide product-detail-grid';
if ( ! empty( $p['brew_bare'] ) || ! empty( $p['brew_bg'] ) ) {
	$grid_classes .= ' product-detail-grid--wide';
}
?>
<section class="product-detail-section">
  <div class="<?php echo esc_attr( $grid_classes ); ?>">
    <div class="<?php echo esc_attr( $about_classes ); ?>"<?php echo $about_style ? ' style="' . esc_attr( $about_style ) . '"' : ''; ?>>
      <h2>Firouze<br><?php echo esc_html( $p['name'] ); ?></h2>
      <div class="card-rule"></div>
      <p><?php echo esc_html( $p['long_description'] ); ?></p>
      <?php if ( ! empty( $p['about_image'] ) ) : ?>
        <div class="about-photo-frame">
          <img class="about-photo" src="<?php echo esc_url( $p['about_image'] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?> garden">
        </div>
      <?php endif; ?>
    </div>

    <div class="<?php echo esc_attr( $brew_classes ); ?>"<?php echo $brew_style ? ' style="' . esc_attr( $brew_style ) . '"' : ''; ?>>
      <div class="brew-info">
        <h2>Brewing<br>Guide</h2>
        <div class="card-rule"></div>
        <div class="brewing-steps">
          <?php foreach ( $p['brewing'] as $i => $step ) : ?>
            <?php $step['icon_img'] = isset( $brew_icons[ $i ] ) ? $brew_icons[ $i ] : ''; ?>
            <div class="brewing-step">
              <?php $render_icon( $step, 'step-icon' ); ?>
              <div>
                <h4><?php echo $step['title']; ?></h4>
                <p><?php echo $step['text']; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php if ( empty( $p['brew_bg'] ) ) : // brew_bg paints the photo as the card background, so no <img> needed ?>
      <div class="<?php echo esc_attr( $brew_photo_classes ); ?>">
        <img
          src="<?php echo esc_url( $p['brew_photo'] ); ?>"
          alt="<?php echo esc_attr( $p['name'] ); ?>"
          <?php if ( empty( $p['brew_contain'] ) && empty( $p['brew_bare'] ) && ! empty( $p['brew_photo_pos'] ) ) : ?>style="object-position: <?php echo esc_attr( $p['brew_photo_pos'] ); ?>;"<?php endif; ?>
        >
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Quote Banner -->
<section class="quote-banner">
  <div class="container">
    <p class="quote-fa"><?php echo esc_html( $p['quote_fa'] ); ?></p>
    <p class="quote-en"><?php echo esc_html( $p['quote_en'] ); ?></p>
  </div>
</section>

<!-- Product Details -->
<section class="product-specs-section">
  <div class="container-wide">
    <div class="specs-panel">
      <h2 class="specs-title">Product Details</h2>
      <div class="product-specs-grid">
        <?php foreach ( $p['specs'] as $i => $spec ) : ?>
          <?php $spec['icon_img'] = isset( $spec_icons[ $i ] ) ? $spec_icons[ $i ] : ''; ?>
          <div class="spec-item">
            <?php $render_icon( $spec, 'spec-icon' ); ?>
            <p class="spec-label"><?php echo esc_html( $spec['label'] ); ?></p>
            <p class="spec-value"><?php echo $spec['value']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="product-cta-section" id="wholesale-cta">
  <div class="container">
    <a href="mailto:sales@firouze.ca" class="btn btn-gold">Request Wholesale Catalogue</a>
  </div>
</section>

</div><!-- .product-page -->

<?php get_footer(); ?>
