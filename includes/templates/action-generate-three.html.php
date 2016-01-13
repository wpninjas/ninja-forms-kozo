<!-- SETTINGS: PLUGIN NAME -->
<tr>
    <th scope="row">
        <label for="settings[plugin-name]"><?php _e( 'Plugin Name', NF_Kozo::TEXTDOMAIN ); ?> <span style="color: red;">*</span></label>
    </th>
    <td>
        <select name="settings[plugin-name]" id="settings-plugin-name">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['plugin-name'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>

<!-- SETTINGS: PLUGIN URI -->
<tr>
    <th scope="row">
        <label for="settings[plugin-uri]"><?php _e( 'Plugin URI', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <select name="settings[plugin-uri]" id="settings-plugin-uri">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['plugin-uri'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>

<!-- SETTINGS: DESCRIPTION -->
<tr>
    <th scope="row">
        <label for="settings[description]"><?php _e( 'Description', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <select name="settings[description]" id="settings-description">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['description'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>









<!-- SETTINGS: USE ACTION -->
<tr>
    <th scope="row">
        <label for="settings[use-action]"><?php _e( 'Use Action', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <select name="settings[use-action]" id="settings-use-action">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['use-action'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>

<!-- SETTINGS: USE FIELD -->
<tr>
    <th scope="row">
        <label for="settings[use-field]"><?php _e( 'Use Field', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <select name="settings[use-field]" id="settings-use-field">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['use-field'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>

<!-- SETTINGS: USE PAYMENT -->
<tr>
    <th scope="row">
        <label for="settings[use-payment]"><?php _e( 'Use Payment', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <select name="settings[use-payment]" id="settings-use-payment">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['use-payment'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>












<!-- SETTINGS: AUTHOR -->
<tr>
    <th scope="row">
        <label for="settings[author]"><?php _e( 'Author', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <select name="settings[author]" id="settings-author">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['author'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>

<!-- SETTINGS: AUTHOR URI -->
<tr>
    <th scope="row">
        <label for="settings[author-uri]"><?php _e( 'Author URI', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <select name="settings[author-uri]" id="settings-author-uri">
            <option value="">-</option>
            <?php foreach( $form->fields as $field ): ?>

                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['author-uri'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?> (ID: <?php echo $field['id']; ?>)
                </option>

            <?php endforeach; ?>
        </select>
    </td>
</tr>








<!-- SETTINGS: DOWNLOAD -->
<tr>
    <th scope="row">
        <label for="settings[download]"><?php _e( 'Download', NF_Kozo::TEXTDOMAIN ); ?></label>
    </th>
    <td>
        <input type="checkbox" name="settings[download]" id="settings-download"  <?php if( $settings['download'] ) echo " checked"; ?>/>
    </td>
</tr>