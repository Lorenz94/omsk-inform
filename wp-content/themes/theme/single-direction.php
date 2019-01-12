<?php
/**
 * Template for displaying single post (read full post page).
 *
 * @package bootstrap-basic
 */

get_header();
?>

<?php
?>

<div class="container">

    <div class="breadcrumbs small-text">
        <a class="" href="/">Главная страница</a> /
        <a href="<?php echo get_the_permalink(get_the_ID()) ?>"><?php echo get_field('direction_name'); ?></a>
    </div>


    <div class="page-title">
        <h1><?php echo get_the_title(get_the_ID()); ?></h1>
    </div>

    <div class="direction-description">
        <?php echo get_field('direction_description'); ?>
    </div>
    <?php $count = 1; ?>
    <div class="b-direction">
        <div class="row">
            <div class="col-md-6">
                <div class="direction-img-container">
                    <img src="<?php echo get_field('direction_first')['img']['sizes']['large']; ?>" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="direction-list">
                    <?php foreach (get_field('direction_first')['list'] as $item) { ?>
                        <div class="item">
                            <span class="sub-title-text"> <?php echo $count; ?>.</span>
                            <div class="text">
                                <div class="title sub-title-text">
                                    <?php echo $item['title']; ?>
                                </div>
                                <div class="description ">
                                    <?php echo $item['description'] ?>
                                </div>
                            </div>
                        </div>
                        <?php $count++; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="b-direction">
        <div class="row">

            <?php if(count(get_field('direction_second')['list']) > 1 ){ ?>
            <div class="col-md-6">
                <div class="direction-list">
                    <?php foreach (get_field('direction_second')['list'] as $item) { ?>
                        <div class="item">
                            <span class="sub-title-text"><?php echo $count; ?>.</span>
                            <div class="text">
                                <div class="title sub-title-text">
                                    <?php echo $item['title']; ?>
                                </div>
                                <div class="description">
                                    <?php echo $item['description'] ?>
                                </div>
                            </div>
                        </div>
                        <?php $count++; ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="direction-img-container">
                    <img src="<?php echo get_field('direction_second')['img']['sizes']['large']; ?>" alt="">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="form-container">
        <div class="large-text bold">
            Заинтересовало данное предложение?
        </div>
        <div class="large-text">
            Свяжитесь с нами!
        </div>
        <a class="form-btn middle-text" href="#">Оформить заявку</a>
    </div>

    <?php require_once ('/wp-content/themes/theme/product_slider.php'); ?>


    <?php get_footer(); ?>
