<?php
/**
 * Plugin Name:       Blocksmg
 * Description:       A plugin of custom blocks by mager19.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Mager19
 * Author URI:          https://twitter.com/mager19
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blocksmg
 *
 * @category Blocks
 * @package  CreateBlock
 * @author   Mager19 <mager19@gmail.com>
 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://twitter.com/mager19
 */

if (! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

function create_custom_block_category($categories)
{
    array_unshift(
        $categories, [
        'slug' => 'blocksmg',
        'title' => __('Blocksmg', 'blocksmg'),
        ]
    );
    return $categories;
}

function create_block_blocksmg_block_init()
{
    add_filter('block_categories_all', 'create_custom_block_category');
    register_block_type(__DIR__ . '/build/blocks/example');
}
add_action('init', 'create_block_blocksmg_block_init');
