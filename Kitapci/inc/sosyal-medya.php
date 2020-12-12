<?php
class TheMinimalist_Customizer{
	
	public function __construct(){
		
		add_action('customize_register',array($this,'register_customize_sections'));
		
	}
	
	public function register_customize_sections($wp_customize){
		
		$this->social_media($wp_customize);
		
	}

	private function social_media( $wp_customize ) {
		
		$wp_customize->add_section('sosyal_aglar', array(
			'title' => 'Sosyal Ağlar',
		));
		
		$wp_customize->add_setting('sosyal_medya', 
		array(
			'default' => 'No',
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'sosyal_medya_control', array(
			'label'   => 'Sosyal Ağ Butonları',
			'description' => 'Sidebar üzerindeki Sosyal Ağ butonlarını göster/gizle',
			'section' => 'sosyal_aglar', 
			'settings' => 'sosyal_medya',
			'type'    => 'select',
			'choices' => array('Yes' => 'Göster', 'No' => 'Gizle')
		)));

		$wp_customize->add_setting('facebook_url',
		array(
			'default' => null
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'facebook_url_control', array(
			'label'   => 'Facebook URL',
			'description' => 'Facebook Hesabınızın URL Adresini Girin',
			'section' => 'sosyal_aglar', 
			'settings' => 'facebook_url',
			'type'    => 'url',
		)));

		$wp_customize->add_setting('twitter_url',array(
			'default' => null
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'twitter_url_control',array(
			'label'   => 'Twitter URL',
			'description' => 'Twitter Hesabınızın URL Adresini Girin',
			'section' => 'sosyal_aglar', 
			'settings' => 'twitter_url', 
			'type'    => 'url',
		)));
		
		$wp_customize->add_setting('instagram_url',array(
			'default' => null
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'instagram_url_control',array(
			'label'   => 'İnstagram URL',
			'description' => 'İnstagram Hesabınızın URL Adresini Girin',
			'section' => 'sosyal_aglar', 
			'settings' => 'instagram_url', 
			'type'    => 'url',
		)));
		
		$wp_customize->add_setting('youtube_url',array(
			'default' => null
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'youtube_url_control',array(
			'label'   => 'Youtube URL',
			'description' => 'Youtube Hesabınızın URL Adresini Girin',
			'section' => 'sosyal_aglar', 
			'settings' => 'youtube_url', 
			'type'    => 'url',
		)));
		
		$wp_customize->add_setting('github_url',array(
			'default' => null
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'github_url_control',array(
			'label'   => 'Github URL',
			'description' => 'Github Hesabınızın URL Adresini Girin',
			'section' => 'sosyal_aglar', 
			'settings' => 'github_url', 
			'type'    => 'url'
		)));
		
		$wp_customize->add_setting('mail_adresi',array(
			'default' => null
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'mail_adresi_control',array(
			'label'   => 'E-posta Adresiniz',
			'description' => 'E-posta Adresinizi Giriniz',
			'section' => 'sosyal_aglar', 
			'settings' => 'mail_adresi', 
			'type'    => 'email'
		)));
		
		$wp_customize->add_setting('tel_no',array(
			'default' => null
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'tel_no_control',array(
			'label'   => 'Telefon Numarası',
			'description' => 'Telefon Numaranızı Başında "0" olmadan Girin',
			'section' => 'sosyal_aglar', 
			'settings' => 'tel_no', 
			'type'    => 'text'
		)));
		
		$wp_customize->add_setting('tel_no_options', 
		array(
			'default' => '4',
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'tel_no_options_control', array(
			'label'   => 'Telefon Numarası Seçenekleri',
			'description' => 'Telefon numaranızın nasıl kullanılacağını Seçin',
			'section' => 'sosyal_aglar', 
			'settings' => 'tel_no_options',
			'type'    => 'select',
			'choices' => array('1' => 'Arama İçin Kullan', '2' => 'Whatsapp İçin Kullan', '3' => 'Arama & Whatsapp İçin Kullan', '4' => 'Kullanma')
		)));
	}
}
?>