<!--
Template name: PHOTODIARY
-->
<?php get_header();?>


<section class="photodiary-page">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="article-page">
                    <?php
                    global $post;
                    $args = array(
                        'category' => 16,
                        'posts_per_page' => '2');

                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ){ setup_postdata($post);
                        ?>
                        <div class="one-post">
                            <div class="content-ph">
                                <div class="head-title"><h5><a href="<?php the_permalink(); ?>"><?php the_category();?></a></h5></div>
                                <div class="ph-title-page"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
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
                $args = array(
                    'show_all'     => false, // показаны все страницы участвующие в пагинации
                    'end_size'     => 1,     // количество страниц на концах
                    'mid_size'     => 1,     // количество страниц вокруг текущей
                    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text'    => __('« Previous'),
                    'next_text'    => __('Next »'),
                    'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                    'screen_reader_text' => __( 'Posts navigation' ),
                );

                the_posts_pagination($args);
                ?>

            </div>

        </div>
    </div>
</section>

<?php get_footer();?>