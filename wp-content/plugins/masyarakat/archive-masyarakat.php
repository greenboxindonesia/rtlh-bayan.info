<?php
/*
* Archive Template Profile Masyarakat
* Author: Albert Sukmono
* Description: Archive Template Plugin "masyarakat" for view content post profile
*/

get_header(); ?>

    <?php if (have_posts()) :
    // Queue the first post.
    the_post(); ?>

    <div class="container">
        <div class="row">
            <div class="span12">
                <?php if (function_exists('bootstrapwp_breadcrumbs_staff')) {
                bootstrapwp_breadcrumbs_staff();
                } ?>
            </div>
        </div>

        <div class="row content">
            <div class="span8">

                <header class="page-title">
                    <h2><?php
                        if (is_day()) {
                            printf(__('Daily Archives: %s', 'bootstrapwp'), '<span>' . get_the_date() . '</span>');
                        } elseif (is_month()) {
                            printf(
                                __('Monthly Archives: %s', 'bootstrapwp'),
                                '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'bootstrapwp')) . '</span>'
                            );
                        } elseif (is_year()) {
                            printf(
                                __('Yearly Archives: %s', 'bootstrapwp'),
                                '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'bootstrapwp')) . '</span>'
                            );
                        } elseif (is_tag()) {
                            printf(__('Tag Archives: %s', 'bootstrapwp'), '<span>' . single_tag_title('', false) . '</span>');
                            // Show an optional tag description
                            $tag_description = tag_description();
                            if ($tag_description) {
                                echo apply_filters(
                                    'tag_archive_meta',
                                    '<div class="tag-archive-meta">' . $tag_description . '</div>'
                                );
                            }
                        } elseif (is_category()) {
                            printf(
                                __('Category Archives: %s', 'bootstrapwp'),
                                '<span>' . single_cat_title('', false) . '</span>'
                            );
                            // Show an optional category description
                            $category_description = category_description();
                            if ($category_description) {
                                echo apply_filters(
                                    'category_archive_meta',
                                    '<div class="category-archive-meta">' . $category_description . '</div>'
                                );
                            }
                        } else {
                            _e('Data Masyarakat', 'bootstrapwp');
                        }
                        ?></h2>
                </header>
                <?php
                // Rewind the loop back
                    rewind_posts();
                ?>

                <?php while (have_posts()) : the_post(); ?>
                    <div <?php post_class(); ?>>
                        <div class="row">
                            <?php // Post thumbnail conditional display.
                            if ( bootstrapwp_autoset_featured_img() !== false ) : ?>
                                <div class="span2">
									<div class="image-headline">
									<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                                    <?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
									} else { ?>
									<img style="width:150px;height:150px;" src="<?php bloginfo('template_directory'); ?>/img/no-image-thumb.svg" alt="<?php the_title(); ?>" />
									<?php } ?>
									</a>
									</div>
                                </div>
                                <div class="span6">
                            <?php else : ?>
                                <div class="span8">
                            <?php endif; ?>
									<div style="font-size:20px;border-bottom: solid 1px #ddd;margin-bottom: 10px;padding-bottom: 10px;">
										<div class="nomor-urut">Nomor Urut : <?php the_title(); ?>&nbsp&nbsp&nbsp <a style="font-size:15px;" href="<?php the_permalink(); ?>" title="<?php the_title();?>"><i class="fa fa-sign-out"></i> Detail</a></div> 
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
									</div>
                                    <?php echo get_excerpt(555); ?>
                                </div>
                        </div><!-- /.row -->
                        <hr/>
                    </div><!-- /.post_class -->
                <?php endwhile; ?>

                <?php bootstrapwp_content_nav('nav-below');?>

            <?php endif; ?>
        </div>

<?php get_sidebar('masyarakat'); ?>
<?php get_footer(); ?>
