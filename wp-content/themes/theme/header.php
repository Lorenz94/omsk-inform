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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <!--wordpress head-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a
        href="https://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
<![endif]-->

<header>

<!--    <section id="preloader">-->
<!--        <div class="preloader loading">-->
<!--            <span class="slice"></span>-->
<!--            <span class="slice"></span>-->
<!--            <span class="slice"></span>-->
<!--            <span class="slice"></span>-->
<!--            <span class="slice"></span>-->
<!--            <span class="slice"></span>-->
<!--        </div>-->
<!--        <div class="mobile" style="display: none">-->
<!--            Адаптивная версия в разработке-->
<!--        </div>-->
<!--    </section>-->


    <div class="line-shadow-helper">
        <div class="line-shadow-bottom">
            <div class="shadow"></div>
        </div>
        <div class="container">
            <div class="row contacts-menu-container">

                <div class="col-lg-3 col-md-2 header-logo">
                    <div class="logo-container">
                        <a href="/">
                            <img src="<?php echo get_field('logo', 'options')['url']; ?>" alt="Лого">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="header-links-container">
                        <?php foreach (get_field('header_links', 'options') as $link) { ?>
                            <a href="<?php echo $link['link']; ?>" class="header-link">
                                <?php echo $link['link_name']; ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="contacts-info-container">
                        <div class="b-contacts">
                            <div class="contcts-container">
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

                $icons = get_field('product_menu_icons', get_option('page_on_front'));
                $countIcon = 0;
                $parentsID = array();
                foreach ($categories as $item) {
                    if ($item->parent == 0) {
                        $parentsID[] = $item->term_id; ?>
                        <div class="col-md-2 no-padding category-border menu-category-container">
                            <a href="<?php echo get_category_link($item->term_id); ?>">
                                <div class="b-menu-category" relate-menu-id="<?php echo $item->term_id; ?>">
                                    <div class="icon">
                                        <img src="<?php echo $icons[$countIcon]['icon']['url'] ?>">
                                    </div>
                                    <div class="icon-active">
                                        <img src="<?php echo $icons[$countIcon]['icon_active']['url'] ?>" alt="">
                                    </div>
                                    <div class="name"><?php echo $item->name ?></div>
                                </div>
                            </a>
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
                                        <?php $haveChild = count(get_term_children($item->term_id, 'cat_products')) != 0 ? true : false;
                                        $product_args = [
                                            'post_type' => 'product',
                                            'posts_per_page' => 1,
                                            'tax_query' => [
                                                [
                                                    'taxonomy' => 'cat_products',
                                                    'terms' => $item->term_id,
                                                    'include_children' => false // Remove if you need posts from term 7 child terms
                                                ],
                                            ],
                                        ];
                                        $posts = get_posts($product_args);

                                        ?>

                                        <li><a class="large-text" href="<?php echo $haveChild ? get_category_link($item->term_id) : get_the_permalink($posts[0]->ID); ?>"><?php echo $item->name; ?></a>
                                        </li>
                                    <?php }
                                } ?>
                            </ul>
                        </div>
                        <div class="col-lg-3 no-padding">
                            <div class="modal-menu-preview">
                                <div class="b-ajax-img"><img src="/wp-content/themes/theme/img/product1.png" alt="">
                                </div>
                                <div class="b-ajax-img"><img src="/wp-content/themes/theme/img/product2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</header>