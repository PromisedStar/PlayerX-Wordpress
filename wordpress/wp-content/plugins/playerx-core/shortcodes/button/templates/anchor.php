<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php playerx_edge_inline_style($button_styles); ?> <?php playerx_edge_class_attribute($button_classes); ?> <?php echo playerx_edge_get_inline_attrs($button_data); ?> <?php echo playerx_edge_get_inline_attrs($button_custom_attrs); ?>>
    <?php if($trapeze_button === 'yes'){ ?>
        <span class="edgtf-btn-trapeze-left-side" <?php playerx_edge_inline_style($button_trapeze_styles); ?>></span>
    <?php } ?>
    <span class="edgtf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo playerx_edge_icon_collections()->renderIcon($icon, $icon_pack); ?>
    <?php if($trapeze_button === 'yes'){ ?>
        <span class="edgtf-btn-trapeze-right-side" <?php playerx_edge_inline_style($button_trapeze_styles); ?>></span>
    <?php } ?>
</a>