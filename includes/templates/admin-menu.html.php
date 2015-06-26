<div class="wrap">

    <h2><?php _e( 'Ninja Forms', 'ninja-forms' ); ?> <?php _e( 'Kozo', NF_Kozo::TEXTDOMAIN ); ?></h2>

    <p>Kōzō, meaning structure, makes developing for Ninja Forms ninja fast.</p>

    <?php include NF_Kozo::$dir . 'includes/templates/admin-menu-toolbar.html.php'; ?>

    <?php if( '' == $this->tab )
        include NF_Kozo::$dir . 'includes/templates/admin-menu-settings.html.php';
    ?>

    <?php if( 'generate' == $this->tab )
        include NF_Kozo::$dir . 'includes/templates/admin-menu-generate.html.php';
    ?>

</div>