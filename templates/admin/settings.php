<?php
$roles = rsmus()->helper()->get_roles();
$hosting_limit = rsmus()->helper()->get_hosting_max_limit();
$wp_limit = rsmus()->helper()->get_wp_max_limit();
$options = rsmus()->helper()->get_saved_options();
?>
<div class="wrap">
  <h1><?php _e('Role specific max-upload size','wprsmus'); ?></h1>
  <p><strong></strong> <?php _e( 'This plugin can only change "Maximum Upload Limit set on WordPress". Maximum upload limit set by hosting provider can not be changed from this plugin. If you want to change limitation set by hosting provider, we suggest you contact your hosting provider.','wprsmus' ); ?></p>
  <hr/>
  <form action="<?php echo admin_url('admin-ajax.php?action=rsmus_save_options'); ?>" id="rsmus-settings-form" method="post">
  	<div class="rsmus-form-response"></div>
    <table class="form-table">
      <tbody>
        <?php foreach( $roles as $key => $value ): ?>
            <tr>
              <th scope="row"><label for="role-<?php echo esc_html( $key ); ?>"><?php echo esc_html( $value ); ?></lable></th>
              <td><input class ="small-text" type="number" name="role_max_size[<?php echo esc_html( $key ); ?>]" id="role-<?php echo esc_html( $key ); ?>" value="<?php echo esc_html( rsmus()->helper()->get_saved_options( $key ) ); ?>"/> <small><?php _e( 'MB','wprsmus' ); ?></small></td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  
  <?php wp_nonce_field('role-based-max-upload-size'); ?>
  <p><button id="rsmus-settings-btn" type="submit" class="button button-primary"><?php _e( 'Save Changes','wprsmus' ); ?></button></p>
  <p><strong><em><?php _e( 'Note','wprsmus' ); ?>:</strong> <?php _e( 'Any value bigger than Limitation set by hosting provider will be changed to max upload size set on your server.','wprsmus' ); ?></em></p>
</form>

<hr/>
<table class="form-table" style="width:100%;max-width:400px;">
  <thead>
    <tr>
      <td><strong><?php _e( 'Title','wprsmus' ); ?></strong></td>
      <td><strong><?php _e( 'Message','wprsmus' ); ?></strong></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php _e( 'Maximum Upload Limit set by WordPress', 'wprsmus' ); ?></td>
      <td><?php echo esc_html( $hosting_limit ); ?><?php _e( 'MB','wprsmus' ); ?></td>
    </tr>
    <tr>
      <td><?php _e( 'Maximum Upload Limit Set By Hosting Provider', 'wprsmus' ); ?></td>
      <td><?php echo esc_html( $wp_limit ); ?><?php _e( 'MB','wprsmus' ); ?></td>
    </tr>
  </tbody>
</table>

</div>