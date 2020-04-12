<?php
/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', '_s_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function _s_register_required_plugins() {
    $plugins = array(
        array(
            'name'     => 'Campos personalizados',
            'slug'     => 'advanced-custom-fields',
            'required' => true,
        ),
        array(
            'name'     => 'Personalização do tema',
            'slug'     => 'kirki',
            'required' => true,
        ),
    );
    /*
     * Array of configuration settings.
     */
    $config = array(
        'id'           => '_s',                    // Unique ID for hashing notices for multiple instances of TGMPA.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => __( 'O tema pode não funcionar corretamente sem os plugins recomendados' ),                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => __( 'Instale os seguintes plugins recomendados' ),                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}
