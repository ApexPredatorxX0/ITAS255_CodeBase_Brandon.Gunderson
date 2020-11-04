<?php
/**
 * Icon list widget class
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

class Icon_list extends Widget_Base {
	
    /**
     * Get widget title.
     
     */
    public function get_title() {
        return __( 'DA: Icon List', 'definitive-addons-for-elementor' );
    }

    /**
     
     * @return string Widget icon.
     */
	 public function get_name() {
		return 'dafe_icon_list';
	}


    public function get_icon() {
        return 'fas fa-list';
    }

    public function get_keywords() {
        return [ 'icon', 'list'];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
  
	protected function _register_controls() {
		
        $this->start_controls_section(
            'section_icon_list',
            [
                'label' => __( 'icon List', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		

        $repeater = new Repeater();
		
		
		
		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'List Icon', 'definitive-addons-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				
				
				
			]
		);

        $repeater->add_control(
       'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' =>__( 'List Text', 'definitive-addons-for-elementor' ),
                'default' =>__( 'Icon List #1', 'definitive-addons-for-elementor' )
            ]
        );
		
		$repeater->add_control(
            'link',
            [
                'label' => __( 'Icon List Link', 'definitive-addons-for-elementor' ),
                'separator' => 'before',
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://softfirm.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
			'icon_lists',
			[
				'label'       => esc_html__( 'Icon List Item', 'definitive-addons-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'seperator'   => 'before',
				'default' => [
					
					[ 'title' => 'Icon List#1' ],
					
					[ 'title' => 'Icon List#2' ],
					
					[ 'title' => 'Icon List#3' ]
					
					
				],
				
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{title}}',
			
			]
		);
		
		$this->add_control(
			'icon_list_alignment',
			[
				'label' =>__( 'Icon List Align', 'definitive-addons-for-elementor' ),
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
				'default' => 'left',
				
			]
		);
		
		$this->add_control(
			'layout',
			[
				'label' =>__( 'Icon List Layout', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => [
					'inline'  => __( 'Inline', 'definitive-addons-for-elementor' ),
					'block' => __( 'Block', 'definitive-addons-for-elementor' ),
					
				],
				'default' => 'block',
				
			]
		);

			
        $this->end_controls_section();

       

    // style
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => __( 'List Icon', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .icon-left:hover,{{WRAPPER}} .icon-right:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		
        $this->end_controls_section();
		
		$this->start_controls_section(
           'section_style_spacing',
            [
                'label' => __( 'Icon List Spacing', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_responsive_control(
            'icon_btm_spacing',
            [
                'label' => __( 'Icon List Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .list-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
                        'layout' => 'block',
                ],
            ]
        );
		
		$this->add_responsive_control(
            'icon_list_right_spacing',
            [
                'label' =>__( 'Icon List Right Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .list-text.inline' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
                        'layout' => 'inline',
                ],
            ]
        );
		
		$this->add_responsive_control(
            'icon_btn_spacing_left',
            [
                'label' => __( 'Space between Icon & Text', 'definitive-addons-for-elementor' ),
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
           'section_style_title',
            [
                'label' => __( 'Icon List Text', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
      

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Text Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .list-text' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
           'title_hvr_color',
            [
                'label' => __( 'Text Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .list-text:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .list-text',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
		
		$this->end_controls_section();
		
		$this->start_controls_section(
           'section_style_content',
            [
                'label' =>__( 'Icon List Content', 'definitive-addons-for-elementor' ),
                'tab'  => Controls_Manager::TAB_STYLE,
            ]
        );

        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .list-text',
                'exclude' => [
                    'image'
                ]
            ]
        );
		
		$this->end_controls_section();

        
	}
	
	
	protected function render( ) {
        
		$icon_lists = $this->get_settings_for_display('icon_lists');
		if ( empty( $icon_lists ) ) {
            return;
        }
		
		$settings = $this->get_settings_for_display();
		$list_text = $this->get_settings_for_display('title');
		$icon_list_alignment = $this->get_settings_for_display('icon_list_alignment');
		$icon_position = $this->get_settings_for_display('icon_position');
		$layout = $this->get_settings_for_display('layout');
		
	
		
		$add_icon_left = '';
		$add_icon_right = '';
		
	
  
        ?>

       
		
	<div class="icon-list-container <?php echo esc_attr($icon_list_alignment) ?>">
      <?php
	  foreach ( $settings['icon_lists'] as $icon_list) :
	  
	 
		if ($icon_position == 'left'){
			$add_icon_left = $icon_list['icon']['value'];
		}else {
			$add_icon_right = $icon_list['icon']['value'];
		} 
		
	  if ($icon_list['link']['url']){  ?>
			<a  href="<?php echo esc_url($icon_list['link']['url']); ?>" target="_self" 
				class="list-text <?php echo esc_attr($layout); ?>">
				<span  class="<?php echo esc_attr($add_icon_left); ?> icon-left"></span><?php echo esc_html($icon_list['title']);?>
				<span  class="<?php echo esc_attr($add_icon_right); ?> icon-right"></span>
			</a>
	<?php  } else {  ?>
			<span class="list-text <?php echo esc_attr($layout); ?>">
				<span class="<?php echo esc_attr($add_icon_left); ?> icon-left"></span>
				<?php echo esc_html($icon_list['title']); ?>
				<span class="<?php echo esc_attr($add_icon_right); ?> icon-right"></span>
			</span>  
	<?php   }  ?>
       
        <?php endforeach; ?>
	</div>
		
	

        <?php
    }
	
	
	protected function _content_template() {
		
	}
}
