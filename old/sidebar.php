<div id="sidebar" class="right">
	<?php 
		if( is_page(2) ){ 
	?>
        <div id="live_streaming" class="uppercase widget">
            <h4 class="heading"><a href="#"><?php echo $lang['live streaming']; ?></a></h4>
            
            <p class="no_margins">
                <strong>gadé</strong><br />
                <span>céline rétory ft.<br />daan junior</span>
            </p>
        </div>
    <?php 
		}
        
        if ($images = aldenta_get_images()) {
            if( count( $images ) > 1){
                $keys = array_keys( $images );
				echo "<div class='widget_divider'></div>";
                echo "<div class='widget'>";
                echo "<h4 class='heading uppercase center_text'>photos reliées à l'article</h4>";
                echo "<img id='large_image' src='".wp_get_attachment_url($images[ $keys[0] ]->ID)."' /><br />";
                
                echo "<ul id='mycarousel' class='jcarousel-skin-tango'>";
            
                foreach ($images as $image) {
                    echo "<li><img class='thumb' src='".wp_get_attachment_url($image->ID)."' onMouseOver='change_larger_image(this);' /></li>"; // attachment url
                }
            
                echo "</ul>";
                echo "</div>";
            }
        }  
    ?>
</div>