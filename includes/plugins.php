<?php

add_action( 'tgmpa_register', 'bedrock_register_required_plugins' );

function bedrock_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    // This is an example of how to include a plugin bundled with a theme.
    /*
    array(
      'name'               => 'TGM Example Plugin', // The plugin name.
      'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
      'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => '', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),
    */

    array(
      'name'               => 'Advanced Custom Fields Pro', // The plugin name.
      'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
      'source'             => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip', // The plugin source.
      'required'           => true, // If false, the plugin is only 'recommended' instead of required.
      'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
      'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
      'external_url'       => 'https://www.advancedcustomfields.com/pro/', // If set, overrides default API URL and points to an external URL.
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
    ),

    // This is an example of how to include a plugin from an arbitrary external source in your theme.
    /*
    array(
      'name'         => 'TGM New Media Plugin', // The plugin name.
      'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
      'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
      'required'     => true, // If false, the plugin is only 'recommended' instead of required.
      'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
    ),
    */

    // This is an example of how to include a plugin from a GitHub repository in your theme.
    // This presumes that the plugin code is based in the root of the GitHub repository
    // and not in a subdirectory ('/src') of the repository.
    /*
    array(
      'name'      => 'Adminbar Link Comments to Pending',
      'slug'      => 'adminbar-link-comments-to-pending',
      'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
    ),
    */

    // This is an example of how to include a plugin from the WordPress Plugin Repository.
    array(
      'name'      => 'AddToAny Share Buttons',
      'slug'      => 'add-to-any',
      'required'  => false
    ),
    array(
      'name'      => 'Classic Editor',
      'slug'      => 'classic-editor',
      'required'  => false
    ),
    array(
      'name'        => 'WordPress SEO by Yoast',
      'slug'        => 'wordpress-seo',
      'required'    => false
    ),
    array(
      'name'        => 'Contact Form 7',
      'slug'        => 'contact-form-7',
      'required'    => false
    ),
    array(
      'name'        => 'Crop Thumbnails',
      'slug'        => 'crop-thumbnails',
      'required'    => false
    ),
    array(
      'name'        => 'Flamingo',
      'slug'        => 'flamingo',
      'required'    => false
    ),
    array(
      'name'        => 'Regenerate Thumbnails',
      'slug'        => 'regenerate-thumbnails',
      'required'    => false
    ),
    array(
      'name'        => 'Simple Page Ordering',
      'slug'        => 'simple-page-ordering',
      'required'    => false
    ),
    array(
      'name'        => 'User Role Editor',
      'slug'        => 'user-role-editor',
      'required'    => false
    ),
    array(
      'name'        => 'W3 Total Cache',
      'slug'        => 'w3-total-cache',
      'required'    => false
    ),
    array(
      'name'        => 'Smush Image Compression and Optimisation',
      'slug'        => 'wp-smushit',
      'required'    => false
    )

  );

  $config = array(
    'id'           => 'bedrock',               // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                    // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

    /*
    'strings'      => array(
      'page_title'                      => __( 'Install Required Plugins', 'bedrock' ),
      'menu_title'                      => __( 'Install Plugins', 'bedrock' ),
      /* translators: %s: plugin name. * /
      'installing'                      => __( 'Installing Plugin: %s', 'bedrock' ),
      /* translators: %s: plugin name. * /
      'updating'                        => __( 'Updating Plugin: %s', 'bedrock' ),
      'oops'                            => __( 'Something went wrong with the plugin API.', 'bedrock' ),
      'notice_can_install_required'     => _n_noop(
        /* translators: 1: plugin name(s). * /
        'This theme requires the following plugin: %1$s.',
        'This theme requires the following plugins: %1$s.',
        'bedrock'
      ),
      'notice_can_install_recommended'  => _n_noop(
        /* translators: 1: plugin name(s). * /
        'This theme recommends the following plugin: %1$s.',
        'This theme recommends the following plugins: %1$s.',
        'bedrock'
      ),
      'notice_ask_to_update'            => _n_noop(
        /* translators: 1: plugin name(s). * /
        'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
        'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
        'bedrock'
      ),
      'notice_ask_to_update_maybe'      => _n_noop(
        /* translators: 1: plugin name(s). * /
        'There is an update available for: %1$s.',
        'There are updates available for the following plugins: %1$s.',
        'bedrock'
      ),
      'notice_can_activate_required'    => _n_noop(
        /* translators: 1: plugin name(s). * /
        'The following required plugin is currently inactive: %1$s.',
        'The following required plugins are currently inactive: %1$s.',
        'bedrock'
      ),
      'notice_can_activate_recommended' => _n_noop(
        /* translators: 1: plugin name(s). * /
        'The following recommended plugin is currently inactive: %1$s.',
        'The following recommended plugins are currently inactive: %1$s.',
        'bedrock'
      ),
      'install_link'                    => _n_noop(
        'Begin installing plugin',
        'Begin installing plugins',
        'bedrock'
      ),
      'update_link'             => _n_noop(
        'Begin updating plugin',
        'Begin updating plugins',
        'bedrock'
      ),
      'activate_link'                   => _n_noop(
        'Begin activating plugin',
        'Begin activating plugins',
        'bedrock'
      ),
      'return'                          => __( 'Return to Required Plugins Installer', 'bedrock' ),
      'plugin_activated'                => __( 'Plugin activated successfully.', 'bedrock' ),
      'activated_successfully'          => __( 'The following plugin was activated successfully:', 'bedrock' ),
      /* translators: 1: plugin name. * /
      'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'bedrock' ),
      /* translators: 1: plugin name. * /
      'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'bedrock' ),
      /* translators: 1: dashboard link. * /
      'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'bedrock' ),
      'dismiss'                         => __( 'Dismiss this notice', 'bedrock' ),
      'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'bedrock' ),
      'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'bedrock' ),

      'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
    ),
    */
  );

  tgmpa( $plugins, $config );
}
