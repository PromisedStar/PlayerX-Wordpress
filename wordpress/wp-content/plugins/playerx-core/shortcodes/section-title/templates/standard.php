<div class="edgtf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo playerx_edge_get_inline_style($holder_styles); ?>>
	<div class="edgtf-st-inner">
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="edgtf-st-title" <?php echo playerx_edge_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
        <?php if(!empty($image)) { ?>
            <div class="edgtf-st-separator">
            <?php echo wp_get_attachment_image($image, 'full'); ?>
            </div>
        <?php

        } else if(!empty($svg) && $separator_type == 'svg'){ ?>

            <div class="edgtf-st-separator" <?php echo playerx_edge_get_inline_style($separator_styles); ?>>

            <?php echo urldecode(base64_decode($params['svg'])); ?>
            </div>
        <?php

        } ?>
		<?php if(!empty($text)) { ?>
			<p class="edgtf-st-text" <?php echo playerx_edge_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true)); ?>
			</p>
		<?php } ?>
	</div>
</div>