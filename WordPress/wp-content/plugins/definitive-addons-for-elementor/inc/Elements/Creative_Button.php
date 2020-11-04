<?php
/**
 * Creative Button widget class
 *
 * @package definitive-addons-for-elementor
 */

namespace Definitive_Addons_Elementor\Elements;
use Elementor\Group_Control_Background;
use Elementor\Base_Data_Control;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use \Elementor\Widget_Base;

defined( 'ABSPATH' ) || die();

class Creative_Button extends Widget_Base {
	
    /**
     * Get widget title.
     
     */
    public function get_title() {
        return __( 'DA: Creative Button', 'definitive-addons-for-elementor' );
    }

    /**
     
     * @return string Widget icon.
     */
	public function get_name() {
		return 'dafe_creative_button';
	}


    public function get_icon() {
        return 'eicon-button';
    }

    public function get_keywords() {
        return [ 'button', 'button-text','creative'];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
  
	protected function _register_controls() {
		
        $this->start_controls_section(
            'section_creative_button',
            [
                'label' => __( 'Creative Button', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		

		
		$this->add_control(
			'icon',
			[
				'label'   =>__( 'Icon', 'definitive-addons-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				
				
				
			]
		);

        $this->add_control(
       'btn_txt',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' =>__( 'Button Text', 'definitive-addons-for-elementor' ),
                'default' =>__( 'Button Text', 'definitive-addons-for-elementor' )
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
			'button_align',
			[
				'label' =>__( 'Button Align', 'definitive-addons-for-elementor' ),
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
				'default' => 'left',
				
			]
		);
		
		
		$this->add_control(
			'icon_position',
			[
				'label' =>__( 'Icon Position', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					
					'left' => [
						'title' =>__( 'Left', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					
					'right' => [
						'title' =>__( 'Right', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'right',
				
			]
		);
		
		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Button Hover Animation', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'prefix_class' => 'elementor-animation-',
				
			]
		);

		
		
        $this->end_controls_section();

       

    // style
	
	$this->start_controls_section(
           'section_style_button',
            [
                'label' => __( 'Button & Text', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
      
		$this->add_responsive_control(
				'da_button_width',
				[
					'label'      =>__( 'Button Width', 'definitive-addons-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 500,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .dabtn' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
        $this->add_control(
           'btn_bg_color',
            [
                'label' => __( 'Button Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' => '#192668',
                'selectors' => [
                    '{{WRAPPER}} .dabtn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_control(
           'btn_hvr_bg_color',
            [
                'label' => __( 'Button Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dabtn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		
		 $this->add_control(
           'btn_txt_color',
            [
                'label' => __( 'Text Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .dabtn' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
           'btn_txt_hvr_color',
            [
                'label' => __( 'Text Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dabtn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_txt_font',
                'selector' => '{{WRAPPER}} .dabtn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		$this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Button Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .dabtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .dabtn',
            ]
        );

        $this->add_responsive_control(
          'button_border_radius',
            [
                'label' => __( 'Button Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .dabtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		
		$this->add_control(
           'btn_border_hvr_color',
            [
                'label' =>__( 'Border Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dabtn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
     
		$this->end_controls_section();
		
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => __( 'Button Icon', 'definitive-addons-for-elementor' ),
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
					'size' => 14
				],
                'selectors' => [
                    '{{WRAPPER}} .icon-left,{{WRAPPER}} .icon-right' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		
		$this->add_control(
           'icon_color',
            [
                'label' => __( 'Icon Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' => '#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} .icon-left,{{WRAPPER}} .icon-right' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_control(
           'icon_hover_color',
            [
                'label' => __( 'Icon Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dabtn:hover .icon-left,{{WRAPPER}} .dabtn:hover .icon-right' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		
        $this->end_controls_section();
		
		$this->start_controls_section(
           'section_style_spacing',
            [
                'label' => __( 'Button/Icon Spacing', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
	
		$this->add_responsive_control(
            'icon_btn_spacing_left',
            [
                'label' => __( 'Space between Icon & Text', 'definitive-addons-for-elementor' ),
				'description' => __( 'You may need to chane button width', 'definitive-addons-for-elementor' ),
               
			   'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
                        'icon_position' => 'left',
                ],
				
            ]
        );
		$this->add_responsive_control(
            'icon_btn_spacing_right',
            [
                'label' =>__( 'Space between Icon & Text', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
                        'icon_position' => 'right',
                ],
				
            ]
        );
		$this->end_controls_section();
		
        
		
		$this->start_controls_section(
           'section_style_shadow_gradient',
            [
                'label' =>__( 'Button Shadow', 'definitive-addons-for-elementor' ),
                'tab'  => Controls_Manager::TAB_STYLE,
            ]
        );

        
			
        $this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .dabtn',
			]
		);
		
		
		$this->end_controls_section();

        
	}
	
	
	protected function render( ) {
        
		$settings = $this->get_settings_for_display();
		$btn_txt = $this->get_settings_for_display('btn_txt');
		$button_align = $this->get_settings_for_display('button_align');
		$icon_position = $this->get_settings_for_display('icon_position');

		$add_icon_left = '';
		$add_icon_right = '';

		if ($icon_position == 'left'){
			$add_icon_left = $settings['icon']['value'];
		}else {
			$add_icon_right = $settings['icon']['value'];
		} 

        ?>

		<div class="da_button_widget <?php echo esc_attr($button_align);  ?>">
						
				<a href="<?php echo esc_url($settings['link']['url']); ?>" class="btn-default dabtn <?php echo esc_attr($settings['hover_animation'] ); ?>"
										target="_self">
						<span class="<?php echo esc_attr($add_icon_left); ?> icon-left">
						</span>
						<?php echo esc_html($btn_txt);  ?>	
							<span class="<?php echo esc_attr($add_icon_right); ?> icon-right">
						</span>
		
				</a>
		</div>	
	

        <?php
		
	}
	
	
	protected function _content_template() {
		
	}
}
