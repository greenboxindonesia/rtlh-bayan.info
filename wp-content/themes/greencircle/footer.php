<?php
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
?>
<footer>
	<div class="container-third">
		<div class="container">
			<div class="timeline-bottom">
				<div class="timeline-bottom-left"></div>
				<div class="timeline-bottom-right"></div>
			</div><!--/.timeline-bottom -->
		</div><!--/.container -->
	</div><!--/.container-third -->
	
	<div class="container-fort">
		<div class="container">
			<div class="footer-custom">
				<div class="footer-colom-left">
					<p>Basis Data Perumahan Kumuh</p>
					<p><a style="color:white;" href="http://news.greenbox.web.id/" target="_blank">Lombok Utara Kec. Bayan, Indonesia</a></p>
					<p>Copyright &copy; <?php the_time('Y') ?>. All rights reserved.</p>
				</div>
				<div class="footer-menu-bottom">
					<div class="footer-menu-policy">
					<p>Basis Data Perumahan Kumuh Berbasis System Informasi</p>
					<p>Created and Development by <a style="color:white;" href="http://www.greenboxindonesia.com" target="_blank">Greenboxindonesia</a></p></div>
				</div>
			</div>
		</div><!-- /.container -->
	</div><!-- /.container-fort -->
</footer>
<?php echo stripslashes( get_option( 'greenhouse_analytics' ) );?>
<?php wp_footer();?>
</body>
</html>
