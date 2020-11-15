<?php
/**
 ************************************************************************************************************************
 * Backdrop Core - framework.php
 ************************************************************************************************************************
 * Backdrop Core is a framework that allows you to add all necessary features into one single place without the need to
 * add to individual theme. This way, it will be easier to maintain and only used what you need. 
 * 
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

 /**
 ************************************************************************************************************************
 * Table of Content
 ************************************************************************************************************************
 *  1.0 - array_map ($config)
 *  2.0 - array_map ($customize)
 *  3.0 - array_map ($scripts)
 *  4.0 - array_map ($general)
 *  5.0 - array_map ($loop)
 *  6.0 - array_map ($menu)
 *  7.0 - array_map ($misc)
 *  8.0 - array_map ($sidebar)
 ************************************************************************************************************************
 */

 /**
 ************************************************************************************************************************
 *  1.0 - array_map ($config)
 ************************************************************************************************************************
 */
array_map( function( $config ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/config/{$config}.php" ) );
}, [
    'functions-setup',
    'functions-sidebars',
]);

 /**
 ************************************************************************************************************************
 *  2.0 - array_map ($customize)
 ************************************************************************************************************************
 */
array_map( function( $customize ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/customize/{$customize}.php" ) );
}, [
    'functions-layouts'
]);

 /**
 ************************************************************************************************************************
 *  3.0 - array_map ($scripts)
 ************************************************************************************************************************
 */
array_map( function( $scripts ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/scripts/{$scripts}.php" ) );
}, [
    'functions-scripts'
] );

 /**
 ************************************************************************************************************************
 *  4.0 - array_map ($general)
 ************************************************************************************************************************
 */
array_map( function( $general ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/general/{$general}.php" ) );
}, [
    'functions-entry',
    'functions-site'
]);

 /**
 ************************************************************************************************************************
 *  5.0 - array_map ($loop)
 ************************************************************************************************************************
 */
array_map( function( $loop ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/loop/{$loop}.php" ) );
}, [
    'custom-query',
    'main-query'
]);

 /**
 ************************************************************************************************************************
 *  6.0 - array_map ($menu)
 ************************************************************************************************************************
 */
array_map( function( $menu ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/menu/{$menu}.php" ) );
}, [
    'primary',
    'secondary',
    'social'
]);

 /**
 ************************************************************************************************************************
 *  7.0 - array_map ($misc)
 ************************************************************************************************************************
 */
array_map( function( $misc ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/misc/{$misc}.php" ) );
}, [
    'functions-head',
    'functions-filters'
]);

 /**
 ************************************************************************************************************************
 *  8.0 - array_map ($sidebar)
 ************************************************************************************************************************
 */
array_map( function( $sidebar ) {
    require_once( get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/sidebar/{$sidebar}.php" ) );
}, [
    'custom',
    'primary',
    'secondary'
]);