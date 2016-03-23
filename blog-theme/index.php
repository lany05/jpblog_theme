<?php $options = get_option('blog-theme'); ?>
<?php get_header(); ?>
<?php get_template_part('include/register'); ?>
    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-lr">
                    <div class="card-list">
                        <div class="featured-thumbnail">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"
                               title="Permanent Link to <?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                        <div class="caption">
                            <small class="date"><?php the_time('F jS, Y'); ?></small>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                <h2 class="featured-title"><?php the_title(); ?></h2></a>
                            <div class="caption-components">
                                <span><i class="fa fa-user"></i> By <?php the_author_posts_link('first_name', 'last_name'); ?></span>
                                <span><i class="fa fa-comments"></i> <fb:comments-count href="<?php echo get_permalink($post->ID); ?>"></fb:comments-count></span>
                                <span><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            else : ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                    <!-- The very first "if" tested to see if there were any Posts to -->
                    <!-- display.  This "else" part tells what do if there weren't any. -->
                    <div class="empty-post"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
                </div>
                <!-- REALLY stop The Loop. -->
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                <div class="jp-pagination">
                    <?php pagination($additional_loop->max_num_pages); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_template_part('include/widget'); ?>
<?php get_footer(); ?>
