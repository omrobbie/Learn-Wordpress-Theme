<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php
					if(have_posts()):
				?>
						<header class="archive-header">
							<h2 class="archive-title">
								<?php
									if(is_day()):
										printf(__('Arsip Harian: %s', 'temaku'), get_the_date());
									elseif(is_month()):
										printf(__('Arsip Bulanan: %s', 'temaku'), get_the_date(_x('F Y', 'Format tanggal arsip bulanan', 'temaku')));
									elseif(is_year()):
										printf(__('Arsip Tahunan: %s', 'temaku'), get_the_date(_x('Y', 'Format tanggal arsip tahunan', 'temaku')));
									else:
										_e('Arsip', 'temaku');
									endif;
								?>
							</h2>
						</header>
				<?php
						while(have_posts()):
							the_post();
							get_template_part('content', get_post_format());
						endwhile;
					endif;
				?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>