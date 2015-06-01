<tr>
    <th scope="row">
        <label for="settings[plugin-name']"><?php NF_Kozo::_e( 'Plugin Name'  ); ?></label>
    </th>
    <td>
        <select name="settings[plugin-name]" id="settings-plugin-name">
            <?php foreach( $form->fields as $field ): ?>
                <option value="<?php echo $field['id']; ?>"<?php if( $field['id'] == $settings['plugin-name'] ) echo " selected"; ?>>
                    <?php echo $field['data']['label']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </td>
</tr>