<?php if(have_posts()): while(have_posts()) : the_post(); ?>
    <?php playerx_core_get_cpt_single_module_template_part('templates/single/parts/scoreboard', 'match'); ?>

    <div class="edgtf-container">
        <div class="edgtf-container-inner clearfix">

            <div <?php echo playerx_edge_get_content_sidebar_class(); ?>>
                <?php if (post_password_required()) {
                    echo get_the_password_form();
                } else {
                    //load proper match template
                    ?>

                    <div class="edgtf-single-match-content-box">
                        <?php
                        playerx_core_get_cpt_single_module_template_part('templates/single/parts/title', 'match');

                        playerx_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'match');
                        playerx_core_get_cpt_single_module_template_part('templates/single/parts/date', 'match');

                        playerx_core_get_cpt_single_module_template_part('templates/single/parts/content', 'match');
                        ?>
                    </div>

                    <?php

                    //load match comments
                    playerx_core_get_cpt_single_module_template_part('templates/single/parts/comments', 'match');

                } ?>
            </div>
            <?php if (!in_array($sidebar, array('no-sidebar', ''))) : ?>
                <div <?php echo playerx_edge_get_sidebar_holder_class(); ?>>
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if (!post_password_required()) {
            //load match navigation
            playerx_core_match_get_single_navigation();
        } ?>
    </div>
<?php
	endwhile;
	endif;
?>