<?php

/**
 * Template Name: Home Page 2025
 *
 * @package US Three
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<section class="container-fw iso-bg">
    <div class="container home-hero">
        <div class="row">
            <div class="col-md-6 hero-content">
                <h1 class="site-tagline"><?php echo esc_html(get_bloginfo('description')); ?></h1>
                <h2><?php echo wp_kses_post(get_field('hero_heading')); ?></h2>
                <div class="intro">
                    <?php
                    $hero_intro = get_field('hero_intro');
                    if ($hero_intro) {
                        echo wp_kses_post($hero_intro);
                    }
                    ?>
                </div>
                <div class="button-box">
                    <?php
                    if (get_field('button_link') && get_field('button_text')) {
                        $button_link = esc_url(get_field('button_link'));
                        $button_text = esc_html(get_field('button_text'));
                        echo '<a href="' . $button_link . '" class="spark-btn"><span>' . $button_text . '</span></a>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6 hero-gallery-area">
                <?php
                $gallery_images = get_field('hero_gallery');
                if ($gallery_images) : ?>
                    <div class="my-hero-slider owl-carousel">
                        <?php foreach ($gallery_images as $gallery_image) :
                            // Fallback alt text if not set
                            $alt_text = ! empty($gallery_image['alt']) ? $gallery_image['alt'] : 'Default alt text';
                        ?>
                            <div class="item">
                                <img
                                    src="<?php echo esc_url($gallery_image['url']); ?>"
                                    alt="<?php echo esc_attr($alt_text); ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- .row -->
    </div>
</section>

<!-- Services -->
<?php get_template_part('template-parts/services'); ?>

<!-- Home Gallery -->
<?php
// Fetch images from an ACF gallery field named 'home_gallery'
$images = get_field('home_gallery');

// Only proceed if we have images
if ($images && is_array($images)) :
?>
<section class="container-fw services-container iso-bg">
    <div class="container">
        <div class="align-center">
            <h2>Some Recent Work</h2>
        </div>
    </div>
    <div class="container cgs-gallery-cards">
        <div class="row">
        <?php
        // Loop through up to 6 images
        foreach ($images as $index => $image):
            if ($index >= 6) break;

            // ACF Gallery items generally come with 'url', 'title', 'caption', 'description', etc.
            $img_url     = $image['url'];
            $img_title   = $image['title'];         // This is often the image’s own title.
            $img_desc    = $image['description'];   // This is often the image’s own description field.

            // If you’re storing a separate Title/Description in custom fields, you can reference them here instead
        ?>
            <!-- Card -->
            <div class="col-md-4 cgs-card" data-modal="modal-<?php echo $index; ?>">
                <div class="card-image">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_title); ?>" />
                </div>
                <h2 class="card-title"><?php echo esc_html($img_title); ?></h2>
                <p class="card-description"><?php echo esc_html($img_desc); ?></p>
            </div>

            <!-- Corresponding Modal -->
            <div class="cgs-modal" id="modal-<?php echo $index; ?>">
                <div class="modal-overlay" data-close="modal-<?php echo $index; ?>"></div>
                <div class="modal-content">
                    <button class="modal-close" data-close="modal-<?php echo $index; ?>">×</button>

                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_title); ?>" />
                    <h2><?php echo esc_html($img_title); ?></h2>
                    <p><?php echo esc_html($img_desc); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <a class="spark-btn align-center mt30" href="/work"><span>See More Recent Work</span></a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Solution -->
<section class="container-fw solution-container light-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-5 solution-image">
                <?php
                $solution_image = get_field('about_image');
                if ($solution_image) {
                    $image_url = $solution_image['url'];
                    $alt_text = !empty($solution_image['alt']) ? $solution_image['alt'] : 'Chris Hurst, Marketing and Web Development'; // Fallback alt text if none is provided
                    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '">';
                }
                ?>
            </div>
            <div class="col-md-7 solution-content">
                <?php
                $solution_content = get_field('about_text');
                if ($solution_content) {
                    echo wp_kses_post($solution_content);
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- FAQ's -->
<?php get_template_part('template-parts/faqs'); ?>

<!-- Call To Action -->
<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>

<?php
get_footer();
