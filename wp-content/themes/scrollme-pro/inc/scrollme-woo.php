<?php
	/** Woocommerce Related Functions **/
	/** Functions **/
	function scrollme_wishlist_shop_page(){
	   if( function_exists( 'YITH_WCWL' ) ){
	   		global $product;
	       $url = add_query_arg( 'add_to_wishlist', $product->id );
	       ?>
	       <a class="item-wishlist" href="<?php echo $url ?>"><i class="fa fa-heart"></i></a>
	       </div> <!-- woo-item-detail-wrap -->
	       </div> <!-- woo-item-detail-owrap -->
	       <?php
	     }
	}
	add_action('woocommerce_after_shop_loop_item','scrollme_wishlist_shop_page',11);

	/**
	* Woo Commerce Number of row filter Function
	**/

	add_filter('loop_shop_columns', 'scrollme_loop_columns');
	if (!function_exists('scrollme_loop_columns')) {
	   function scrollme_loop_columns() {
	       $xr = 3;
	       return $xr;
	   }
	}

	add_action( 'body_class', 'scrollme_woo_body_class');
	if (!function_exists('scrollme_woo_body_class')) {
	   function scrollme_woo_body_class( $class ) {
	          $class[] = 'columns-'.scrollme_loop_columns();
	          return $class;
	   }
	}

	add_action('woocommerce_before_shop_loop_item_title', 'scrollme_before_shop_loop_item_title', 11);
	function scrollme_before_shop_loop_item_title() {
		?>
		<div class="woo-item-detail-owrap">
		<div class="woo-item-detail-wrap">
		<?php
	}

	function woo_related_products_limit() {
	  global $product;
		
		$args['posts_per_page'] = 6;
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'scrollme_related_products_args' );
  	function scrollme_related_products_args( $args ) {
		$args['posts_per_page'] = 4; // 4 related products
		$args['columns'] = 3; // arranged in 2 columns
		return $args;
	}

	remove_action( 'woocommerce_before_shop_loop_item' , 'woocommerce_template_loop_product_link_open', 10 );	
	remove_action( 'woocommerce_after_shop_loop_item' , 'woocommerce_template_loop_product_link_close', 5 );


	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	function scrollme_woocommerce_template_loop_product_thumbnail() { ?>
	    <div class="scme-shop-img-wrap">
		    <a href="<?php the_permalink(); ?>">
		    	<?php woocommerce_template_loop_product_thumbnail(); ?>
		    </a>
	    </div>
	<?php
	}
	add_action( 'woocommerce_before_shop_loop_item_title' , 'scrollme_woocommerce_template_loop_product_thumbnail', 10 );

	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	function scrollme_woocommerce_template_loop_product_title(){ ?>
		<a href="<?php the_permalink(); ?>">
			<h3><?php the_title(); ?></h3>
		</a>
	<?php
	}
	add_action( 'woocommerce_shop_loop_item_title', 'scrollme_woocommerce_template_loop_product_title', 10 );

	function scrollme_is_woo_pages(){
		if(!function_exists('is_product') || !function_exists('is_product_category') || !function_exists('is_shop') || !function_exists('is_woocommerce')){
			return false;
		}
	}