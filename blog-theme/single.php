<?php $options = get_option('blog-theme'); ?>
<?php setPostViews(get_the_ID()); ?>
<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 p-lr" id="article-sidebar">
                <div class="article-info">
                    <div class="user">
                        <div class="avatar">
                            <?php if (function_exists('get_avatar')) {
                                echo get_avatar(get_the_author_meta('email'), '60');
                            } ?>
                        </div>
                        <div class="avatar-name">
                            <?php _e('Ditulis oleh ', 'mythemeshop');the_author_posts_link(); ?>
                        </div>
                    </div>
                    <div class="date-comment">
                        <span class="date"><?php _e('', 'mythemeshop');the_time('j F Y'); ?></span>
                        <span class="comment-link"><a href="#comment">Leave a comment</a></span>
                    </div>
                    <?php //get_template_part('include/share'); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 p-lr" id="article-main">
                <article class="single-post">
                    <!--<div class="thumb-entry">
                        <div class="first-image-post">
                            <img src="http://blog.id.jobplanet.com/wp-content/uploads/2016/02/gagap-1.jpg" alt="" class="aligncenter">
                        </div>
                    </div>-->
                    <div class="header-post">
                        <h1><?php the_title(); ?></h1>
                        <div class="top-article-info">
                            <span class="writer"><i class="fa fa-user"></i><?php _e('Ditulis oleh ', 'mythemeshop');the_author_posts_link(); ?></span>
                            <span class="date"><i class="fa fa-clock-o"></i><?php _e('', 'mythemeshop');the_time('j F Y'); ?></span>
                            <span><i class="fa fa-comments"></i> <fb:comments-count href="<?php echo get_permalink($post->ID); ?>"></fb:comments-count></span>
                            <span class="views"><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>
                        </div>
                    </div>
                    <div class="single-post-content">
                        <?php the_content(); ?>
			<div id="comment" style="position:absolute; bottom:360px; left:0;"></div>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <?php if ($options['mts_related_posts'] == '1') { ?>
                <?php
                $categories = get_the_category($post->ID);
                if ($categories) {
                    $category_ids = array();
                    foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'showposts' => 4,
                        'orderby' => rand,
                        'caller_get_posts' => 1
                    );
                    $my_query = new wp_query($args);
                    if ($my_query->have_posts()) {
                        echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12r"><div class="section-title left p-lr">' . __('RELATED POST', 'mythemeshop') . '</div>';
                        while ($my_query->have_posts()) {
                            $my_query->the_post(); ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-lr">
                                <div class="card-list">
                                    <div class="featured-thumbnail">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('medium'); ?>
                                        <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/relthumb.png"
                                                 alt="<?php the_title(); ?>" width='180' height='120'
                                                 class="wp-post-image"/>
                                        <?php endif; ?>
                                    </div>
                                    <div class="caption">
                                        <small class="date"><?php the_time('F jS, Y'); ?></small>
                                        <a href="<?php the_permalink() ?>"><h2 class="featured-title"> <?php the_title(); ?></h2></a>
                                        <div class="caption-components">
                                            <span><i class="fa fa-user"></i> By <?php the_author_posts_link('first_name', 'last_name'); ?></span>
                                            <span><i class="fa fa-comments"></i> <fb:comments-count href="<?php echo get_permalink($post->ID); ?>"></fb:comments-count></span>
                                            <span><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                }
                wp_reset_query();
                ?>
            <?php } ?>
        </div>
    </div>
<?php get_template_part('include/widget'); ?>
<?php get_template_part('include/register'); ?>
<?php get_footer(); ?>
