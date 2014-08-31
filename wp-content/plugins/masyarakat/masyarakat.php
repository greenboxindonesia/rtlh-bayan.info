<?php
/*
Plugin Name: Masyarakat
Plugin URI: http://www.greenboxindonesia.com/
Description: Management user profile, curriculum vitae post and detail contact
Version: 1.0
Author: Albert Sukmono
Author URI: http://www.albert.sukmono.web.id
License: GPLv2
*/

// Add function for post type masyarakat
add_action( 'init', 'create_masyarakat' );

function create_masyarakat() {
register_post_type( 'masyarakat',
array(
	'labels' => array(
	'name' => 'Masyarakat',
	'singular_name' => 'Masyarakat',
	'add_new' => 'Add New',
	'add_new_item' => 'Add Masyarakat',
	'edit' => 'Edit',
	'edit_item' => 'Edit Masyarakat',
	'new_item' => 'New Masyarakat',
	'view' => 'View',
	'view_item' => 'View Masyarakat',
	'search_items' => 'Search Masyarakat',
	'not_found' => 'No Masyarakat found',
	'not_found_in_trash' =>
	'No Masyarakat found in Trash',
	'parent' => 'Parent Masyarakat'
	),

	'public' => true,
	'publicly_queryable' => true,
	'rewrite' => array( 'slug' => 'masyarakat','with_front' => false, 'hierarchical' => true),
	'show_ui' => true,
	'query_var' => true,
	'capability_type' => 'post',
	'menu_position' => 5,
	'supports' => array( 'title', 'editor', 'comments',	'thumbnail' ),
	'taxonomies' => array( 'masyarakat_archive'),
	'register_meta_box_cb' => 'masyarakat_meta_box',
	'menu_icon' => plugins_url( 'images/favicon.png', __FILE__ ),
	'has_archive' => true	
)
);
flush_rewrite_rules();
}

