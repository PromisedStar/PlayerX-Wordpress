<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-text">
            <div class="edgtf-post-mark">
                <span class="lnr lnr-link edgtf-link-mark"></span>
            </div>
            <div class="edgtf-post-text-inner">
                <div class="edgtf-post-text-main">
                    <?php playerx_edge_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>