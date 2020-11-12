<?php

// croftd - Widget should provide basic CRUD functionality
//
class SoldWidget extends WP_Widget
{

	// class constructor
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'SoldWidget',
			'description' => 'A plugin for a google map',
		);
		parent::__construct('SoldWidget', 'Sold Widget', $widget_ops);
	}

	// output the widget content on the front-end
	public function widget($args, $instance)
	{

		$query = new WP_Query(array('meta_key' => 'is_sold', 'meta_value' => '1'));

		while ($query->have_posts()) : $query->the_post();
?>
			</br>
			<p><u>Recently Sold Houses</u></p>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
		<?php
		endwhile;
		wp_reset_postdata() ?>

<?php

	}

	// output the option form field in admin Widgets screen
	public function form($instance)
	{
	}

	// save options
	public function update($new_instance, $old_instance)
	{
	}
}
