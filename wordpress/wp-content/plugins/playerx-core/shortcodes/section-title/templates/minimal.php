<div class="edgtf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo playerx_edge_get_inline_style($holder_styles); ?>>
    <div class="edgtf-st-inner">
        <?php if(!empty($title)) { ?>
            <<?php echo esc_attr($title_tag); ?> class="edgtf-st-title" <?php echo playerx_edge_get_inline_style($title_styles); ?>>
            <?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
            </<?php echo esc_attr($title_tag); ?>>
        <?php } ?>
    </div>
</div>