<div class="edgtf-ps-image-holder">
    <div class="edgtf-ps-image-inner">
        <?php
        $media = playerx_core_get_portfolio_single_media();
    
        if(is_array($media) && count($media)) : ?>
            <?php foreach($media as $single_media) : ?>
                <div class="edgtf-ps-image">
                    <?php playerx_core_get_portfolio_single_media_html($single_media); ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<div class="edgtf-grid-row">
	<div class="edgtf-grid-col-8">
        <?php playerx_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout); ?>
    </div>
	<div class="edgtf-grid-col-4">
        <div class="edgtf-ps-info-holder">
            <?php
            //get portfolio custom fields section
            playerx_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);
            
            //get portfolio categories section
            playerx_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
            
            //get portfolio date section
            playerx_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
            
            //get portfolio tags section
            playerx_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);
            
            //get portfolio share section
            playerx_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
            ?>
        </div>
    </div>
</div>