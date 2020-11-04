<?php
/**
 * Counter widget class
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

class Counter extends Widget_Base {
	
    /**
     * Get widget title.
     
     */
    public function get_title() {
        return __( 'DA: Counter', 'definitive-addons-for-elementor' );
    }

    /**
     
     * @return string Widget icon.
     */
	 public function get_name() {
		return 'dafe_counter';
	}


    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_keywords() {
        return [ 'counter', 'facts', 'skill' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	


    
	protected function _register_controls(){
		
        $this->start_controls_section(
            'dafe_section_counter',
            [
                'label' => __( 'Counter', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
                'counter_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ]
                ]
            );

        $this->add_control(
       'counter_text',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Counter text', 'definitive-addons-for-elementor' ),
                'default' => __( 'Projects', 'definitive-addons-for-elementor' )
            ]
        );

        $this->add_control(
           'counter_start_val',
            [
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
               'label' => __( 'Start Value', 'definitive-addons-for-elementor' ),
                'default' => __( 1, 'definitive-addons-for-elementor' ),
            ]
        );
		
		$this->add_control(
           'counter_end_val',
            [
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'label' => __( 'Ending Value', 'definitive-addons-for-elementor' ),
                'default' => __( 350, 'definitive-addons-for-elementor' ),
			]
        );
		
		$this->add_control(
			'counter_alignment',
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
	
		//
		
		$this->start_controls_section(
            'counter_section_style_entry',
            [
                'label' => __( 'Counter Item Style', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
	$this->add_control(
			'counter_bg_shadow_style',
			[
				'label' =>__( 'Background Shadow Style', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array(
					'none'  =>__( 'None', 'definitive-addons-for-elementor' ),
					'style1' =>__( 'Style1', 'definitive-addons-for-elementor' ),
					'style2'  =>__( 'Style2', 'definitive-addons-for-elementor' ),
					'style3'  =>__( 'Style3', 'definitive-addons-for-elementor' )),
					'default' =>'style3',
				
			]
		);
		 $this->end_controls_section();
		
		 $this->start_controls_section(
            'counter_section_style_icon',
            [
                'label' => __( 'Counter Icon', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_responsive_control(
            'icon_size',
            [
                'label' => __( 'Size', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
				'default' => [
					'size' => 30
				],
                'selectors' => [
                    '{{WRAPPER}} .icon-container .icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'size' => 70
				],
                'selectors' => [
                    '{{WRAPPER}} .icon-container' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon-container .icon' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'size' => 70
				],
                'selectors' => [
                    '{{WRAPPER}} .icon-container' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .icon-container .icon' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_background',
				
				'label' => __( 'Icon Background Color', 'definitive-addons-for-elementor' ),
                'selector' => '{{WRAPPER}} .icon-container',
                'exclude' => [
                    'image'
                ]
            ]
        );

		
		
		$this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Icon Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-container:hover .icon' => 'color: {{VALUE}};',
                ],
            ]
        );
		
		$this->add_control(
            'icon_hover_bg_color',
            [
                'label' => __( 'Icon Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-container:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .icon-container',
            ]
        );

        $this->add_responsive_control(
          'icon_border_radius',
            [
                'label' => __( 'Icon Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
				
                'selectors' => [
                    '{{WRAPPER}} .icon-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		
		$this->add_responsive_control(
            'icon_spacing',
            [
                'label' => __( 'Icon Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				'default' => [
					'size' => 15
				],
                'selectors' => [
                    '{{WRAPPER}} .icon-container' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		$this->end_controls_section();
		
		//

        
		
		
		$this->start_controls_section(
           '_section_style_value',
            [
                'label' => __( 'Counter Value', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		

        $this->add_control(
            'counter_val_color',
            [
                'label' => __( 'Value Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-val' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'counter_val_font',
                'selector' => '{{WRAPPER}} .counter-val',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
		
		$this->add_responsive_control(
            'counter_val_spacing',
            [
                'label' => __( 'Counter Value & Text Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .counter-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
	
        $this->end_controls_section();
		
		
       
	     $this->start_controls_section(
           '_section_style_title',
            [
                'label' => __( 'Counter Text', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_control(
           'text_color',
            [
                'label' => __( 'Counter Text Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_spacing',
            [
                'label' => __( 'Text Left Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .counter-text' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		 $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_font',
                'selector' => '{{WRAPPER}} .counter-text',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		$this->end_controls_section();
		
		$this->start_controls_section(
           '_section_style_content',
            [
                'label' => __( 'Counter Content', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .counter-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .counter-container',
                'exclude' => [
                    'image'
                ]
            ]
        );
		
				
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'selector' => '{{WRAPPER}} .counter-container',
            ]
        );

        $this->add_responsive_control(
          'counter_border_radius',
            [
                'label' =>__( 'Content Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		$this->end_controls_section();
		
		
    }
	
	

	protected function render() {
        $settings = $this->get_settings_for_display();
		
		$icon_styles ='';
		
		$counter_alignment = $this->get_settings_for_display( 'counter_alignment' );
		$shadow_style = $this->get_settings_for_display('counter_bg_shadow_style');
		$container_styles = 'text-align:'.$counter_alignment.';';
		$counter_icon = $settings['counter_icon']['value'];
		
		$icon_styles .="text-align:center;display:inline-block;";
		$id = uniqid();
        ?>

        <div class="counter-container <?php echo esc_attr($shadow_style); ?>" style="<?php echo esc_attr($container_styles) ?>">
		<?php if ($counter_icon){ ?>
			<div class="icon-container" style="<?php echo esc_attr($icon_styles) ?>">
		
				<i class="<?php echo esc_attr($counter_icon); ?> icon"> </i>
					  
			</div>
		
		<?php } ?>
		<div class="counter-content">
			<span id="<?php echo esc_attr($id) ?>" class="counter-val" data-startval="<?php echo esc_attr($settings['counter_start_val']) ?>" data-endval="<?php echo esc_attr($settings['counter_end_val']) ?>"></span>
			<span class="counter-text">
     
			<?php echo esc_html($settings['counter_text']); ?>
  
			</span>
		</div>
	</div>


		
	

        <?php
    }
	
}
