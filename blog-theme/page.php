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
                <div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
                    <?php the_content(); ?>
                    <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
                </div>
                <?php comments_template('', true); ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer(); ?>