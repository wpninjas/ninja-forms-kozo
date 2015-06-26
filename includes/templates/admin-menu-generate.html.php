<h3>New Ninja Forms Extension</h3>

<form class="nf_kozo__form" action="<?php echo admin_url( 'admin.php?page=' . $this->menu_slug . '&tab=generate' ); ?>" method="POST">

    <input type="hidden" name="action" value="generate"/>

    <div class="nf_kozo__field-wrap">
        <label for="name"><?php _e( 'Plugin Name', NF_Kozo::TEXTDOMAIN ); ?></label>
        <input type="text" class="widefat" name="name" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="plugin_uri"><?php _e( 'Plugin URI', NF_Kozo::TEXTDOMAIN ); ?></label>
        <input type="text" class="widefat" name="plugin_uri" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="description"><?php _e( 'Plugin Description', NF_Kozo::TEXTDOMAIN ); ?></label>
        <input type="text" class="widefat" name="description" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="author"><?php _e( 'Author', NF_Kozo::TEXTDOMAIN ); ?></label>
        <input type="text" class="widefat" name="author" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="author_uri"><?php _e( 'Author URI', NF_Kozo::TEXTDOMAIN ); ?></label>
        <input type="text" class="widefat" name="author_uri" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="download"><?php _e( 'Download ZIP', NF_Kozo::TEXTDOMAIN ); ?></label>
        <input type="hidden" name="download" value="0" />
        <input type="checkbox" name="download" value="1" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="install"><?php _e( 'Install to Plugin Directory', NF_Kozo::TEXTDOMAIN ); ?></label>
        <input type="hidden" name="install" value="0" />
        <input type="checkbox" name="install" value="1" />
    </div>

    <div class="nf_kozo__field-wrap">
        <input class="button button-primary" type="submit" value="<?php _e( 'Generate Plugin', NF_Kozo::TEXTDOMAIN ); ?>"/>
    </div>

</form>

