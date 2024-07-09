<?php
class Ohio_Elementor_Service_Table_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_service_table';
    }

    public function get_title()
    {
        return __( 'Service Table', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-service-table';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'general_section',
            [
                'label' => __( 'Service Table', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'table_align',
            [
                'label' => __( 'Alignment', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'headline',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Table Border', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => 'px',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-table' => 'border: {{SIZE}}{{UNIT}} solid transparent;',
                    '{{WRAPPER}} .service-table:hover' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;'
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Table Corners', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-table' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'tilt_effect',
            [
                'label' => __( 'Tilt Effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
            ],
        );

        $this->add_control(
            'drop_shadow',
            [
                'label' => __( 'Drop Shadow', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $this->add_control(
            'drop_shadow_intensity',
            [
                'label' => __( 'Shadow Intensity', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    // 'size' => '10',
                ],
                'condition' => [
                    'drop_shadow' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-table.-with-shadow:hover' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_layout',
            [
                'label' => __( 'Variation', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_017.svg',
                    ],
                    'border' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_018.svg',
                    ],
                    'fill' => [
                        'title' => __( 'Contained', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_020.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => 'Icon',
                    'image' => 'Custom Image',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'icon_icon',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_border_width',
            [
                'label' => __( 'Icon Border', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => 'px',
                'condition' => [
                    'icon_layout' => [ 'border', 'fill' ],
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-group.-outlined' => 'border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-group.-contained' => 'border: {{SIZE}}{{UNIT}} solid;'
                ],
            ]
        );

        $this->add_control(
            'icon_corners',
            [
                'label' => __( 'Icon Corners', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'condition' => [
                    'icon_layout' => [ 'border', 'fill' ],
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'em',
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-group.-outlined' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-group.-contained' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Icon Size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-group .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-group svg' => 'height: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'features_section',
            [
                'label' => __( 'Features', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => __( 'Features list', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getFeaturesControls(),
                'default' => [],
                'title_field' => '{{list_title}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'typo_section',
            [
                'label' => __( 'Service Table', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'headline_color',
            [
                'label' => __( 'Title Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'headline_typography',
                'label' => __( 'Title Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .subtitle',
            ]
        );
        
        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table-details' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .service-table-details',
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Table Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'bg_hover_color',
            [
                'label' => __( 'Table Background Color (Hover)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Table Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table:hover' => 'border-color:{{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'styles_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'main_color',
            [
                'label' => __( 'Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-group' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Icon Background Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .-contained' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'icon_layout' => 'fill',
                ]
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => __( 'Icon Border Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-group.-outlined' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .icon-group.-contained' => 'border-color: {{VALUE}};'
                ],
                'condition' => [
                    'icon_layout' => [ 'border', 'fill' ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'features_styles_section',
            [
                'label' => __( 'Features', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'feature_color',
            [
                'label' => __( 'Features Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table-features .exist' => 'color: {{VALUE}}',
                ]
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_typography',
                'label' => __( 'Features Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .service-table-features .exist',
            ]
        );


        $this->add_control(
            'feature_dis_color',
            [
                'label' => __( 'Disabled Features Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table-features .missing' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_dis_typography',
                'label' => __( 'Disabled Features Typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .service-table-features .missing',
            ]
        );

        $this->add_control(
            'icons_color',
            [
                'label' => __( 'Features Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table-features .exist .icon' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'icons_dis_color',
            [
                'label' => __( 'Disabled Features Icon Color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-table-features .missing .icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['table_align'] ) {
            case 'left':
                $this->addWrapperClass( '-left' );
                break;
            case 'center':
                $this->addWrapperClass( '-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-right' );
                break;
        }

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        $settings['icon_classes'] = '';
        switch ( $settings['icon_layout'] ) {
            case 'border':
                $settings['icon_classes'] = '-outlined';
                break;
            case 'fill':
                $settings['icon_classes'] = '-contained';
                break;
        }

        if ( $settings['tilt_effect'] ) {
            $tilt_attrs = 'data-tilt=true data-tilt-perspective=6000';
        }

        include( plugin_dir_path( __FILE__ ) . 'service-table-view.php' );
    }

    protected function getFeaturesControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_type',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'without'  => __( 'Without icon', 'ohio-extra' ),
                    'enabled'  => __( '"Enabled" icon', 'ohio-extra' ),
                    'disabled' => __( '"Disabled" icon', 'ohio-extra' ),
                ],
                'default' => 'without',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_title', [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Feature', 'ohio-extra' ),
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Service_Table_Widget() );
