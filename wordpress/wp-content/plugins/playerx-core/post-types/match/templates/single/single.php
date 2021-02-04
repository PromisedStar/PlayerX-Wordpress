<div class="edgtf-container">
	<div class="edgtf-container-inner clearfix">
		<div class="edgtf-grid-row">
			<div class="edgtf-grid-col-9">
				<div class="edgtf-match-top-left">
					<?php
					//get match title
					playerx_core_get_cpt_single_module_template_part('templates/single/parts/title', 'match', '');
					?>
					<?php
					playerx_core_get_cpt_single_module_template_part('templates/single/parts/content', 'match', '');
					?>
				</div>
			</div>
			<div class="edgtf-grid-col-3">
				<div class="edgtf-match-top-right">
					<?php

					//get match info title
					playerx_core_get_cpt_single_module_template_part('templates/single/parts/info-title', 'match', '');

					// //get match categories section
					playerx_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'match', '');

					// //get match location section
					playerx_core_get_cpt_single_module_template_part('templates/single/parts/location', 'match', '');

					// //get match date section
					klippe_mikado_match_get_date_part();

					// //get match custom fields section
					playerx_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'match', '');

					// //get match share section
					playerx_core_get_cpt_single_module_template_part('templates/single/parts/social', 'match', '');
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="edgtf-match-image-holder">
	<?php
	$images_array = array();

	$images_array['images'] = klippe_mikado_get_single_match_images();
	$images_layout = playerx_edge_get_meta_field_intersect('match_images_layout', playerx_edge_get_page_id());

	playerx_core_get_cpt_single_module_template_part('templates/single/parts/'.$images_layout, 'match','',$images_array); ?>
</div>