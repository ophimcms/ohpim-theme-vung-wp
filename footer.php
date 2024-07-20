

</div>
<?php
if ( is_active_sidebar('widget-footer') ) {
    dynamic_sidebar( 'widget-footer' );
} else {
    _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
</body>
<script defer type="text/javascript" src=<?= get_template_directory_uri() ?>/assets/js/v.min.js></script>
<?php wp_footer(); ?>
</html>