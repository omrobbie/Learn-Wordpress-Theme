<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- indikator -->
	<ol class="caraousel-indicators">
		<?php
			if(have_posts()):
				query_posts('posts_per_page=5');
				$no = 0;
				while(have_posts()):
					the_post();
		?>
					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $no; ?>" <?php if($no==0) echo "class='active'"; ?>></li>
		<?php
					$no++;
				endwhile;
			endif;
		?>
	</ol>

	<!-- wrapper untuk slide -->
	<div class="carousel-inner" role="listbox">
		<?php
			if(have_posts()):
				query_posts('posts_per_page=5');
				$no = 0;
				while(have_posts()):
					the_post();
		?>
					<div class="item <?php if($no==0) echo "active"; ?>">
						<?php tema_image_post(); ?>
						<div class="carousel-caption">
							<h3 class="entry-title"><?php the_title(); ?></h3>
							<div class="entry-content"><?php the_excerpt(); ?></div>
						</div>
					</div>
		<?php
					$no++;
				endwhile;
			endif;
		?>
	</div>

	<!-- navigasi carousel -->
	<a href="#carousel-example-generic" class="left carousel-control" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>

	<a href="#carousel-example-generic" class="right carousel-control" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>