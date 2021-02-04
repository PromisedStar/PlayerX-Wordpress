<?php $icon_html = playerx_edge_icon_collections()->renderIcon($icon, $icon_pack, $params); ?>
<div class="edgtf-icon-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo playerx_edge_get_inline_style($holder_styles); ?>>
	<div class="edgtf-il-icon-holder">
		<?php echo wp_kses_post($icon_html); ?>
	</div>
    <?php if(!empty($link)) : ?>
    <a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
    <?php endif; ?>
	<span class="edgtf-il-text" <?php echo playerx_edge_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></span>
    <?php if(!empty($link)) : ?>
    </a>
    <?php endif; ?>
</div>