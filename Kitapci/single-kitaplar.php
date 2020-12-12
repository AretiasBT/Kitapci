<?php
get_header();
?>
	<div class="container">
		<div class="wrapper">
			<h1 class="bolum-baslik"><?php single_post_title() ?></h1>
			<div class="article">
			<?php
				$bilgiler = get_post_meta(get_the_ID(), 'kitap_bilgileri', true);
				while ( have_posts() ) : the_post();
			?>
				<div class="kapak">
				<?php the_post_thumbnail() ?>
				</div>
				<div class="bilgi">
					
					<ul>
						<li><span class="ozellik">Kitap</span><span class="deger"><?php echo $bilgiler['kitap_adi']; ?></span></li>
						<li><span class="ozellik">Kitap Yazarı</span><span class="deger"><?php echo $bilgiler['kitap_yazari']; ?></span></li>
						<li><span class="ozellik">Yayınevi</span><span class="deger"><?php echo $bilgiler['yayinevi']; ?></span></li>
						<li><span class="ozellik">Sayfa Sayısı</span><span class="deger"><?php echo $bilgiler['sayfa_sayisi']; ?></span></li>
						<li><span class="ozellik">Baskı Sayısı</span><span class="deger"><?php echo $bilgiler['baski_sayisi']; ?></span></li>
						<li><span class="ozellik">İlk Baskı Yılı</span><span class="deger"><?php echo $bilgiler['ilk_baski']; ?></span></li>
						<li><span class="ozellik">Ebat</span><span class="deger"><?php echo $bilgiler['kitap_ebati']; ?></span></li>
					</ul>
					<div class="fiyat-bilgisi">
						<div class="fiyat-alani"><span class="fiyat-baslik">Kitap</span><span class="fiyat"><?php echo $bilgiler['kitap_fiyati']; ?> ₺</span></div>
						<div class="fiyat-alani"><span class="fiyat-baslik">E-Kitap</span><span class="fiyat"><?php echo $bilgiler['e_kitap_fiyati']; ?> ₺</span></div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="icerik">
					<h2 class="alt-baslik">Açıklama</h2>
						<?php the_content(); ?>
					<h2 class="alt-baslik">Önizleme</h2>
					<object class="pdf-view"
					data = "<?php echo $bilgiler['onizleme']; ?>" 
					type = "application/pdf" 
					width = "100%" 
					height = "100%" > 
					<iframe 
						src = "<?php echo $bilgiler['onizleme']; ?>" 
						width = "% 100 " 
						height = "% 100 " 
						style = " border: none; " > 
						<p> Tarayıcınız PDF'leri desteklemiyor.
						  <a  href= "<?php echo $bilgiler['onizleme']; ?>"> PDF İndir </a> . 
						</p> 
					</iframe> 
					</object>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="alt-bolum">
				<?php if (comments_open()): ?>
					<div class="comments-area">
						<h5 class="sub-header"><?php comment_form_title( 'Yorum Yap', '%s yanıtla' ); ?></h5>
						<!-- start respond form -->
						<div id="respond">
							<?php comments_template('/comments.php', false);?>
						</div>
						<!-- end respond form -->
						<!-- start blog comment -->
						<div class="mu-comments-area">
						  <div class="comments">
							<ul class="comment-list media-list col-md-12">
								<?php wp_list_comments('callback=twbs_comment_format'); ?>
							</ul>
						  </div>
						</div>
						<!-- end blog comment -->
					</div>
				<?php endif; ?>
			</div>
		</div>
	
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>