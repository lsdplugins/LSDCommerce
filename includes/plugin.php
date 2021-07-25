<?php
namespace LSDCommerce;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

final class Plugin
{
    /**
     * The name of this plugin
     *
     * @var string
     */
    protected static $name;

    /**
     * The unique identifier of this plugin
     *
     * @var string
     */
    protected static $slug;

    /**
     * The currenct version of this plugin
     *
     * @var string
     */
    protected static $version;
    /**
     * Loads the plugin into WordPress.
     */

     
    /**
     * Load Class Activator on Plugin Active
     *
     * @return void
     * @since 1.0.3
     */
    public function activation()
    {
        require_once LSDC_PATH . 'includes/common/class-activator.php';
        Activator::activate();
    }

    /**
     * Load Class Deactivator on Plugin Deactivate
     *
     * @return void
     * @since 1.0.3
     */
    public function uninstall()
    {
        require_once LSDC_PATH . 'includes/common/class-deactivator.php';
        Deactivator::deactivate();
    }

    /**
     * Singleton Load
     *
     * @return void
     */
    public static function load()
    {
        $lsdcommerce = new self();
        $plugin = array('slug' => 'lsdcommerce', 'name' => 'LSDCommerce', 'version' => LSDC_VERSION);

        // Activation and Deactivation
        register_activation_hook(LSDC_BASE, [$lsdcommerce, 'activation']);
        register_deactivation_hook(LSDC_BASE, [$lsdcommerce, 'uninstall']);

        // Bind to Loaded
        add_action('plugins_loaded', [$lsdcommerce, 'loaded']);

        /*************** GLOBAL /****************/
        require_once LSDC_PATH . 'includes/common/class-logger.php';
        require_once LSDC_PATH . 'includes/common/class-i18n.php';

        require_once LSDC_PATH . 'includes/helpers/currency.php';
        require_once LSDC_PATH . 'includes/helpers/price.php';
        require_once LSDC_PATH . 'includes/helpers/payment.php';
        require_once LSDC_PATH . 'includes/helpers/getter.php';
        require_once LSDC_PATH . 'includes/helpers/setter.php';
        require_once LSDC_PATH . 'includes/helpers/helper.php';
        require_once LSDC_PATH . 'includes/helpers/thirdy.php';

        // Register Post Type
        require_once LSDC_PATH . 'includes/common/class-posttype-product.php';
        require_once LSDC_PATH . 'includes/common/class-posttype-order.php';
        // require_once LSDC_PATH . 'includes/common/class-usages.php';

        // Load FrontEnd Class [Only for FrontEnd Needs]
        if (is_admin()) {
            require_once LSDC_PATH . 'admin/class-admin.php';
            Admin::register($plugin);
        }

        // Registrar Module
        require_once LSDC_PATH . 'includes/registrar/class-registrar-notification.php';
        require_once LSDC_PATH . 'includes/registrar/class-registrar-payment.php';
        require_once LSDC_PATH . 'includes/registrar/class-registrar-shipping.php';

        // Module Payments
        require_once LSDC_PATH . 'admin/modules/payments/class-payment-static-qr.php';
        require_once LSDC_PATH . 'admin/modules/payments/class-payment-transfer-bank.php';
        // require_once LSDC_PATH . 'admin/modules/payments/class-payment-shopee-md.php';

        // Module Notification
        require_once LSDC_PATH . 'admin/modules/notifications/class-notification-whatsapp.php';
        require_once LSDC_PATH . 'admin/modules/notifications/class-notification-email.php';

        // Module Shipping
        require_once LSDC_PATH . 'admin/modules/shipping/class-shipping-email.php';
        require_once LSDC_PATH . 'admin/modules/shipping/class-shipping-rajaongkir-starter.php';
        // require_once LSDC_PATH . 'admin/modules/shipping/class-shipping-cod.php'; // bayar dirumah
        // require_once LSDC_PATH . 'admin/modules/shipping/class-shipping-pickup.php'; // ambil ketempat

        // Load Notification Services
        // require_once LSDC_PATH . '/includes/services/scheduler/scheduler.php';

        // Load FrontEnd Class [Only for FrontEnd Needs]
        if (!is_admin()) {
            require_once LSDC_PATH . 'public/class-public.php';
            Generic::register($plugin);

            // Shopping
            require_once LSDC_PATH . 'includes/shortcodes/class-storefront.php';
            require_once LSDC_PATH . 'includes/shortcodes/class-product-card.php';

            // Transaction
            require_once LSDC_PATH . 'includes/shortcodes/class-cart.php';
            require_once LSDC_PATH . 'includes/shortcodes/class-checkout.php';

            // After Sales
            require_once LSDC_PATH . 'public/modules/member/tab-functions.php';
            require_once LSDC_PATH . 'includes/shortcodes/class-member.php';
        }

    }

    public function loaded()
    {
        load_plugin_textdomain('lsdcommerce', false, LSDC_PATH . '/languages/');
    }

    /**
     * Clone.
     *
     * Disable class cloning and throw an error on object clone.
     *
     * The whole idea of the singleton design pattern is that there is a single
     * object. Therefore, we don't want the object to be cloned.
     *
     * @access public
     * @since 1.0.0
     */
    public function __clone()
    {
        // Cloning instances of the class is forbidden.
        _doing_it_wrong(__FUNCTION__, esc_html__('Something went wrong.', 'lsdcommerce'), LSDC_VERSION);
    }

    /**
     * Wakeup.
     *
     * Disable unserializing of the class.
     *
     * @access public
     * @since 1.0.0
     */
    public function __wakeup()
    {
        // Unserializing instances of the class is forbidden.
        _doing_it_wrong(__FUNCTION__, esc_html__('Something went wrong.', 'lsdcommerce'), LSDC_VERSION);
    }
}

Plugin::load();