<li class="edgtf-blog-slider-item">
    <div class="edgtf-blog-slider-item-inner">
        <div class="edgtf-item-image">
            <a itemprop="url" href="<?php echo get_permalink(); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
            </a>
        </div>
        <div class="edgtf-item-text-wrapper">
            <div class="edgtf-item-text-holder">
                <div class="edgtf-item-text-holder-inner">
	                <?php if($post_info_date == 'yes' || $post_info_category == 'yes' || $post_info_author == 'yes' || $post_info_comments == 'yes'){ ?>
		                <div class="edgtf-item-info-section">
			                <?php
			                if ($post_info_category == 'yes') {
				                playerx_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
			                }
			                ?>
		                </div>
	                <?php } ?>
	
	                <?php playerx_edge_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

                    <?php
                    if ($post_info_date == 'yes') {
                        playerx_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
                    }
                    ?>
                    <?php
                    if ($post_info_excerpt == 'yes') {
                        playerx_edge_get_module_template_part('templates/parts/excerpt', 'blog', '', $params);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</li>