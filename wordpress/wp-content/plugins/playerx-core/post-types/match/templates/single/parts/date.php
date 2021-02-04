<?php

    $id = get_the_ID();

    $date = get_post_meta($id, 'edgtf_match_date_meta', true);
    $dateobj = date_create_from_format('Y-m-d', $date);
    $date = date_format($dateobj, 'jS F Y');
    $time = get_post_meta($id, 'edgtf_match_time_meta', true); ?>

    <span class="edgtf-match-date"> <?php echo esc_attr($date) ?>, <?php echo esc_attr($time) ?></span>

<?php // endif; ?>