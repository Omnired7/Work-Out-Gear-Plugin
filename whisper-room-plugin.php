<?php
/*
Plugin Name: Phoenix Gear plugin
Description: Phoenix Gear Plugin for custom items
Author: Emmanuel Porfirio | Omni Gecko Solutions
Version: 1.0
*/
?>
<?php
//Functions After Initalize
    //Modified Excerpt Length
    function get_the_excerpt_max_charlength($charlength) {
        $excerpt = get_the_excerpt();
        $charlength++;
        $newString = "";
        if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                $newString .= mb_substr( $subex, 0, $excut );
            } else {
                $newString .= $subex;
            }
            $newString .= '...';
        } else {
            $newString .= $excerpt;
        }
        return $newString;
    }
    //Custom Settings
    add_action('customize_register', 'phoenix_gear_custom_comstomize');
    function phoenix_gear_custom_comstomize ($wp_customize){
        //Custom Setting / Front Page Banner Image
        $wp_customize->add_setting('front_page_banner_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'front_page_banner_img', array(
            'label' => __( 'Featured Home Page Image', 'Phoenix Gear' ),
            'section' => 'static_front_page',
            'mime_type' => 'image',
          ) ) );
        //Custom Setting / Mens Image
        $wp_customize->add_setting('pg_mens_bg_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pg_mens_bg_img', array(
            'label' => __( 'Mens Image', 'Phoenix Gear' ),
            'section' => 'short_code_options',
            'mime_type' => 'image',
        ) ) );
        $wp_customize->add_setting('pg_men_bg_txt_area', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_men_bg_txt_area', array(
                'label'    => __( 'Mens Image Message', 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_men_bg_txt_area',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_mens_bg_link', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_mens_bg_link', array(
            'label'    => __( 'Custom Mens Image Link', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_mens_bg_link',
            'type'     => 'text',
        ));
        //Custom Setting / Womans Image
        $wp_customize->add_setting('pg_womens_bg_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pg_womens_bg_img', array(
            'label' => __( 'womens Image', 'Phoenix Gear' ),
            'section' => 'short_code_options',
            'mime_type' => 'image'
        )));
        $wp_customize->add_setting('pg_women_bg_txt_area', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_women_bg_txt_area', array(
                'label'    => __( 'Womens Image Message', 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_women_bg_txt_area',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_womens_bg_link', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_womens_bg_link', array(
            'label'    => __( 'Custom Womens Image Link', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_womens_bg_link',
            'type'     => 'text',
        ));
        //Custom Setting / Custom Image
        $wp_customize->add_setting('pg_custom_bg_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pg_custom_bg_img', array(
            'label' => __( 'Custom Image', 'Phoenix Gear' ),
            'section' => 'short_code_options',
            'mime_type' => 'image'
        )));
        //Custom Setting / Custom Text for Custom Image
        $wp_customize->add_setting('pg_custom_bg_txt', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_custom_bg_txt', array(
                'label'    => __( 'Custom Image Text', 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_custom_bg_txt',
                'type'     => 'text',
        ));
        $wp_customize->add_setting('pg_custom_bg_txt_area', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_custom_bg_txt_area', array(
                'label'    => __( "Custom's Image Message", 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_custom_bg_txt_area',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_custom_bg_link', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_custom_bg_link', array(
            'label'    => __( 'Custom Image custom Link', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_custom_bg_link',
            'type'     => 'text',
        ));
        //Custom Settings / Links Section First
        $wp_customize->add_setting('pg_first_link_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pg_first_link_img', array(
            'label' => __( 'First Link Section Image', 'Phoenix Gear' ),
            'section' => 'short_code_options',
            'mime_type' => 'image'
        )));
        $wp_customize->add_setting('pg_first_link_txt_area', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_first_link_txt_area', array(
                'label'    => __( "First Link Section Image Message", 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_first_link_txt_area',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_link_section_first_link', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_link_section_first_link', array(
            'label'    => __( 'First Link Section Image Link', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_link_section_first_link',
            'type'     => 'text',
        ));
        //Custom Settings / Links Section Second
        $wp_customize->add_setting('pg_second_link_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pg_second_link_img', array(
            'label' => __( 'Second Link Section Image', 'Phoenix Gear' ),
            'section' => 'short_code_options',
            'mime_type' => 'image'
        )));
        $wp_customize->add_setting('pg_second_link_txt_area', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_second_link_txt_area', array(
                'label'    => __( "Second Link Section Image Message", 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_second_link_txt_area',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_link_section_second_link', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_link_section_second_link', array(
            'label'    => __( 'Second Link Section Image Link', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_link_section_second_link',
            'type'     => 'text',
        ));
        //Custom Settings / Links Section Third
        $wp_customize->add_setting('pg_third_link_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pg_third_link_img', array(
            'label' => __( 'Third Link Section Image', 'Phoenix Gear' ),
            'section' => 'short_code_options',
            'mime_type' => 'image'
        )));
        $wp_customize->add_setting('pg_third_link_txt_area', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_third_link_txt_area', array(
                'label'    => __( "Third Link Section Image Message", 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_third_link_txt_area',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_link_section_third_link', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_link_section_third_link', array(
            'label'    => __( 'Third Link Section Image Link', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_link_section_third_link',
            'type'     => 'text',
        ));
        //Custom Settings / Writting Section
        $wp_customize->add_setting('pg_writting_sec_img', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pg_writting_sec_img', array(
            'label' => __( 'Writting Section Image', 'Phoenix Gear' ),
            'section' => 'short_code_options',
            'mime_type' => 'image'
        )));
        $wp_customize->add_setting('pg_writting_sec_txt_area_first', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_writting_sec_txt_area_first', array(
                'label'    => __( "Writting Section First Message", 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_writting_sec_txt_area_first',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_writting_sec_btn_link_first', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_writting_sec_btn_link_first', array(
            'label'    => __( 'Writting Section Button Link First', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_writting_sec_btn_link_first',
            'type'     => 'text',
        ));
        $wp_customize->add_setting('pg_writting_sec_txt_area_second', array(
            'type' => 'theme_mod'
        ));
        $wp_customize->add_control('pg_writting_sec_txt_area_second', array(
                'label'    => __( "Writting Section Second Message", 'Phoenix Gear' ),
                'section'  => 'short_code_options',
                'settings' => 'pg_writting_sec_txt_area_second',
                'type'     => 'textarea',
        ));
        $wp_customize->add_setting('pg_writting_sec_btn_link_second', array(
            'type' => 'theme_mod',
            'sanitize_callback'=> 'esc_url_raw'
        ));
        $wp_customize->add_control('pg_writting_sec_btn_link_second', array(
            'label'    => __( 'Writting Section Button Link Seccond', 'Phoenix Gear' ),
            'section'  => 'short_code_options',
            'settings' => 'pg_writting_sec_btn_link_second',
            'type'     => 'text',
        ));
        //Custom Setting/ Short Code Options - Section
        $wp_customize->add_section('short_code_options', array(
            'title' => __('Short Code Options'),
            'description' => __('Modifications for Short Codes'),
            'priority' => 160
        ));
    }
    //Short Codes
    add_action( 'init', 'phoenix__gear_short_codes');
    function phoenix__gear_short_codes (){
        //Quick Sale / Short Code
        add_shortcode('pg_quick_sale', 'phoenix_gear_quick_sale_SC');
        function phoenix_gear_quick_sale_SC($content= null){
            $content = '<div class="pg-quick-sale">
                            <div class="women" tittle="Image for Womens Gear">
                                <a href="'.get_theme_mod('pg_womens_bg_link').'">
                                    <span>
                                        WOMEN
                                        <p>
                                            '.get_theme_mod('pg_women_bg_txt_area').'
                                        </p>    
                                    </span>
                                </a>
                            </div>
                            <div class="men" tittle="Image for Mens Gear">
                                <a href="'.get_theme_mod('pg_mens_bg_link').'">
                                    <span>
                                        MEN
                                        <p>
                                            '.get_theme_mod('pg_men_bg_txt_area').'
                                        </p>       
                                    </span>
                                </a>
                            </div>
                            <div class="custom" tittle="'.get_theme_mod('pg_custom_bg_txt').'">
                                <a href="'.get_theme_mod('pg_custom_bg_link').'">
                                    <span>'
                                        .get_theme_mod('pg_custom_bg_txt').
                                    '<p>
                                    '.get_theme_mod('pg_custom_bg_txt_area').'
                                    </p>
                                    </span>
                                </a>
                            </div>
                        </div>'; 
            $content .="<style>
                            .pg-quick-sale{
                                width: 100%;
                                height: 25vw;
                                display: flex;
                                flex-flow: row nowrap;
                                justify-content: space-around;
                            }
                            .pg-quick-sale .men{
                                width: 25%;
                                background: url('".wp_get_attachment_image_url(get_theme_mod('pg_mens_bg_img','Custom'),'medium')."');
                                background-repeat: no-repeat;
                                background-size: cover;
                                overflow: hidden;
                                position: relative;
                            }
                            .pg-quick-sale .men span{
                                background: rgba(0,0,0,.45);
                                width: 100%;
                                height: 100%;
                                max-height: 1.5em;
                                transition: max-height .5s ease-in-out;
                                display: block;
                                position: absolute;
                                bottom: 0;
                                font-family: neue-haas-grotesk-display, sans-serif;
                                font-weight: 200;
                                font-style: normal;
                                font-size: 2.5em;
                                text-align: center;
                                color: #FFF;
                            }
                            .pg-quick-sale .men span p{
                                width: 100%;
                                text-align: center;
                                display: none;
                                font-family: montserrat, sans-serif;
                                font-weight: 400;
                                font-style: normal;
                                font-size: .75em;
                                position: absolute;
                                bottom: 0;
                            }
                            .pg-quick-sale .women{
                                width: 25%;
                                background: url('".wp_get_attachment_image_url(get_theme_mod('pg_womens_bg_img'),'medium')."');
                                background-repeat: no-repeat;
                                background-size: cover;
                                overflow: hidden;
                            }
                            .pg-quick-sale .women span{
                                background: rgba(0,0,0,.45);
                                width: 100%;
                                transition: max-width .5s ease-in-out;
                                height: 100%;
                                max-width: 1.5em;
                                display: block;
                                float: left;
                                font-family: neue-haas-grotesk-display, sans-serif;
                                font-weight: 200;
                                font-style: normal;
                                font-size: 2.35em;
                                writing-mode: vertical-rl;
                                text-orientation: upright;
                                text-align: center;
                                color: #FFF;
                                position: relative;
                            }
                            .pg-quick-sale .women span p{
                                max-width: 70%;
                                display: none;
                                writing-mode: horizontal-tb;
                                text-orientation: unset;
                                width: 100%;
                                text-align: center;
                                font-family: montserrat, sans-serif;
                                font-weight: 400;
                                font-style: normal;
                                font-size: .75em;
                                position: absolute;
                                bottom: 0;
                            }
                            .pg-quick-sale .custom{
                                width: 50%;
                                background: url('".wp_get_attachment_image_url(get_theme_mod('pg_custom_bg_img'),'large')."');
                                background-repeat: no-repeat;
                                background-size: cover;
                                overflow: hidden;
                            }
                            .pg-quick-sale .custom span{
                                background: rgba(0,0,0,.45);
                                width: 100%;
                                height: 100%;
                                max-height: 1.5em;
                                transition: max-height .5s ease-in-out;
                                display: block;
                                float:right;
                                font-family: neue-haas-grotesk-display, sans-serif;
                                font-weight: 200;
                                font-style: normal;
                                font-size: 2.35em;
                                text-align: center;
                                color: #FFF;
                                overflow: hidden;
                                position: relative;
                            }
                            .pg-quick-sale .custom span p{
                                display: none;
                                width: 100%;
                                text-align: center;
                                font-family: montserrat, sans-serif;
                                font-weight: 400;
                                font-style: normal;
                                font-size: .75em;
                                position: absolute;
                                bottom: 0;
                            }
                        </style>";
            $content .="<script>
                            jQuery(function($){
                                //Mouse Over
                                $('.pg-quick-sale .men').mouseover(function(e){
                                    $(this).find('span').css({'max-height' : '30em'});
                                    $('.pg-quick-sale .men span p').fadeIn( 700 );
                                });
                                $('.pg-quick-sale .custom').mouseover(function(e){
                                    $(this).find('span').css({'max-height' : '30em'});
                                    $('.pg-quick-sale .custom span p').fadeIn( 700 );
                                });
                                $('.pg-quick-sale .women').mouseover(function(e){
                                    $(this).find('span').css({'max-width' : '30em'});
                                    $('.pg-quick-sale .women span p').fadeIn( 700 );
                                });
                                //Mouse Leave
                                $('.pg-quick-sale .men').mouseleave(function(e){
                                    $(this).find('span').css({'max-height' : '1.5em'});
                                    $('.pg-quick-sale .men span p').fadeOut( 400 );
                                });
                                $('.pg-quick-sale .custom').mouseleave(function(e){
                                    $(this).find('span').css({'max-height' : '1.5em'});
                                    $('.pg-quick-sale .custom span p').fadeOut( 400 );
                                });
                                $('.pg-quick-sale .women').mouseleave(function(e){
                                    $(this).find('span').css({'max-width' : '1.5em'});
                                    $('.pg-quick-sale .women span p').fadeOut( 400 );
                                });
                            });
                        </script>";
            //IE Checks
            global $is_IE;
            if ($is_IE){
                $content .= "<style>
                                .pg-quick-sale .women span{
                                    text-orientation: mixed;
                                }
                             </style>";
            }
            return $content;
        }
        //Quote / Short Code
        add_shortcode('pg_quote', 'phoenix_gear_quote_SC');
        function phoenix_gear_quote_SC($atts, $cont = null){
            $a = shortcode_atts(array(
                'author' => '-Use author Attribute to change'
            ), $atts);
            $content = '<div class="pg-quote">
                            <div>
                                <h2>'.$cont.'</h2>
                                <span>'.$a['author'].'</span>
                            </div>
                        </div>'; 
            $content .="<style>
                            .pg-quote>div{
                                display: flex;
                                flex-flow: column nowrap;
                                justify-content: flex-end;
                                height: auto; 
                                width: 100%;
                                max-width:80em;
                                height: auto;
                                margin: auto;
                            }
                            .pg-quote h2{
                                font-family: montserrat, sans-serif;
                                font-weight: 400;
                                font-style: normal;
                                text-align: center;
                                font-size: 2em;
                                color: #FFF;
                                padding-left: 1em;
                                padding-right: 1em;
                                margin-top: 2em;
                                margin-bottom: 0em;
                            }
                            .pg-quote span{
                                float: right;
                                margin: 1em;
                                margin-right: 2em;
                                font-family: proxima-nova, sans-serif;
                                font-weight: 700;
                                font-style: normal;
                                font-size: 1.5em;
                                text-align: right;
                                color: #FFF;
                            }
                        </style>";
            $content .="<script>
                            jQuery(function($){
                            });
                        </script>";
            //IE Checks
            global $is_IE;
            if ($is_IE){
                $content .= "<style>
                                
                             </style>";
            }
            return $content;
        }
        //Featured Products / Short Code
        add_shortcode('pg_feat_prod', 'phoenix_gear_feat_prod_SC');
        function phoenix_gear_feat_prod_SC($atts, $cont = null){
            $args = array(
                'post_type' => 'product',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'Featured'
                    )
                ),
                'orderby' => 'publish_date'
            );
            $featuredProd = new WP_Query($args);//Add Featured Products Loop
            $content = '<div class="pg-feat-prod">

                            <h2>'.$cont.'</h2>
                        </div>'; 
            $content .="<style>
                        </style>";
            $content .="<script>
                            jQuery(function($){
                            });
                        </script>";
            //IE Checks
            global $is_IE;
            if ($is_IE){
                $content .= "<style>
                                
                             </style>";
            }
            return $content;
        }
        //Featured Blog Posts / Short Code
        add_shortcode('pg_feat_blog_post', 'phoenix_gear_feat_blog_post_SC');
        function phoenix_gear_feat_blog_post_SC($atts, $cont = null){
            $a = shortcode_atts(array(
                'char' => 140
            ), $atts);
            $args = array(
                'post_type' => 'post',
                'category_name' => 'Featured',
                'orderby' => 'publish_date'
            );
            $featuredProd = new WP_Query($args);//Add Featured Products Loop
            $content = '<div class="pg-feat-blog-post">
                            <div>';
            if($featuredProd->have_posts()):
                for($i = 0; $i < 1; $i++){
                    $featuredProd->the_post();
                    $content .= '<h1>'.get_the_title().'</h1>';
                    $content .= "<p>".get_the_excerpt_max_charlength($a['char'])."</p>";
                    $content .= "<a href='".get_the_permalink()."'><button>Read More</button></a>";
                }
            endif;
            $content .= '   </div>
                        </div>'; 
            $content .="<style>
                            .pg-feat-blog-post>div{
                                max-width:80em;
                                margin: auto;
                            }
                            .pg-feat-blog-post h1{
                                padding-left: 1em;
                                font-family: montserrat, sans-serif;
                                font-weight: 600;
                                font-style: normal;
                                color: #FFF;
                            }
                            .pg-feat-blog-post p{
                                font-family: montserrat, sans-serif;
                                font-weight: 400;
                                font-style: normal;
                                font-size: 1.5em;
                                color: #FFF;
                                padding-left: 1.3em;
                                padding-right: 1.3em;
                            }
                            .pg-feat-blog-post button{
                                background: #000;
                                font-family: proxima-nova, sans-serif;
                                font-weight: 700;
                                font-style: normal;
                                font-size: 1.5em;
                                line-height: .75em;
                                color: #FFF;
                                float: right;
                                padding: .35em;
                                padding-left: 1.5em;
                                padding-right: 1.5em;
                                margin-right: 2em;
                                margin-bottom: 1.5em;
                                transition: color 1s ease-in-out;
                                /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#45484d+0,000000+100;Black+3D+%231 */
                                background: #45484d; /* Old browsers */
                                background: -moz-linear-gradient(-45deg,  #45484d 0%, #000000 100%); /* FF3.6-15 */
                                background: -webkit-linear-gradient(-45deg,  #45484d 0%,#000000 100%); /* Chrome10-25,Safari5.1-6 */
                                background: linear-gradient(135deg,  #45484d 0%,#000000 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */                                
                            }
                            .pg-feat-blog-post button:hover{
                                color: rgba(255, 255, 255, .45);
                                cursor: pointer;
                            }
                        </style>";//Add More Styles Here
            $content .="<script>
                            jQuery(function($){
                            });
                        </script>";
            //IE Checks
            global $is_IE;
            if ($is_IE){
                $content .= "<style>
                                
                             </style>";
            }
            return $content;
        }
        //Links Section / Short Code
        add_shortcode('pg_links_sec', 'phoenix_gear_links_sec_SC');
        function phoenix_gear_links_sec_SC($atts, $cont = null){
            $content = '<div class="pg-first-link-img">
                            <div class="two-left">
                                <div class="first">
                                    <a href="'.get_theme_mod('pg_link_section_first_link').'">
                                        <div>
                                            <h5>'.get_theme_mod('pg_first_link_txt_area').'</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="second">
                                    <a href="'.get_theme_mod('pg_link_section_second_link').'">
                                        <div>
                                            <h5>'.get_theme_mod('pg_second_link_txt_area').'</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="one-right">
                                <a href="'.get_theme_mod('pg_link_section_third_link').'">
                                    <div class="third">
                                        <h5>'.get_theme_mod('pg_third_link_txt_area').'</h5>
                                    </div>
                                </a>
                            </div>
                        </div>';
            $content .="<style>
                            .pg-first-link-img{
                                display: flex;
                                width: 100%;
                                height: 35vw;
                                flex-flow: row nowrap;
                            }
                            .pg-first-link-img .two-left {
                                width: 55%;
                                height: 100%;
                            }
                            .pg-first-link-img .two-left>div>a>div{
                                width: 100%;
                                height: 100%;
                                position: relative;
                                background: rgba(0,0,0, .55);
                                color: rgba(255, 255, 255, .45);
                            }
                            .pg-first-link-img .two-left>div>a>div h5{
                                position: absolute;
                                font-family: proxima-nova, sans-serif;
                                font-weight: 700;
                                font-style: normal;
                                font-size: 2em;
                                margin: unset;
                                margin-left: 1em;
                                transition: color .5s ease-in-out;
                            }
                            .pg-first-link-img .two-left .first{
                                background: url(".wp_get_attachment_image_url(get_theme_mod('pg_first_link_img'),'large').");
                                background-repeat: no-repeat;
                                background-size: cover;
                                width: 100%;
                                height: 50%;
                            }
                            .pg-first-link-img .two-left .first h5{
                                bottom: 0;
                            }
                            .pg-first-link-img .two-left .second{
                                background: url(".wp_get_attachment_image_url(get_theme_mod('pg_second_link_img'),'large').");
                                background-repeat: no-repeat;
                                background-size: cover;
                                width: 100%;
                                height: 50%;
                            }
                            .pg-first-link-img .two-left .second h5{
                                margin-top: .15em;
                            }
                            .pg-first-link-img .one-right{
                                background: url(".wp_get_attachment_image_url(get_theme_mod('pg_third_link_img'),'large').");
                                background-repeat: no-repeat;
                                background-size: cover;
                                width: 45%;
                                height: 100%;
                            }
                            .pg-first-link-img .one-right a{
                                text-decoration: none;
                            }
                            .pg-first-link-img .one-right .third{
                                background: rgba(0, 0, 0, .55);
                                height: 100%;
                                display: flex;
                                flex-flow: column nowrap;
                                justify-content: center;
                            }
                            .pg-first-link-img .one-right .third h5{
                                font-family: proxima-nova, sans-serif;
                                font-weight: 700;
                                font-style: normal;
                                font-size: 2.5em;
                                text-align: left;
                                color: rgba(255,255,255, .45);
                                transition: color .5s ease-in-out;
                                margin: unset;
                                margin-left: 1.5em;
                                margin-right: 1.5em;
                            }
                        </style>";//Add More Styles Here
            $content .="<script>
                            jQuery(function($){
                                //Mouse Enter
                                $('.pg-first-link-img .two-left>div>a>div').mouseover(function(e){
                                    $(this).css('color', 'rgba(255, 255, 255, 1)');
                                });
                                $('.pg-first-link-img .one-right .third').mouseover(function(e){
                                    $(this).find('h5').css('color', 'rgba(255, 255, 255, 1)');
                                });
                                //Mouse Leave
                                $('.pg-first-link-img .two-left>div>a>div').mouseleave(function(e){
                                    $(this).css('color', 'rgba(255, 255, 255, .45)');
                                });
                                $('.pg-first-link-img .one-right .third').mouseleave(function(e){
                                    $(this).find('h5').css('color', 'rgba(255, 255, 255, .45)');
                                });
                            });
                        </script>";
            //IE Checks
            global $is_IE;
            if ($is_IE){
                $content .= "<style>
                                
                             </style>";
            }
            return $content;
        }
        // Writting Section / Short Code
        add_shortcode('pg_writting_sec', 'phoenix_gear_writting_sec_SC');
        function phoenix_gear_writting_sec_SC($atts, $cont = null){
            $content = '<div class="pg-writting-section">
                            <div>
                                <div class="top">
                                    '.wp_get_attachment_image(get_theme_mod('pg_writting_sec_img'), 'medium').'
                                    <a href="'.get_theme_mod('pg_writting_sec_btn_link_first').'"><button>Read More</button></a>
                                    <p>'.get_theme_mod('pg_writting_sec_txt_area_first').'</p>
                                </div>
                                <div class="bottom">
                                    <p>'.get_theme_mod('pg_writting_sec_txt_area_second').'</p>
                                    <a href="'.get_theme_mod('pg_writting_sec_btn_link_second').'"><button>See Our Blog</button></a>
                                </div>
                            </div>
                        </div>';
            $content .="<style>
                            .pg-writting-section>div{
                                display:flex;
                                flex-flow: column;
                                width: 100%;
                                max-width: 80em;
                                margin: auto;
                            }
                            .pg-writting-section .top, .pg-writting-section .bottom{
                                display: flex;
                                flex-flow: row nowrap;
                                justify-content: space-around;
                                align-items: center;
                                align-content: center;
                                margin-top: 1em;
                            }
                            .pg-writting-section .top img{
                                width: 15%;
                            }
                            .pg-writting-section .top p{
                                width: 45%;
                                display: block;
                                font-family: montserrat, sans-serif;
                                font-weight: 400;
                                font-style: normal;
                                font-size: 1.15em;
                                color: #FFF;
                            }
                            .pg-writting-section .bottom p{
                                width: 75%;
                                display: block;
                                font-family: montserrat, sans-serif;
                                font-weight: 400;
                                font-style: normal;
                                font-size: 1.15em;
                                color: #FFF;
                            }
                            .pg-writting-section button{
                                background: #000;
                                font-family: proxima-nova, sans-serif;
                                font-weight: 700;
                                font-style: normal;
                                font-size: 1.45em;
                                line-height: 1em;
                                color: #FFF;
                                transition: color 1s ease-in-out;
                                background: #45484d;
                                background: -moz-linear-gradient(-45deg, #45484d 0%, #000000 100%);
                                background: -webkit-linear-gradient(-45deg, #45484d 0%,#000000 100%);
                                background: linear-gradient(135deg, #45484d 0%,#000000 100%);
                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=1 );
                                padding: .35em;
                                padding-left: 1.5em;
                                padding-right: 1.5em;
                            }
                            .pg-writting-section button:hover{
                                color: rgba(255, 255, 255, .45);
                                cursor: pointer;
                            }
                        </style>";//Add More Styles Here
            $content .="<script>
                            jQuery(function($){
                            });
                        </script>";
            //IE Checks
            global $is_IE;
            if ($is_IE){
                $content .= "<style>
                                
                             </style>";
            }
            return $content;
        }
    }
//Activations
//Application / Custom Post Type Activation
    function phoenix_gear_plugin_application_activation(){
        flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'phoenix_gear_plugin_application_activation' );
//Deactivations
    ///Application / Custom Post Type Deactivation
    function phoenix_gear_plugin_application_de_activation() {
        //unregister_post_type( 'applications' );
        flush_rewrite_rules();
    }
    register_deactivation_hook( __FILE__, 'phoenix_gear_plugin_application_de_activation' );
//Unsinstallation
    //register_uninstall_hook(__FILE__, 'phoenix_gear_plugin_uninstall');
?>
