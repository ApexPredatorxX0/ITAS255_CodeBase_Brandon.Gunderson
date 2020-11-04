<?php
/**
 * Icon Box widget class
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

class Icon_Box extends Widget_Base {
	
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'DA: Icon Box', 'definitive-addons-for-elementor' );
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
		return 'dafe_icon_box';
	}


    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_keywords() {
        return [ 'box', 'icon', 'feature' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	


   
	protected function _register_controls() {
		
        $this->start_controls_section(
            'dafe_section_icon_box',
            [
                'label' => __( 'Icon Box', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

       

       $this->add_control(
			'new_icon_id',
			[
				'label'   => esc_html__( 'Icon', 'definitive-addons-for-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-cogs',
					'library' => 'fa-solid',
				]
				
			]
		);
		
		$this->add_control(
            'link',
            [
                'label' => __( 'Icon Link', 'definitive-addons-for-elementor' ),
                'separator' => 'before',
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://softfirm.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

       
		$this->add_control(
			'title',
			[
				'label' =>__( 'Icon Box Title', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' =>__( 'I am Icon Title.', 'elementor-definitive-addons' ),
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
			'subtitle',
			[
				'label' =>__( 'Icon Box Text', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' =>__( 'Add Icon text here or leave it blank.', 'elementor-definitive-addons' ),
			]
		);
		
		
        

        $this->end_controls_section();

       

    // style
	
	$this->start_controls_section(
            'icon_box_section_style_entry',
            [
                'label' => __( 'Icon_Box Item Style', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_control(
			'icon_box_alignment',
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
	$this->add_control(
			'icon_box_bg_shadow_style',
			[
				'label' =>__( 'Background Shadow Style', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array(
					'none'  =>__( 'None', 'definitive-addons-for-elementor' ),
					'style1' =>__( 'Style1', 'definitive-addons-for-elementor' ),
					'style2'  =>__( 'Style2', 'definitive-addons-for-elementor' ),
					'style3'  =>__( 'Style3', 'definitive-addons-for-elementor' )),
				'default' => 'style3',
				
			]
		);
		 $this->end_controls_section();
		 
        $this->start_controls_section(
            'icon_box_section_style_icon',
            [
                'label' => __( 'Icon Style', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .icon-container' => 'font-size: {{SIZE}}{{UNIT}};',
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
		
		 $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_background',
                'selector' => '{{WRAPPER}} .icon-container',
                'exclude' => [
                    'image'
                ]
            ]
        );

		$this->add_control(
           'icon_color',
            [
                'label' => __( 'Icon Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				
                'selectors' => [
                    '{{WRAPPER}} .icon-container .icon' => 'color: {{VALUE}}',
                ],
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
                'selectors' => [
                    '{{WRAPPER}} .icon-container' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
				'default' => [
					'size' => 15
				]
            ]
        );
		
		

        $this->end_controls_section();

        

        $this->start_controls_section(
           '_section_style_title',
            [
                'label' => __( 'Icon Box Title', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .icon-box-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		$this->end_controls_section();

        $this->start_controls_section(
           '_section_style_subtitle',
            [
                'label' => __( 'Icon Box Description', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Description Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				'default' => [
					'size' => 15
				],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

       
		 $this->add_control(
           'subtitle_color',
            [
                'label' => __( 'Description Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' => '#54595F',
                'selectors' => [
                    '{{WRAPPER}} .icon-box-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font',
                'selector' => '{{WRAPPER}} .icon-box-desc',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
	
        $this->end_controls_section();
		$this->start_controls_section(
           '_section_style_content',
            [
                'label' => __( 'Icon Box Content', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
				'default'=>['top' =>'10','right' =>'10','bottom' =>'10','left' =>'10'],

                'selectors' => [
                    '{{WRAPPER}} .icon-box-entry' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .icon-box-entry',
                'exclude' => [
                    'image'
                ]
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'selector' => '{{WRAPPER}} .icon-box-entry',
            ]
        );

        $this->add_responsive_control(
          'iconbox_border_radius',
            [
                'label' =>__( 'Content Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-entry' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
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
		$shadow_style = $this->get_settings_for_display('icon_box_bg_shadow_style');
		
		$icon_box_alignment = $this->get_settings_for_display( 'icon_box_alignment' );
		$container_styles = 'text-align:'.$icon_box_alignment.';';
		$icon_container_styles = 'text-align:center;display:inline-block;';
		
        ?>
		
	<div class="icon-box-entry <?php echo esc_attr($shadow_style); ?>" style="<?php echo esc_attr($container_styles) ?>">
            <div class="icon-box-item">
			<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['is_external']); ?>">
				<div class="icon-container" style="<?php echo esc_attr($icon_container_styles); ?>" >
                       
					  <i class="<?php echo esc_attr($settings['new_icon_id']['value']); ?> icon"> </i>
					  
				</div>
			</a>

                            <div class="icon-box-content">
                                <?php if ( $settings['title'] ) : ?>
                                    <<?php echo esc_attr($title_tag); ?> class="icon-box-title"><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr($title_tag); ?>>
                                <?php endif; ?>
                                <?php if ( $settings['subtitle'] ) : ?>
                                    <p class="icon-box-desc" style="<?php echo esc_attr($container_styles) ?>"><?php echo esc_html( $settings['subtitle'] ); ?></p>
                                <?php endif; ?>
                            </div>
                       
            </div>
     </div>

        <?php
    }
}
