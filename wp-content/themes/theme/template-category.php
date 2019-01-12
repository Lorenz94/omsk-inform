
<?php
/**
 * Category Template: Grid
 */
?>
get_header();
?>



<?php

?>
    <section id="news">
        <div class="container">
            <div class="b-news-slider">
                <?php foreach (get_field('main_news') as $id) { ?>
                    <div class="col-lg-2 news-slide">
                        <div class="shadow"></div>
                        <div class="bottom-shadow"></div>
                        <div class="img">
                            <img src="<?php echo get_field('news_img', $id)['sizes']['large']; ?>">
                        </div>
                        <div class="news-content">
                            <div class="type middle-text"><?php echo get_field('news_type', $id); ?></div>
                            <div class="title large-text"><?php echo get_field('news_title', $id); ?></div>
                            <div class="link">
                                <a href="#" class="middle-text">Подробнее</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="direction-menu">
        <div class="line-shadow-helper">
            <div class="line-shadow-bottom">
                <div class="shadow"></div>
            </div>
            <div class="container">
                <div class="direction-menu-top">
                    <?php foreach (get_field('main_direction_top') as $id) { ?>

                        <a href="#" class="small-text">
                            <div class="direction-icon">
                                <img src="<?php echo get_field('direction_icon', $id)['url']; ?>" alt="">
                            </div>
                            <div class="direction-icon-active">
                                <img src="<?php echo get_field('direction_active_icon', $id)['url']; ?>" alt="">
                            </div>
                            <?php echo get_field('direction_name', $id); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="line-shadow-helper">
            <div class="line-shadow-top">
                <div class="shadow"></div>
            </div>
            <div class="container">
                <div class="direction-menu-bottom">
                    <?php foreach (get_field('main_direction_bottom') as $id) { ?>

                        <a href="#" class="small-text">
                            <div class="direction-icon">
                                <img src="<?php echo get_field('direction_icon', $id)['url']; ?>" alt="">
                            </div>
                            <div class="direction-icon-active">
                                <img src="<?php echo get_field('direction_active_icon', $id)['url']; ?>" alt="">
                            </div>
                            <?php echo get_field('direction_name', $id); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </section>


<?php require_once ('/wp-content/themes/theme/product_slider.php'); ?>


<?php get_footer(); ?>