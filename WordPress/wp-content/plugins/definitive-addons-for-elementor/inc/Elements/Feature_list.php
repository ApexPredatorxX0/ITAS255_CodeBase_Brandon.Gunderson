<?php
/**
 * Feature list widget class
 *
 * @package definitive-addons-for-elementor
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

class Feature_list extends Widget_Base {
	
    /**
     * Get widget title.
     
     */
    public function get_title() {
        return __( 'DA: Feature List', 'definitive-addons-for-elementor' );
    }

    /**
     
     * @return string Widget icon.
     */
	 public function get_name() {
		return 'dafe_feature_list';
	}


    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_keywords() {
        return [ 'box', 'feature', 'list' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
  
	protected function _register_controls() {
		
        $this->start_controls_section(
            'section_feature_list',
            [
                'label' => __( 'Feature List', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
		
		$repeater->add_control(
			'new_icon_id',
			[
				'label'   => esc_html__( 'Icon', 'definitive-addons-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-cogs',
					'library' => 'fa-solid',
				]
				
				
			]
		);

        $repeater->add_control(
       'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'definitive-addons-for-elementor' ),
                'default' => __( 'I am feature title', 'definitive-addons-for-elementor' )
            ]
        );

        $repeater->add_control(
           'subtitle',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __( 'Feature Description', 'definitive-addons-for-elementor' ),
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'definitive-addons-for-elementor' ),
            
			]
        );

        $this->add_control(
			'feature_lists',
			[
				'label'       => esc_html__( 'Feature Item', 'definitive-addons-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'seperator'   => 'before',
				'default' => [
					
					[ 'title' => 'Feature List#1' ],
					
					[ 'title' => 'Feature List#2' ],
					
					[ 'title' => 'Feature List#3' ]
					
					
				],
				
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{title}}',
			
			]
		);
		
		$this->add_control(
			'feature_list_alignment',
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
				'default' => 'right',
				
			]
		);

        $this->end_controls_section();

       

    // style
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => __( 'Feature Icon', 'definitive-addons-for-elementor' ),
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
					'{{WRAPPER}} .icon-container' => 'line-height: {{SIZE}}{{UNIT}};',
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
		
		$this->add_control(
           'icon_hover_color',
            [
                'label' => __( 'Icon Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-container:hover .icon' => 'color: {{VALUE}}',
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
           'icon_hover_bg_color',
            [
                'label' => __( 'Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-container:hover' => 'background-color: {{VALUE}}',
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
				'condition' => [
                        'feature_list_alignment' => 'center',
                ],
				
            ]
        );
		
		

        $this->end_controls_section();

        $this->start_controls_section(
           '_section_style_content',
            [
                'label' => __( 'Feature List Content', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .feature-list-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .feature-list-content',
                'exclude' => [
                    'image'
                ]
            ]
        );
		
		$this->end_controls_section();

        $this->start_controls_section(
           '_section_style_title',
            [
                'label' => __( 'Feature List Title', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .feature-list-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-list-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .feature-list-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		$this->end_controls_section();

        $this->start_controls_section(
           '_section_style_subtitle',
            [
                'label' => __( 'Feature List Description', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Description Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .feature-list-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Description Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-list-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font',
                'selector' => '{{WRAPPER}} .feature-list-desc',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
		
		

        $this->end_controls_section();
    }

	
	
	protected function render( ) {
        
		$feature_lists = $this->get_settings_for_display('feature_lists');
		if ( empty( $feature_lists ) ) {
            return;
        }
		$settings = $this->get_settings_for_display();
		$feature_list_alignment = $this->get_settings_for_display('feature_list_alignment');
		$icon_height = $this->get_settings_for_display( 'icon_height' );
		
        
		
		$cta_styles = '';
		$icon_styles = '';
		$desc_styles = '';
		
		if($feature_list_alignment == "left"){
            $icon_styles .= 'float:left; ';
			$icon_styles .= 'margin-right:15px; ';
			$icon_styles .= 'position:relative; ';
			$cta_styles .= 'position:relative; ';
			$cta_styles .= 'text-align:left; ';
			$desc_styles .= 'text-align:left; ';
			
        }
        
		if($feature_list_alignment == "right"){
            $icon_styles .= 'float:right; ';
			$icon_styles .= 'margin-left:15px; ';
			$icon_styles .= 'position:relative; ';
			$cta_styles .= 'position:relative; ';
			$cta_styles .= 'text-align:right; ';
			$desc_styles .= 'text-align:right; ';
			
        }
		$cta_styles .= "overflow:hidden;";
		
		$icon_styles .= "text-align:center;display:inline-block;";
		
        ?>

        <div class="feature-list">
		<?php
		foreach ( $settings['feature_lists'] as $feature_list) : ?>
	
            <div class="feature-list-entry">
                    <div class="feature-list-item">
					<div class="icon-container" style="<?php echo esc_attr($icon_styles) ?>">
		
						<i class="<?php echo esc_attr($feature_list['new_icon_id']['value']); ?> icon"> </i>
					  
					</div>
                        
                            <div class="feature-list-content" style="<?php echo esc_attr($cta_styles) ?>">
                                <?php if ( $feature_list['title'] ) : ?>
                                    <h4 class="feature-list-title"><?php echo esc_html( $feature_list['title'] ); ?></h4>
                                <?php endif; ?>
                                <?php if ( $feature_list['subtitle'] ) : ?>
                                    <p class="feature-list-desc" style="<?php echo esc_attr($desc_styles) ?>"><?php echo esc_html( $feature_list['subtitle'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        
                    </div>
             </div>

           <?php endforeach; ?>

        </div>
		
	

        <?php
    }
	
	
	protected function _content_template() {
		
	}
}
