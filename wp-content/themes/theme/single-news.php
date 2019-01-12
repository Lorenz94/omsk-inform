<?php
/**
 * Template for displaying single post (read full post page).
 *
 * @package bootstrap-basic
 */

get_header();
?>


<div class="container">

<!--    <div class="breadcrumbs small-text">-->
<!--        <a class="" href="/">Главная страница</a> /-->
<!--        --><?php //$count = 0; ?>
<!--        --><?php //foreach ($cats as $item) { ?>
<!--            <a href="--><?php //echo get_category_link($item->term_id) ?><!--">--><?php //echo $item->name; ?><!--</a>-->
<!--            --><?php //if (count($cats) - 1 != $count) {
//                echo "/";
//            } ?>
<!--            --><?php //$count++;
//        } ?>
<!--    </div>-->



    <div class="page-title" style="text-align: center; margin-top: 20px">
        <h1><?php echo get_field('news_title'); ?></h1>
    </div>

    <div class="news-text middle-text">
        <?php echo get_field('news_text'); ?>
    </div>


    <?php require_once ('/wp-content/themes/theme/product_slider.php'); ?>

</div>


<?php get_footer(); ?>
