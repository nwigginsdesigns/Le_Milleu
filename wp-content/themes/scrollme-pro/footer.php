<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package scrollme
 */
?>
<?php $footer_txt = wp_kses_post( get_theme_mod( 'scrollme_footext', '&copy; 2016 ScrollMe Pro | ScrollMe by <a href="#">AccessPress Themes</a>' )); ?>
<?php if(!is_page_template('tpl-home.php') && $footer_txt != '' ){ ?>
<div class="site-info">
    <?php echo $footer_txt; ?>
</div><!-- .site-info -->
<?php } ?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
    <div class="toogle-wrap">
        <div id="toggle" >
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>

    <nav id="site-navigation" class="main-navigation clearfix">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => NULL, 'menu_class'=>'clearfix', 'fallback_cb' => false, 'walker' => new Menu_Attibute_Walker() )); ?>
    </nav><!-- #site-navigation -->
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>