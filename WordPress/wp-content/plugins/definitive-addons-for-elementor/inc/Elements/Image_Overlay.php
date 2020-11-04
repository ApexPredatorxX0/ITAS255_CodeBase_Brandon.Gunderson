<?php
/**
 * Image Overlay widget class
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

class Image_Overlay extends Widget_Base {
	
    /**
     * Get widget title.
     
     */
    public function get_title() {
        return __( 'DA: Image Overlay', 'definitive-addons-for-elementor' );
    }

    /**
    
     * @return string Widget icon.
     */
	 public function get_name() {
		return 'dafe_Image_Overlay';
	}


    public function get_icon() {
        return 'eicon-image';
    }

    public function get_keywords() {
        return [ 'overlay', 'text', 'image' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	protected function _register_controls() {
	
        $this->start_controls_section(
            'section_image_overlay',
            [
                'label' => __( 'Image Overlay', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
           'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'definitive-addons-for-elementor' ),
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

        $this->add_responsive_control(
       'overlay_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Overlay Title', 'definitive-addons-for-elementor' ),
                'default' =>__( 'I am Overlay Title', 'definitive-addons-for-elementor' )
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
                'default' => 'h2',
                'toggle' => false,
            ]
        );
		
		$this->add_control(
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
		
		$this->add_responsive_control(
       'overlay_subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Overlay Subtitle', 'definitive-addons-for-elementor' ),
                'default' =>__( 'I am Overlay Subtitle', 'definitive-addons-for-elementor' )
            ]
        );

        $this->end_controls_section();

       

    // style
        $this->start_controls_section(
            'overlay_section_style',
            [
                'label' => __( 'Image Overlay Style', 'definitive-addons-for-elementor' ),
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

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'overlay_border',
                'selector' => '{{WRAPPER}} .overlay_border_styles',
            ]
        );

        $this->add_responsive_control(
          'overlay_border_radius',
            [
                'label' => __( 'Overlay Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .overlay_border_styles' => 'border-radius: {{TOP}}{{UNIT}}{{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		
		
	
     
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .overlay_border_styles' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .overlay_border_styles',
                'exclude' => [
                    'image'
                ]
            ]
        );

       

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .overlay-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'selector' => '{{WRAPPER}} .overlay-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		$this->add_control(
           'subtitle_color',
            [
                'label' => __( 'Sub Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overlay-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_fonts',
                'selector' => '{{WRAPPER}} .overlay-subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->end_controls_section();
    }

	protected function render( ) {
		
        $settings = $this->get_settings_for_display();
		
        $link = $this->get_settings_for_display('link');
		$show_hide_ovl = $this->get_settings_for_display( 'show_hide_ovl' );
		$title_tag = $this->get_settings_for_display( 'title_tag' );
		$overlay_styles = '';
		
		if ($show_hide_ovl != 'yes'){
			$overlay_styles .= 'display:none;';
		}
		
		$overlay_styles .= 'top: 50%;left: 50%;transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);text-align: center;position:absolute;';
	
		$image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $settings['image']['url'];
                }


		if ($image){
			?>
			<div class="image-overlay" style="position:relative;">
			
				<div class="overlay_border_styles" style="<?php echo esc_attr($overlay_styles); ?>">
					<a href="<?php echo esc_url($settings['link']['url']); ?>" target="<?php echo esc_attr($settings['link']['is_external']); ?>">
				
						<<?php echo esc_attr($title_tag); ?> class="overlay-title"><?php echo esc_html($settings['overlay_title']); ?></<?php echo esc_attr($title_tag); ?>>
					</a>	
						
						<h6 class="overlay-subtitle"><?php echo esc_html($settings['overlay_subtitle']); ?></h6>
						
				</div> 
				
				<div class="overlay-media">
				
				
						<img alt="overlay image" src="<?php echo esc_url( $image ); ?>" />
				
					
				</div>
			
			</div> 
			<?php } 
    }
}
