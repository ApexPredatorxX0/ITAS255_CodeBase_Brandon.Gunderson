<?php
/**
 * Slider widget class
 *
 * @package definitive-addon-for-elementor
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

class Slider extends Widget_Base {
	
    /**
     
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'DA: Slider', 'definitive-addons-for-elementor' );
    }

    /**
     * Get widget icon.
     *
     
     */
	 public function get_name() {
		return 'dafe_slider';
	}


    public function get_icon() {
      return 'fa fa-ellipsis-h';
    }

    public function get_keywords() {
        return [ 'slider', 'image', 'gallery' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	

	protected function _register_controls() {
		
        $this->start_controls_section(
            'section_slick_slides',
            [
                'label' => __( 'Slides', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
           'slider_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'definitive-addons-for-elementor' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
		
		$repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'definitive-addons-for-elementor' ),
                'separator' => 'before',
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://softfirm.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
       'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'definitive-addons-for-elementor' ),
                'default' => __( 'I am Slide1 Title', 'definitive-addons-for-elementor' )
            ]
        );

        $repeater->add_control(
           'subtitle',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
               'label' => __( 'Sub Title', 'definitive-addons-for-elementor' ),
                'default' => __( 'I am Slide1 Sub Title', 'definitive-addons-for-elementor' ),
            ]
        );
		
		$repeater->add_control(
       'btn_txt',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' =>__( 'Button Text', 'definitive-addons-for-elementor' ),
                'default' =>__( 'Button Text', 'definitive-addons-for-elementor' )
            ]
        );
		$repeater->add_control(
			'icon',
			[
				'label'   =>__( 'Button Icon', 'definitive-addons-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				
				
				
			]
		);

        $this->add_control(
           'slick_slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print("Slide"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                  
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
           'section_slider_nav_settings',
            [
                'label' => __( 'Slider Navigation Settings', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __( 'Animation Speed', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 150,
                'max' => 12000,
				'step' => 10,
                'default' => 300,
                'description' => __( 'Value in milliseconds. Default:300', 'definitive-addons-for-elementor' ),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Slider Autoplay?', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
                'label_on' => __( 'Yes', 'definitive-addons-for-elementor' ),
                'label_off' => __( 'No', 'definitive-addons-for-elementor' ),
				'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::NUMBER,
				'default' => 3000,
                'min' => 200,
                'step' => 100,
                'max' => 12000,
			   'condition' => [
                    'autoplay' => 'yes'
                ],
				'description' => __( 'Value in milliseconds. Default:3000', 'definitive-addons-for-elementor' ),
               
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Infinite Loop?', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'definitive-addons-for-elementor' ),
                'label_off' => __( 'No', 'definitive-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();
		
		$this->start_controls_section(
           'slider_element_style',
            [
                'label' => __( 'Slide Element Style', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'nav_position',
			[
                'label' => esc_html__('Navigation Position', 'definitive-addons-for-elementor'),
                'type' => Controls_Manager::SELECT,
                
                'default' =>'top-right',
                'options' => [
					'top-right'=>__('Top Right Corner','definitive-addons-for-elementor'),
					'bottom-right'=>__('Bottom Right Corner','definitive-addons-for-elementor'),
					'left-right'=>__('Left Right Middle','definitive-addons-for-elementor')
				],
            ]
		);
		
		$this->end_controls_section();
		
        $this->start_controls_section(
           'content_section_style_start',
            [
                'label' => __( 'Slide Overlay', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		 $this->add_control(
            'show_hide_ovl',
            [
                'label' => __( 'Show/Hide Overlay', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
                'label_on' => __( 'Yes', 'definitive-addons-for-elementor' ),
                'label_off' => __( 'No', 'definitive-addons-for-elementor' ),
				'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_responsive_control(
            'cta_padding',
            [
                'label' => __( 'Overlay Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .definitive-slide-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		 $this->add_control(
           'ovl_background',
            [
                'label' => __( 'Overlay Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				
                'selectors' => [
                    '{{WRAPPER}} .definitive-slide-item' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		
		

       

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} .definitive-slide-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .definitive-slide-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		 $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Title Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				
                'selectors' => [
                    '{{WRAPPER}} .definitive-slide-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

       

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Description Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#eeeeee',
                'selectors' => [
                    '{{WRAPPER}} .definitive-slide-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font',
                'selector' => '{{WRAPPER}} .definitive-slide-subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
		
		 $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Description Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .definitive-slide-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'nav_section_style_start',
            [
                'label' => __( 'Navigation', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

       
        $this->add_control(
            'nav_color',
            [
                'label' => __( 'Arrow Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-prev:after, {{WRAPPER}} .slides-container .slick-next:after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_bg_color',
            [
                'label' => __( 'Arrow Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#6EC1E4',
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-prev, {{WRAPPER}} .slides-container .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		
		$this->add_control(
            'nav_hover_color',
            [
                'label' => __( 'Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-prev:hover:after, {{WRAPPER}} .slides-container .slick-next:hover:after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_hover_bg_color',
            [
                'label' => __( 'Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-prev:hover, {{WRAPPER}} .slides-container .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'selector' => '{{WRAPPER}} .slides-container .slick-prev,{{WRAPPER}} .slides-container .slick-next',
            ]
        );

        $this->add_responsive_control(
          'nav_border_radius',
            [
                'label' =>__( 'Navigation Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-prev,{{WRAPPER}} .slides-container .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
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
            'button_spacing',
            [
                'label' => __( 'Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .da_button_slider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .dabtnslide,{{WRAPPER}} .icon-right' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .dabtnslide' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .dabtnslide:hover,{{WRAPPER}} .dabtnslide:hover .icon-right' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .dabtnslide:hover' => 'background-color: {{VALUE}}',
                ],
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
                    '{{WRAPPER}} .icon-right' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_font',
                'selector' => '{{WRAPPER}} .dabtnslide',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .dabtnslide',
            ]
        );

        $this->add_responsive_control(
          'button_border_radius',
            [
                'label' => __( 'Button Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .dabtnslide' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		

        $this->end_controls_section();
		
		
		 $this->start_controls_section(
            'dots_section_style_start',
            [
                'label' => __( 'Dots', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

		 $this->add_control(
            'dots_bg_color',
            [
                'label' => __( 'Dots Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'transparent',
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-dots li button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dots_active_bg_color',
            [
                'label' =>__( 'Dots Active Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		
		$this->add_control(
            'dots_border_color',
            [
                'label' => __( 'Dots Border Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .slides-container .slick-dots li button' => 'border-color: {{VALUE}}!important;',
                ],
            ]
        );
		

        $this->end_controls_section();

        
    }

	protected function render( ) {
		$slick_slides = $this->get_settings_for_display('slick_slides');
		
        $settings = $this->get_settings_for_display();
		$autoplay_speed = $this->get_settings_for_display('autoplay_speed');
		$autoplay = $this->get_settings_for_display('autoplay');
		$loop = $this->get_settings_for_display('loop');
		$show_hide_ovl = $this->get_settings_for_display( 'show_hide_ovl');
		$nav_position = $this->get_settings_for_display('nav_position');
		
		$overlay_styles = '';
		if ($loop == 'yes' ){$loop = true;}
		if ($loop != 'yes' ){$loop = false;}
		if ($autoplay == 'yes' ){$autoplay = true;}
		if ($autoplay != 'yes' ){$autoplay = false;}
		
		if ($show_hide_ovl != 'yes'){
			$overlay_styles .= 'display:none;';
		}
		$add_icon_right = '';
		
	
        ?>
	<div class="slides-container <?php echo esc_attr($nav_position) ?>">
        <div id="definitive" class="definitive-slick" data-autospeed="<?php echo esc_attr($autoplay_speed) ?>" data-autoplay="<?php echo esc_attr($autoplay) ?>" data-loop="<?php echo esc_attr($loop) ?>">

            <?php foreach ( $settings['slick_slides'] as $slide ) {
				
                $slider_image = wp_get_attachment_image_url( $slide['slider_image']['id'], $settings['thumbnail_size'] );
                if ( empty( $slider_image) ) {
                    $slider_image = $slide['slider_image']['url'];
                }
                ?>

                <div class="definitive-slide">
                    <div class="definitive-slide-entry">
                        
						<?php if ( $slider_image ) { ?>
						<a href="<?php echo esc_url($slide['link']['url']); ?>" target="<?php echo esc_attr($slide['link']['is_external']); ?>">
				
                            <img class="definitive-slide-img" src="<?php echo esc_url( $slider_image ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>">
                       </a>
					   <?php } ?>

                        <div class="definitive-slide-item" style="<?php echo esc_attr($overlay_styles); ?>">
                            <div class="definitive-slide-cta">
                                <?php if ( $slide['title'] ) { ?>
								<a href="<?php echo esc_url($slide['link']['url']); ?>" target="<?php echo esc_attr($slide['link']['is_external']); ?>">
				
                                    <h2 class="definitive-slide-title"><?php echo esc_html( $slide['title'] ); ?></h2>
                                </a>
								<?php } ?>
                                <?php if ( $slide['subtitle'] ) { ?>
                                    <p class="definitive-slide-subtitle" style="text-align:center;"><?php echo esc_html( $slide['subtitle'] ); ?></p>
                                <?php } ?>
								
								<div class="da_button_slider">
						
								<a href="<?php echo esc_url($slide['link']['url']); ?>" class="btn-default dabtnslide <?php echo esc_attr($settings['hover_animation'] ); ?>"
										target="_self">
									
									<?php echo esc_html($slide['btn_txt']);  ?>	
									<span class="<?php echo esc_attr($slide['icon']['value']); ?> icon-right">
									</span>
		
								</a>
								</div>
                            </div>
								
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
		
		
	</div>
	

        <?php
    }
}
