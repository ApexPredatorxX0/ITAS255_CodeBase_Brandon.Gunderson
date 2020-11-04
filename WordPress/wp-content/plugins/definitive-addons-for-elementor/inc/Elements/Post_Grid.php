<?php
/*
* Post Grid widget
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

class Post_Grid extends Widget_Base {
	
	
	
	public function get_name() {
		return 'dafe_post_grid';
	}

	public function get_title() {
		return esc_html__( 'DA: Post Grid', 'definitive-addons-for-elementor' );
	}

	public function get_icon() {
		return 'fas fa-table';
	}

   public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'post_grid_label',
  			[
  				'label' =>__( 'Post Grid', 'definitive-addons-for-elementor' )
  			]
  		);

		
		$this->add_control(
			'number_of_post',
			[
				'label' =>__( 'Number of Post', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' =>'9',
			]
		);
		
		
		
		$this->add_control(
			'no_of_column',
			[
				'label' =>__( 'Column Number & Layout', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
			
				'options' => [
					
					'1' =>__( 'One', 'definitive-addons-for-elementor' ),
					'1a' =>__( 'One - Inline', 'definitive-addons-for-elementor' ),
					'2' =>__( 'Two', 'definitive-addons-for-elementor' ),
					'2a' =>__( 'Two - First Post Full Width', 'definitive-addons-for-elementor' ),
					'3' =>__( 'Three', 'definitive-addons-for-elementor' ),
					'3a' =>__( 'Three - First Post Full Width', 'definitive-addons-for-elementor' ),
					
				],
				'default' => '1a',
				
			]
		);
		$this->add_control(
			'post_style',
			[
				'label' =>__( 'Blog Background Shadow', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => [
					
					'style1' =>__( 'White Shadow', 'definitive-addons-for-elementor' ),
					//'style2' =>__( 'One Column Inline', 'definitive-addons-for-elementor' ),
					'none' =>__( 'Simple', 'definitive-addons-for-elementor' ),
					
				],
				'default' => 'style1',
				
			]
		);
		
		$this->add_control(
			'post_grid_align',
			[
				'label' =>__( 'Header Align', 'definitive-addons-for-elementor' ),
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
			'category_exclude',
			[
                'label' => esc_html__('Exclude Categories', 'definitive-addons-for-elementor'),
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
		
		$this->add_control(
            'enable_excerpt',
            [
                'label' => __( 'Enable Excerpt?', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
                'label_on' => __( 'Yes', 'definitive-addons-for-elementor' ),
                'label_off' => __( 'No', 'definitive-addons-for-elementor' ),
				'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );
		
		$this->add_control(
            'hide_date',
            [
                'label' => __( 'Show/Hide Date on Meta?', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
                'label_on' => __( 'Yes', 'definitive-addons-for-elementor' ),
                'label_off' => __( 'No', 'definitive-addons-for-elementor' ),
				'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );
		
		
		$this->end_controls_section();


		 // style
        $this->start_controls_section(
            'blog_section_style_image',
            [
                'label' => __( 'Image', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
	
		$this->add_responsive_control(
            'post_image_spacing',
            [
                'label' => __( 'Image Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
				'condition' => [
					'no_of_column!' => '1a',
					
				],
                'selectors' => [
                    '{{WRAPPER}} .da-post-thumbnail' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .da-post-thumbnail-img',
            ]
        );
		
		$this->add_responsive_control(
          'image_border_radius',
            [
                'label' => __( 'Image Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .da-post-thumbnail-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		
	
        $this->end_controls_section();

       

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
                    '{{WRAPPER}} .da-entry-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .da-entry-title,{{WRAPPER}} .da-entry-title a,{{WRAPPER}} .page-content .da-entry-title a' => 'color: {{VALUE}}!important',
                ],
            ]
        );
		
		$this->add_control(
           'title_hover_color',
            [
                'label' => __( 'Title Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .da-entry-title a:hover,.page-content .da-entry-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font',
                'selector' => '{{WRAPPER}} .da-entry-title,.page-content .da-entry-title a',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

       $this->end_controls_section();
	   
	   $this->start_controls_section(
           'blog_section_style_meta',
            [
                'label' =>__( 'Blog Post Meta', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        

        $this->add_responsive_control(
            'meta_spacing',
            [
                'label' => __( 'Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .da-entry-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'meta_color',
            [
                'label' =>__( 'Meta Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry-header .post-categories a,{{WRAPPER}} .da-entry-meta span,{{WRAPPER}} .da-entry-meta a' => 'color: {{VALUE}}!important',
                ],
            ]
        );
		
		$this->add_control(
           'meta_hover_color',
            [
                'label' => __( 'Meta Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry-header .post-categories a:hover,{{WRAPPER}} .da-entry-meta span:hover,{{WRAPPER}} .da-entry-meta a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_font',
                'selector' => '{{WRAPPER}} .entry-header .post-categories a,{{WRAPPER}} .da-entry-meta span,{{WRAPPER}} .da-entry-meta a',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

       $this->end_controls_section();


        $this->start_controls_section(
           'blog_section_style_text',
            [
                'label' => __( 'Blog Post Text', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        

        $this->add_responsive_control(
            'text_spacing',
            [
                'label' => __( 'Content Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .da-entry-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Content Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .da-entry-content p,.page-content .da-entry-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_font',
                'selector' => '{{WRAPPER}} .da-entry-content p,.page-content .da-entry-content p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
		
		$this->add_control(
			'post_text_align',
			[
				'label' =>__( 'Text Align', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					
					'leftp' => [
						'title' =>__( 'Left', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'centerp' => [
						'title' =>__( 'Center', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'rightp' => [
						'title' =>__( 'Right', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justifyp' => [
						'title' =>__( 'Justify', 'definitive-addons-for-elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				
			]
		);
		
		

        $this->end_controls_section();
		
		/***/
		
		 $this->start_controls_section(
           'blog_read_more_btn',
            [
                'label' => __( 'Blog Read More Button', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        

       
        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.more-link' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.more-link' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'button_hvr_color',
            [
                'label' => __( 'Button Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.more-link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'button_bg_hvr_color',
            [
                'label' => __( 'Button Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.more-link:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

  
        $this->end_controls_section();
		
		/****/
		
		
		 $this->start_controls_section(
           'blog_section_style_content',
            [
                'label' => __( 'Blog Post Content', 'definitive-addons-for-elementor' ),
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
                    '{{WRAPPER}} .da_home_blog_border_style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .da_home_blog_border_style,{{WRAPPER}} .da_home_blog_border_style p',
                'exclude' => [
                    'image'
                ]
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'selector' => '{{WRAPPER}} .da_grid_row .da_home_blog_border_style',
            ]
        );
		
		$this->add_responsive_control(
          'container_border_radius',
            [
                'label' => __( 'Container Border Radius', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .da_grid_row .da_home_blog_border_style' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		
		$this->end_controls_section();
		

	}
	

	protected function render( ) {
		
    $settings = $this->get_settings_for_display(); 
	$post_order_by = $this->get_settings_for_display('post_order_by'); 
	$post_orders = $this->get_settings_for_display('post_orders');
	$no_of_column = $this->get_settings_for_display('no_of_column');
	$number_of_post = $this->get_settings_for_display('number_of_post');
	$category_selection = $this->get_settings_for_display('category_selection');
	
	$enable_excerpt = $this->get_settings_for_display('enable_excerpt');
	$style = $this->get_settings_for_display('post_style');
	$hide_date = $this->get_settings_for_display('hide_date');
	$category_exclude = $this->get_settings_for_display('category_exclude');
	$post_grid_align = $this->get_settings_for_display('post_grid_align');
	$post_text_align = $this->get_settings_for_display('post_text_align');
	
	
	
	if ($hide_date == 'yes'){
		$hide_date = 'yes';
	}else {
		$hide_date = 'no';
	}
	
	  ?>
	 
	  
		<div class="da_grid_row ms-post-grid col_gap_30">
	
			<?php
			$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		
			    $loop = new \WP_Query(
				array(
					'post_type' => 'post',
					'cat' =>$category_selection,
					'posts_per_page' =>$number_of_post,
					'orderby' =>$post_order_by,
					'order' =>$post_orders,
					'post_status' => 'publish',
					'category__not_in'=>$category_exclude,
					
				)
			);
		
		$col_count = 0;
	
		if( $loop->have_posts() ): 
		
		if (($no_of_column == '2a' || $no_of_column == '3a')){
			$col_count = -1;
		} else {
			$col_count = 0;
		}
		
			if($no_of_column == '2a'){
				$col_no = 2;
			}elseif ($no_of_column == '3a'){
				$col_no = 3;
			}
			elseif ($no_of_column == '1a'){
				$col_no = 1;
			}
			else {
			$col_no = $no_of_column;
			}
			
			if ($style == 'style2'){$col_no = 1;}
			if ($no_of_column == '1a'){$style = 'style2';}
		
		while( $loop->have_posts() ): 
	
				$col_count++;  
				$fstyles = '';
				
				if($col_count == 0){
					$fstyles = 'margins';
				}else {
					$fstyles = '';
				}
	
				if(($col_count != 0) ){
				
				?>
				
			<div class="<?php echo esc_attr( $style );  ?> nl-blog-entry no_of_col_<?php echo esc_attr( $col_no );  ?> col_no_<?php echo esc_attr( $col_count );  ?> col_padd_margin" >
				
				<?php } ?>
				
				<div class="da_home_blog_border_style <?php echo esc_attr( $fstyles );  ?> <?php echo esc_attr( $style );  ?> clear">
			<?php
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

				$loop->the_post(); 
				$hcstyle = '';
	if ($style == 'style2'){
		if (has_post_thumbnail()){
	
			$hcstyle .= "thumb";
			
				
		}else {
			$hcstyle .= "w_thumb";	
		}
	}
?>
	<div class="da-post-thumbnail <?php echo esc_attr($hcstyle); ?>">

			<?php	
			if( has_post_thumbnail()) {
				
				 ?>
				<div class="da-post-thumbnail-img">
				<?php the_post_thumbnail('full'); ?>
				<div class="da-entry-date-abs">
			<?php the_time( get_option( 'date_format' ) ); ?>
			</div>	
				</div>
			
			<?php } ?>

	</div>
	
	<div class="da-header-content <?php echo esc_attr($hcstyle); ?>">
	<header class="entry-header">

		<div class="title-meta <?php echo esc_attr($post_grid_align); ?>">
		 <!-- To display categories on the top of the post title -->
			<?php echo wp_kses_post(get_the_category_list());?>
		
		<!-- To display titles of blog post -->
		<?php
		
		if ( is_single() ){
			the_title( '<h1 class="da-entry-title">', '</h1>' );
		}
		
		elseif (( is_home() || is_front_page()) && ($col_no == '2'|| $col_no == '3' || $style ='style2')){
			the_title( '<h4 class="da-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		
		}
		else {
			the_title( '<h2 class="da-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		
		}

		// To display meta of blog post -->	
		if ( 'post' === get_post_type() ) : ?>
			<div class="da-entry-meta <?php echo esc_attr($hide_date); ?> <?php echo esc_attr($post_grid_align); ?>">
			<!-- Meta function calling -->
				<?php Reuse::dafe_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
		</div>
	</header><!-- .entry-header -->

<!-- Content Area  -->
	<div class="da-entry-content <?php echo esc_attr($style); ?> <?php echo esc_attr($post_grid_align); ?> <?php echo esc_attr($post_text_align); ?>">
	    <!-- to show excerpt or full text of posts -->
		<?php 
			if (($enable_excerpt == 'yes')) {
				
				the_excerpt();
					
			} else {
									
						the_content( sprintf( 
						__( 'Continue reading%s', 'the-gap' ), 
					'<span class="screen-reader-text">  '.get_the_title().'</span>' ) );

			}
			?>				
	  </div> <!-- end .entry-content -->
	</div> <!-- end .header-content -->

	<footer class="entry-footer">
	<?php if ( 'post' === get_post_type() ) {
	$get_tags = get_the_tag_list( '', esc_html__( ', ', 'the-gap' ) );
		if ( $get_tags ) {
			printf(/* translators: tag link*/ '<div class="tags-links">' . esc_html__( 'Tagged %1$s', 'the-gap' ) . '</div>', wp_kses_post($get_tags)); // WPCS: XSS OK.
		}
	}
		 ?>
		
	</footer><!-- .entry-footer -->
	
				</div> 
			<?php	if(($col_count != 0)){
				 ?>
			</div> 
			<?php } ?>
			
			<?php
				if ( $col_count == $col_no) {
						$col_count = '0';
					}
			endwhile;
			
			 ?>
		</div>	 
			<nav class="navigation pagination clear" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'the-gap' ); ?></h1>
				<?php 
					    the_posts_pagination( 
            	array(
				    'prev_text' => __( '&larr; Previous', 'the-gap' ),
				    'next_text' => __( 'Next &rarr;', 'the-gap' ),
					)
            	); 
				?>
			</nav><!-- navigation -->
			<?php 
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		wp_reset_postdata();
	  
	}
}