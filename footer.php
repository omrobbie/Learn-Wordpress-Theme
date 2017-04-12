<footer role="footer">
	<div class="container">
		<div class="row">
			<!-- <p class="text-center">Copyright &copy; My Wordpress Blog</p> -->
			<div class="col-md-4">
				<?php
					// untuk mengaktifkan widget customizer di footer1
					if(is_active_sidebar('footer1')) {
						dynamic_sidebar('footer1');
					}
				?>
			</div>
			<div class="col-md-4">
				<?php
					// untuk mengaktifkan widget customizer di footer2
					if(is_active_sidebar('footer2')) {
						dynamic_sidebar('footer2');
					}
				?>
			</div>
			<div class="col-md-4">
				<?php
					// untuk mengaktifkan widget customizer di footer3
					if(is_active_sidebar('footer3')) {
						dynamic_sidebar('footer3');
					}
				?>
			</div>
		</div>
	</div>
</footer>
<?php // wp_footer(); ?>

</body>
</html>