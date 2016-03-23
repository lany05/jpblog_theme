<?php get_header(); ?>
    <div class="category-header text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                    <div class="category-title text-center">
                        <?php the_title(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr" id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
                    <div class="custom-page">
                        <div class="custom-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
                </div>
                <?php comments_template('', true); ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_template_part('include/widget'); ?>
<?php get_template_part('include/register'); ?>
<?php get_footer(); ?>
