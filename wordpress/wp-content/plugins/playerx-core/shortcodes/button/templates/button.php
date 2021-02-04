<button type="submit" <?php playerx_edge_inline_style($button_styles); ?> <?php playerx_edge_class_attribute($button_classes); ?> <?php echo playerx_edge_get_inline_attrs($button_data); ?> <?php echo playerx_edge_get_inline_attrs($button_custom_attrs); ?>>
    <span class="edgtf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo playerx_edge_icon_collections()->renderIcon($icon, $icon_pack); ?>
</button>