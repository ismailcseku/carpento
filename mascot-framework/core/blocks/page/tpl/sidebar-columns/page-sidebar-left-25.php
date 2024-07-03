<div class="row tm-blog-sidebar-row">
	<div class="col-lg-3">
		<div class="sidebar-area tm-sidebar-area sidebar-left">
			<div class="sidebar-area-inner">
				<?php get_sidebar( 'left' ); ?>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="main-content-area">
			<?php do_action( 'carpento_page_main_content_area_start' ); ?>
			<?php
				carpento_get_page_content();
			?>
			<?php do_action( 'carpento_page_main_content_area_end' ); ?>
		</div>
	</div>
</div>