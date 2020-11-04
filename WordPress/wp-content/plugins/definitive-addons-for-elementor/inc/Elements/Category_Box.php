<?php
/**
 * Product Category Box widget class
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

class Product_Category_Box extends Widget_Base {
	
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'DA: Product Category Box', 'definitive-addons-for-elementor' );
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
		return 'dafe_product_category_box';
	}


    public function get_icon() {
        return 'fas fa-image';
    }

    public function get_keywords() {
        return [ 'category', 'product', 'post','box' ];
    }
	
	 public function get_categories() {
		return [ 'definitive-addons' ];
	}
	
	
	protected function _register_controls() {
	
        $this->start_controls_section(
            'section_category_box',
            [
                'label' => __( 'Category Box', 'definitive-addons-for-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

  
		
        $this->add_control(
            'pcat_selection',
            [
                'label' => __( 'Select Product Category', 'definitive-addons-for-elementor' ),
				'label_block' => true,
                'type' => Controls_Manager::SELECT2,
               
                'options' =>Reuse::dafe_product_categories_lists(),
            ]
        );
		
		
        $this->end_controls_section();

       

    // style
        $this->start_controls_section(
            'overlay_section_style',
            [
                'label' => __( 'Overlay Style', 'definitive-addons-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_control(
           'title_color',
            [
                'label' => __( 'Text Color', 'definitive-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-cat-box-title a,{{WRAPPER}} .box-product-count a' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ovl_background',
                'selector' => '{{WRAPPER}} .product-cat-box-title a,{{WRAPPER}} .product-category-box-text',
                'exclude' => [
                    'image'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'selector' => '{{WRAPPER}} .product-cat-box-title a,{{WRAPPER}} .box-product-count',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );


        $this->end_controls_section();

        
    }

	protected function render( ) {
		
        $settings = $this->get_settings_for_display();
		
		$category_data ='';
		
        $category_data = $this->get_settings_for_display('pcat_selection');
		if (empty($category_data)){return;}
		
							$cat_link = get_category_link( $category_data );
							$cat_name = get_term( $category_data );
							$thumb_id = get_term_meta( $category_data, 'thumbnail_id', true );
							
							$product_image_url = wp_get_attachment_image_src( $thumb_id, 'product-category-image' );
							$product1_image_url = $product_image_url[0]; 
							if ( $product1_image_url == '') { 
								$product1_image_url = DAFE_URI . '/css/dummy-image.jpg';
							}
							if (!empty($cat_name)){
							$cats_name = $cat_name->name;
							}?>
							<div class="product-category-box">
								<?php if ( $product1_image_url ) { ?>
								
								
									<a  class="product-category-box-link" href="<?php echo esc_url( $cat_link ); ?>">
									<img  src="<?php echo esc_url( $product1_image_url ); ?>" alt="<?php echo esc_attr( $cats_name ); ?>" />
									
									</a>
								
								<?php } ?>
								<div class="product-category-box-text">
									
									<h5 class="product-cat-box-title"><a title="<?php echo esc_attr($cats_name); ?>" 
									href="<?php echo esc_url( $cat_link ); ?>">
									<?php echo esc_html( $cats_name ); ?></a></h5>
									
									<div class="box-product-count">
									<a href="<?php echo esc_url( $cat_link ); ?>">
									<?php 
									if (!empty($cat_name)){
									$number_of_prod = $cat_name->count;
									}
									if ($number_of_prod) { 
									echo absint($number_of_prod); 
									} ?> 
									<?php esc_html_e('Products','definitive-addons-for-elementor'); ?></a>
									</div>
								</div>
							</div> 
							
						<?php 
	
}
}