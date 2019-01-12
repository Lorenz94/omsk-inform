<?php
/**
 * The theme footer
 *
 * @package bootstrap-basic
 */
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-info-container">
                    <div class="footer-logo">
                        <img src="<?php echo get_field('logo', 'options')['url']; ?>" alt="">
                    </div>
                    <div class="copyright">
                        Образование Информ © 2019г. </br>
                        Все права защищены.
                    </div>
                    <div class="footer-info-link">
                        <a href="#">Центр охраны труда и промбезопасности</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-navigation">
                    <div class="footer-title">
                        Навигация по сайту
                    </div>
                    <div class="footer-menu small-text">


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
                </div>
            </div>
            <div class="col-lg-2 no-padding">
                <div class="footer-services-menu">
                    <div class="footer-title">
                        Услуги
                    </div>
                    <div class="services-menu">
                        <?php
                        $categories = get_terms(array(
                            'taxonomy' => 'cat_products',
                            'hide_empty' => 0,
                        ));
                        $parentsID = array();
                        foreach ($categories as $item) {
                            if ($item->parent == 0) { ?>
                                <a href="<?php echo get_category_link($item->term_id); ?>" class="small-text"><?php echo $item->name; ?></a> <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 no-padding">
                <div class="b-footer-direction-menu">
                    <div class="footer-title">
                        По направлениям
                    </div>
                    <div class="footer-direction-menu">
                        <?php
                        $args = array(
                            'post_type' => 'direction',
                            'posts_per_page' => '-1',
                            'order' => 'ASC',
                        );
                        $postslist = get_posts($args); ?>

                        <?php foreach ($postslist as $item) { ?>
                            <a href="<?php echo get_the_permalink($item->ID) ?>" class="small-text"><?php echo get_field('direction_name', $item->ID); ?></a>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="footer-social-container">
                    <div class="b-footer-social">
                        <div class="footer-title">
                            Мы в соц. сетях
                        </div>
                        <div>
                            <div class="social-link">
                                <a href="<?php echo get_field('vk_link', 'options'); ?>" target="_blank">
                                    <i class="fab fa-vk"></i>
                                </a>
                            </div>
                            <div class="social-link">
                                <a href="<?php echo get_field('fb_link', 'options'); ?>" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                            <div class="social-link">
                                <a href="<?php echo get_field('ints_link', 'options'); ?>" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="footer-title">
                            Контакты
                        </div>
                        <div class="phone">
                            <a href="tel:<?php echo get_field('phone', 'options'); ?>">
                                <?php echo get_field('phone', 'options'); ?>
                            </a>
                        </div>
                        <div class="mail">
                            <a href="mail:<?php echo get_field('email', 'options'); ?>">
                                <?php echo get_field('email', 'options'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="asmart-container">
    <div class="asmart">
        <a target="_blank" href="https://asmart-group.ru/">Разработка сайта: <span>Asmart Group</span></a>
    </div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>