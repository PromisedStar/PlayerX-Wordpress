<?php // if(eldritch_edge_options()->getOptionValue('match_single_hide_categories') !== 'yes') : ?>

	<?php
	$categories   = wp_get_post_terms(get_the_ID(), 'match-category');
	$categy_names = array();

	if(is_array($categories) && count($categories)) :
		foreach($categories as $category) {
			$categy_names[] = $category->name;
		}

		?>
        <span class="edgtf-match-item-categories"><?php echo esc_html(implode(', ', $categy_names)); ?></span>
	<?php endif; ?>

<?php //endif; ?>