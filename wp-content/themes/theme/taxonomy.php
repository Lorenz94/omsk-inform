<?php

get_header();


$pageID = get_queried_object()->term_id;
$categories = get_term_children($pageID, 'cat_products');


?>


    <div class="container">
        <div class="breadcrumbs small-text">
            <a class="" href="/">Главная страница</a> /
            <?php echo get_term_parents_list($pageID,'cat_products',array('separator' => ' / ')); ?>
        </div>

        <div class="page-title">
            <h1><?php echo get_the_category_by_ID($pageID); ?></h1>
        </div>


        <?php
        if (count($categories) == 0) {

            $product_args = [
                'post_type' => 'product',
                'posts_per_page' => 1,
                'tax_query' => [
                    [
                        'taxonomy' => 'cat_products',
                        'terms' => $pageID,
                        'include_children' => false,

                    ],
                ],
                // Rest of your arguments
            ];
            $posts = get_posts($product_args);
            $url = 'Location:'.get_the_permalink($posts[0]->ID);
            header($url);

            ?>
        <?php } else {
            ?>
            <div class="row">
                <?php
                foreach ($categories as $id) {

                    if(get_term($id , 'cat_products')->parent == $pageID ? false : true){
                        continue;
                    }

                    $product_args = [
                        'post_type' => 'product',
                        'posts_per_page' => 1,
                        'tax_query' => [
                            [
                                'taxonomy' => 'cat_products',
                                'terms' => $id,
                                'include_children' => false,
                            ],
                        ],
                    ];
                    $posts = get_posts($product_args);
                    $haveChild = count(get_term_children($id, 'cat_products')) != 0 ? true : false;
                    ?>

                    <div class="col-md-4">
                        <div class="product-category-container">
                            <a href="<?php echo $haveChild ? get_category_link($id) : get_the_permalink($posts[0]->ID); ?>">
                                <div class="preview">
                                    <img src="<?php echo get_field('product_slider', $posts[0]->ID)[0]['img']['url'] ?>"
                                         alt="">
                                </div>
                                <div class="title middle-text"><?php echo get_the_category_by_ID($id) ?></div>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        <?php }

        ?>
    </div>

<?php require_once ('/wp-content/themes/theme/product_slider.php'); ?>

<?php get_footer(); ?>