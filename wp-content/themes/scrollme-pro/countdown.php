<?php
/**
 * The template for displaying all pages.
 * @package scrollme
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?php wp_head(); ?>
    <style type="text/css" media="screen">

    	body{
    		/*background: <?php echo $ctdown_page_bgcolor; ?>;*/
    		/*background: #000;*/

    		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#545858+0,a0abaf+99 */
background: rgb(84,88,88); /* Old browsers */
background: -moz-linear-gradient(left,  rgba(84,88,88,1) 0%, rgba(160,171,175,1) 99%); /* FF3.6-15 */
background: -webkit-linear-gradient(left,  rgba(84,88,88,1) 0%,rgba(160,171,175,1) 99%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to right,  rgba(84,88,88,1) 0%,rgba(160,171,175,1) 99%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#545858', endColorstr='#a0abaf',GradientType=1 ); /* IE6-9 */

    	}    	
 *{ box-sizing: border-box;}
    .ctdown-container{
     max-width: 640px; 
     margin:35px auto 20px;
     padding: 0 15px;
   }
    .ctdown-subscribe{
    	    max-width: 480px;
         margin: 50px auto 20px;
        padding: 25px 15px 25px 15px;
       background: #282725;
       border-radius: 5px;
    	}

 .ctdown-subscribe .newsletter-submit{ margin-top: 1px;}
 .ctdown-subscribe .newsletter-email{ height: 39px;}

 .ctdown-subscribe .newsletter form p{ display: inline-block; padding: 0; margin:0 0 10px;}
 
 .ClassyCountdown-value{ 
 	color: #fff !important;
 	 font-size: 20px !important;
 	  font-weight: bold !important;
 }
 
 .ctdown-subscribe .widget{ margin:0;}
    .ctdown-content {
    max-width: 960px;
    margin: 40px auto 0;
    text-align: center;
    width: 100%;
    padding: 0 15px;
    }
  .ctdown-content .ctdown-descr{ 
  	color: #fff;
  	margin:10px 5%;
  	font-size: 17px;
  	padding: 0 15px;
  }
  .ctdown-content .ctdown-descr p{ font-size: 17px; }

  .ClassyCountdown-value > div{
	font-size: 2.5em;
	font-weight: normal;
	padding-bottom: 19px;

	}

  .ctdown-header{ 
    display: block; 
    width: 100%; 
    clear: both; 
    margin: 0 auto 30px;
    overflow: hidden;
    padding-top:30px;
    max-width: 1170px;
    padding: 30px  15px 0;

 }
 .ctdown-header .aps-each-icon a:hover{ opacity: 0.6;}

   .logo-container{ width: auto; float: left;}
   .social-container{ width: auto; float: right;}
   .ClassyCountdown-wrapper div span{ font-size: 18px !important; font-weight: normal; }

   @media(max-width: 992px){

   	.ClassyCountdown-value > div{
	font-size: 22px;
	font-weight: normal;
	padding-bottom: 15px;
	
	}
   }

   @media(max-width: 640px){

   	.ClassyCountdown-value > div{
	font-size: 16px;
	font-weight: normal;
	padding-bottom: 8px;
	
	}
   }


    </style>
</head>
<?php
	$logo = esc_url_raw(get_theme_mod( 'scrollme_ctdown_logo', '' ));
	$scrollme_disable_ctdown_widget = esc_attr(get_theme_mod( 'scrollme_disable_ctdown_widget', '' ));
	$scrollme_ctdown_descr = wp_kses_post(get_theme_mod( 'scrollme_ctdown_descr', '' ));
	$scrollme_ctdown_day_txt = esc_attr(get_theme_mod( 'scrollme_ctdown_day_txt', 'Days' ));
	$scrollme_ctdown_hour_txt = esc_attr(get_theme_mod( 'scrollme_ctdown_hour_txt', 'Hours' ));
	$scrollme_ctdown_min_txt = esc_attr(get_theme_mod( 'scrollme_ctdown_min_txt', 'Minutes' ));
	$scrollme_ctdown_sec_txt = esc_attr(get_theme_mod( 'scrollme_ctdown_sec_txt', 'Seconds' ));
	$scrollme_ctdown_date = esc_attr(get_theme_mod( 'scrollme_ctdown_date', '' ));
?>
<body>
	<header class="ctdown-header">
		<div class="logo-container">
			<?php if($logo != '') : ?>
				<img src="<?php echo $logo; ?>" alt="Countdown Logo">
			<?php endif; ?>
		</div>
		<div class="social-container">
			<?php if(is_active_sidebar( 'countdown-social-icons' ) || !$scrollme_disable_ctdown_widget) : ?>
				<?php dynamic_sidebar( 'countdown-social-icons' ); ?>
			<?php endif; ?>
		</div>
	</header><!-- /header -->
	<div class="ctdown-content">
		<div class="ctdown-descr">
			<?php echo $scrollme_ctdown_descr; ?>
		</div>
		<?php
			if($scrollme_ctdown_date != '') {
				$date_arr = explode('/', $scrollme_ctdown_date);
			}

			$endtime = strtotime($scrollme_ctdown_date);
			$nowdate = date("m/d/Y");
			$nowtime = strtotime($nowdate);
		?>

		<div class="ctdown-container">
			<div class="ctdown-circles">
				<script>
				jQuery(document).ready(function ($) {
					var endtime = parseInt(<?php echo $endtime; ?>);
					var nowtime = parseInt(<?php echo $nowtime; ?>);
					$('.ctdown-circles').ClassyCountdown({
					// theme
					theme: "flat-colors-wide",

					// end time
					end: endtime,
					now: nowtime,
					labelsOptions: {
						lang: {
							days: '<?php echo $scrollme_ctdown_day_txt; ?>',
							hours: '<?php echo $scrollme_ctdown_hour_txt; ?>',
							minutes: '<?php echo $scrollme_ctdown_min_txt; ?>',
							seconds: '<?php echo $scrollme_ctdown_sec_txt; ?>'
						},
						style: 'font-size: 14px !important;'
					},
					});
					
				});
				</script>			
			</div>
		</div>
		<div class="ctdown-subscribe">
			<?php if(is_active_sidebar( 'countdown-subscribe' )) : ?>
				<?php dynamic_sidebar( 'countdown-subscribe' ); ?>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>