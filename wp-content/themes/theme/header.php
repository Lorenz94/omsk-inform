<?php
/**
 * The theme header
 *
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">



    <!--wordpress head-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a
        href="https://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
<![endif]-->

<header>

    <div class="background_header" style="background: url('<?php echo get_field('header_background',5)['sizes']['slider_hd'] ?>') no-repeat center top; background-size: cover">

        <div class="container">
            <div class="row">
                <div class="col-md-4 b-header">
                    <div class="logo">
                        <a href="/"> <img src="<?php echo get_field('logo', 5)['url']; ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4  b-header-skew b-header b-address">
                    <div class="address">
                        <i class="fas fa-map-marker-alt"></i><?php echo get_field('address', 'option'); ?>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 b-header-skew b-header b-phone">
                    <div class="phone-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="phone">

                        <div class="">
                            <a href="tel:">
                                +7 (3812) <span>630-600</span>
                                <?php //echo get_field('phone', 'option'); ?>
                            </a>
                        </div>
                        <div class="">
                            <a href="tel:">
                                +7 (951) <span>421 22 37</span>
                                <?php //echo get_field('phone2', 'option'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 b-header-skew b-header b-email">
                    <div class="email">
                        <i class="fas fa-envelope"></i><?php echo get_field('email', 'option'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-4 header-menu">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu' => '',
                'container' => 'div',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'menu',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 0,
                'walker' => '',
            ));
            ?>
            </div>
            <div class="header-text sub-title-text">
                <?php echo get_field("header_title", 5); ?>
            </div>
            <div class="statement-btn">
                <a href="#form">Заявка на бесплатный замер</a>
            </div>
        </div>
    </div>

</header>