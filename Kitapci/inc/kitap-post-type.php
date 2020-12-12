<?php
/*
*
* ÖZEL Gönderi (CUSTOM POST)
*
*/

// Özel gönderi fonksiyonu

function kitaplar_fonksiyonu() {  // özel gönderi fonksiyonu
	$labels = array(
		'name'               => _x( 'Kitaplar', 'gönderi türü genel adı' ),
		'singular_name'      => _x( 'Kitap', 'yazı tipi tekil isim' ),
		'add_new'            => _x( 'Yeni Ekle', 'book' ), // Admin menü yeni ekleme butonu
		'add_new_item'       => __( 'Yeni Kitap Ekle' ), // Ekleme modu başlığı
		'edit_item'          => __( 'Kitap Düzenle' ), // Düzenleme modu başlığı
		'new_item'           => __( 'Yeni Kitap' ),
		'all_items'          => __( 'Tüm Kitaplar' ), // 
		'view_item'          => __( 'Kitabı Gör' ), // 
		'search_items'       => __( 'Kitap Ara' ), // Arama çubuğu butonunda görünecek metin
		'not_found'          => __( 'Kitap Bulunamadı' ),  // Eğer hiç gönderi eklenmemişse
		'not_found_in_trash' => __( 'Çöp kutusunda kitap bulunamadı' ), // Çöp kutusu uyarısı
		'menu_name'          => 'Kitaplar' // Menüde görünecek isim
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Yeni kitap ekleyip düzenleyin',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'menu_icon'   	=> 'dashicons-book-alt', // Admin menüsündeki kitap iconu
        'has_archive'   => true,
	);
	
	register_post_type( 'kitaplar', $args );  // Gönderi tipi 
	
}
add_action( 'init', 'kitaplar_fonksiyonu' ); // Gönderi türünü aktifleştirme




// Özel gönderi kategorileri

function kitap_kategorileri() { // Taksonomy ekleme (Özel Kategoriler)
	$labels = array(
		'name'              => _x( 'Kitap Kategorileri', 'taxonomy general name' ),
		'singular_name'     => _x( 'Kitap Kategorisi', 'taxonomy singular name' ),
		'search_items'      => __( 'Kitapo Kategorilerinde Ara' ),
		'all_items'         => __( 'Tüm Kitap Kategorileri' ),
		'parent_item'       => __( 'Ebeveyn Kitap Kategorisi' ),
		'parent_item_colon' => __( 'Ebeveyn Kitap Kategorisi:' ),
		'edit_item'         => __( 'Kitap Kategorisini Düzenle' ), 
		'update_item'       => __( 'Kitap Kategorisini Güncelle' ),
		'add_new_item'      => __( 'Yeni Kitap Kategorisi Ekle' ),
		'new_item_name'     => __( 'Yeni Kitap Kategorisi' ),
		'menu_name'         => __( 'Kitap Kategorileri' ),
	);
	$args = array(
		'labels' => $labels,
		'show_admin_column' => true,
        'hierarchical' => true,
        'query_var' => true,
	);
	register_taxonomy( 'kitap-kategorileri', 'kitaplar', $args );
}
add_action( 'init', 'kitap_kategorileri', 0 );

// Özel Gönderi Meta Veriler

add_action( 'add_meta_boxes', 'kitaplar_meta_box' ); // Editör kısmına yeni formlar eklemek için
function kitaplar_meta_box() {
    add_meta_box( 
		'kitaplar_meta_box', // Metabox fonksiyonu
		__( 'Kitap Bilgileri', 'myplugin_textdomain' ), // Editörde görünecek metabox başlığı 
		'kitaplar_meta_box_content', // Editörde görünecek Metabox içeriği fonksiyonu
		'kitaplar', // Hangi gönderi türünde görüneceği
		'side',
		'high'
    );
}

// Meta veriler düzenleme alanları


