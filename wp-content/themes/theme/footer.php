<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>
			<footer>
                <div class="footer-triangles">
                    <div class="triangle-left"></div>
                    <div class="triangle-right"></div>
                </div>
                <div class="container">
                    <div class="row footer-center">
                        <div class="col-md-6">
                            <div class="footer-logo">
                                <a href="/"> <img src="<?php echo get_field('white-logo', 'option')['url']; ?>"></a>
                            </div>
                            <div class="policy">
                                <a href="#">Политика обработки персональных данных</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu">


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
                            <div class="asmart">
                                <a target="_blank" href="https://asmart-group.ru/">Сайт разработан IT-Company <span>ASMART</span></a>
                            </div>
                        </div>
                    </div>
                </div>
			</footer>

	</body>
</html>