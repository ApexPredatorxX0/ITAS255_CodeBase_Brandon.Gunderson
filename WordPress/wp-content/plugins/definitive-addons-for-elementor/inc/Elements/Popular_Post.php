<?php
/*
* Popular Post widget
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

class Popular_Post extends Widget_Base {
	
	public function get_name() {
		return 'dafe_popular_post';
	}

	public function get_title() {
		return esc_html__( 'DA: Popular Post', 'definitive-addons-for-elementor' );
	}

	public function get_icon() {
		return 'far fa-file';
	}

   public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'post_grid_label',
  			[
  				'label' =>__( 'Popular Post', 'definitive-addons-for-elementor' )
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
                    '{{WRAPPER}} .blog-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-title' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$this->add_control(
           'title_hover_color',
            [
                'label' => __( 'Title Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .blog-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

       $this->end_controls_section();
	   
	   



	}


	protected function render( ) {
		
    $settings = $this->get_settings_for_display(); 
	
	$category_selection = $this->get_settings_for_display('category_selection');
	
	  ?>
	 
	  
		<div class="nl_grid_row popular-post-grid col_gap_30">

	
			<?php
			$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			
		
			$popular_post_number = 4;
		
			
			$loop = new \WP_Query(
				array(
					'post_type' => 'post',
					'cat' =>$category_selection, 
					'posts_per_page' =>intval($popular_post_number),
					
					'orderby' => 'comment_count',
					'order' => 'desc',
					
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1
				)
			);
	
			$col_count = 0;
			$col_no = 2; 
			
	
		if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();  ?>
	
				<?php $col_count++;  ?>
				
			<div class="nl-blog-entry no_of_col_<?php echo esc_attr( $col_no );  ?> col_no_<?php echo esc_attr( $col_count );  ?> col_padd_margin" >

				<div class="blog-pop_border_style">
	
						
						<?php if (has_post_thumbnail()) {
								$src = get_the_post_thumbnail_url();
							}else {
								$src = DAFE_URI . '/css/dummy-image.jpg';
							}
								?>
								<div  class="pop_post_thumbnail">
						
								<?php  if($src){ ?>
								
								
									<a href="<?php the_permalink(); ?>" target="_self">
										<img src="<?php echo esc_url($src) ?>" alt="Blog Post Thumbnail" />
									</a>
								
								<?php    }  ?>
								
							
								</div>
	
							<div class="blog-pop-cta">
							<div class="pop-title">
							<a href="<?php the_permalink(); ?>" target="_self">
							<h3 class="blog-title"><?php the_title(); ?></h3>
							</a>
							</div>
							
							</div>
							
							<div class="pop-txt">
							<div class="pop-inner">
							
							
							<span class="pop-cat">
							<?php echo wp_kses_post(get_the_category_list());?>
							</span>
						
							
							<span class="pop-date">
									<?php Reuse::dafe_posted_date(); ?>
							</span>
							
							
							<span class="pop-byline">
									<?php Reuse::dafe_posted_byline(); ?>
							</span>
							
							</div>
						</div>
		
						
				</div>
			</div> <!--  end single post -->
	
	
			<?php 		
			
					if ( $col_count == $col_no) {
						$col_count = '0';
					}	

			endwhile; ?>
		</div>
	 		
		<?php 
		

		endif; 
		wp_reset_postdata(); 
	
	  
	}
}