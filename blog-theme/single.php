<?php get_header(); ?>


    <!-- CONTENT -->
    <div class="container">
        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 p-lr" id="article-sidebar">
                <div class="article-info">
                    <div class="user">
                        <div class="avatar">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                        </div>
                        <div class="avatar-name">
                            Ditulis oleh
                            <?php the_author_posts_link(); ?>
                        </div>
                    </div>
                    <div class="date-comment">
                        <span class="date"><?php the_time('F j, Y'); ?></span>
                        <span class="comment-link"><a href="#comment">Leave a comment</a></span>
                    </div>
                    <div class="share-article">
                        <ul>
                            <li>
                                <a href="#" class="share fb"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="share tw"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="share ig"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#" class="share in"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="share gp"><i class="fa fa-google-plus"></i></a>
                            </li>
                        </ul>
                        <div class="share-count">
                            <span>25</span> Shares
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
    </div>

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
<?php get_footer(); ?>