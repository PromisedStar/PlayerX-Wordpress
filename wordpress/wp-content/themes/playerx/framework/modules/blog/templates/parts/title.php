<?php
$title_tag    = isset( $title_tag ) ? $title_tag : 'h4';
$title_styles = isset( $this_object ) && isset( $params ) ? $this_object->getTitleStyles( $params ) : array();
?>

<<?php echo esc_attr($title_tag);?> itemprop="name" class="entry-title edgtf-post-title" <?php playerx_edge_inline_style($title_styles); ?>>
    <?php if(playerx_edge_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php } ?>
        <?php the_title(); ?>
    <?php if(playerx_edge_blog_item_has_link()) { ?>
        </a>
    <?php } ?>
</<?php echo esc_attr($title_tag);?>>