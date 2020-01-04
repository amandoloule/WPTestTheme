<?php
get_header();
?>
<div class="container content index">
    <div class="row">
        <div class="post col-md-8">
        <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $temp = $wp_query;
            $wp_query = null;
			$args = array('post_type' => 'news', 'posts_per_page' => '2', 'paged' => $paged);
			$wp_query = new WP_Query($args);
		?>
        <?php if($wp_query->have_posts()): ?>
            <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <div class="card">
                        <div class="card-header">
                            <?php echo the_title(); ?>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">
                                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/dist/img/rectangle.png"> 
                                        <small class="text-muted"><?php the_author(); ?></small>
                                    </p>
                                    <p class="card-text">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="card-link">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <?php if(has_post_thumbnail()): ?>
                                <?php
                                    $attr = array(
                                        'class' => 'card-img'
                                    );
                                ?>
                                <?php echo get_the_post_thumbnail($id, 'large', $attr); ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>

            <?php endwhile; ?>
            <div class="pag float-right">
                <?php
                echo paginate_links( array(
                    'format'  => 'page/%#%',
                    'current' => $paged,
                    'total'   => $wp_query->max_num_pages,
                    'mid_size'        => 2,
                    'prev_text'       => __('&laquo; Previous'),
                    'next_text'       => __('Next &raquo;')
                ) );
                ?>
            </div>
        </div>
        <?php
        $wp_query = null;
        $wp_query = $temp;
        ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <div class="sidebar col-md-4">
            <?php if(is_active_sidebar('sidebar')) : ?>
                <?php dynamic_sidebar('sidebar'); ?>
            <?php endif ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>