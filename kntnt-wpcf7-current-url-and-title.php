<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Form Page Title and URL for Contact Form 7
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Adds Contact Form 7 tags capturing title and url of the page with the form.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined( 'ABSPATH' ) || die;

add_action( 'wpcf7_init', function () {

    // Add the form tag [current_title <field-name>], which adds a hidden field
    // <field-name> with the title of the current page. The title can be used
    // in the mail with the mail tag [<field-name>].
    wpcf7_add_form_tag( 'current_title', function ( $tag ) {
        $title = get_the_title();
        return '<input type="hidden" name="' . $tag['name'] . '" value="' . $title . '" />';
    }, [ 'name-attr' => true ] );

    // Add the form tag [current_url <field-name>], which adds a hidden field
    // <field-name> with the title of the current page. The url can be used
    // in the mail with the mail tag [<field-name>].
    wpcf7_add_form_tag( 'current_url', function ( $tag ) {
        global $wp;
        $url = home_url( $wp->request );
        return '<input type="hidden" name="' . $tag['name'] . '" value="' . $url . '" />';
    }, [ 'name-attr' => true ] );

} );
