<?php

// change bg color
function momino_customize_register( $wp_customize ){
    $wp_customize->add_setting(
        'bg_color',
        array(
            'default'         =>  '#ffffff',
            'transport'       =>  'refresh',

        ) );

    $wp_customize->add_section(
        'momino_theme_bg_color',
        array(
            'title'           =>  __('MOMINO Background color', 'momino'),
            'priority'        =>  30
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'theme_colors',
        array(
            'label'           =>  __('Background Color', 'momino'),
            'description'     =>  __('Change background color', 'momino'),
            'section'         =>  'momino_theme_bg_color',
            'settings'        =>  'bg_color'
        )) );

}

// change img
function momino_img_customize_register( $wp_customize ){
    $wp_customize->add_setting('img-change-set');

    $wp_customize->add_section(
        'momino_header_img_change',
        array(
            'title'           =>  __('MOMINO Image Header', 'momino'),
            'priority'        =>  30
        ) );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'upload-img',
        array(
            'label'           =>  __('Header image', 'momino'),
            'description'     =>  __('Change header image', 'momino'),
            'section'         =>  'momino_header_img_change',
            'settings'        =>  'img-change-set'
        )) );

}



