<?php
	function tema_widget_register() {
		register_widget('tema_category_widget_1');
		register_widget('tema_category_widget_2');
	}
	add_action('widget_init', 'tema_widget_register');

	// mengatur widget untuk kategori
	class tema_category_widget_1 extends WP_Widget {
		function tema_category_widget_1() {
			$widget_ops = array(
				'classname'		=> 'tema_category_widget_1',
				'description'	=> __('Menampilkan artikel per kategori bagian 1', 'temaku')
			);
			$control_ops = array(
				'width'		=> 200,
				'height'	=> 250
			);
			parent::WP_Widget(
				false,
				$name = __('TM: Kategori 1', 'temaku'),
				$widget_ops
			);
		}

		function form($instance) {
			$tm_defaults['category'] = '';
			$instance = wp_parse_args((array) $instance, $tm_defaults);
			$category = $instance['category'];
?>
			<label for="<?php echo $this->get_field_id('category'); ?>">
				<?php _e('Pililh kategori', 'temaku'); ?>:
			</label>
			<?php
				wp_dropdown_categories(array(
					'show_option_none'	=> ' ',
					'name'				=> $this->get_field_name('category'),
					'selected'			=> $category
				));
			?>
<?php
		}

		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['category'] = $new_instance['category'];
			return $instance;
		}

		function widget($args, $instance) {
			extract($args);
			extract($instance);
			global $post;
			$category = isset($instance['category']) ? $instance['category'] : '';

			$get_post = new WP_Query(array(
				'posts_per_page'	=> 5,
				'post_type'			=> 'post',
				'category__in'		=> $category
			));
			echo $before_widget;
?>
			<h2 class="widget-title"><?php echo get_cat_name($category); ?></h2>
			<div class="row">
				<div class="col-sm-6">
<?php
					$i = 1;
					while($get_post->have_posts()):
						$get_post->the_post();
						if($i==1) {
							tema_image_post();
?>
							<h3 class="post-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h3>
							<span class="meta_date"><?php the_time('d F Y'); ?></span>
							<?php the_excerpt(); ?>
				</div>
				<div class="col-sm-6">
<?php
						} else {
?>
							<div class="row" style="margin-bottom:20px">
								<div class="col-xs-5">
									<?php tema_image_post(); ?>
								</div>
								<div class="col-xs-7">
									<h4 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
									<span class="meta_date"><?php the_time('d F Y'); ?></span>
								</div>
							</div>
<?php
						}

						$i++;
					endwhile;
					wp_reset_query();
?>
				</div>
			</div>
<?php
			echo $after_widget;
		}
	}

	// mengatur widget untuk layout
	class tema_category_widget_2 extends WP_Widget {
		function tema_category_widget_2() {
			$widget_ops = array(
				'classname'		=> 'tema_category_widget_2',
				'description'	=> __('Menampilkan artikel per kategory bagian 2', 'temaku')
			);
			$control_ops = array(
				'width'		=> 250,
				'height'	=> 300
			);
			parent::WP_Widget(
				false,
				$name = __('TM: Kategori 2', 'temaku'),
				$widget_ops
			);
		}

		function form($instance) {
			$tm_defaults['type'] = 'latest';
			$tm_defaults['category'] = '';
			$instance = wp_parse_args((array) $instance, $tm_defaults);
			$type = $instance['type'];
			$category = $instance['category'];
?>
			<p>
				<input type="radio" <?php checked($type, 'latest'); ?> id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" value="latest" /> <?php _e('Tampilkan artikel terakhir', 'temaku'); ?> <br />
				<input type="radio" <?php checked($type, 'category'); ?> id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" value="category" /> <?php _e('Tampilkan kategori', 'temaku'); ?>
			</p>

			<p>
				<label for="<?php $this->get_field_id('category'); ?>"><?php _e('Pilih kategori', 'temaku'); ?></label>
				<?php
					wp_dropdown_categories(array(
						'show_option_none'	=> ' ',
						'name'				=> $this->get_field_name('category'),
						'selected'			=> $category
					));
				?>
			</p>
<?php
		}

		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['type'] = $new_instance['type'];
			$instance['category'] = $new_instance['category'];
			return $instance;
		}

		function widget($args, $instance) {
			extract($args);
			extract($instance);
			global $post;
			$type = isset($instance['type']) ? $instance['type'] : 'latest';
			$category = isset($instance['category']) ? $instance['category'] : '';

			if($type == 'latest') {
				$get_post = new WP_Query(array(
					'posts_per_page'		=> 5,
					'post_type'				=> 'post',
					'ignore_sticky_post'	=> true
				));
			} else {
				$get_post = new WP_Query(array(
					'posts_per_page'		=> 5,
					'post_type'				=> 'post',
					'category__in'			=> $category
				));
			}
			echo $before_widget;

			if($type == 'latest') {
?>
				<h2 class="widget-title">Artikel Terbaru</h2>
<?php
			} else {
?>
				<h2 class="widget-title"><?php echo get_cat_name($category); ?></h2>
<?php
			}
?>
			<div class="row" style="margin-bottom:20px">
<?php
				$i = 1;
				while($get_post->have_posts()):
					$get_post->the_post();

					if($i == 1) {
?>
						<div class="col-sm-5">
							<?php tema_image_post(); ?>
						</div>
						<div class="col-sm-7">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h3>
							<span class="meta_date"><?php the_time('d F Y'); ?></span>
							<?php the_excerpt(); ?>
						</div>
			</div>
			<div class="row">
<?php
					} else {
?>
						<div class="col-sm-6">
							<div class="row" style="margin-bottom:20px">
								<div class="col-xs-5">
									<?php tema_image_post(); ?>
								</div>
								<div class="col-xs-7">
									<h4 class="entry-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
									</h4>
									<span class="meta_date"><?php the_time('d F Y'); ?></span>
								</div>
							</div>
						</div>
<?php
						if($i == 3) {
?>
			</div>
			<div class="row" style="margin-bottom:20px">
<?php
						}
					}
					$i++;
				endwhile;
				wp_reset_query();
?>
			</div>
<?php
			echo $after_widget;
		}
	}
?>