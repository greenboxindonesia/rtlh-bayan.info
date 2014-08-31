<?php
/*
* Single Profile Masyarakat
* Author: Albert Sukmono
* Description: Single Template Plugin "masyarakat" for view content post profile
*/

get_header(); ?>
	
<div class="container">
        <div class="row">
            <div class="span12">
                <?php if (function_exists('bootstrapwp_breadcrumbs_staff')) {
                bootstrapwp_breadcrumbs_staff();
                } ?>
            </div><!--/.span12 -->
        </div><!--/.row -->
		<div class="row content">
		<!-- Cycle through all posts -->
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- Display featured image in right-aligned floating div -->
			<div class="pic-profile">
				<div class="image-post-single">
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('full', array('class' => 'profile'));
				} else { ?>
				<img style="width:330px;height:auto;" src="<?php bloginfo('template_directory'); ?>/img/no-image-thumb.svg" alt="<?php the_title(); ?>" />
				<?php } ?>
				</div>
			</div>
			<div class="isi-profile">
			<!-- Display Title and Metabox -->
				<div class="nomor-urut">Nomor Urut : <?php the_title(); ?></div>
				<!-- Display Subjek -->
				<div class="deskripsi-profile">SUBJEK</div>
				<table class="data-table">
					<tr>
						<td style="width: 65%">Nama</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'nama', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 65%">NIK KTP (16 Digit)</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'nik_ktp', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 65%">Alamat</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'alamat', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 65%">Jumlah Tanggungan</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'jumlah_tanggungan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 65%">Pekerjaan/Penghasilan/Bulan (Rp)</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'pekerjaan_penghasilan', true ) ); ?></td>
					</tr>
				</table>
				<br />
				<!-- Display Objek -->
				<div class="deskripsi-profile">OBJEK</div>
				<table class="data-table">
					<tr>
						<td style="width: 77%">Luas Rumah</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'luas_rumah', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 77%">Kondisi Lantai</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'kondisi_lantai', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 77%">Kondisi Dinding</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'kondisi_dinding', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 77%">Kondisi Atap</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'kondisi_atap', true ) ); ?></td>
					</tr>
				</table>
				<br />
				<!-- Display Sarana Pendukung -->
				<div class="deskripsi-profile">SARANA PENDUKUNG</div>
				<table class="data-table">
					<tr>
						<td style="width: 74%">Bukti Penguasaan Tanah</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'bukti_penguasaan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 74%">Kelengkapan Utilitas Rumah</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'kelengkapan_utilitas', true ) ); ?></td>
					</tr>
				</table>
				<br />
			</div><!--- /.isi-profile --->
			<?php endwhile; ?>
		</div><!-- .row content -->
</div><!--/.container -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
