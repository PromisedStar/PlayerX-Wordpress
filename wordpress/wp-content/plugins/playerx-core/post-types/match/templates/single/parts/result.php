<?php
$result =  get_post_meta(get_the_ID(), 'edgtf_match_result_meta', true); ?>

<h4 class="edgtf-match-single-result-holder">
    <span><?php echo esc_attr($result) ?></span>
</h4>