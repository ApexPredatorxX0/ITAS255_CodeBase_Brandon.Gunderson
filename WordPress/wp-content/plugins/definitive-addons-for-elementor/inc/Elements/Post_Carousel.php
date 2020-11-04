<?php
/*
* Post Slider/Carousel widget
*/


namespace Definitive_Addons_Elementor\Elements;
use Elementor\Group_Control_Background;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use \Elementor\Widget_Base;

defined( 'ABSPATH' ) || die();

class Post_Carousel extends Widget_Base {

	public function get_name() {
		return 'dafe_post_carousel';
	}

	public function get_title() {
		return esc_html__( 'DA: Post Carousel', 'elementor-definitive-addons' );
	}

	public function get_icon() {
		return 'eicon-posts-carousel';
	}

   public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'post_grid_label',
  			[
  				'label' =>__( 'Post Carousel', 'elementor-definitive-addons' )
  			]
  		);

		
		$this->add_control(
			'number_of_post',
			[
				'label' =>__( 'Number of Post', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' =>'9',
			]
		);
		
		
		$this->add_control(
			'category_selection',
			[
                'label' => esc_html__('Post Categories', 'definitive-addons-for-elementor'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => Reuse::dafe_post_categories(),
            ]
		);
		
		
		
		$this->add_control(
			'post_orders',
			[
				'label' =>__( 'Post Order', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => [
					
					'ASC' =>__( 'ASC', 'definitive-addons-for-elementor' ),
					
					'DESC' =>__( 'DESC', 'definitive-addons-for-elementor' ),
			
				],
				'default' => 'DESC',
				
			]
		);
		
		
		$this->add_control(
			'post_order_by',
			[
				'label' =>__( 'Post Order By', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => [
					
					'date' =>__( 'Date', 'definitive-addons-for-elementor' ),
					
					'title' =>__( 'Title', 'definitive-addons-for-elementor' ),
					
				],
				'default' => 'date',
				
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
           'section_slider_nav_settings',
            [
                'label' => __( 'Slider Settings', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

		 $this->add_control(
            'slidesToShow',
            [
                'label' => __( 'No of Slide per Page', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
				'step' => 1,
                'default' => 1,
                'description' => __( 'Default:3', 'definitive-addons-for-elementor' ),
                'frontend_available' => true,
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
		
		$this->add_control(
            'show_hide_nav',
            [
                'label' => __( 'Show/Hide Navigation', 'definitive-addons-for-elementor' ),
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
           'blog_section_style_title',
            [
                'label' =>__( 'Blog Post Title', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .da-slide-feature-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .da-slide-feature-title span' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_control(
           'title_hover_color',
            [
                'label' => __( 'Title Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .da-slide-feature-title span:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .da-slide-feature-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

       $this->end_controls_section();
	   
	   $this->start_controls_section(
           'blog_section_style_meta',
            [
                'label' =>__('Blog Post Meta', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
  
        $this->add_responsive_control(
            'meta_spacing',
            [
                'label' => __('Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				'default' => [
					'size' => 30
				],
                'selectors' => [
                    '{{WRAPPER}} .da-featured-slider-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'meta_color',
            [
                'label' => __( 'Meta Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .da-featured-slider-meta span,{{WRAPPER}} .da_slider-category .post-categories a,{{WRAPPER}} .da-featured-slider-meta span a' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_control(
           'meta_hover_color',
            [
                'label' => __( 'Meta Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .da-featured-slider-meta span:hover,{{WRAPPER}} .da-featured-slider-meta span a:hover,{{WRAPPER}} .da_slider-category .post-categories a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_font',
                'selector' => '{{WRAPPER}} .da-featured-slider-meta span,{{WRAPPER}} .da-featured-slider-meta span a,{{WRAPPER}} .da_slider-category .post-categories a',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
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
                    '{{WRAPPER}} .widget-post-slide .slick-prev:after, {{WRAPPER}} .widget-post-slide .slick-next:after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_bg_color',
            [
                'label' => __( 'Arrow Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'default' =>'transparent',
                'selectors' => [
                    '{{WRAPPER}} .widget-post-slide .slick-prev, {{WRAPPER}} .widget-post-slide .slick-next' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );
		$this->add_control(
            'nav_hover_color',
            [
                'label' => __( 'Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-post-slide .slick-prev:hover:after, {{WRAPPER}} .widget-post-slide .slick-next:hover:after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_hover_bg_color',
            [
                'label' => __( 'Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .widget-post-slide .slick-prev:hover, {{WRAPPER}} .widget-post-slide .slick-next:hover' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'selector' => '{{WRAPPER}} .widget-post-slide .slick-prev, .widget-post-slide {{WRAPPER}} .slick-next',
            ]
        );

        

        $this->add_responsive_control(
          'nav_border_radius',
            [
                'label' => __( 'Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .widget-post-slide .slick-prev, {{WRAPPER}} .widget-post-slide .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

	}


	protected function render( ) {
		
    $settings = $this->get_settings_for_display(); 
	$post_order_by = $this->get_settings_for_display('post_order_by'); 
	$post_orders = $this->get_settings_for_display('post_orders');
	
	$number_of_post = $this->get_settings_for_display('number_of_post');
	$category_selection = $this->get_settings_for_display('category_selection');
	
	$slidesToShows = $this->get_settings_for_display('slidesToShow');
	$autoplay_speed = $this->get_settings_for_display('autoplay_speed');
	$autoplay = $this->get_settings_for_display('autoplay');
	$loop = $this->get_settings_for_display('loop');
	$show_hide_nav = $this->get_settings_for_display('show_hide_nav');
	
	if ($show_hide_nav != 'yes'){
			$show_hide_nav = 'no';
	}
	
	$ovl_width = '';
	$feature_slider = '';
	
	if ($slidesToShows > 1){
		$ovl_width = 'full';
		$feature_slider = 'feature-carousel';
	}

	$id = uniqid();
	  
	  ?>
	  <div id="<?php echo esc_attr($id); ?>" class="widget-post-slide <?php echo esc_attr($feature_slider); ?> <?php echo esc_attr($show_hide_nav); ?>" data-autospeed="<?php echo esc_attr($autoplay_speed) ?>" data-autoplay="<?php echo esc_attr($autoplay) ?>" data-loop="<?php echo esc_attr($loop) ?>" data-showpage="<?php echo esc_attr($slidesToShows) ?>">

	
			<?php
			$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		
			    $loop = new \WP_Query(
				array(
					'post_type' => 'post',
					'cat' =>$category_selection,
					'posts_per_page' => $number_of_post,
					
					'orderby' =>$post_order_by,
					'order' =>$post_orders,
					
					
					//'category__not_in'=>get_cat_ID($exclude),
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1
				)
			);
			
		
		if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); 
	
				if (has_post_thumbnail()){
					$slide1_src = get_the_post_thumbnail_url();
				}else {
					$slide1_src = DAFE_URI . '/css/dummy-image.jpg'; 	
				}
				 ?>
			<div id="feature_data" class="feature_slider_entry" data-slidestyle="<?php echo esc_attr($feature_slider_style); ?>" data-speed="<?php echo esc_attr($slideshow_speed); ?>" data-slidertype="<?php echo esc_attr($slider_type); ?>" data-number="<?php echo esc_attr($feature_slider_number); ?>">
        <img src="<?php echo esc_url($slide1_src); ?>" alt="<?php the_title_attribute();?>" title="<?php the_title_attribute();?>" />
        
			<div class="da_feature_slide_border_abs <?php echo esc_attr($ovl_width); ?>">
				
					<div class="da_feature_post_cta" >
						<div class="da_slider-category"><?php the_category(); ?></div>
		
		
							<a  title="<?php the_title_attribute();?>" href="<?php the_permalink(); ?>" target="_self">
							<?php	if ($slidesToShows == 1){  ?>
								<h3  class="da-slide-feature-title"><span><?php the_title(); ?></span></h3>
							
							<?php } else {  ?>
								<h4  class="da-slide-feature-title"><span><?php the_title(); ?></span></h4>
							
						<?php	}  ?>
							</a>
						<div class="da-featured-slider-meta">
							<?php Reuse::dafe_posted_on(); ?>
						</div>
			
						
	
					</div>
				
			</div> 
		</div>
	
	
			<?php 		
			
			endwhile; ?>
			
		</div>	  
		<?php 
		
		endif; 
		wp_reset_postdata();
	  
	}
}