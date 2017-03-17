<!--
Template name: BLOG
-->
<?php get_header();?>


<section class="photodiary-page">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-1">
                <div class="article-page">

                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => '2',
                        'paged' => 1,
                    );
                    $my_posts = new WP_Query( $args );
                    if ( $my_posts->have_posts() ) :
                        ?>
                        <div class="my-posts">
                            <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
                                <div class="one-post-blog">
                                    <div class="content-blog">
                                        <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                                        <div class="date"><?php echo get_the_date($d, $post);?></div>
                                        <div class="ph-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                                        <a class="hover" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail', array('class' => 'img-responsive')); ?></a>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                    <div class="read-more">
                                        <a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'momino')?></a>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        </div>
                    <?php endif ?>


                </div>

                <!-- LOAD SECTION -->
                <div id="hide" class="uld-btn">
                    <a class="load-more">Load more</a>
                </div>

            </div>

            <?php get_sidebar();?>


        </div>
    </div>
</section>



<?php get_footer();?>