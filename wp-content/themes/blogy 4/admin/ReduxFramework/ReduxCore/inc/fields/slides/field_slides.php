<?php

    /**
     * Redux Framework is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 2 of the License, or
     * any later version.
     * Redux Framework is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
     * GNU General Public License for more details.
     * You should have received a copy of the GNU General Public License
     * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
     *
     * @package     ReduxFramework
     * @subpackage  Field_slides
     * @author      Luciano "WebCaos" Ubertini
     * @author      Daniel J Griffiths (Ghost1227)
     * @author      Dovy Paukstys
     * @version     3.0.0
     */

// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

// Don't duplicate me!
    if ( ! class_exists( 'ReduxFramework_slides' ) ) {

        /**
         * Main ReduxFramework_slides class
         *
         * @since       1.0.0
         */
        class ReduxFramework_slides {

            /**
             * Field Constructor.
             * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
             *
             * @since       1.0.0
             * @access      public
             * @return      void
             */
            function __construct( $field = array(), $value = '', $parent ) {
                $this->parent = $parent;
                $this->field  = $field;
                $this->value  = $value;
            }

            /**
             * Field Render Function.
             * Takes the vars and outputs the HTML for the field in the settings
             *
             * @since       1.0.0
             * @access      public
             * @return      void
             */
            public function render() {

                $defaults = array(
                    'show' => array(
                        'title'       => true,
                    )
                );

                $this->field = wp_parse_args( $this->field, $defaults );

                echo '<div class="redux-slides-accordion">';

                $x = 0;

                $multi = ( isset( $this->field['multi'] ) && $this->field['multi'] ) ? ' multiple="multiple"' : "";

                if ( isset( $this->value ) && is_array( $this->value ) && ! empty( $this->value ) ) {

                    $slides = $this->value;

                    foreach ( $slides as $slide ) {

                        if ( empty( $slide ) ) {
                            continue;
                        }

                        $defaults = array(
                            'title'         => '',
                            'description'   => '',
                            'sort'          => '',
                            'url'           => '',
                            'image'         => '',
                            'thumb'         => '',
                            'attachment_id' => '',
                            'height'        => '',
                            'width'         => '',
                            'select'        => array(),
                        );
                        $slide    = wp_parse_args( $slide, $defaults );

                        if ( empty( $slide['thumb'] ) && ! empty( $slide['attachment_id'] ) ) {
                            $img             = wp_get_attachment_image_src( $slide['attachment_id'], 'full' );
                            $slide['image']  = $img[0];
                            $slide['width']  = $img[1];
                            $slide['height'] = $img[2];
                        }

                        echo '<div class="redux-slides-accordion-group"><fieldset class="redux-field" data-id="' . $this->field['id'] . '"><h3><span class="redux-slides-header">' . $slide['title'] . '</span></h3><div>';

                        $hide = '';
                        if ( empty( $slide['image'] ) ) {
                            $hide = ' hide';
                        }


                        echo '<div class="screenshot' . $hide . '">';
                        echo '<a class="of-uploaded-image" href="' . $slide['image'] . '">';
                        echo '<img class="redux-slides-image" id="image_image_id_' . $x . '" src="' . $slide['thumb'] . '" alt="" target="_blank" rel="external" />';
                        echo '</a>';
                        echo '</div>';

                        echo '<div class="redux_slides_add_remove">';

                        echo '<span class="button media_upload_button" id="add_' . $x . '">' . __( 'Upload', 'redux-framework' ) . '</span>';

                        $hide = '';
                        if ( empty( $slide['image'] ) || $slide['image'] == '' ) {
                            $hide = ' hide';
                        }

                        echo '<span class="button remove-image' . $hide . '" id="reset_' . $x . '" rel="' . $slide['attachment_id'] . '">' . __( 'Remove', 'redux-framework' ) . '</span>';

                        echo '</div>' . "\n";

                        echo '<ul id="' . $this->field['id'] . '-ul" class="redux-slides-list">';

                        if ( $this->field['show']['title'] ) {
                            $title_type = "text";
                        } else {
                            $title_type = "hidden";
                        }

                        $placeholder = ( isset( $this->field['placeholder']['title'] ) ) ? esc_attr( $this->field['placeholder']['title'] ) : __( 'Title', 'redux-framework' );
                        echo '<li><input type="' . $title_type . '" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="' . esc_attr( $slide['title'] ) . '" placeholder="' . $placeholder . '" class="full-text slide-title" /></li>';

                        if ( $this->field['show']['description'] ) {
                            $placeholder = ( isset( $this->field['placeholder']['description'] ) ) ? esc_attr( $this->field['placeholder']['description'] ) : __( 'Description', 'redux-framework' );
                            echo '<li><textarea name="' . $this->field['name'] . '[' . $x . '][description]" id="' . $this->field['id'] . '-description_' . $x . '" placeholder="' . $placeholder . '" class="large-text" rows="6">' . esc_attr( $slide['description'] ) . '</textarea></li>';
                        }

                        $placeholder = ( isset( $this->field['placeholder']['url'] ) ) ? esc_attr( $this->field['placeholder']['url'] ) : __( 'URL', 'redux-framework' );
                        if ( $this->field['show']['url'] ) {
                            $url_type = "text";
                        } else {
                            $url_type = "hidden";
                        }

                        echo '<li><input type="' . $url_type . '" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][url]" value="' . esc_attr( $slide['url'] ) . '" class="full-text" placeholder="' . $placeholder . '" /></li>';
                        echo '<li><input type="hidden" class="slide-sort" name="' . $this->field['name'] . '[' . $x . '][sort]" id="' . $this->field['id'] . '-sort_' . $x . '" value="' . $slide['sort'] . '" />';
                        echo '<li><input type="hidden" class="upload-id" name="' . $this->field['name'] . '[' . $x . '][attachment_id]" id="' . $this->field['id'] . '-image_id_' . $x . '" value="' . $slide['attachment_id'] . '" />';
                        echo '<input type="hidden" class="upload-thumbnail" name="' . $this->field['name'] . '[' . $x . '][thumb]" id="' . $this->field['id'] . '-thumb_url_' . $x . '" value="' . $slide['thumb'] . '" readonly="readonly" />';
                        echo '<input type="hidden" class="upload" name="' . $this->field['name'] . '[' . $x . '][image]" id="' . $this->field['id'] . '-image_url_' . $x . '" value="' . $slide['image'] . '" readonly="readonly" />';
                        echo '<input type="hidden" class="upload-height" name="' . $this->field['name'] . '[' . $x . '][height]" id="' . $this->field['id'] . '-image_height_' . $x . '" value="' . $slide['height'] . '" />';
                        echo '<input type="hidden" class="upload-width" name="' . $this->field['name'] . '[' . $x . '][width]" id="' . $this->field['id'] . '-image_width_' . $x . '" value="' . $slide['width'] . '" /></li>';
                        echo '<li><a href="javascript:void(0);" class="button deletion redux-slides-remove">' . __( 'Delete Slide', 'redux-framework' ) . '</a></li>';
                        echo '</ul></div></fieldset></div>';
                        $x ++;
                    }
                }

                if ( $x == 0 ) {
                    echo '<div class="redux-slides-accordion-group"><fieldset class="redux-field" data-id="' . $this->field['id'] . '"><h3><span class="redux-slides-header">New Slide</span></h3><div>';

                    $hide = ' hide';

                    echo '<div class="screenshot' . $hide . '">';
                    echo '<a class="of-uploaded-image" href="">';
                    echo '<img class="redux-slides-image" id="image_image_id_' . $x . '" src="" alt="" target="_blank" rel="external" />';
                    echo '</a>';
                    echo '</div>';

                    //Upload controls DIV
                    echo '<div class="upload_button_div">';

                    //If the user has WP3.5+ show upload/remove button
                    echo '<span class="button media_upload_button" id="add_' . $x . '">' . __( 'Upload', 'redux-framework' ) . '</span>';

                    echo '<span class="button remove-image' . $hide . '" id="reset_' . $x . '" rel="' . $this->parent->args['opt_name'] . '[' . $this->field['id'] . '][attachment_id]">' . __( 'Remove', 'redux-framework' ) . '</span>';

                    echo '</div>' . "\n";

                    echo '<ul id="' . $this->field['id'] . '-ul" class="redux-slides-list">';
                    if ( $this->field['show']['title'] ) {
                        $title_type = "text";
                    } else {
                        $title_type = "hidden";
                    }
                    $placeholder = ( isset( $this->field['placeholder']['title'] ) ) ? esc_attr( $this->field['placeholder']['title'] ) : __( 'Title', 'redux-framework' );
                    echo '<li><input type="' . $title_type . '" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="" placeholder="' . $placeholder . '" class="full-text slide-title" /></li>';

                    if ( $this->field['show']['description'] ) {
                        $placeholder = ( isset( $this->field['placeholder']['description'] ) ) ? esc_attr( $this->field['placeholder']['description'] ) : __( 'Description', 'redux-framework' );
                        echo '<li><textarea name="' . $this->field['name'] . '[' . $x . '][description]" id="' . $this->field['id'] . '-description_' . $x . '" placeholder="' . $placeholder . '" class="large-text" rows="6"></textarea></li>';
                    }
                    $placeholder = ( isset( $this->field['placeholder']['url'] ) ) ? esc_attr( $this->field['placeholder']['url'] ) : __( 'URL', 'redux-framework' );
                    if ( $this->field['show']['url'] ) {
                        $url_type = "text";
                    } else {
                        $url_type = "hidden";
                    }
                    echo '<li><input type="' . $url_type . '" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][url]" value="" class="full-text" placeholder="' . $placeholder . '" /></li>';
                    echo '<li><input type="hidden" class="slide-sort" name="' . $this->field['name'] . '[' . $x . '][sort]" id="' . $this->field['id'] . '-sort_' . $x . '" value="' . $x . '" />';
                    echo '<li><input type="hidden" class="upload-id" name="' . $this->field['name'] . '[' . $x . '][attachment_id]" id="' . $this->field['id'] . '-image_id_' . $x . '" value="" />';
                    echo '<input type="hidden" class="upload" name="' . $this->field['name'] . '[' . $x . '][image]" id="' . $this->field['id'] . '-image_url_' . $x . '" value="" readonly="readonly" />';
                    echo '<input type="hidden" class="upload-height" name="' . $this->field['name'] . '[' . $x . '][height]" id="' . $this->field['id'] . '-image_height_' . $x . '" value="" />';
                    echo '<input type="hidden" class="upload-width" name="' . $this->field['name'] . '[' . $x . '][width]" id="' . $this->field['id'] . '-image_width_' . $x . '" value="" /></li>';
                    echo '<input type="hidden" class="upload-thumbnail" name="' . $this->field['name'] . '[' . $x . '][thumb]" id="' . $this->field['id'] . '-thumb_url_' . $x . '" value="" /></li>';
                    echo '<li><a href="javascript:void(0);" class="button deletion redux-slides-remove">' . __( 'Delete Slide', 'redux-framework' ) . '</a></li>';
                    echo '</ul></div></fieldset></div>';
                }
                echo '</div><a href="javascript:void(0);" class="button redux-slides-add button-primary" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]">' . __( 'Add Slide', 'redux-framework' ) . '</a><br/>';
            }

            /**
             * Enqueue Function.
             * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
             *
             * @since       1.0.0
             * @access      public
             * @return      void
             */
            public function enqueue() {


                wp_enqueue_script(
                    'redux-field-media-js',
                    ReduxFramework::$_url . 'inc/fields/media/field_media' . Redux_Functions::isMin() . '.js',
                    array( 'jquery' ),
                    time(),
                    true
                );

                wp_enqueue_style(
                    'redux-field-media-css',
                    ReduxFramework::$_url . 'inc/fields/media/field_media.css',
                    time(),
                    true
                );

                wp_enqueue_script(
                    'redux-field-slides-js',
                    ReduxFramework::$_url . 'inc/fields/slides/field_slides' . Redux_Functions::isMin() . '.js',
                    array( 'jquery', 'jquery-ui-core', 'jquery-ui-accordion', 'wp-color-picker' ),
                    time(),
                    true
                );

                wp_enqueue_style(
                    'redux-field-slides-css',
                    ReduxFramework::$_url . 'inc/fields/slides/field_slides.css',
                    time(),
                    true
                );
            }
        }
    }