<div class="row tm-blog-sidebar-row">
	<div class="col-lg-8">
		<div class="main-content-area">
			<?php do_action( 'carpento_blog_main_content_area_start' ); ?>

			<?php
				carpento_get_blog_post_layout();
			?>
			<?php
				carpento_get_pagination();
			?>

			<?php do_action( 'carpento_blog_main_content_area_end' ); ?>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="sidebar-area tm-sidebar-area sidebar-right">
			<div class="sidebar-area-inner">
				<?php get_sidebar( 'right' ); ?>
			</div>
		</div>
	</div>
</div>