<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <title><? echo the_title();?></title>

    <?php wp_head();?>

</head>

<body> <!--onload="myFunction()" style="margin:0;"-->

<div id="loader"></div>

<div>


<section class="header">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="logo" href="/"><img src="<? echo home_url('/wp-content/themes/momino/', 'http')?>img/logo.png" alt="logo"></a>
            </div>

            <?php
                wp_nav_menu( array(
                    'theme_location'  => '',
                    'menu'            => 'navbar navbar-default',
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'main-menu',
                    'menu_class'      => 'nav navbar-nav navbar-right',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ) );
            ?>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <img class="img-responsive" src="<? echo home_url('wp-content/uploads/2017/03/', 'http')?>header.jpg" alt="header img"> </div>
        </div>
    </div>
</section>
