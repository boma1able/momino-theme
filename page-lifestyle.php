<!--
Template name: LIFESTYLE
-->
<?php get_header();?>


<section class="photodiary-page">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="article-page">
                    <?php
                    global $post; 
                    $args = array('category' => 5);
                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ){ setup_postdata($post);
                        ?>
                        <div class="one-post">
                            <div class="content-ls">
                                <div class="head-title-ls"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                                <div class="ph-title-ls"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                                <a class="hover" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'medium', array('class' => 'img-responsive')); ?></a>
                                <p><?php the_excerpt(); ?></p>
                            </div>

                            <div class="read-more">
                                <a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'momino')?></a>
                            </div>
                        </div>


                        <?php
                    }
                    wp_reset_postdata(); // сбрасываем переменную $post
                    ?>
                </div>

                <?php
                
                ?>

            </div>

        </div>
    </div>
</section>

<?php get_footer();?>