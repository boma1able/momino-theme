 <?php get_header() ;?>

    <!-- FIRST POST SECTION -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <div class="photodiary-page">

                        <?php
                        global $post; 
                        $args = array('numberposts' => 1,'category' => 4); //
                        $myposts = get_posts( $args );
                        foreach( $myposts as $post ){ setup_postdata($post);
                            ?>
                            <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                            <div class="ph-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                            <p><?php the_excerpt(); ?></p>
                            <?php
                        }
                        wp_reset_postdata(); // сбрасываем переменную $post
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


 <!-- LIFESTYLE SECTION -->
 <section class="lifestyle">
     <div class="container">
         <div class="row">
             <div class="col-md-10 col-md-offset-1 col-sm-12">

                 <?php
                 global $post;
                 $args = array('numberposts' => 2, 'category' => 5);
                 $myposts = get_posts( $args );
                 foreach( $myposts as $post ){ setup_postdata($post);
                     ?>
                     <div class="col-md-6 col-sm-6">
                         <a class="hover" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'large', array('class' => 'img-responsive')); ?></a>
                         <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                         <div class="ph-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                         <p><?php the_excerpt(); ?></p>
                     </div>
                     <?php
                 }
                 wp_reset_postdata(); // сбрасываем переменную $post
                 ?>

             </div>
         </div>
     </div>
 </section>


<!-- PHOTODIARY SECTION -->
<section class="photodiary">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12">

                <?php
                global $post;
                $args = array('numberposts' => 2, 'offset' => 1, 'category' => 4);
                $myposts = get_posts( $args );
                foreach( $myposts as $post ){ setup_postdata($post);
                    ?>
                    <div class="col-md-6 col-sm-6">
                        <a class="hover" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'large', array('class' => 'img-responsive')); ?></a>
                        <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                        <div class="ph-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <?php
                }
                wp_reset_postdata(); // сбрасываем переменную $post
                ?>

            </div>
        </div>
    </div>
</section>


<!-- SIGN-UP SECTION -->
<section class="sign-up">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="sing-up-email">
                    <h3><?php echo __('Sign up for our newsletter!', 'momino');?></h3>
                    <form class="send-email" action="">
                        <input type="email" placeholder="<?php echo __('Enter a valid email address', 'momino')?>">
                        <button class="email-btn"><img src="<? echo home_url('/wp-content/themes/momino/', 'http')?>img/send-icon.png" alt="seng"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2nd LIFESTYLE SECTION -->
<section class="lifestyle">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12">

                <?php
                global $post;
                $args = array('numberposts' => 2, 'offset' => 2, 'category' => 5);
                $myposts = get_posts( $args );
                foreach( $myposts as $post ){ setup_postdata($post);
                    ?>
                    <div class="col-md-6 col-sm-6">
                        <a class="hover" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'large', array('class' => 'img-responsive')); ?></a>
                        <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                        <div class="ph-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <?php
                }
                wp_reset_postdata(); // сбрасываем переменную $post
                ?>

            </div>
        </div>
    </div>
</section>

<?php get_footer();?>