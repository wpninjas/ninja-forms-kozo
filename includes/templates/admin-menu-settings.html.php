<form action="" method="POST">

    <input type="hidden" name="action" value="save" />

    <table class="form-table">
        <tbody>

            <tr id="row_version">
                <th scope="row">
                    <label for="version">Version</label>
                </th>
                <td>
                    0.0.1
                </td>
            </tr>

            <?php foreach( $this->settings as $id => $name ): ?>
            <tr id="row_<?php echo $id; ?>">
                <th>
                    <label for="<?php echo $id; ?>">
                        <?php echo $name; ?>
                    </label>
                </th>
                <td>
                    <input type="text" class="widefat" name="<?php echo $id; ?>" value="<?php echo ( isset( $this->options[ $id ] ) ) ? $this->options[ $id ] : '' ; ?>"/>
                </td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <th colspan="2">
                    <input type="submit" class="button button-primary" value="<?php _e( 'Save Settings', NF_Kozo::TEXTDOMAIN ); ?>"/>
                </th>
            </tr>

        </tbody>
    </table>
</form>