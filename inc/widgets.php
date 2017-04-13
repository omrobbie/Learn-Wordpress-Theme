<?php
	function tema_widget_register() {
		register_widget('tema_category_widget_1');
	}
	add_action('widget_init', 'tema_widget_register');

	// mengatur widget
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
	};
?>