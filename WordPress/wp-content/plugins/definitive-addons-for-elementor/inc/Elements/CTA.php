<?php
/**
 * Call to Action widget class
 *
*/

namespace Definitive_Addons_Elementor\Elements;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use \Elementor\Widget_Base;

defined( 'ABSPATH' ) || die();

class CTA extends Widget_Base {
	
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'DA: Call to Action', 'definitive-addons-for-elementor' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
	 public function get_name() {
		return 'dafe_cta';
	}


    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_keywords() {
        return [ 'cta', 'icon', 'call', 'action' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	


   
	protected function _register_controls() {
		
        $this->start_controls_section(
            'dafe_section_cta',
            [
                'label' => __( 'Call to Action', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

       

       $this->add_control(
			'icon',
			[
				'label'   =>__( 'Icon', 'definitive-addons-for-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-cogs',
					'library' => 'fa-solid',
				]
				
			]
		);
		
		

       
		$this->add_control(
			'title',
			[
				'label' =>__( 'Call to Action Title', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' =>__( 'Definitive Addons for Elementor.', 'elementor-definitive-addons' ),
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
                'default' => 'h1',
                'toggle' => false,
            ]
        );


      
		$this->add_control(
			'subtitle',
			[
				'label' =>__( 'Call to Action Description', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' =>__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'elementor-definitive-addons' ),
			]
		);
		
		$this->add_control(
			'btn_txt',
			[
				'label' =>__( 'Button Text', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' =>__( 'Button Text', 'elementor-definitive-addons' ),
			]
		);
		$this->add_control(
            'link',
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
			'btn_icon',
			[
				'label'   =>__( 'Button Icon', 'definitive-addons-for-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-long-arrow-alt-right',
					'library' => 'fa-solid',
				]
				
			]
		);
		

        $this->end_controls_section();

       

    // style
	
	$this->start_controls_section(
            'cta_section_style_entry',
            [
                'label' => __( 'Call to Action Style', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_control(
			'cta_align',
			[
				'label' =>__( 'CTA Style', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					
					'left' => [
						'title' =>__( 'Button Left - Icon Right', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					
					'right' => [
						'title' =>__( 'Button Right - Icon Left', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'right',
				
			]
		);
	
		 $this->end_controls_section();
		 
        $this->start_controls_section(
            'cta_section_style_icon',
            [
                'label' => __( 'Icon Style', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_responsive_control(
            'icon_size',
            [
                'label' => __( 'Icon Size', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
				'default' => [
					'size' => 50
				],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		$this->add_responsive_control(
            'icon_height',
            [
                'label' => __( 'Icon Height', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
				'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
				'default' => [
					'size' => 80
				],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon span' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
			$this->add_responsive_control(
            'icon_width',
            [
                'label' => __( 'Icon Width', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
				'default' => [
					'size' => 80
				],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		

		$this->add_control(
           'icon_color',
            [
                'label' => __( 'Icon Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
           'icon_bg_color',
            [
                'label' => __( 'Icon Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Icon Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
		
		$this->add_control(
            'icon_hover_bg_color',
            [
                'label' => __( 'Icon Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .icon',
            ]
        );

        

        $this->add_responsive_control(
          'icon_border_radius',
            [
                'label' => __( 'Icon Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		
		$this->add_responsive_control(
            'icon_text_spacing',
            [
                'label' => __( 'Space between Icon & Text', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .call-to-action.right .icon-container' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .call-to-action.left .icon-container' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 50
				]
            ]
        );
		
		

        $this->end_controls_section();

        

        $this->start_controls_section(
           'cta_section_style_title',
            [
                'label' => __( 'CTA Title', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		
        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Title Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .cta-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .cta-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		$this->end_controls_section();

        $this->start_controls_section(
           'cta_section_style_subtitle',
            [
                'label' => __( 'CTA Description', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
       
       
		 $this->add_control(
           'subtitle_color',
            [
                'label' => __( 'Description Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' => '#54595F',
                'selectors' => [
                    '{{WRAPPER}} .cta-sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font',
                'selector' => '{{WRAPPER}} .cta-sub-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
	
        $this->end_controls_section();
		
		$this->start_controls_section(
            'button_style_start',
            [
                'label' => __( 'Button', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
            'button_text_spacing',
            [
                'label' => __( 'Space between Button & Text', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .call-to-action.right .cta-icon-button' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .call-to-action.left .cta-icon-button' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 50
				]
            ]
        );
		
		$this->add_responsive_control(
            'button_width',
            [
                'label' => __( 'Button Width', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
				'default' => [
					'size' => 150
				],
                'selectors' => [
                    '{{WRAPPER}} .dactabtn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Text Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#fff',
                'selectors' => [
                    '{{WRAPPER}} .dactabtn,{{WRAPPER}} .icon-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#000',
                'selectors' => [
                    '{{WRAPPER}} .dactabtn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'button_hvr_color',
            [
                'label' => __( 'Button Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#000',
                'selectors' => [
                    '{{WRAPPER}} .dactabtn:hover,{{WRAPPER}} .dactabtn:hover .icon-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'button_bg_hvr_color',
            [
                'label' => __( 'Button Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#000',
                'selectors' => [
                    '{{WRAPPER}} .dactabtn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_responsive_control(
            'btn_icon_size',
            [
                'label' => __( 'Button Icon Size', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
				'default' => [
					'size' => 14
				],
                'selectors' => [
                    '{{WRAPPER}} .icon-btn' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_font',
                'selector' => '{{WRAPPER}} .dactabtn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .dactabtn',
            ]
        );

        $this->add_responsive_control(
          'button_border_radius',
            [
                'label' =>__( 'Button Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .dactabtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		

        $this->end_controls_section();
		
		$this->start_controls_section(
           'cta_section_style_content',
            [
                'label' => __( 'CTA Content', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'CTA Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
		
                'selectors' => [
                    '{{WRAPPER}} .call-to-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_bg_color',
            [
                'label' => __( 'CTA Container Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#eee',
                'selectors' => [
                    '{{WRAPPER}} .call-to-action' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		$link = $this->get_settings_for_display( 'link' );
		$icon_height = $this->get_settings_for_display( 'icon_height' );
		$title_tag = $this->get_settings_for_display( 'title_tag' );
		
		$cta_align = $this->get_settings_for_display( 'cta_align' );
		
?>


	<div class="call-to-action <?php echo esc_attr($cta_align); ?>">
	
	
		<?php if ($settings['icon']['value']){ ?>
		<div class="icon-container">
		<div class="icon">
		
			<span class="<?php echo esc_attr($settings['icon']['value']); ?> main-icon"></span>

		</div>
		</div>
		
	<?php } ?>
	
		
		<div class="icon-wrap-cta">
			
		<div class="cta-txt">
		<?php if ($settings['title']){ ?>
			<<?php echo esc_attr($title_tag); ?> class="cta-title"><?php echo esc_html($settings['title']); ?></<?php echo esc_attr($title_tag); ?>>
		<?php } ?>	
		<?php if ($settings['subtitle']){ ?>
			<p class="cta-sub-title"><?php echo esc_html($settings['subtitle']); ?></p>
		<?php } ?>
		</div>
		</div>
		<?php if ($settings['btn_txt']){ ?>
		<div class="cta-icon-button">
			
			
					<a href="<?php echo esc_url($settings['link']['url']); ?>" class="btn-default dactabtn">
					<?php echo esc_html($settings['btn_txt']);  ?>
						<span class="<?php echo esc_attr($settings['btn_icon']['value']); ?> icon-btn"></span>
					</a>
			
			
		</div>
		<?php } ?>	
	
	</div>

        <?php
    }
}
