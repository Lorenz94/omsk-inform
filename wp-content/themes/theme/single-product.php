<?php
/**
 * Template for displaying single post (read full post page).
 *
 * @package bootstrap-basic
 */

get_header();
?>

<?php
$cats = breadcrumbs_sort(get_the_terms(get_the_ID(), 'cat_products'));

function breadcrumbs_sort($unsort_cats){
    $sort_cats = array();
    for($i = 0; $i < count($unsort_cats); $i++){
        if(count($sort_cats) == 0){
            $sort_cats[] = get_child($unsort_cats, 0);
        }else{
            $sort_cats[] = get_child($unsort_cats, $sort_cats[count($sort_cats) - 1]->term_id);
        }
    }
    return $sort_cats;
}

function get_child($unsort_cats, $parentID){
    foreach ($unsort_cats as $key){
        if($key->parent == $parentID){
            return $key;
        }
    }
}

$page_title = $cats[count($cats) - 1]->name;
$page_product_name = get_the_title(get_the_ID());
?>

<div class="container">

    <div class="breadcrumbs small-text">
        <a class="" href="/">Главная страница</a> /
        <?php $count = 0; ?>
        <?php foreach ($cats as $item) { ?>
            <a href="<?php echo get_category_link($item->term_id) ?>"><?php echo $item->name; ?></a>
            <?php if (count($cats) - 1 != $count) {
                echo "/";
            } ?>
            <?php $count++;
        } ?>
    </div>



    <div class="page-title">
        <h1><?php echo $page_title; ?></h1>
    </div>
    <?php
    $product_catID = $cats[count($cats) - 1]->term_id;
    $product_args = [
        'post_type' => 'product',
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'cat_products',
                'terms' => $product_catID,
                'include_children' => false // Remove if you need posts from term 7 child terms
            ],
        ],
        // Rest of your arguments
    ];

    $posts = get_posts($product_args);


    ?>

    <div class="row">
        <div class="col-lg-3 ">
            <div class="products-menu">
                <div class="title sub-title-text"><?php echo $page_title; ?></div>
                <div class="products-list middle-text">
                    <div class="product-link">
                        <?php foreach ($posts as $item) { ?>
                            <a class="<?php echo $item->post_title == $page_product_name ? "active" : ""; ?>"
                               href="<?php echo get_the_permalink($item->ID); ?>"><?php echo $item->post_title ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="additional-links middle-text">
                    <a href="#">Гарантия качества</a>
                    <a href="#">Доставка</a>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
        <div class="col-lg-7">
            <div class="product_slider_container">
                <div class="product_slider">

                    <?php foreach (get_field('product_slider') as $item) { ?>
                        <div class="slide">
                            <img src="<?php echo $item['img']['url'] ?>">
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="product_description">
                <?php echo get_field('product_description'); ?>
            </div>
        </div>
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

    <div class="page-title">
        <h1>Другая продукция</h1>
    </div>

    <div class="other-production">
        <div class="row">
            <div class="col-lg-2">
                <div class="other-product-container">
                    <div class="preview">
                        <img src="/wp-content/uploads/2018/12/Trifold.jpg" alt="">
                    </div>
                    <div class="title middle-text">Заголовок</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="other-product-container">
                    <div class="preview">
                        <img src="/wp-content/uploads/2018/12/Trifold.jpg" alt="">
                    </div>
                    <div class="title middle-text">Заголовок</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="other-product-container">
                    <div class="preview">
                        <img src="/wp-content/uploads/2018/12/Trifold.jpg" alt="">
                    </div>
                    <div class="title middle-text">Заголовок</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="other-product-container">
                    <div class="preview">
                        <img src="/wp-content/uploads/2018/12/Trifold.jpg" alt="">
                    </div>
                    <div class="title middle-text">Заголовок</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="other-product-container">
                    <div class="preview">
                        <img src="/wp-content/uploads/2018/12/Trifold.jpg" alt="">
                    </div>
                    <div class="title middle-text">Заголовок</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="other-product-container">
                    <div class="preview">
                        <img src="/wp-content/uploads/2018/12/Trifold.jpg" alt="">
                    </div>
                    <div class="title middle-text">Заголовок</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('/wp-content/themes/theme/product_slider.php'); ?>


<?php get_footer(); ?>
