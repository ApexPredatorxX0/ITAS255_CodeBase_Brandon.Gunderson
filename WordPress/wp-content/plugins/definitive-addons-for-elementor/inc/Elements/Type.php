<?php
/**
 * Type widget class
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

class Type extends Widget_Base {
	
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'DA: Type Animation', 'definitive-addons-for-elementor' );
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
		return 'dafe_type';
	}


    public function get_icon() {
       return 'far fa-keyboard';
    }

    public function get_keywords() {
        return [ 'type', 'animation', 'text' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
    
	protected function _register_controls(){
		
        $this->start_controls_section(
            'dafe_section_heading',
            [
                'label' => __( 'Type Animation', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
		'sentence1',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Typing Text', 'definitive-addons-for-elementor' ),
                'default' => __( 'I am typing animation', 'definitive-addons-for-elementor' )
            ]
        );
		
		$this->add_control(
		'typeSpeed',
            [
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'label' => __( 'Typing Speed', 'definitive-addons-for-elementor' ),
                'default' =>'35'
            ]
        );
		
		
		
		$this->add_control(
			'heading_alignment',
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
				'default' => 'center'
				
			]
		);

        $this->end_controls_section();

		//

        $this->start_controls_section(
           '_section_style_title',
            [
                'label' => __( 'Typing Text', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
	
       

        $this->add_control(
           'type_txt_color',
            [
                'label' => __( 'Type Text Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .writing,{{WRAPPER}} .typed-cursor' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
           'type_txt_bg_color',
            [
                'label' => __( 'Type Text Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .writing,{{WRAPPER}} .typed-cursor' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'type_font',
                'selector' => '{{WRAPPER}} .writing,{{WRAPPER}} .typed-cursor',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );


        $this->add_control(
            'type_text_hover_color',
            [
                'label' => __( 'Type Text Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .writing:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		
		
		$this->end_controls_section();
		

        
    }
	
	

	protected function render() {
		
        $settings = $this->get_settings_for_display();
		$sentence1 = $this->get_settings_for_display('sentence1');
		$typespeed = $this->get_settings_for_display('typeSpeed');
		
		$text_alignment = $this->get_settings_for_display('heading_alignment');
		$styles = '';
	
		$id = uniqid();
		
        ?>

        <div id="<?php echo esc_attr($id); ?>" class="type-container <?php echo esc_attr($text_alignment); ?>">
					
			<span class="writing" data-typespeed="<?php echo esc_attr($typespeed); ?>" data-mediaheading="<?php echo esc_attr($sentence1); ?>"></span>
			
		</div>

        <?php
    }
	
}
