<?php
/**
 * Theme Footer Section for our theme.
 * 
 * Displays all of the footer section and closing of the #page div.
 *
 * @package ThemeGrill
 * @subpackage Masonic
 * @since 1.0
 */
?>

</div><!-- #page -->
<footer class="footer-background">
   <div class="footer-content wrapper clear">
      <div class="clear">
         <?php if (is_active_sidebar('footer-sidebar-one')) { ?>
            <div class="tg-one-third">
               <?php
               dynamic_sidebar('footer-sidebar-one');
               ?>
            </div>
         <?php } ?>
         <?php if (is_active_sidebar('footer-sidebar-two')) { ?>
            <div class="tg-one-third">
               <?php
               dynamic_sidebar('footer-sidebar-two');
               ?>
            </div>
         <?php } ?>
         <?php if (is_active_sidebar('footer-sidebar-three')) { ?>
            <div class="tg-one-third last">
               <?php
               dynamic_sidebar('footer-sidebar-three');
               ?>
            </div>
         <?php } ?>
      </div>
      <div class="copyright clear">
         <p class="license">Content on this site is licensed under a <a target="_blank" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License <?php _e('&copy; ', 'masonic');echo date('Y'); ?></a></p>
         <?php masonic_footer_copyright(); ?>
      </div>
   </div>
   <div class="angled-background"></div>
</footer>

<?php wp_footer(); ?>
<div class="content-modal">
    <div class="content-modal-inner">
        <h2></h2>
        <h3></h3>
        <div class="text-content"></div>
    </div>
    <div class="content-modal-close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
</div>

<!--
<?php echo get_current_blog_id(); ?>
-->

</body>
</html>
