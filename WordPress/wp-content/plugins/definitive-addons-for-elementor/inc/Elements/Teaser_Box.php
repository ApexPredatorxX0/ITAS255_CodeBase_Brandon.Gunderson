<?php
/*
* Teaser Box widget
*/


namespace Definitive_Addons_Elementor\Elements;
use Elementor\Group_Control_Background;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use \Elementor\Widget_Base;

defined( 'ABSPATH' ) || die();

class Teaser_Box extends Widget_Base {

	public function get_name() {
		return 'dafe_teaser_box';
	}

	public function get_title() {
		return esc_html__( 'DA: Teaser Box', 'elementor-definitive-addons' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

   public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'teaser_box_label',
  			[
  				'label' =>__( 'Teaser Box', 'elementor-definitive-addons' )
  			]
  		);
		

		$this->add_control(
			'box_image',
			[
				'label' => __( 'Upload Image', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );
		
		$this->add_control(
			'box_title',
			[
				'label' =>__( 'Teaser Box Title', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' =>__( 'John Doe', 'elementor-definitive-addons' ),
			]
		);
		$this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::CHOOSE,
               
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'definitive-addons-for-elementor' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'definitive-addons-for-elementor' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'definitive-addons-for-elementor' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'definitive-addons-for-elementor' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'definitive-addons-for-elementor' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'definitive-addons-for-elementor' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h4',
                'toggle' => false,
            ]
        );
	
		$this->add_control(
			'box_text',
			[
				'label' =>__( 'Teaser Text', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' =>__( 'Add Teaser text here or leave it blank.', 'elementor-definitive-addons' ),
			]
		);
		
		$this->add_control(
			'box_button',
			[
				'label' =>__( 'Button Text', 'elementor-definitive-addons' ),
				
				'type' => Controls_Manager::TEXT,
				'default' =>__( 'Read More', 'elementor-definitive-addons' ),
			]
		);
		
		$this->add_control(
            'btn_link',
            [
                'label' => __( 'Button Link', 'definitive-addons-for-elementor' ),
                'separator' => 'before',
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://softfirm.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
		
		
		$this->add_control(
			'image_box_alignment',
			[
				'label' =>__( 'Set Alignment', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					
					'left' => [
						'title' =>__( 'Left', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' =>__( 'Center', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' =>__( 'Right', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				
			]
		);

		$this->end_controls_section();

		 // style
        $this->start_controls_section(
            '_section_style_image',
            [
                'label' => __( 'Image', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .image-box-img',
            ]
        );

        $this->add_responsive_control(
          'item_border_radius',
            [
                'label' => __( 'Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .image-box-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		
		$this->add_responsive_control(
            'image_spacing',
            [
                'label' => __( 'Image Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				'default' => [
					'size' => 15
				],
                'selectors' => [
                    '{{WRAPPER}} .image-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		

        $this->end_controls_section();

       

        $this->start_controls_section(
           '_section_style_title',
            [
                'label' => __( 'Image Box Title', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				'default' => [
					'size' => 15
				],
                'selectors' => [
                    '{{WRAPPER}} .image-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_control(
           'title_hover_color',
            [
                'label' => __( 'Title Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-box-title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .image-box-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

       $this->end_controls_section();

        $this->start_controls_section(
           '_section_style_subtitle',
            [
                'label' => __( 'Image Box Description', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .image-box-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Description Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-box-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font',
                'selector' => '{{WRAPPER}} .image-box-subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
		
		

        $this->end_controls_section();
		
		 $this->start_controls_section(
           '_section_style_content',
            [
                'label' => __( 'Image Box Content', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .image-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .image-box-content',
                'exclude' => [
                    'image'
                ]
            ]
        );
		
		$this->end_controls_section();
		
			 $this->start_controls_section(
           'imagebox_section_style_content',
            [
                'label' => __( 'Image Box Container', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label' => __( 'Container Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .image-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'container_background',
                'selector' => '{{WRAPPER}} .image-box',
                'exclude' => [
                    'image'
                ]
            ]
        );
		
		$this->end_controls_section();
		
		$this->start_controls_section(
           'imagebox_button_section',
            [
                'label' => __( 'Image Box Button', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'btn_bottom_spacing',
            [
                'label' => __( 'Button Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				'default' => [
					'size' => 15
				],
                'selectors' => [
                    '{{WRAPPER}} .image-box .box-button' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'btn_color',
            [
                'label' => __( 'Button Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default'  => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .image-box a.box-btn' => 'color: {{VALUE}}!important',
                ],
            ]
        );
		
		$this->add_control(
           'btn_bg_color',
            [
                'label' => __( 'Button Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default'  => '#000',
                'selectors' => [
                    '{{WRAPPER}} .image-box a.box-btn' => 'background-color: {{VALUE}}!important',
                ],
            ]
        );
		$this->add_control(
           'btn_hover_color',
            [
                'label' => __( 'Button Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default'  => '#000',
                'selectors' => [
                    '{{WRAPPER}} .image-box a.box-btn:hover' => 'color: {{VALUE}}!important',
                ],
            ]
        );
		$this->add_control(
           'btn_hover_bg_color',
            [
                'label' => __( 'Button Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default'  => '#F21F06',
                'selectors' => [
                    '{{WRAPPER}} .image-box a.box-btn:hover' => 'background-color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_font',
                'selector' => '{{WRAPPER}} .image-box a.box-btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		$this->add_responsive_control(
            'btn_padding',
            [
                'label' => __( 'Button Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .image-box a.box-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'selector' => '{{WRAPPER}} .image-box a.box-btn',
            ]
        );

        $this->add_responsive_control(
          'btn_border_radius',
            [
                'label' => __( 'Button Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .image-box .box-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );


		$this->end_controls_section();
		

	}


	protected function render( ) {
		
      $settings = $this->get_settings_for_display();
	  $link = $this->get_settings_for_display( 'btn_link' );
	  $image_box_alignment = $this->get_settings_for_display('image_box_alignment');
	  $container_styles = 'text-align:'.$image_box_alignment.';';
	  $title_tag = $this->get_settings_for_display( 'title_tag' );

	
                $image = wp_get_attachment_image_url( $settings['box_image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $settings['box_image']['url'];
                }
			
			
                ?>

                 <div class="image-box style3" style="<?php echo esc_attr($container_styles) ?>">
                    <div class="image-box-entry">
                        <?php if ( $image ) : ?>
                            <img class="image-box-img" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['box_title'] ); ?>">
                        <?php endif; ?>

                        
                            <div class="image-box-content">
                                <?php if ( $settings['box_title'] ) : ?>
                                    <<?php echo esc_attr($title_tag); ?> class="image-box-title"><?php echo esc_html( $settings['box_title'] ); ?></<?php echo esc_attr($title_tag); ?>>
                                <?php endif; ?>
                                <?php if ( $settings['box_text'] ) : ?>
                                    <p class="image-box-subtitle" style="<?php echo esc_attr($container_styles) ?>"><?php echo esc_html( $settings['box_text'] ); ?></p>
                                <?php endif; ?>
								<?php if ( $settings['box_button'] ) : ?>
								<div class="box-button">
								<a href="<?php echo esc_url($link['url']); ?>" class="box-btn link"
									target="_self">
										<?php echo esc_html($settings['box_button']); ?>
										
								</a>
								</div>
								<?php endif; ?>
                            
							</div>
                      
                    </div>
                </div>

	<?php
	}
}