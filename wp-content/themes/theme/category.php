<?php

get_header(); ?>
11111111111111111111111111111
    <div id="container">
        <div id="content" role="main">

            <h1 class="page-title"><?php
                printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
                ?></h1>
            <?php
            $category_description = category_description();
            if ( ! empty( $category_description ) )
                echo '<div class="archive-meta">' . $category_description . '</div>';
            get_template_part( 'loop', 'category' );
            ?>

        </div><!-- #content -->
    </div><!-- #container -->
test
<?php get_sidebar(); ?>
<?php get_footer(); ?>