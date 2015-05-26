<h2 class="nav-tab-wrapper">

    <a href="<?php echo admin_url( 'admin.php?page=' . $this->menu_slug ); ?>" class="nav-tab <?php if( '' == $this->tab OR 'settings' == $this->tab ) echo 'nav-tab-active';?>">
        <?php _e( 'Settings', NF_{{NAME}}::TEXTDOMAIN ); ?>
    </a>

    <a href="http://kylebjohnson.me" target="_blank" class="button button-secondary">
        <span class="dashicons dashicons-external" style="padding: 2px 2px 0 0;"></span>
        <?php _e( 'External Link', NF_{{NAME}}::TEXTDOMAIN ); ?>
    </a>

</h2>