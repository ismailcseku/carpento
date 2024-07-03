
			<a class="menuzord-brand site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if( !$use_logo ): ?>
				<?php echo esc_html( $site_brand ); ?>
				<?php else: ?>
					<?php if( !$use_switchable_logo ): ?>
					<img class="logo-default" src="<?php echo esc_url( $logo_default ); ?>" alt="<?php esc_attr_e( 'Carpento Logo', 'carpento' ); ?>">
					<?php else: ?>
					<img class="logo-primary" src="<?php echo esc_url( $logo_light ); ?>" alt="<?php esc_attr_e( 'Carpento Logo Light', 'carpento' ); ?>">
					<img class="logo-on-sticky" src="<?php echo esc_url( $logo_dark ); ?>" alt="<?php esc_attr_e( 'Carpento Logo Dark', 'carpento' ); ?>">
					<?php endif; ?>
				<?php endif; ?>
			</a>