function kitaplar_meta_box_content($post) {  // Editörde görünecek Metabox içeriği fonksiyonu (Arayüz Hazırlama)
	//wp_nonce_field( plugin_basename( __FILE__ ), 'kitaplar_meta_box_content_nonce' );
	if($_GET['action'] == 'edit'){
		$bilgiler = get_post_meta(get_the_ID(), 'kitap_bilgileri',true);
	}else{
		$bilgiler = get_post_meta(get_the_ID(), 'kitap_bilgileri',false);
	}
	
	

	echo '<label for="kitap_adi">Kitap Adı</label><br>';
	echo '<input type="text" id="kitap_adi" name="bilgi[kitap_adi]" value="'.$bilgiler['kitap_adi'].'" placeholder="Kitap adı girin" /><br><br>';

	echo '<label for="kitap_yazari">Yazar Adı</label><br>';
	echo '<input type="text" id="kitap_yazari" name="bilgi[kitap_yazari]"  value="'.$bilgiler['kitap_yazari'].'" placeholder="Kitap yazarı giriniz" /><br><br>';

	echo '<label for="yayinevi">Yayınevi</label><br>';
	echo '<input type="text" id="yayinevi" name="bilgi[yayinevi]"  value="'.$bilgiler['yayinevi'].'" placeholder="Yayınevi Adı" /><br><br>';

	echo '<label for="sayfa_sayisi">Sayfa Sayısı</label><br>';
	echo '<input type="number" id="sayfa_sayisi" name="bilgi[sayfa_sayisi]"  value="'.$bilgiler['sayfa_sayisi'].'" placeholder="Örn: 195" /><br><br>';

	echo '<label for="baski_sayisi">Baskı Sayısı</label><br>';
	echo '<input type="text" id="baski_sayisi" name="bilgi[baski_sayisi]"  value="'.$bilgiler['baski_sayisi'].'" placeholder="Örn: 1. Baskı" /><br><br>';

	echo '<label for="ilk_baski">İlk Baskı Yılı</label><br>';
	echo '<input type="text" id="ilk_baski" name="bilgi[ilk_baski]"  value="'.$bilgiler['ilk_baski'].'" placeholder="Örn: 2019" /><br><br>';

	echo '<label for="kitap_ebati">Kitap Ebatı</label><br>';
	echo '<input type="text" id="kitap_ebati" name="bilgi[kitap_ebati]"  value="'.$bilgiler['kitap_ebati'].'" placeholder="Örn: 13,7 x 21,5" /><br><br>';

	echo '<label for="kitap_fiyati">Kitap Fiyatı</label><br>';
	echo '<input type="text" id="kitap_fiyati" name="bilgi[kitap_fiyati]"  value="'.$bilgiler['kitap_fiyati'].'" placeholder="Örn:  20,95" /><br><br>';

	echo '<label for="e_kitap_fiyati">E-Kitap Fiyatı</label><br>';
	echo '<input type="text" id="e_kitap_fiyati" name="bilgi[e_kitap_fiyati]"  value="'.$bilgiler['e_kitap_fiyati'].'" placeholder="Örn:  5,95" /><br><br>';
	
	echo '<label for="onizleme">PDF Dosyası Ekle</label><br>';
	echo '<input type="text" id="onizleme" name="bilgi[onizleme]"  value="'.$bilgiler['onizleme'].'" placeholder="http://website/onizleme.pdf" /><br><br>';

}

// Meta verileri kaydetme


function kitaplar_meta_box_save($post_id){  // Meta verileri veritabanına kaydetme fonksiyonu
/*
	if ( !wp_verify_nonce( $_POST['kitaplar_meta_box_save_content_nonce'], plugin_basename(__FILE__) )) {
	return $post_id;
	}*/
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
	return $post_id;

	if ( 'page' == $_POST['post_type'] ||  'post' == $_POST['post_type']) {
	if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ))
	  return $post_id;
	} 
	$kitap_bilgileri = $_POST['bilgi']; // Metaboxta forma girilen bilgileri bir diziye aktarıyoruz

	update_post_meta($post_id, 'kitap_bilgileri', $kitap_bilgileri); // dizideki verileri veritabanına kaydediyoruz.
}

    //On post save, save plugin's data
    add_action('save_post', 'kitaplar_meta_box_save');  // Kaydetme fonksiyonunu etkinleştirme
	
?>