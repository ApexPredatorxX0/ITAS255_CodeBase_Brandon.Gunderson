<?php
/**
 * Promo-box widget class
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

class Promo_Box extends Widget_Base {
	
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'DA: Promo Box', 'definitive-addons-for-elementor' );
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
		return 'dafe_promo_box';
	}


    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_keywords() {
        return [ 'promo', 'text', 'image' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	protected function _register_controls() {
	
        $this->start_controls_section(
            '_section_promo_box',
            [
                'label' => __( 'Promo Box', 'definitive-addons-for-elementor' ),
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
		
		 $this->add_control(
            'link', [
                'label' => __( 'Image Link', 'definitive-addons-for-elementor' ),
                'default' => __( 'https://themenextlevel.com/', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::TEXT,
                
            ]
        );
		
		 $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'thumbnail',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
       'promo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Promo Box Text', 'definitive-addons-for-elementor' ),
                'default' =>__( 'Promo Box Text', 'definitive-addons-for-elementor' )
            ]
        );
		
		$this->add_control(
            'show_hide_ovl',
            [
                'label' => __( 'Show/Hide Overlay Text', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
                'label_on' => __( 'Yes', 'definitive-addons-for-elementor' ),
                'label_off' => __( 'No', 'definitive-addons-for-elementor' ),
				'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();

       

    // style
        $this->start_controls_section(
            'overlay_section_border_style',
            [
                'label' => __( 'Overlay Border Style', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'overlay_border',
                'selector' => '{{WRAPPER}} .promo_box_border_style',
            ]
        );

        $this->add_responsive_control(
          'overlay_border_radius',
            [
                'label' => __( 'Overlay Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .promo_box_border_style' => 'border-radius: {{TOP}}{{UNIT}}{{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
		
		
	
        $this->end_controls_section();

        $this->start_controls_section(
           'overlay_section_text_style',
            [
                'label' => __( 'Overlay Text & Background', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .promo_box_border_style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .promo_box_border_style',
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
                'selectors' => [
                    '{{WRAPPER}} .promo-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'selector' => '{{WRAPPER}} .promo-box-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->end_controls_section();
    }

	protected function render( ) {
		
        $settings = $this->get_settings_for_display();
		
        $link = $this->get_settings_for_display('link');
		$show_hide_ovl = $this->get_settings_for_display( 'show_hide_ovl' );
		
		
		$promo_overlay_styles = '';
		$promo_overlay_styles = 'top: 50%;left: 50%;transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);text-align: center;position:absolute;';
		
		if ($show_hide_ovl != 'yes'){
			$promo_overlay_styles .= 'display:none;';
			$corner_styles = 'display:none;';
			$show_hide_ovl = 'no';
		}
		
		$image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $settings['image']['url'];
                }


		if ($image){
			?>
			<div class="promo-box" style="position:relative;">
			
				<div class="promo_box_border_style" style="<?php echo esc_attr($promo_overlay_styles); ?>">
			
	
						<a href="<?php echo esc_url( $link ); ?>" target="_self" >		 
						<h6 class="promo-box-title"><?php echo esc_html($settings['promo_title']); ?></h6>
						</a>
				</div> 
				
				<div class="feature-media <?php echo esc_attr($show_hide_ovl); ?>">
				
					<a href="<?php echo esc_url( $link ); ?>" target="_self" >
						<img alt="feature image" src="<?php echo esc_url( $image ); ?>" />
					</a>
					<span class="feature-corner-end" style="<?php echo esc_attr($corner_styles); ?>"></span>
				</div>
			
			</div> 
			<?php } 
    }
}
