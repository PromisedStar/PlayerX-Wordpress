<?php if (playerx_edge_options()->getOptionValue('edgtf_match_single_hide_pagination') !== 'yes') : ?>

    <div class="edgtf-match-single-nav">
        <div class="edgtf-container-inner clearfix">
            <?php if ($has_prev_post) : ?>
                <div class="edgtf-match-prev">
                    <div class="edgtf-single-nav-content-holder">
                            <a href="<?php echo esc_url($prev_post['link']); ?>">
                                <span class="edgtf-match-single-nav-mark arrow_triangle-left"></span>
                                <span class="edgtf-match-single-nav-label"><?php esc_html_e('previous', 'playerx-core') ?></span>
                            </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($has_next_post) : ?>
                <div class="edgtf-match-next">
                    <div class="edgtf-single-nav-content-holder">
                            <a href="<?php echo esc_url($next_post['link']); ?>">
                                <span class="edgtf-match-single-nav-mark arrow_triangle-right"></span>
                                <span class="edgtf-match-single-nav-label"><?php esc_html_e('next', 'playerx-core') ?></span>
                            </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>