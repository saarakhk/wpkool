<?php
/**
 * Template part - Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Density
*/
    $density_image_section_hideshow = get_theme_mod("density_image_section_hideshow",'hide');
    $density_image_more = get_theme_mod("density_image_more",'');
    $density_image_contact = get_theme_mod("density_image_contact",''); 
    $density_b_image = get_theme_mod("density_b_image",''); 
    $density_image_heading = get_theme_mod("density_image_heading",'');
    $density_image_subheading = get_theme_mod("density_image_subheading",'');

    if ($density_image_section_hideshow =='show') { 
        ?>
        <!-- RIGHTPART -->
        <div class="main_rightpart">
            <div class="density_tm_hero_header_wrap">
                <div class="carousel_wrap">
                    <ul>
                        <li class="item">
                            <img src="<?php echo esc_url($density_b_image); ?>" class="img-responsive image">
                        </li>
                    </ul>
                </div>                    
                <div class="overlay_color overlay_color-two"></div>
                <div class="container hero">
                    <div class="hero_text_wrap">
                         <?php if ($density_image_heading !=""){ ?>
                        <div class="title">                               
                            <h3><?php echo esc_html($density_image_heading); ?></h3>                 
                        </div>
                        <?php } if ($density_image_subheading !=""){ ?>
                        <div class="text">
                            <p><?php echo esc_html($density_image_subheading); ?></p>
                        </div>
                    <?php } ?>
                        <div class="buttons_wrap">
                            <?php if($density_image_more!=''){ ?>
                            <a class="discover" href="<?php echo esc_url(get_theme_mod('density_image_more_url')); ?>"><?php echo esc_html($density_image_more); ?></a>
                        <?php } if($density_image_contact!=''){ ?>
                            <a class="discover btn-discover-two" href="<?php echo esc_url(get_theme_mod('density_image_contact_url')); ?>"><?php echo esc_html($density_image_contact); ?></a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php

     } ?>