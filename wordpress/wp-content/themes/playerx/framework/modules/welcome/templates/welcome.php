<div class="wrap about-wrap edgtf-welcome-page">
    <div class="edgtf-welcome-page-heading">
        <div class="edgtf-welcome-page-logo">
            <img src="<?php echo esc_url( EDGE_FRAMEWORK_MODULES_ROOT . '/welcome/assets/img/logo.png' ); ?>" alt="<?php esc_attr_e( 'Qode Logo', 'playerx' ); ?>"/>
        </div>
        <h1 class="edgtf-welcome-page-title">
			<?php echo sprintf( esc_html__( 'Welcome to %s', 'playerx' ), $theme_name ); ?>
            <small><?php echo esc_html( $theme_version ) ?></small>
        </h1>
    </div>
    <div class="edgtf-welcome-page-text">
		<?php echo sprintf( esc_html__( 'Thank you for installing %s - %s! Everything in %s is streamlined to make your website building experience as simple and fun as possible. We hope you love using it to make a spectacular website.', 'playerx' ),
			$theme_name,
			$theme_description,
			$theme_name
		); ?>
    </div>
    <div class="edgtf-welcome-page-content">
        <div class="edgtf-welcome-page-screenshot">
            <img src="<?php echo esc_url( $theme_screenshot ); ?>" alt="<?php esc_attr_e( 'Theme Screenshot', 'playerx' ); ?>"/>
        </div>
        <div class="edgtf-welcome-page-links-holder">
            <div class="edgtf-welcome-page-install-core">
                <p><?php esc_html_e( 'Please install and activate required plugins in order to gain access to all the theme functionalities and features.', 'playerx' ); ?></p>
                <a class="edgtf-welcome-page-install-button" href="<?php echo add_query_arg( array( 'page' => 'install-required-plugins&plugin_status=install' ), esc_url( admin_url( 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Install Required Plugins', 'playerx' ); ?>
                </a>
            </div>

            <h3><?php esc_html_e( 'Useful Links:', 'playerx' ); ?></h3>
            <ul class="edgtf-welcome-page-links">
                <li>
                    <a href="https://helpcenter.qodeinteractive.com" target="_blank"><?php esc_html_e( 'Help Center', 'playerx' ); ?></a>
                </li>
                <li>
	                <a href="<?php echo sprintf('https://playerx.%s-themes.com/documentation/', EDGE_PROFILE_SLUG ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'playerx' ); ?></a>
                </li>
                <li>
                    <a href="https://qodeinteractive.com/" target="_blank"><?php esc_html_e( 'All Our Themes', 'playerx' ); ?></a>
                </li>
                <li>
                    <a href="<?php echo add_query_arg( array( 'page' => 'install-required-plugins&plugin_status=install' ), esc_url( admin_url( 'themes.php' ) ) ); ?>"><?php esc_html_e( 'Install Required Plugins', 'playerx' ); ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>