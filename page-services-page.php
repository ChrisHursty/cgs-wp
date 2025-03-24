<?php

/**
 * Template Name: Services Archive Page
 *
 * @package US Three
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

// Featured Image Background and Title for a regular page
if (is_page()) {
    $post_id = get_the_ID();
    $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');

    // Define a default image URL
    $default_image_url = get_template_directory_uri() . '/dist/images/default-hero-img.webp';

    // Use the featured image if available, otherwise use the default
    $background_image_url = $featured_image_url ? $featured_image_url : $default_image_url;

    echo '<section class="container-fw hero-title-area" style="background-image: url(' . esc_url($background_image_url) . ');">';
    echo '<div class="container"><div class="row"><div class="align-center text-center">';
    echo '<h1>' . get_the_title() . '</h1>';
    echo '</div></div></div></section>';
}
?>

<section class="container-fw iso-bg">
    <?php if( have_rows('all_services') ): ?>
        <div class="container services-page">
            <div class="row">
                <?php while( have_rows('all_services') ): the_row(); 
                // Sub fields
                $title       = get_sub_field('title');
                $description = get_sub_field('description');
                $link        = get_sub_field('link');
                $image       = get_sub_field('image'); // This can be empty
                ?>
                <div class="col-md-6 services-card">
                    <div class="services-content">
                        <?php if( $image ) : ?>
                            <div class="img-container">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>        
                            </div>
                        <?php endif; ?>
                        
                        <?php if( $title ) : ?>
                        <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>
                        
                        <?php if( $description ) : ?>
                        <div class="services-description">
                            <?php echo $description; // WYSIWYG can output HTML ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if( $link ) : ?>
                            <a class="spark-btn align-center mt30" href="<?php echo esc_url($link); ?>"><span>Read More</span></a>
                        
                        <?php endif; ?>
                    </div>
                </div> <!-- .col-md-6 -->
                <?php endwhile; ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    <?php endif; ?>

</section>

<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>

<?php
get_footer();
