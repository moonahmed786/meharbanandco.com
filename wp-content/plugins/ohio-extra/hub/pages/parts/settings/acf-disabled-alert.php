<div class="notice o-notice activation danger">
    <div class="holder">
        <i class="bi bi-exclamation-triangle"></i>
        <strong><?php _e( 'ACF PRO plugin is required.', 'ohio-extra' ); ?></strong> <a target="_blank" rel="noopener" href="https://docs.clbthemes.com/ohio/getting-started/#bundled_plugins"><?php _e( 'Install and activate', 'ohio-extra' ); ?></a> <?php _e( 'ACF PRO plugin to activate Theme Settings panel.', 'ohio-extra' ); ?>
    </div>
    <div class="holder">
        <a target="_blank" href="<?php echo admin_url('themes.php?page=install-required-plugins'); ?>" class="btn"><?php _e( 'Install ACF PRO', 'ohio-extra' ); ?></a>or<a target="_blank" href="<?php echo admin_url('plugins.php'); ?>" class="btn btn-flat"><?php _e( 'Manage Plugins', 'ohio-extra' ); ?></a>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>