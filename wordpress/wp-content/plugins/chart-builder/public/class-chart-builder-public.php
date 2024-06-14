<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Chart_Builder
 * @subpackage Chart_Builder/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Chart_Builder
 * @subpackage Chart_Builder/public
 * @author     Chart Builder Team <info@ays-pro.com>
 */
class Chart_Builder_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * @var string
	 */
	private $html_class_prefix = 'ays-chart-';

	/**
	 * @var string
	 */
	private $html_name_prefix = 'ays_chart_';

	/**
	 * @var string
	 */
	private $name_prefix = 'chart_';

	/**
	 * @var
	 */
	private $unique_id;

	/**
	 * @var Chart_Builder_DB_Actions
	 */
	private $db_object;

	/**
	 * @var array
	 */
	private $data;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->db_object =  new Chart_Builder_DB_Actions( $this->plugin_name );

		add_shortcode( 'ays_chart', array( $this, 'ays_generate_chart_method' ) );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chart_Builder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chart_Builder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/chart-builder-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chart_Builder_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chart_Builder_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$is_elementor_exists = Chart_Builder_DB_Actions::ays_chart_is_elementor();
        if( !$is_elementor_exists ) {
			wp_enqueue_script( $this->plugin_name . '-plugin', plugin_dir_url( __FILE__ ) . 'js/chart-builder-public-plugin.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/chart-builder-public.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name . '-charts-google', plugin_dir_url(__FILE__) . 'js/google-chart.js', array('jquery'), $this->version, true);
		}


	}

	public function ays_generate_chart_method( $attr ) {
		$id = (isset($attr['id'])) ? absint(intval($attr['id'])) : null;

		if (is_null($id)) {
			return "<p class='wrong_shortcode_text' style='color:red;'>" . __( 'Wrong shortcode initialized', "chart-builder" ) . "</p>";
		}

		$content = $this->show_chart( $id, $attr );

		$this->enqueue_styles();
		$this->enqueue_scripts();

		return str_replace( array( "\r\n", "\n", "\r" ), '', $content );
	}

	public function show_chart( $id, $attr ) {

		$chartData = CBActions()->get_chart_data( $id );
		if ( is_null( $chartData ) ) {
			return "<p class='wrong_shortcode_text' style='color:red;'>" . __('Wrong shortcode initialized', "chart-builder") . "</p>";
		}
		$chart = $chartData['chart'];
		$settings = $chartData['settings'];

		$unique_id = uniqid();
		$this->unique_id = $unique_id;

		$data = array();

		if ( is_null( $chart ) ) {
			return "<p class='wrong_shortcode_text' style='color:red;'>" . __('Wrong shortcode initialized', "chart-builder") . "</p>";
		}

		$source_type = $chartData['source_type'];
		$user_id = get_current_user_id();

		if ($source_type == 'quiz_maker' && $user_id == 0 && $chart['quiz_query'] != 'q1') {
			return "<p class='ays_chart_not_logged_text'>" . __('You are not logged in. Please log in to view this chart.', $this->plugin_name) . "</p>";
		}

		$status = isset( $chart['status'] ) && $chart['status'] != '' ? $chart['status'] : '';

		if ( $status != 'published' ) {
			return "";
		}
		
		$chart_default_colors = array('#3366cc','#dc3912','#ff9900','#109618', '#990099','#0099c6','#dd4477','#66aa00', '#b82e2e','#316395','#994499','#22aa99', '#aaaa11','#6633cc','#e67300','#8b0707', '#651067','#329262','#5574a6','#3b3eac', '#b77322','#16d620','#b91383','#f4359e', '#9c5935','#a9c413','#2a778d','#668d1c', '#bea413','#0c5922','#743411');

		$position_styles = array(
			"left" => 'margin-left:0',
			"right" => 'margin-right:0',
			"center" => 'margin:auto',
		);
		
		$chart_title = (isset($chart['title']) && $chart['title'] != '') ? stripslashes ( sanitize_text_field( $chart['title'] ) ) : '';
		$chart_description = (isset($chart['description']) && $chart['description'] != '') ? stripslashes ( sanitize_text_field( $chart['description'] ) ) : '';
		
		// Width
		$settings['width'] = isset( $settings['width'] ) && $settings['width'] != '' ? esc_attr( $settings['width'] ) : '100';
    	$settings['width_format'] = isset( $settings['width_format'] ) && $settings['width_format'] != '' ? esc_attr( $settings['width_format'] ) : '%';
		$settings['responsive_width'] = ( isset( $settings['responsive_width'] ) && $settings['responsive_width'] != '' ) ? $settings['responsive_width'] : 'off';
		$chart_width = isset($settings['responsive_width']) && $settings['responsive_width'] == 'on' ? '100' : $settings['width'].$settings['width_format'];
		
		// position
		$settings['position'] = isset( $settings['position'] ) && $settings['position'] != '' ? esc_attr( $settings['position'] ) : 'center';
		$position = isset($position_styles[$settings['position']]) && $position_styles[$settings['position']] != '' ? $position_styles[$settings['position']] : 'margin:auto';
		
		// height
		$settings['height'] = isset( $settings['height'] ) && $settings['height'] != '' ? esc_attr( $settings['height'] ) : '400';
    	$settings['height_format'] = isset( $settings['height_format'] ) && $settings['height_format'] != '' ? esc_attr( $settings['height_format'] ) : 'px';
		$chart_height = $settings['height'].$settings['height_format'];

		// Font size
		$settings['font_size'] = isset( $settings['font_size'] ) && $settings['font_size'] != '' ? esc_attr( $settings['font_size'] ) : '15';

		// Background color
		$settings['background_color'] = isset( $settings['background_color'] ) && $settings['background_color'] != '' ? esc_attr( $settings['background_color'] ) : '#ffffff';

		// Transparent background
		$settings['transparent_background'] = isset( $settings['transparent_background'] ) && $settings['transparent_background'] != '' ? esc_attr( $settings['transparent_background'] ) : 'off';

		// Border width
		$settings['border_width'] = isset( $settings['border_width'] ) && $settings['border_width'] != '' ? esc_attr( $settings['border_width'] ) : '0';

		// Border radius
		$settings['border_radius'] = isset( $settings['border_radius'] ) && $settings['border_radius'] != '' ? esc_attr( $settings['border_radius'] ) : '0';

		// Border color
		$settings['border_color'] = isset( $settings['border_color'] ) && $settings['border_color'] != '' ? esc_attr( $settings['border_color'] ) : '#666666';

		// Chart Area background color
		$settings['chart_background_color'] = isset( $settings['chart_background_color'] ) && $settings['chart_background_color'] != '' ? esc_attr( $settings['chart_background_color'] ) : '#ffffff';

		// Chart Area border width
		$settings['chart_border_width'] = isset( $settings['chart_border_width'] ) && $settings['chart_border_width'] != '' ? esc_attr( $settings['chart_border_width'] ) : '0';

		// Chart Area border color
		$settings['chart_border_color'] = isset( $settings['chart_border_color'] ) && $settings['chart_border_color'] != '' ? esc_attr( $settings['chart_border_color'] ) : '#666666';

		// Chart Area left margin
		$settings['chart_left_margin_for_js'] = isset( $settings['chart_left_margin'] ) && $settings['chart_left_margin'] != '' ? esc_attr( $settings['chart_left_margin'] ) : 'auto';

		// Chart Area right margin
		$settings['chart_right_margin_for_js'] = isset( $settings['chart_right_margin'] ) && $settings['chart_right_margin'] != '' ? esc_attr( $settings['chart_right_margin'] ) : 'auto';

		// Chart Area top margin
		$settings['chart_top_margin_for_js'] = isset( $settings['chart_top_margin'] ) && $settings['chart_top_margin'] != '' ? esc_attr( $settings['chart_top_margin'] ) : 'auto';

		// Chart Area bottom margin
		$settings['chart_bottom_margin_for_js'] = isset( $settings['chart_bottom_margin'] ) && $settings['chart_bottom_margin'] != '' ? esc_attr( $settings['chart_bottom_margin'] ) : 'auto';
		
		// Title color
		$settings['title_color'] = isset( $settings['title_color'] ) && $settings['title_color'] != '' ? esc_attr( $settings['title_color'] ) : '#000000';

		// Title font size
		$settings['title_font_size'] = isset( $settings['title_font_size'] ) && $settings['title_font_size'] != '' ? esc_attr( $settings['title_font_size'] ) : '30';

		// title bold
		$settings['title_bold'] = ( isset( $settings['title_bold'] ) && $settings['title_bold'] != '' ) ? esc_attr($settings['title_bold']) : 'on';
		$title_bold = isset( $settings['title_bold'] ) && $settings['title_bold'] != 'off'? 'bold' : 'normal';

		// title italic
		$settings['title_italic'] = ( isset( $settings['title_italic'] ) && $settings['title_italic'] != '' ) ? esc_attr($settings['title_italic']) : 'off';
		$title_italic = isset( $settings['title_italic'] ) && $settings['title_italic'] != 'on'? 'normal' : 'italic';

		// title gap
		$settings['title_gap'] = (isset( $settings['title_gap'] ) && $settings['title_gap'] != '') ? esc_attr( $settings['title_gap'] ) : '5';

		// title position
		$settings['title_position'] = isset( $settings['title_position'] ) && $settings['title_position'] != '' ? esc_attr( $settings['title_position'] ) : 'left';

		// description color
		$settings['description_color'] = isset( $settings['description_color'] ) && $settings['description_color'] != '' ? esc_attr( $settings['description_color'] ) : '#4c4c4c';

		// description font size
		$settings['description_font_size'] = (isset( $settings['description_font_size'] ) && $settings['description_font_size'] != '') ? esc_attr( $settings['description_font_size'] ) : '16';
		
		// description Bold text
		$settings['description_bold'] = ( isset( $settings['description_bold'] ) && $settings['description_bold'] != '' ) ? esc_attr($settings['description_bold']) : 'off';
		$description_bold = isset( $settings['description_bold'] ) && $settings['description_bold'] != 'on'? 'normal' : 'bold';

		// desctiption italic text
		$settings['description_italic'] = ( isset( $settings['description_italic'] ) && $settings['description_italic'] != '' ) ? esc_attr($settings['description_italic']) : 'off';
		$description_italic = isset( $settings['description_italic'] ) && $settings['description_italic'] != 'on'? 'normal' : 'italic';

    	// description position
		$settings['description_position'] = isset( $settings['description_position'] ) && $settings['description_position'] != '' ? esc_attr( $settings['description_position'] ) : 'left';

		// Rotation degree
		$settings['rotation_degree'] = isset( $settings['rotation_degree'] ) && $settings['rotation_degree'] != '' ? esc_attr( $settings['rotation_degree'] ) : '0';

		// Is stacked
		$settings['is_stacked'] = ( isset( $settings['is_stacked'] ) && $settings['is_stacked'] != '' ) ? $settings['is_stacked'] : 'off';

		// Line width
		$settings['line_width'] = isset( $settings['line_width'] ) && $settings['line_width'] != '' ? esc_attr( $settings['line_width'] ) : '2';

		// Slice border color
		$settings['slice_border_color'] = isset( $settings['slice_border_color'] ) && $settings['slice_border_color'] != '' ? esc_attr( $settings['slice_border_color'] ) : '#ffffff';

		// Reverse categories
		$settings['reverse_categories'] = ( isset( $settings['reverse_categories'] ) && $settings['reverse_categories'] != '' ) ? $settings['reverse_categories'] : 'off';

		// Slice text
		$settings['slice_text'] = isset( $settings['slice_text'] ) && $settings['slice_text'] != '' ? esc_attr( $settings['slice_text'] ) : 'percentage';

		// Tooltip trigger
		$settings['tooltip_trigger'] = isset( $settings['tooltip_trigger'] ) && $settings['tooltip_trigger'] != '' ? esc_attr( $settings['tooltip_trigger'] ) : 'hover';
		
		// Tooltip text
		$settings['tooltip_text'] = isset( $settings['tooltip_text'] ) && $settings['tooltip_text'] != '' ? esc_attr( $settings['tooltip_text'] ) : 'both';

		// Multiple data format
		$settings['multiple_data_format'] = isset( $settings['multiple_data_format'] ) && $settings['multiple_data_format'] != '' ? esc_attr( $settings['multiple_data_format'] ) : 'auto';

		// Data grouping settings
		$settings['data_grouping_limit'] = isset( $settings['data_grouping_limit'] ) && $settings['data_grouping_limit'] != '' ? esc_attr( $settings['data_grouping_limit'] ) : '0.5';
		$settings['data_grouping_label'] = isset( $settings['data_grouping_label'] ) && $settings['data_grouping_label'] != '' ? esc_attr( $settings['data_grouping_label'] ) : 'Other';
		$settings['data_grouping_color'] = isset( $settings['data_grouping_color'] ) && $settings['data_grouping_color'] != '' ? esc_attr( $settings['data_grouping_color'] ) : '#ccc';

		// Focus target
		$settings['focus_target'] = isset( $settings['focus_target'] ) && $settings['focus_target'] != '' ? esc_attr( $settings['focus_target'] ) : 'datum';

		// Show color code
		$settings['show_color_code'] = ( isset( $settings['show_color_code'] ) && $settings['show_color_code'] != '' ) ? $settings['show_color_code'] : 'off';

		// Italic text
		$settings['tooltip_italic'] = ( isset( $settings['tooltip_italic'] ) && $settings['tooltip_italic'] != '' ) ? $settings['tooltip_italic'] : 'off';

		// Bold text
		$settings['tooltip_bold'] = isset( $settings['tooltip_bold'] ) && $settings['tooltip_bold'] != '' ? esc_attr( $settings['tooltip_bold'] ) : 'default';

		// Tooltip text color
		$settings['tooltip_text_color'] = isset( $settings['tooltip_text_color'] ) && $settings['tooltip_text_color'] != '' ? esc_attr( $settings['tooltip_text_color'] ) : '#000000';

		// Tooltip font size
		$settings['tooltip_font_size'] = isset( $settings['tooltip_font_size'] ) && intval($settings['tooltip_font_size']) > 0 ? esc_attr( $settings['tooltip_font_size'] ) : $settings['font_size'];

		// Legend position
		$settings['legend_position'] = isset( $settings['legend_position'] ) && $settings['legend_position'] != '' ? esc_attr( $settings['legend_position'] ) : 'right';

		// Legend alignment
		$settings['legend_alignment'] = isset( $settings['legend_alignment'] ) && $settings['legend_alignment'] != '' ? esc_attr( $settings['legend_alignment'] ) : 'start';

		// Legend font color
		$settings['legend_color'] = isset( $settings['legend_color'] ) && $settings['legend_color'] != '' ? esc_attr( $settings['legend_color'] ) : '#000000';

		// Legend font size
		$settings['legend_font_size'] = isset( $settings['legend_font_size'] ) && intval($settings['legend_font_size']) > 0 ? esc_attr( $settings['legend_font_size'] ) : $settings['font_size'];

		// Legend Italic text
		$settings['legend_italic'] = ( isset( $settings['legend_italic'] ) && $settings['legend_italic'] != '' ) ? $settings['legend_italic'] : 'off';

		// Legend Bold text
		$settings['legend_bold'] = ( isset( $settings['legend_bold'] ) && $settings['legend_bold'] != '' ) ? $settings['legend_bold'] : 'off';

		// Opacity
		$settings['opacity'] = isset( $settings['opacity'] ) && $settings['opacity'] != '' ? esc_attr( $settings['opacity'] ) : '1.0';
		
		// Group width
		$settings['group_width'] = isset( $settings['group_width'] ) && $settings['group_width'] != '' ? esc_attr( $settings['group_width'] ) : '61.8';
		$settings['group_width_format'] = isset( $settings['group_width_format'] ) && $settings['group_width_format'] != '' ? esc_attr( $settings['group_width_format'] ) : '%';

    	// Show chart description
		$show_description = isset( $settings['show_description'] ) && $settings['show_description'] != '' ? esc_attr( $settings['show_description'] ) : 'on';
		
		// Show chart title
		$show_title = isset( $settings['show_title'] ) && $settings['show_title'] != '' ? esc_attr( $settings['show_title'] ) : 'on';
		
		// Enable interactivity
		$settings['enable_interactivity'] = isset( $settings['enable_interactivity'] ) && $settings['enable_interactivity'] != '' ? esc_attr( $settings['enable_interactivity'] ) : 'on';

		// Maximized view
		$settings['maximized_view'] = ( isset( $settings['maximized_view'] ) && $settings['maximized_view'] != '' ) ? $settings['maximized_view'] : 'off';

		// Multiple data selection
		$settings['multiple_selection'] = ( isset( $settings['multiple_selection'] ) && $settings['multiple_selection'] != '' ) ? $settings['multiple_selection'] : 'off';

		// Point shape
		$settings['point_shape'] = isset( $settings['point_shape'] ) && $settings['point_shape'] != '' ? esc_attr( $settings['point_shape'] ) : 'circle';
		
		// Point size
		$settings['point_size'] = isset( $settings['point_size'] ) && $settings['point_size'] != '' ? absint(esc_attr( $settings['point_size'] )) : '0';
		
		// Crosshair trigger
		$settings['crosshair_trigger'] = isset( $settings['crosshair_trigger'] ) && $settings['crosshair_trigger'] != '' ? esc_attr( $settings['crosshair_trigger'] ) : 'none';
		
		// Crosshair orientation
		$settings['crosshair_orientation'] = isset( $settings['crosshair_orientation'] ) && $settings['crosshair_orientation'] != '' ? esc_attr( $settings['crosshair_orientation'] ) : 'both';
		
		// Crosshair opacity
		$settings['crosshair_opacity'] = isset( $settings['crosshair_opacity'] ) && $settings['crosshair_opacity'] != '' ? esc_attr( $settings['crosshair_opacity'] ) : '1.0';

		// Orientation
		$settings['orientation'] = ( isset( $settings['orientation'] ) && $settings['orientation'] != '' ) ? $settings['orientation'] : 'off';

		// Fill nulls
		$settings['fill_nulls'] = ( isset( $settings['fill_nulls'] ) && $settings['fill_nulls'] != '' ) ? $settings['fill_nulls'] : 'off';

		// Font size for org chart
		$settings['org_chart_font_size'] = isset( $settings['org_chart_font_size'] ) && $settings['org_chart_font_size'] != '' ? esc_attr( $settings['org_chart_font_size'] ) : 'medium';

		// Allow collapse
		$settings['allow_collapse'] = ( isset( $settings['allow_collapse'] ) && $settings['allow_collapse'] != '' ) ? $settings['allow_collapse'] : 'off';
		
		// Donut hole size
		$settings['donut_hole_size'] = isset( $settings['donut_hole_size'] ) && $settings['donut_hole_size'] != '' ? esc_attr( $settings['donut_hole_size'] ) : '0.4';

		// Org custom css class
		$settings['org_classname'] = isset( $settings['org_classname'] ) && $settings['org_classname'] != '' ? esc_attr( $settings['org_classname'] ) : '';
	
		$settings['org_node_background_color'] = isset( $settings['org_node_background_color'] ) && $settings['org_node_background_color'] != '' ? esc_attr( $settings['org_node_background_color'] ) : '#edf7ff';
		$settings['org_node_padding'] = isset( $settings['org_node_padding'] ) && $settings['org_node_padding'] != '' ? esc_attr( $settings['org_node_padding'] ) : '2';
		$settings['org_node_border_radius'] = isset( $settings['org_node_border_radius'] ) && $settings['org_node_border_radius'] != '' ? esc_attr( $settings['org_node_border_radius'] ) : '5';
		$settings['org_node_border_width'] = isset( $settings['org_node_border_width'] ) && $settings['org_node_border_width'] != '' ? esc_attr( $settings['org_node_border_width'] ) : '0';
		$settings['org_node_border_color'] = isset( $settings['org_node_border_color'] ) && $settings['org_node_border_color'] != '' ? esc_attr( $settings['org_node_border_color'] ) : '#b5d9ea';
		$settings['org_node_text_color'] = isset( $settings['org_node_text_color'] ) && $settings['org_node_text_color'] != '' ? esc_attr( $settings['org_node_text_color'] ) : '#000000';
		$settings['org_node_text_font_size'] = isset( $settings['org_node_text_font_size'] ) && $settings['org_node_text_font_size'] != '' ? esc_attr( $settings['org_node_text_font_size'] ) : '13';
		$settings['org_node_description_font_color'] = isset( $settings['org_node_description_font_color'] ) && $settings['org_node_description_font_color'] != '' ? esc_attr( $settings['org_node_description_font_color'] ) : '#ff0000';
		$settings['org_node_description_font_size'] = isset( $settings['org_node_description_font_size'] ) && $settings['org_node_description_font_size'] != '' ? esc_attr( $settings['org_node_description_font_size'] ) : '13';
		
		// Horizontal axis settings
		$settings['haxis_title'] = isset( $settings['haxis_title'] ) && $settings['haxis_title'] != '' ? esc_attr( $settings['haxis_title'] ) : '';
		$settings['haxis_label_font_size'] = isset( $settings['haxis_label_font_size'] ) && $settings['haxis_label_font_size'] != '' ? esc_attr( $settings['haxis_label_font_size'] ) : $settings['font_size'];
		$settings['haxis_label_color'] = isset( $settings['haxis_label_color'] ) && $settings['haxis_label_color'] != '' ? esc_attr( $settings['haxis_label_color'] ) : '#000000';
		$settings['haxis_text_position'] = isset( $settings['haxis_text_position'] ) && $settings['haxis_text_position'] != '' ? esc_attr( $settings['haxis_text_position'] ) : 'out';
		$settings['haxis_direction'] = ( isset( $settings['haxis_direction'] ) && $settings['haxis_direction'] != '' ) ? $settings['haxis_direction'] : '1';
		$settings['haxis_text_color'] = isset( $settings['haxis_text_color'] ) && $settings['haxis_text_color'] != '' ? esc_attr( $settings['haxis_text_color'] ) : '#000000';
		$settings['haxis_baseline_color'] = isset( $settings['haxis_baseline_color'] ) && $settings['haxis_baseline_color'] != '' ? esc_attr( $settings['haxis_baseline_color'] ) : '#000000';
		$settings['haxis_text_font_size'] = isset( $settings['haxis_text_font_size'] ) && $settings['haxis_text_font_size'] != '' ? absint(esc_attr( $settings['haxis_text_font_size'] )) : $settings['font_size'];
		$settings['haxis_slanted'] = isset( $settings['haxis_slanted'] ) && $settings['haxis_slanted'] != '' ? esc_attr( $settings['haxis_slanted'] ) : 'automatic';
		$settings['haxis_slanted_text_angle'] = isset( $settings['haxis_slanted_text_angle'] ) && $settings['haxis_slanted_text_angle'] != '' && $settings['haxis_slanted_text_angle'] != '0' ? esc_attr( $settings['haxis_slanted_text_angle'] ) : '30';
		$settings['haxis_show_text_every'] = isset( $settings['haxis_show_text_every'] ) && $settings['haxis_show_text_every'] != '' ? esc_attr( $settings['haxis_show_text_every'] ) : '0';
		$settings['haxis_format'] = isset( $settings['haxis_format'] ) && $settings['haxis_format'] != '' ? esc_attr( $settings['haxis_format'] ) : '';
		$settings['haxis_max_value'] = isset( $settings['haxis_max_value'] ) && $settings['haxis_max_value'] != '' ? esc_attr( $settings['haxis_max_value'] ) : null;
		$settings['haxis_min_value'] = isset( $settings['haxis_min_value'] ) && $settings['haxis_min_value'] != '' ? esc_attr( $settings['haxis_min_value'] ) : null;
		$settings['haxis_gridlines_count'] = isset( $settings['haxis_gridlines_count'] ) && $settings['haxis_gridlines_count'] != '' ? esc_attr( $settings['haxis_gridlines_count'] ) : -1;
		$settings['haxis_italic'] = ( isset( $settings['haxis_italic'] ) && $settings['haxis_italic'] != '' ) ? $settings['haxis_italic'] : 'off';
		$settings['haxis_bold'] = ( isset( $settings['haxis_bold'] ) && $settings['haxis_bold'] != '' ) ? $settings['haxis_bold'] : 'off';
		$settings['haxis_title_italic'] = ( isset( $settings['haxis_title_italic'] ) && $settings['haxis_title_italic'] != '' ) ? $settings['haxis_title_italic'] : 'off';
		$settings['haxis_title_bold'] = ( isset( $settings['haxis_title_bold'] ) && $settings['haxis_title_bold'] != '' ) ? $settings['haxis_title_bold'] : 'off';
		$settings['haxis_gridlines_color'] = isset( $settings['haxis_gridlines_color'] ) && $settings['haxis_gridlines_color'] != '' ? esc_attr( $settings['haxis_gridlines_color'] ) : '#cccccc';
		$settings['haxis_minor_gridlines_color'] = isset( $settings['haxis_minor_gridlines_color'] ) && $settings['haxis_minor_gridlines_color'] != '' ? esc_attr( $settings['haxis_minor_gridlines_color'] ) : $settings['haxis_gridlines_color'];

		// Vertical axis settings
		$settings['vaxis_title'] = isset( $settings['vaxis_title'] ) && $settings['vaxis_title'] != '' ? esc_attr( $settings['vaxis_title'] ) : '';
		$settings['vaxis_label_font_size'] = isset( $settings['vaxis_label_font_size'] ) && $settings['vaxis_label_font_size'] != '' ? esc_attr( $settings['vaxis_label_font_size'] ) : $settings['font_size'];
		$settings['vaxis_label_color'] = isset( $settings['vaxis_label_color'] ) && $settings['vaxis_label_color'] != '' ? esc_attr( $settings['vaxis_label_color'] ) : '#000000';
		$settings['vaxis_text_position'] = isset( $settings['vaxis_text_position'] ) && $settings['vaxis_text_position'] != '' ? esc_attr( $settings['vaxis_text_position'] ) : 'out';
		$settings['vaxis_direction'] = ( isset( $settings['vaxis_direction'] ) && $settings['vaxis_direction'] != '' ) ? $settings['vaxis_direction'] : '1';
		$settings['vaxis_text_color'] = isset( $settings['vaxis_text_color'] ) && $settings['vaxis_text_color'] != '' ? esc_attr( $settings['vaxis_text_color'] ) : '#000000';
		$settings['vaxis_baseline_color'] = isset( $settings['vaxis_baseline_color'] ) && $settings['vaxis_baseline_color'] != '' ? esc_attr( $settings['vaxis_baseline_color'] ) : '#000000';
		$settings['vaxis_text_font_size'] = isset( $settings['vaxis_text_font_size'] ) && $settings['vaxis_text_font_size'] != '' ? absint(esc_attr( $settings['vaxis_text_font_size'] )) : $settings['font_size'];
		$settings['vaxis_format'] = isset( $settings['vaxis_format'] ) && $settings['vaxis_format'] != '' ? esc_attr( $settings['vaxis_format'] ) : '';
		$settings['vaxis_max_value'] = isset( $settings['vaxis_max_value'] ) && $settings['vaxis_max_value'] != '' ? esc_attr( $settings['vaxis_max_value'] ) : null;
		$settings['vaxis_min_value'] = isset( $settings['vaxis_min_value'] ) && $settings['vaxis_min_value'] != '' ? esc_attr( $settings['vaxis_min_value'] ) : null;
		$settings['vaxis_gridlines_count'] = isset( $settings['vaxis_gridlines_count'] ) && $settings['vaxis_gridlines_count'] != '' ? esc_attr( $settings['vaxis_gridlines_count'] ) : -1;
		$settings['vaxis_italic'] = ( isset( $settings['vaxis_italic'] ) && $settings['vaxis_italic'] != '' ) ? $settings['vaxis_italic'] : 'off';
		$settings['vaxis_bold'] = ( isset( $settings['vaxis_bold'] ) && $settings['vaxis_bold'] != '' ) ? $settings['vaxis_bold'] : 'off';
		$settings['vaxis_title_italic'] = ( isset( $settings['vaxis_title_italic'] ) && $settings['vaxis_title_italic'] != '' ) ? $settings['vaxis_title_italic'] : 'off';
		$settings['vaxis_title_bold'] = ( isset( $settings['vaxis_title_bold'] ) && $settings['vaxis_title_bold'] != '' ) ? $settings['vaxis_title_bold'] : 'off';
		$settings['vaxis_gridlines_color'] = isset( $settings['vaxis_gridlines_color'] ) && $settings['vaxis_gridlines_color'] != '' ? esc_attr( $settings['vaxis_gridlines_color'] ) : '#cccccc';
		$settings['vaxis_minor_gridlines_color'] = isset( $settings['vaxis_minor_gridlines_color'] ) && $settings['vaxis_minor_gridlines_color'] != '' ? esc_attr( $settings['vaxis_minor_gridlines_color'] ) : $settings['vaxis_gridlines_color'];

		// Animation settings
		$settings['enable_animation'] = ( isset( $settings['enable_animation'] ) && $settings['enable_animation'] != '' ) ? $settings['enable_animation'] : 'off';
		$settings['animation_duration'] = isset( $settings['animation_duration'] ) && $settings['animation_duration'] != '' ? absint(esc_attr( $settings['animation_duration'] )) : '1000';
		$settings['animation_startup'] = ( isset( $settings['animation_startup'] ) && $settings['animation_startup'] != '' ) ? $settings['animation_startup'] : 'on';
		$settings['animation_easing'] = isset( $settings['animation_easing'] ) && $settings['animation_easing'] != '' ? esc_attr( $settings['animation_easing'] ) : 'linear';

		$settings['enable_img'] = ( isset( $settings['enable_img'] ) && $settings['enable_img'] != '' ) ? $settings['enable_img'] : 'off';

		$count_slices = (isset($chartData['source']) && !is_null($chartData['source']) && count($chartData['source']) > 0) ? count($chartData['source']) - 1 : 0;
        $count_series = (isset($chartData['source'][0]) && !is_null($chartData['source'][0]) && count($chartData['source'][0]) > 0) ? count($chartData['source'][0]) - 1 : 0;
		$count_rows = (isset($chartData['source']) && !is_null($chartData['source']) && count($chartData['source']) > 0) ? count(array_column($chartData['source'], 0)) - 1 : 0;

		// Slices settings
		$settings['slice_colors_default'] = $chart_default_colors;
		$settings['slice_color'] = isset( $settings['slice_color'] ) && $settings['slice_color'] != '' ? json_decode($settings['slice_color'], true) : $chart_default_colors;
		$settings['slice_offset'] = isset( $settings['slice_offset'] ) && $settings['slice_offset'] != '' ? json_decode($settings['slice_offset'], true) : array_fill(0, $count_slices, 0);
		$settings['slice_text_color'] = isset( $settings['slice_text_color'] ) && $settings['slice_text_color'] != '' ? json_decode($settings['slice_text_color'], true) : array_fill(0, $count_slices, '#ffffff');
		
		// Series settings
		$settings['series_colors_default'] = $chart_default_colors;
		$settings['series_color'] = isset( $settings['series_color'] ) && $settings['series_color'] != '' ? json_decode($settings['series_color'], true) : $chart_default_colors;
		$settings['series_visible_in_legend'] = isset( $settings['series_visible_in_legend'] ) && $settings['series_visible_in_legend'] != '' ? json_decode($settings['series_visible_in_legend'], true) : array_fill(0, $count_series, 'on');

		// Rows settings
		$settings['enable_row_settings'] = ( isset( $settings['enable_row_settings'] ) && $settings['enable_row_settings'] != '' ) ? $settings['enable_row_settings'] : 'on';
		
		$settings['rows_color'] = isset( $settings['rows_color'] ) && $settings['rows_color'] != '' ? json_decode($settings['rows_color'], true) : array_fill(0, $count_rows, '');
		$settings['rows_opacity'] = isset( $settings['rows_opacity'] ) && $settings['rows_opacity'] != '' ? json_decode($settings['rows_opacity'], true) : array_fill(0, $count_rows, 1.0);


		$data['chart_type'] = $chartData['source_chart_type'];
		$data['source'] = $chartData['source'];


		$data['options'] = $settings;

		$content = array();

		$content[] = "<div class='" . $this->html_class_prefix . "container " . $this->html_class_prefix . "container-" . $id . "' id='" . $this->html_class_prefix . "container" . $unique_id . "' data-id='" . $unique_id . "'>";

			$content[] = "<div class='" . $this->html_class_prefix . "header-container'>";

			if ($show_title == 'on') {
				$content[] = "<div class='" . $this->html_class_prefix . "charts-title " . $this->html_class_prefix . "charts-title" . $unique_id . "'>";
				$content[] = $chart_title;
				$content[] = "</div>";
			}
			
			if ($show_description == 'on') {
				$content[] = "<div class='" . $this->html_class_prefix . "charts-description " . $this->html_class_prefix . "charts-description" . $unique_id . "'>";
				$content[] = $chart_description;
				$content[] = "</div>";
			}
			
		$content[] = "</div>";

		$content[] = "<div class='" . $this->html_class_prefix . "charts-main-container " . $this->html_class_prefix . "charts-main-container" . $unique_id . "' id=" . $this->html_class_prefix . $chartData['source_chart_type'] . $unique_id . " data-type='". $chartData['source_chart_type'] ."'></div>";

			$content[] = "<div class='" . $this->html_class_prefix . "actions-container'>";

				$content[] = "<div class='" . $this->html_class_prefix . "export-buttons' data-id='". $id . "'>";
					if (isset($settings['enable_img']) && $settings['enable_img'] == 'on'){
						$content[] = "<button class='" . $this->html_class_prefix . "export-button-" . $unique_id . "' title='Download as a PNG' data-type='image' value='image'>Image</button>";

						$content[] = "<div style='display:none'>";
								$content[] = "<iframe src='' style='width:100%;height:600px;'></iframe>";
						$content[] = "</div>";
					}
				$content[] = "</div>";

			$content[] = "</div>";
			
		$content[] = "</div>";

		$content[] = "<style>";

		$content[] = "#" . $this->html_class_prefix . "container" . $unique_id . " div." . $this->html_class_prefix . "charts-main-container" . $unique_id . " {
							width: " . $chart_width . ";
							height: " . $chart_height . ";
							" . $position . ";
							border-radius: " . $settings['border_radius'] . "px;
						}";

		$content[] = "#" . $this->html_class_prefix . "container" . $unique_id . " div." . $this->html_class_prefix . "header-container {
							margin-bottom: " . $settings['title_gap'] . "px !important;
						}";

		$content[] = "#" . $this->html_class_prefix . "container" . $unique_id . " div." . $this->html_class_prefix . "header-container>." . $this->html_class_prefix . "charts-title" . $unique_id . " {
							color: " . $settings['title_color'] . ";
							font-size: " . $settings['title_font_size'] . "px;
							font-weight: " . $title_bold . ";
							font-style: " . $title_italic . ";
							text-align: " . $settings['title_position'] . ";
						}";

		$content[] = "#" . $this->html_class_prefix . "container" . $unique_id . " div." . $this->html_class_prefix . "header-container>." . $this->html_class_prefix . "charts-description" . $unique_id . " {
							color: " . $settings['description_color'] . ";
							font-size: " . $settings['description_font_size'] . "px; 
							font-weight: " . $description_bold . ";
							font-style: " . $description_italic . ";
							text-align: " . $settings['description_position'] . ";
						}";

		$content[] = "#" . $this->html_class_prefix . "container" . $unique_id . " div." . $this->html_class_prefix . "actions-container>div." . $this->html_class_prefix . "export-buttons .ays-chart-export-button-" . $unique_id . " {
							color: " . $settings['description_color'] . "B3" . " !important;
							font-size: " . $settings['description_font_size'] . "px !important; 
						}";
		$content[] = "#" . $this->html_class_prefix . "container" . $unique_id . " div." . $this->html_class_prefix . "actions-container>div." . $this->html_class_prefix . "export-buttons .ays-chart-export-button-" . $unique_id . ":hover {
							color: " . $settings['description_color'] ." !important;
							
						}";

		$content[] = "</style>";

		$this->data = $data;

		$content[] = $this->get_encoded_options();

		return implode( '', $content );
	}

	public function get_encoded_options () {
		$content = array();
		$data = $this->data;

		$content[] = '<script type="text/javascript">';

		$content[] = "
                if(typeof aysChartOptions === 'undefined'){
                    var aysChartOptions = [];
                }
                aysChartOptions['" . $this->unique_id . "']  = '" . base64_encode( json_encode( $data ) ) . "';";

		$content[] = '</script>';

		return implode( '', $content );
	}


}
