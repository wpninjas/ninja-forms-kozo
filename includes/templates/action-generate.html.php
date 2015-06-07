<!-- SETTINGS: PLUGIN NAME -->
<tr>
    <th scope="row">
        <label for="settings[plugin-name]"><?php NF_Kozo::_e( 'Plugin Name' ); ?> <span style="color: red;">*</span></label>
    </th>
    <td>
        <select name="settings[plugin-name]" id="settings-plugin-name" required>
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
        <label for="settings[plugin-uri]"><?php NF_Kozo::_e( 'Plugin URI' ); ?></label>
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
        <label for="settings[description]"><?php NF_Kozo::_e( 'Description' ); ?></label>
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

<!-- SETTINGS: AUTHOR -->
<tr>
    <th scope="row">
        <label for="settings[author]"><?php NF_Kozo::_e( 'Author' ); ?></label>
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
        <label for="settings[author-uri]"><?php NF_Kozo::_e( 'Author URI' ); ?></label>
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
        <label for="settings[download]"><?php NF_Kozo::_e( 'Download' ); ?></label>
    </th>
    <td>
        <input type="checkbox" name="settings[download]" id="settings-download"  <?php if( $settings['download'] ) echo " checked"; ?>/>
    </td>
</tr>