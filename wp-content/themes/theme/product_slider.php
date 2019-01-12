<section id="product_slider">
    <div class="container">
        <div class="b-product_slider">
        <?php for($i = 0; $i < 10 ; $i++){ ?>

                <div class="product_slide">
                    <a href="/product/test/">
                    <div class="img">
                        <img src="/wp-content/uploads/2018/12/flyeralarm-plakate-klassiker.png"
                             alt="">
                    </div>
                    <div class="shadow">
                        <div class="eye">
                            <img src="<?php echo bloginfo('template_url'); ?>/img/eye.png" alt="eye">
                        </div>
                    </div>
                    </a>
                </div>

        <?php } ?>
        </div>
    </div>
</section>