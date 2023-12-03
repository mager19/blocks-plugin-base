<?php
/**
 * Plugin Name:       Blocksmg
 * Description:       A plugin of custom blocks by mager19.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Mager19
 * Author URI:        https://twitter.com/mager19
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

namespace Blocksmg;

if (! defined('ABSPATH') ) {
    die('Silence is golden.');
}
/**
 * Constructor Class
 *
 * @category Blocks
 * @package  CreateBlock
 * @author   Mager19 <mager19@gmail.com>
 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://twitter.com/mager19
 */

final class Blocksmg
{
    static function init()
    {

        add_action(
            'init', function () {
                add_filter(
                    'block_categories_all', function ($categories) {
                        array_unshift(
                            $categories, [
                            'slug' => 'blocksmg',
                            'title' => __('Blocksmg', 'blocksmg'),
                            ]
                        );
                        return $categories;
                    }
                );
                $blocks = glob(__DIR__ . '/build/blocks/*/block.json');
                foreach ($blocks as $block) {
                    register_block_type($block);
                }
            }
        );
    }
}

Blocksmg::init();
