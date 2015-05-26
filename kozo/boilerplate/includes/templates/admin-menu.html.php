<div class="wrap">

    <h2><?php _e( 'Ninja Forms', 'ninja-forms' ); ?> <?php _e( '{{NAME}}', NF_{{NAME}}::TEXTDOMAIN ); ?></h2>

    <p>{{DESCRIPTION}}</p>

    <?php include NF_{{NAME}}::$dir . 'includes/templates/admin-menu-toolbar.html.php'; ?>

    <?php if( '' == $tab )
        include NF_{{NAME}}::$dir . 'includes/templates/admin-menu-settings.html.php';
    ?>

</div>