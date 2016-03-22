<?php get_header(); ?>
    <div class="category-header text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                    <div class="category-title text-center">
                        <?php _e('Error 404 Not Found', 'mythemeshop'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <p><?php _e('Oops! We couldn\'t Find this Page.', 'mythemeshop'); ?></p>
            <p><?php _e('Please check your URL or use the search form below.', 'mythemeshop'); ?></p>
            <?php get_search_form(); ?>
        </div>
    </div>
<?php get_footer(); ?>