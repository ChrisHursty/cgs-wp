<section class="container-fw services-container light-bg">
    <div class="container">
        <div class="align-center">
            <h2>Services</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (have_rows('services')) : ?>
                <?php while (have_rows('services')) : the_row();
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                ?>
                    <div class="col-md-4 service-item">
                        <div class="service-content">
                            <h2 class="service-title"><?php echo esc_html($title); ?></h2>
                            <p class="service-description"><?php echo esc_html($description); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <a class="spark-btn light-btn align-center mt30" href="/services"><span>See All Services</span></a>
    </div>
</section>