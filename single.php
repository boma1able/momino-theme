
<?php get_header();?>

<section class="photodiary-page">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="single-post">
                    <?php

                    if( is_single( $post ) ){ setup_postdata($post);
                        ?>
                        <div class="single-content">
                            <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                            <div class="ph-title"><h3><?php the_title(); ?></h3></div>
                            <p><?php the_content(); ?></p>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="prev-div">
                        <?php
                        $prev_post = get_previous_post();
                        echo '<div class="'. prev .'" >' . '<a href="' . get_permalink( $prev_post->ID ) . '">' . get_the_post_thumbnail( $prev_post->ID, array(80, 80)) . '</a>' . '</div>';
                        echo '<div class="'. prevp .'" >' . '<a href="' . get_permalink( $prev_post->ID ) . '">' . $prev_post->post_title . '</a>' . '</div>';
                        ?>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="next-div">
                        <?php
                        $next_post = get_next_post();
                        echo '<div class="'. next .'" >' . '<a href="' . get_permalink( $next_post->ID  ) . '">' . get_the_post_thumbnail( $next_post->ID, array(80, 80)) . '</a>' . '</div>';
                        echo '<div class="'. nextp .'" >' . '<a href="' . get_permalink( $next_post->ID ) . '">' . $next_post->post_title . '</a>' . '</div>';
                        ?>
                    </div>
                </div>





            </div>

        </div>
    </div>
</section>


<section class="random-posts">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="head-title"><h5><?php echo __('you may elso like', 'momino')?></h5></div>

                    <?php
                    $posts = get_posts('orderby=rand&numberposts=3');
                    foreach($posts as $post) {
                        ?>
                        <div class="col-md-4 col-sm-4">
                            <a class="hover" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'large', array('class' => 'img-responsive')); ?></a>
                            <div class="ph-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="comment-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <ul class="commentlist">

                    <?php
                        $comments = get_comments(array(
                            'post_id' => $id,
                            'status' => 'approve' // комментарии прошедшие модерацию
                        ));

                    $bomaComm = __('comments', 'momino');
                    echo "<div class='head-title-comments'><h5>$bomaComm</h5></div>";

                        $args = array(
                            'walker'            => null,
                            'max_depth'         => '',
                            'style'             => 'ul',
                            'callback'          => null,
                            'end-callback'      => null,
                            'type'              => 'all',
                            'reply_text'        => 'Reply',
                            'page'              => '',
                            'per_page'          => '',
                            'avatar_size'       => 64,
                            'reverse_top_level' => null,
                            'reverse_children'  => '',
                            'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
                            'short_ping'        => false,    // С версии 3.6,
                            'echo'              => true,     // true или false
                        );

                        wp_list_comments( $args, $comments );
                    ?>
                </ul>


            </div>
        </div>
    </div>
</section>


<section class="leave-comment">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- <div class="head-title"><h5>leave a comment</h5></div> -->

                <?php
                add_filter('comment_form_fields', 'boma_reorder_comment_fields' );
                function boma_reorder_comment_fields( $fields ){
                    // die(print_r( $fields )); // посмотрим какие поля есть

                    $new_fields = array(); // сюда соберем поля в новом порядке

                    $myorder = array('author','email','comment'); // нужный порядок

                    foreach( $myorder as $key ){
                        $new_fields[ $key ] = $fields[ $key ];
                        unset( $fields[ $key ] );
                    }

                    // если остались еще какие-то поля добавим их в конец
                    //if( $fields )
                    //foreach( $fields as $key => $val )
                    //$new_fields[ $key ] = $val;

                    return $new_fields;
                }
                ?>

                <?php comment_form( array(
                    //'title_reply'          => __( 'Leave a Reply', 'momino' ),
                    //'title_reply_to'       => __( 'Leave a Reply to %s', 'momino' ),
                    'title_reply_before'   => '<h5 id="reply-title" class="boma-comment-reply-title">',
                    'title_reply_after'    => '</h5>',
                ), $post_id );?>

            </div>
        </div>
    </div>
</section>


<?php get_footer();?>