/*
 * HIDE THE EDITOR ON CERTAIN CUSTOM POST TYPES 
*/
add_action('admin_head', 'hide_editor'); 
function hide_editor() { 
	if(get_post_type() == 'masyarakat') //masyarakat merupakan nama post type
	{ ?> <style> #postdivrich { display:none; } </style> <?php } 
}

/*
 * create taxonomy
 */
// hook into the init action and call create_masyarakat_taxonomies when it fires
add_action( 'init', 'masyarakat_taxonomies', 0 );
// create for the post type "masyarakat"
function masyarakat_taxonomies() {
    $labels = array(
        'name'              => _x( 'Masyarakat Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Masyarakat Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite' 			=> array( 'slug' => 'masyarakat_archive', 'with_front' => true ),
		'has_archive' 		=> true
    );

    register_taxonomy( 'masyarakat_categories', array( 'masyarakat' ), $args );
}
/*
 * create metabox
 */
add_action( 'admin_init', 'masyarakat_admin' );

function masyarakat_admin() {
add_meta_box( 
	'masyarakat_meta_box',
	'Masyarakat Details',
	'display_masyarakat_meta_box',
	'masyarakat', 'normal', 'high' 
	);
}

function display_masyarakat_meta_box( $masyarakat ) {
// metabox list
$nama = esc_html( get_post_meta( $masyarakat->ID, 'nama', true ) );
$nik_ktp = esc_html( get_post_meta( $masyarakat->ID, 'nik_ktp', true ) );
$alamat = esc_html( get_post_meta( $masyarakat->ID, 'alamat', true ) );
$jumlah_tanggungan = esc_html( get_post_meta( $masyarakat->ID, 'jumlah_tanggungan', true ) );
$pekerjaan_penghasilan = esc_html( get_post_meta( $masyarakat->ID, 'pekerjaan_penghasilan', true ) );
$luas_rumah = esc_html( get_post_meta( $masyarakat->ID, 'luas_rumah', true ) );
$kondisi_lantai = esc_html( get_post_meta( $masyarakat->ID, 'kondisi_lantai', true ) );
$kondisi_dinding = esc_html( get_post_meta( $masyarakat->ID, 'kondisi_dinding', true ) );
$kondisi_atap = esc_html( get_post_meta( $masyarakat->ID, 'kondisi_atap', true ) );
$bukti_penguasaan = esc_html( get_post_meta( $masyarakat->ID, 'bukti_penguasaan', true ) );
$kelengkapan_utilitas = esc_html( get_post_meta( $masyarakat->ID, 'kelengkapan_utilitas', true ) );
//testbed
$colors = esc_attr( get_post_meta( $masyarakat->ID, 'colors', true ) );
//$selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';
?>
<table>
	<tr>
		<td style="width: 185%">Nama</td>
		<td><input type="text" size="55" name="masyarakat_nama" value="<?php echo $nama; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">NIK KTP</td>
		<td><input type="text" size="55" name="masyarakat_nik_ktp" value="<?php echo $nik_ktp; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Alamat</td>
		<td><input type="text" size="55" name="masyarakat_alamat" value="<?php echo $alamat; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Jumlah Tanggungan</td>
		<td><input type="text" size="55" name="masyarakat_jumlah_tanggungan" value="<?php echo $jumlah_tanggungan; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Pekerjaan/Penghasilan/Bulan (RP)</td>
		<td><input type="text" size="55" name="masyarakat_pekerjaan_penghasilan" value="<?php echo $pekerjaan_penghasilan; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Luas Rumah</td>
		<td><input type="text" size="55" name="masyarakat_luas_rumah" value="<?php echo $luas_rumah; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Kondisi Lantai</td>
		<td><input type="text" size="55" name="masyarakat_kondisi_lantai" value="<?php echo $kondisi_lantai; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Kondisi Dinding</td>
		<td><input type="text" size="55" name="masyarakat_kondisi_dinding" value="<?php echo $kondisi_dinding; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Kondisi Atap</td>
		<td><input type="text" size="55" name="masyarakat_kondisi_atap" value="<?php echo $kondisi_atap; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Bukti Penguasaan Tanah</td>
		<td><input type="text" size="55" name="masyarakat_bukti_penguasaan" value="<?php echo $bukti_penguasaan; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 185%">Kelengkapan Utilitas</td>
		<td><input type="text" size="55" name="masyarakat_kelengkapan_utilitas" value="<?php echo $kelengkapan_utilitas; ?>" /></td>
	</tr>
</table>
<?php }

add_action( 'save_post',
'add_masyarakat_fields', 10, 2 );

function add_masyarakat_fields( $masyarakat_id, $masyarakat ) {
// Check post type for User Profile
if ( $masyarakat->post_type == 'masyarakat' ) {
// Store data in post meta table if present in post data

if ( isset( $_POST['masyarakat_nama'] ) &&
$_POST['masyarakat_nama'] != '' ) {
update_post_meta( $masyarakat_id, 'nama',
$_POST['masyarakat_nama'] );
}// Field NIK KTP
if ( isset( $_POST['masyarakat_nik_ktp'] ) &&
$_POST['masyarakat_nik_ktp'] != '' ) {
update_post_meta( $masyarakat_id, 'nik_ktp',
$_POST['masyarakat_nik_ktp'] );
}// Field Alamat
if ( isset( $_POST['masyarakat_alamat'] ) &&
$_POST['masyarakat_alamat'] != '' ) {
update_post_meta( $masyarakat_id, 'alamat',
$_POST['masyarakat_alamat'] );
}// Field Jumlah Tanggungan
if ( isset( $_POST['masyarakat_jumlah_tanggungan'] ) &&
$_POST['masyarakat_jumlah_tanggungan'] != '' ) {
update_post_meta( $masyarakat_id, 'jumlah_tanggungan',
$_POST['masyarakat_jumlah_tanggungan'] );
}// Field Pekerjaan/Penghasilan
if ( isset( $_POST['masyarakat_pekerjaan_penghasilan'] ) &&
$_POST['masyarakat_pekerjaan_penghasilan'] != '' ) {
update_post_meta( $masyarakat_id, 'pekerjaan_penghasilan',
$_POST['masyarakat_pekerjaan_penghasilan'] );
}// Field Luas Rumah
if ( isset( $_POST['masyarakat_luas_rumah'] ) &&
$_POST['masyarakat_luas_rumah'] != '' ) {
update_post_meta( $masyarakat_id, 'luas_rumah',
$_POST['masyarakat_luas_rumah'] );
}// Field Kondisi Lantai
if ( isset( $_POST['masyarakat_kondisi_lantai'] ) &&
$_POST['masyarakat_kondisi_lantai'] != '' ) {
update_post_meta( $masyarakat_id, 'kondisi_lantai',
$_POST['masyarakat_kondisi_lantai'] );
}// Field Kondisi Dinding
if ( isset( $_POST['masyarakat_kondisi_dinding'] ) &&
$_POST['masyarakat_kondisi_dinding'] != '' ) {
update_post_meta( $masyarakat_id, 'kondisi_dinding',
$_POST['masyarakat_kondisi_dinding'] );
}// Field Kondisi Atap
if ( isset( $_POST['masyarakat_kondisi_atap'] ) &&
$_POST['masyarakat_kondisi_atap'] != '' ) {
update_post_meta( $masyarakat_id, 'kondisi_atap',
$_POST['masyarakat_kondisi_atap'] );
}// Field Bukti Penguasaan
if ( isset( $_POST['masyarakat_bukti_penguasaan'] ) &&
$_POST['masyarakat_bukti_penguasaan'] != '' ) {
update_post_meta( $masyarakat_id, 'bukti_penguasaan',
$_POST['masyarakat_bukti_penguasaan'] );
}// Field kelengkapan Utilitas
if ( isset( $_POST['masyarakat_kelengkapan_utilitas'] ) &&
$_POST['masyarakat_kelengkapan_utilitas'] != '' ) {
update_post_meta( $masyarakat_id, 'kelengkapan_utilitas',
$_POST['masyarakat_kelengkapan_utilitas'] );
}
//batas
}
}

add_filter( 'template_include',
'design_template_function', 1 );

// Load Template from themes
function design_template_function( $template_path ) {
if ( get_post_type() == 'masyarakat' ) {
if ( is_single() ) {
// checks if the file exists in the theme first,
// otherwise serve the file from the plugin
if ( $theme_file = locate_template( array
( 'single-masyarakat.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) .
'/single-masyarakat.php';
}
}
if ( is_archive() ) {
// checks if the file exists in the theme first,
// otherwise serve the file from the plugin
if ( $theme_file = locate_template( array
( 'archive-masyarakat.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) .
'/archive-masyarakat.php';
}
}
}
return $template_path;
}

?>
