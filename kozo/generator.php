<?php if ( ! defined( 'ABSPATH' ) ) exit;

class NF_Kozo_Generator
{
    public $name = '';

    public $plugin_uri = '';

    public $description = '';

    public $author = '';

    public $author_uri = '';

    public $download = FALSE;

    public $install = FALSE;

    public $boilerplate = 'boilerplate';

    public $generate_screenshot = FALSE;

    public function __construct( array $args = array() )
    {
        foreach( $args as $property => $value  ){
            if( property_exists( $this, $property ) ){
                $this->$property = $value;
            }
        }
    }

    /**
     * Generate Plugin
     */
    public function generate()
    {
        $args = array(
            'name'        => str_replace( ' ', '-', strtolower( $this->name ) ),
            'Name'        => $this->name,
            'NAME'        => str_replace( ' ', '', ucwords( $this->name ) ),
            'PLUGIN URI'  => $this->plugin_uri,
            'DESCRIPTION' => $this->description,
            'AUTHOR'      => $this->author,
            'AUTHOR URI'  => $this->author_uri,
            'YEAR'        => date( 'Y', time() )
        );

        $old_dir = NF_Kozo::$dir . '/kozo/' . $this->boilerplate;
        $new_dir = NF_Kozo::$dir . '/downloads/ninja-forms-' . $args['name'];

        $this->clone_dir( $old_dir, $new_dir, $args );

        $this->import_screenshot( $new_dir, $args['NAME'] );

        if ( $this->install AND defined( 'WP_PLUGIN_DIR' ) ){
            $this->clone_dir( $new_dir, WP_PLUGIN_DIR . '/ninja-forms-' . $args['name'] );
        }

        if ( $this->download ){
            $this->zip( $new_dir, $new_dir . '.zip' );
        }

        return $new_dir . '.zip';
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
    public static function delete_dir($path)
    {
        if (is_dir($path) === true)
        {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file)
            {
                self::delete_dir(realpath($path) . '/' . $file);
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
    public static function download( $file_path, $delete = TRUE )
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

            if( $delete ){
              self::delete_dir( $file_path );
            }

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

    private function import_screenshot( $dir, $name )
    {
        if( $this->generate_screenshot ) {
            $url = 'https://placeholdit.imgix.net/~text?txtsize=63&txt=' . $name . '&w=700&h=350';
            $img = $dir . '/assets/screenshot-1.png';

            $ch = curl_init($url);
            $fp = fopen($img, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }
    }
}
