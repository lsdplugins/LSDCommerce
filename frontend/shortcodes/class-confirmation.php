<?php
namespace LSDCommerce\Shortcodes;

if (!defined('ABSPATH')) {
    exit;
}

class Confirmation
{
    public function __construct()
    {
        add_shortcode('lsdcommerce_confirmation', [$this, 'render']);
    }

    public function order_confirmation(){}

    public function order_status(){}

    public function render($atts)
    {
        // extract(shortcode_atts(array(
        //     'count' => false,
        //     'program_id' => false,
        // ), $atts));

        ob_start();

        $render = ob_get_clean();

        return $render;
    }
}
new Confirmation;
