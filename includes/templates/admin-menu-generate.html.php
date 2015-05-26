<h3>New Ninja Forms Extension</h3>

<form class="nf_kozo__form" action="<?php echo admin_url( 'admin.php?page=' . $this->menu_slug . '&tab=generate' ); ?>" method="POST">

    <input type="hidden" name="action" value="generate"/>

    <div class="nf_kozo__field-wrap">
        <label for="name"><?php NF_Kozo::_e( 'Plugin Name' ); ?></label>
        <input type="text" class="widefat" name="name" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="plugin_uri"><?php NF_Kozo::_e( 'Plugin URI' ); ?></label>
        <input type="text" class="widefat" name="plugin_uri" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="description"><?php NF_Kozo::_e( 'Plugin Description' ); ?></label>
        <input type="text" class="widefat" name="description" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="author"><?php NF_Kozo::_e( 'Author' ); ?></label>
        <input type="text" class="widefat" name="author" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="author_uri"><?php NF_Kozo::_e( 'Author URI' ); ?></label>
        <input type="text" class="widefat" name="author_uri" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="download"><?php NF_Kozo::_e( 'Download ZIP' ); ?></label>
        <input type="hidden" name="download" value="0" />
        <input type="checkbox" name="download" value="1" />
    </div>

    <div class="nf_kozo__field-wrap">
        <label for="install"><?php NF_Kozo::_e( 'Install to Plugin Directory' ); ?></label>
        <input type="hidden" name="install" value="0" />
        <input type="checkbox" name="install" value="1" />
    </div>

    <div class="nf_kozo__field-wrap">
        <input class="button button-primary" type="submit" value="<?php NF_Kozo::_e( 'Generate Plugin' ); ?>"/>
    </div>

</form>

