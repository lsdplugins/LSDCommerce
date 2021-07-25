<?php
/**
 * Cart Class for Management Product on Cart based on cart_hash
 * CRUD operate for add and remove product inside server cart
 * 
 * Kelas Keranjang untuk kebutuhan manajemen produk pada keranjang server di tabel 'lsdcommerce_carts'
 * Kelas ini berfungsi untuk operasi CRUD pada keranjang
 * 
 * @since 0.1.0 - Alpha
 */

class LSDC_Cart
{
    public static function get( string $key )
    {
        if (isset($_COOKIE['_lsdd_cart'])) {
            $carts = (array) json_decode(stripslashes($_COOKIE['_lsdd_cart']));
            $program_id = array_keys($carts)[0];
            $nominal = $carts[$program_id]->nominal;
            switch ($key) {
                case 'program_id':
                    return $program_id;
                    break;
                case 'nominal':
                    return $nominal;
                    break;
                default:
                    return $program_id;
                    break;
            }
        }else {
            return 404;
        }
    }

    public static function set()
    {

    }

    public static function remove()
    {
        
    }

    /**
     * Quantity System
     */
    public static function increment_item( int $id ){}

    public static function decrement_item( int $id ){}

    public static function get_items( array $ids ){}

    public static function set_items( array $items ){}

    public static function remove_items( array $ids ){}
}

// $nominal = LSDD_Cart::get('nominal');
// var_dump( $nominal );


/**
 * Usage Class
 * 
 * LSDC_Cart::add_to_cart( id : 2, qty : 1 );
 * LSDC_Cart::
 */