<?php
/**
 * Created by PhpStorm.
 * User: davidkrisnasaputra
 * Date: 3/22/16
 * Time: 10:43 AM
 */
?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
<div class="share-article">
    <ul>
        <li>
            <a href="#" class="share fb"
               data-url="<?php echo get_permalink(get_the_ID()); ?>"
               data-title="<?php echo the_title(); ?>"
               data-image="<?php echo $image[0]; ?>"
               data-desc="<?php echo the_excerpt(); ?>">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li>
            <a href="#" class="share tw"
               data-url="<?php echo get_permalink(get_the_ID()); ?>"
               data-title="<?php echo the_title(); ?>"
               data-image="<?php echo $image[0]; ?>"
               data-desc="<?php echo the_excerpt(); ?>">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        <li>
            <a href="#" class="share in"
               data-url="<?php echo get_permalink(get_the_ID()); ?>"
               data-title="<?php echo the_title(); ?>"
               data-image="<?php echo $image[0]; ?>"
               data-desc="<?php echo the_excerpt(); ?>">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
        <li>
            <a href="#" class="share gp"
               data-url="<?php echo get_permalink(get_the_ID()); ?>"
               data-title="<?php echo the_title(); ?>"
               data-image="<?php echo $image[0]; ?>"
               data-desc="<?php echo the_excerpt(); ?>">
                <i class="fa fa-google-plus"></i>
            </a>
        </li>
    </ul>
    <!--<div class="share-count">
        <span class="total-share">25</span> Shares
    </div>-->
</div>