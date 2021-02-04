<?php
if ( ! function_exists( 'playerx_core_dashboard_load_files' ) ) {
    function playerx_core_dashboard_load_files() {
        require_once PLAYERX_CORE_ABS_PATH . '/core-dashboard/core-dashboard.php';
        require_once PLAYERX_CORE_ABS_PATH . '/core-dashboard/rest/include.php';
        require_once PLAYERX_CORE_ABS_PATH . '/core-dashboard/registration-rest.php';
        require_once PLAYERX_CORE_ABS_PATH . '/core-dashboard/sub-pages/sub-page.php';

        foreach (glob(PLAYERX_CORE_ABS_PATH . '/core-dashboard/sub-pages/*/load.php') as $subpages) {
            include_once $subpages;
        }
    }

    add_action('after_setup_theme', 'playerx_core_dashboard_load_files');
}