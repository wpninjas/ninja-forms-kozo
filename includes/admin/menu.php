<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Kozo_Menu extends NF_Base_Menu
{
    public $menu_slug = 'ninja-forms-kozo';

    public function __construct()
    {
        $this->name = 'Kozo';
        $this->title = NF_Kozo::__( $this->name );

        $this->settings = array(
            'example1' => NF_Kozo::__( 'Example One' ),
            'example2' => NF_Kozo::__( 'Example Two' ),
        );

        parent::__construct();
    }

    /**
     * Display
     *
     * The default display method.
     */
    public function display()
    {
        $this->tab = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : '';
        include NF_Kozo::$dir . 'includes/templates/admin-menu.html.php';
    }

    /**
     * Enqueue Styles
     */
    public function enqueue_styles()
    {
        wp_enqueue_style(
            /* Handle       */ 'ninja-forms-kozo-admin-css',
            /* Source       */ NF_Kozo::$url . '/assets/css/dev/ninja-forms-kozo-admin.css',
            /* Dependencies */ FALSE,
            /* Version      */ NF_Kozo::VERSION,
            /* In Footer    */ FALSE
        );
    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script(
            /* Handle       */ 'ninja-forms-kozo-admin-js',
            /* Source       */ NF_Kozo::$url . '/assets/js/min/ninja-forms-kozo-admin.min.js',
            /* Dependencies */ array( 'jquery' ),
            /* Version      */ NF_Kozo::VERSION,
            /* In Footer    */ TRUE
        );
    }

    /**
     * Generate Plugin
     */
    public function generate()
    {
        $name        = $_POST['name'];
        $plugin_uri  = $_POST['plugin_uri'];
        $description = $_POST['description'];
        $author      = $_POST['author'];
        $author_uri  = $_POST['author_uri'];
        $download    = $_POST['download'];
        $install     = $_POST['install'];

        $args = array(
            'name'        => strtolower( $name ),
            'NAME'        => ucwords( $name ),
            'PLUGIN URI'  => $plugin_uri,
            'DESCRIPTION' => $description,
            'AUTHOR'      => $author,
            'AUTHOR URI'  => $author_uri,
            'YEAR'        => date( 'Y', time() )
        );

        $old_dir = NF_Kozo::$dir . '/kozo/boilerplate';
        $new_dir = NF_Kozo::$dir . '/kozo/ninja-forms-' . strtolower( $name );

        $this->clone_dir( $old_dir, $new_dir, $args );

        if ( $install AND defined( 'WP_PLUGIN_DIR' ) ){
            $this->clone_dir( $new_dir, WP_PLUGIN_DIR . '/ninja-forms-' . strtolower( $name ));
        }

        if ( $download ){
            $this->zip( $new_dir, $new_dir . '.zip' );
            $this->download( $new_dir . '.zip' );
        }

        $this->delete_dir( $new_dir );
    }

    /**
     * Parse Contents
     *
     * @param $contents
     * @param $args
     * @return mixed
     */
    private function parse( $contents, $args )
    {
        foreach( $args as $search => $replace ){
            $contents = str_replace( '{{' . $search . '}}', $replace, $contents );
        }

        return $contents;
    }

    /**
     * Duplicate Directory
     *
     * @param $source
     * @param $destination
     * @param $args
     */
    private function clone_dir( $source, $destination, $args = array() ) {
        $dir = opendir( $source );
        @mkdir( $destination );
        while( false !== ( $file = readdir( $dir ) ) ) {
            if ( ( $file != '.' ) && ( $file != '..' ) ) {
                if ( is_dir($source . '/' . $file ) ) {
                    $new_dir = $this->parse( $destination . '/' . $file, $args );
                    $this->clone_dir( $source . '/' . $file, $new_dir, $args );
                }
                else {
                    $contents = $this->parse( file_get_contents( $source . '/' . $file ), $args );
                    $new_file_path = $this->parse( $destination . '/' . $file, $args );
                    file_put_contents( $new_file_path, $contents );
                }
            }
        }
        closedir( $dir );
    }

    /**
     * Delete Directory
     *
     * @param $path
     * @return bool
     */
    private function delete_dir($path)
    {
        if (is_dir($path) === true)
        {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file)
            {
                $this->delete_dir(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        }

        else if (is_file($path) === true)
        {
            return unlink($path);
        }

        return false;
    }

    /**
     * Download Plugin
     *
     * @param $file_path
     * @return void
     */
    private function download( $file_path )
    {
        if ( file_exists($file_path) ){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file_path));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
            unlink($file_path);
        }
    }

    /**
     * Zip Directory
     *
     * @param $source
     * @param $destination
     * @return bool
     */
    private function zip($source, $destination)
    {
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }

        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            return false;
        }

        $source = str_replace('\\', '/', realpath($source));

        if (is_dir($source) === true)
        {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($files as $file)
            {
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                    continue;

                $file = realpath($file);

                if (is_dir($file) === true)
                {
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                }
                else if (is_file($file) === true)
                {
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        }
        else if (is_file($source) === true)
        {
            $zip->addFromString(basename($source), file_get_contents($source));
        }

        return $zip->close();
    }

} // End NF_Kozo_Menu Class

new NF_Kozo_Menu();
