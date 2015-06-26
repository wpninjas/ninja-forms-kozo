<h2 class="nav-tab-wrapper">

    <a href="<?php echo admin_url( 'admin.php?page=' . $this->menu_slug ); ?>" class="nav-tab <?php if( '' == $this->tab OR 'settings' == $this->tab ) echo 'nav-tab-active';?>">
        <?php _e( 'Settings', NF_Kozo::TEXTDOMAIN ); ?>
    </a>

    <a href="<?php echo admin_url( 'admin.php?page=' . $this->menu_slug . '&tab=generate' ); ?>" class="nav-tab <?php if( 'generate' == $this->tab ) echo 'nav-tab-active';?>">
        <?php _e( 'New Plugin', NF_Kozo::TEXTDOMAIN ); ?>
    </a>

    <a href="http://kylebjohnson.me" target="_blank" class="button button-secondary">
        <span class="dashicons dashicons-external" style="padding: 2px 2px 0 0;"></span>
        <?php _e( 'Documentation', NF_Kozo::TEXTDOMAIN ); ?>
    </a>

    <a href="https://github.com/wpninjas/ninja-forms-kozo/issues/new" target="_blank" class="button button-secondary" title="Ninja Forms Kozo Issue Tracking on Github">
        <span class="dashicons dashicons-sos" style="padding: 2px 2px 0 0;"></span>
        <?php _e( 'Report a Bug', NF_Kozo::TEXTDOMAIN ); ?>
    </a>

</h2>