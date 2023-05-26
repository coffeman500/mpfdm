<?php
/**
 * Handles loading/registering all blocks in this directory
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Scan the current directory and load all folders as blocks
 * 
 */
function mpfdm_register_acf_blocks() 
{
    // Find all blocks in current directory
    $allBlocks = array_diff( scandir(__DIR__), array('.', '..', 'block-template', basename(__FILE__)) );

    // Loop through blocks
    if (count($allBlocks) > 0) {

        foreach($allBlocks as $block)
        {
            // Register the block type
            register_block_type( __DIR__ . '/' . $block );

            // Include fields file if it exists
            if (file_exists(__DIR__ . '/' . $block . '/fields.php')) require_once(__DIR__ . '/' . $block . '/fields.php');
        }

    }
    
}
add_action( 'init', 'mpfdm_register_acf_blocks' );