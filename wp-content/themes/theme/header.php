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

    <!--wordpress head-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a
        href="https://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
<![endif]-->

<header>
    <div class="line-shadow-helper">
        <div class="line-shadow-bottom">
            <div class="shadow"></div>
        </div>
        <div class="container">
            <div class="row contacts-menu-container">

                <div class="col-lg-3">
                    <div class="logo-container">
                        <img src="<?php echo get_field('logo', 'options')['url']; ?>" alt="Лого">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="header-links-container">
                        <?php foreach (get_field('header_links', 'options') as $link) { ?>
                            <a href="<?php echo $link['link']; ?>" class="header-link">
                                <?php echo $link['link_name']; ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contacts-info-container">
                        <div class="b-contacts">
                            <div class="phone"><i class="small-icon fas fa-phone"></i>
                                <a href="tel:<?php echo get_field('phone', 'options'); ?>">
                                    <?php echo get_field('phone', 'options'); ?>
                                </a>
                            </div>
                            <div class="email">
                                <i class="small-icon fas fa-envelope"></i>
                                <a href="mail:<?php echo get_field('email', 'options'); ?>">
                                    <?php echo get_field('email', 'options'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="b-address">
                            <div class="address">
                                <i class="small-icon fas fa-location-arrow middle-text"></i>

                                <?php echo get_field('address', 'options'); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="line-shadow-helper">
        <div class="line-shadow-top">
            <div class="shadow"></div>
        </div>
        <div class="container">
            <div class="header-category">
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'cat_products',
                    'hide_empty' => 0,
                ));
                $icons = get_field('product_menu_icons');
                $countIcon = 0;
                $parentsID = array();
                foreach ($categories as $item) {
                    if ($item->parent == 0) {
                        $parentsID[] = $item->term_id; ?>
                        <div class="col-lg-2 no-padding category-border menu-category-container">
                            <div class="b-menu-category" relate-menu-id="<?php echo $item->term_id; ?>">
                                <div class="icon">
                                    <img src="<?php echo $icons[$countIcon]['icon']['url'] ?>">
                                </div>
                                <div class="icon-active">
                                    <img src="<?php echo $icons[$countIcon]['icon_active']['url'] ?>" alt="">
                                </div>
                                <div class="name"><?php echo $item->name ?></div>
                            </div>
                        </div>
                        <?php $countIcon++; ?>
                    <?php }
                }
                ?>

            </div>
        </div>
    </div>
    <div class="b-modals-menu">
        <div class="container">
            <?php foreach ($parentsID as $id) { ?>
                <div class="modal-menu" relate-menu-id="<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-lg-9 no-padding">
                            <ul>
                                <?php foreach ($categories as $item) {

                                    if ($item->parent == $id) { ?>
                                        <li><a class="large-text" href="#"><?php echo $item->name; ?></a></li>
                                    <?php }
                                } ?>
                            </ul>
                        </div>
                        <div class="col-lg-3 no-padding">
                            <div class="modal-menu-preview">
                                <div class="b-ajax-img">картинка</div>
                                <div class="b-ajax-img">картинка</div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</header>