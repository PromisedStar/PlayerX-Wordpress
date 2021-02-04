<?php if(comments_open()) { ?>
	<div class="edgtf-post-info-comments-holder">
		<a itemprop="url" class="edgtf-post-info-comments" href="<?php comments_link(); ?>">
			<?php echo playerx_edge_icon_collections()->renderIcon( 'fa fa-comment', 'font_awesome' ); ?>
			<?php comments_number('0 ', '1 ', '% ' ); ?>
		</a>
	</div>
<?php } ?>