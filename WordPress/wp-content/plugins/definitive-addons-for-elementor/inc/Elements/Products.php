<?php
/*
* Product Slider
* @author 		WooThemes
* @package WooCommerce/Widgets
* @version 3.3.0
* modified & extended by softfirm
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

class Product_Slider extends Widget_Base {
	
	public function get_name() {
		return 'dafe_product_slider';
	}

	public function get_title() {
		return esc_html__( 'DA: Product Slider', 'elementor-definitive-addons' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

   public function get_categories() {
		return [ 'definitive-addons' ];
	}

	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'product_grid_label',
  			[
  				'label' =>__( 'Products', 'elementor-definitive-addons' )
  			]
  		);
		
		$this->add_control(
			'product_section_title',
			[
				'label' =>__( 'Product Section Title', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' =>__( 'Products', 'elementor-definitive-addons' ),
			]
		);
		
		$this->add_control(
			'number_of_product',
			[
				'label' =>__( 'Number of Product', 'elementor-definitive-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' =>'9',
			]
		);
		
		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title HTML Tag', 'plugin-domain' ),
				'type' =>Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1' => __( 'H1', 'definitive-addons-for-elementor' ),
					'h2' => __( 'H2', 'definitive-addons-for-elementor' ),
					'h3' => __( 'H3', 'definitive-addons-for-elementor' ),
					'h4' => __( 'H4', 'definitive-addons-for-elementor' ),
					'h5' => __( 'H5', 'definitive-addons-for-elementor' ),
					'h6' => __( 'H6', 'definitive-addons-for-elementor' ),
					'span' =>__( 'Span', 'definitive-addons-for-elementor' )
				],
			]
		);
		
		$this->add_control(
			'product_type',
			[
                'label' => esc_html__('Product Type', 'definitive-addons-for-elementor'),
                'type' => Controls_Manager::SELECT,
                
                'default' =>'',
                'options' => [
					''=>__('All Product','definitive-addons-for-elementor'),
					'featured'=>__('Featured','definitive-addons-for-elementor'),
					'onsale'=>__('On Sale','definitive-addons-for-elementor')
				],
            ]
		);
		
		$this->add_control(
			'product_order_by',
			[
				'label' =>__( 'Product Order By', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				
				'options' => [
					
					'date' =>__( 'Date', 'definitive-addons-for-elementor' ),
					'price' =>__( 'Price', 'definitive-addons-for-elementor' ),
					'random' =>__( 'Random', 'definitive-addons-for-elementor'),
					'sales' =>__( 'Sales', 'definitive-addons-for-elementor'),
					
				],
				'default' => 'date',
				
			]
		);
		
		$this->add_control(
			'product_orders',
			[
				'label' =>__( 'Product Order', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				
				'options' => [
					
					'ASC' =>__( 'ASC', 'definitive-addons-for-elementor' ),
					
					'DESC' =>__( 'DESC', 'definitive-addons-for-elementor' ),
			
				],
				'default' => 'DESC',
				
			]
		);
		$this->add_control(
            'hide_free_product',
            [
                'label' => __( 'Hide Free Product?', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
                'label_on' => __( 'Yes', 'definitive-addons-for-elementor' ),
                'label_off' => __( 'No', 'definitive-addons-for-elementor' ),
				'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );
		
		$this->add_control(
			'product_display',
			[
				'label' =>__( 'Product Display', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				
				'options' => [
					
					'grid' =>__( 'Product Grid', 'definitive-addons-for-elementor' ),
					
					'slider' =>__( 'Product Slider', 'definitive-addons-for-elementor' ),
			
				],
				'default' => 'slider',
				
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
			'slidesToShow',
			[
				'label' =>__( 'No of Slide per Page', 'definitive-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				
				'options' => [
					
					'1' =>__( 'one', 'definitive-addons-for-elementor' ),
					
					'3' =>__( 'Three', 'definitive-addons-for-elementor' ),
					'4' =>__( 'Four', 'definitive-addons-for-elementor' ),
					'5' =>__( 'Five', 'definitive-addons-for-elementor' ),
				],
				'default' => '4',
				'description' => __( 'Default:4', 'definitive-addons-for-elementor' ),
                
				
			]
		);
       
        $this->end_controls_section();

		 // style
        

        $this->start_controls_section(
           'product_section_style_title',
            [
                'label' =>__( 'Product Section Title', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        

        $this->add_responsive_control(
            'section_title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .product_section_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
           'section_title_color',
            [
                'label' => __( 'Title Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product_section_title' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_font',
                'selector' => '{{WRAPPER}} .product_section_title',
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
                    '{{WRAPPER}} .slick-prev:after, {{WRAPPER}} .slick-next:after' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
            'nav_hover_color',
            [
                'label' => __( 'Hover Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover:after, {{WRAPPER}} .slick-next:hover:after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_hover_bg_color',
            [
                'label' => __( 'Hover Background Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}


	protected function render() {
		
    $settings = $this->get_settings_for_display(); 
	$post_order_by = $this->get_settings_for_display('product_order_by');
	$product_section_title = $this->get_settings_for_display('product_section_title'); 
	$post_orders = $this->get_settings_for_display('product_orders');
	$hide_free = $this->get_settings_for_display('hide_free_product');
	
	$number_of_post = $this->get_settings_for_display('number_of_product');
	$product_type = $this->get_settings_for_display('product_type');
	$product_display = $this->get_settings_for_display('product_display');
	
	$slidesperpage = $this->get_settings_for_display('slidesToShow');
	$autoplay_speed = $this->get_settings_for_display('autoplay_speed');
	$autoplay = $this->get_settings_for_display('autoplay');
	$loop = $this->get_settings_for_display('loop');
	
	
		$id = uniqid();
		$class = '.';
		$class .= $id;
	  
	  ?>
	
		<?php
		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		
		$product_visibility_term_ids = wc_get_product_visibility_term_ids();

		$query_args = array(
			'posts_per_page' =>$number_of_post,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'no_found_rows'  => 1,
			'order'          => $post_orders,
			'meta_query'     => array(),
			'tax_query'      => array(
				'relation' => 'AND',
			),
		); // WPCS: slow query ok.
		
		if ( $hide_free == 'yes' ) {
			$query_args['meta_query'][] = array(
				'key'     => '_price',
				'value'   => 0,
				'compare' => '>',
				'type'    => 'DECIMAL',
			);
		}

		
		
		if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
			$query_args['tax_query'][] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => $product_visibility_term_ids['outofstock'],
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}

		switch ( $product_type ) {
			case 'featured':
				$query_args['tax_query'][] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => $product_visibility_term_ids['featured'],
				);
				break;
			case 'onsale':
				$product_ids_on_sale    = wc_get_product_ids_on_sale();
				$product_ids_on_sale[]  = 0;
				$query_args['post__in'] = $product_ids_on_sale;
				break;
		}

		switch ( $post_order_by ) {
			case 'price':
				$query_args['meta_key'] = '_price'; // WPCS: slow query ok.
				$query_args['orderby']  = 'meta_value_num';
				break;
			case 'rand':
				$query_args['orderby'] = 'rand';
				break;
			case 'sales':
				$query_args['meta_key'] = 'total_sales'; // WPCS: slow query ok.
				$query_args['orderby']  = 'meta_value_num';
				break;
			default:
				$query_args['orderby'] = 'date';
		}
		
		?>
		<div class="woo-front-page definitive">
		<h3 class="product_section_title"><?php echo esc_html($product_section_title); ?></h3>
		<?php
		$da_query = new \WP_Query( apply_filters( 'woocommerce_products_widget_query_args', $query_args ) );
		if ($da_query->have_posts() ) {
	
			echo wp_kses_post( apply_filters( 'woocommerce_before_widget_product_list', '<ul data-number="'.$slidesperpage.'" data-enable="'.$product_display.'" class="product_list_widget '.$id.'">' ) );
		
			while ( $da_query->have_posts() ) {
				
				$da_query->the_post();
				$product = wc_get_product(get_the_ID());
				?>
				<li>
			<div class="product-entry">
	<?php do_action( 'woocommerce_widget_product_items_start'); ?>
	
	
	<div class="product-info">
	<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="img-title-link">
	<figure class="product-list-img">
		<?php echo $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</figure>
	<span class="product-title"><?php echo wp_kses_post( $product->get_name() ); ?>
	
	</span>
	</a>
	
	<?php if ( ! empty( $show_rating ) ) : ?>
		<?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php endif; ?>

	<?php echo $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
	<?php 
	woocommerce_template_loop_add_to_cart();
 do_action( 'woocommerce_widget_product_items_end');?>
	
			</li>
			<?php	
			}?>
			
			
			<?php
			echo wp_kses_post( apply_filters( 'woocommerce_after_widget_product_list', '</ul>' ) );
	
		}

		wp_reset_postdata();?>
		
	</div>
	  <?php
	}
}