<?php get_header(); ?>

    <!-- Jobplanet Signin -->
    <div class="jp-promo">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="welcome-landing">
                        <h1>Ingin bekerja di perusahaan apa?</h1>
                        <p>Semua informasi yang ingin anda ketahui tentang perusahaan terbaik hanya ada di Jobplanet.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="btn-area">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 p-lr">
                            <a href="#" class="btn btn-primary btn-lg btn-block">Daftar</a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 p-lr">
                            <a href="#" class="btn btn-success btn-lg btn-block">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-lr">
                <div class="card-list">
                    <div class="featured-thumbnail">
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                    <div class="caption">
                        <small class="date"><?php the_time('F jS, Y'); ?></small>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h1 class="featured-title"><?php the_title(); ?></h1></a>
                        <div class="caption-components">
                            <span><i class="fa fa-user"></i> By <?php the_author_posts_link('first_name', 'last_name' ); ?></span>
                            <span><i class="fa fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?>  </span>
                            <span><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; else : ?>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                <!-- The very first "if" tested to see if there were any Posts to -->
                <!-- display.  This "else" part tells what do if there weren't any. -->
                <div class="empty-post"><?php _e( 'Sorry, no posts matched your criteria.' ); ?></div>
            </div>
            <!-- REALLY stop The Loop. -->

            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                <div class="jp-pagination">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li><span class="selected">2</span></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">12</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>