<?php
    if (isset($_GET['ays_chart_tab'])) {
        $ays_chart_tab = esc_attr($_GET['ays_chart_tab']);
    } else {
        $ays_chart_tab = 'tab1';
    }
    $action = isset( $_GET['action'] ) ? sanitize_text_field( $_GET['action'] ) : '';

    $id = (isset($_GET['id'])) ? absint( esc_attr($_GET['id']) ) : 0;

    $get_all_charts = CBActions()->get_charts('DESC');

    $does_id_exist = false;
    if (!empty($get_all_charts)) {
        $does_id_exist = in_array($id, array_column($get_all_charts, 'id'));
    }

    if (!$does_id_exist && $action == 'edit') {
        $url = remove_query_arg( array('action', 'id', 'status', 'ays_chart_tab') );
        wp_redirect( $url );
    }

    $html_name_prefix = 'ays_';
    $html_class_prefix = 'ays-chart-';

    $user_id = get_current_user_id();
    $user = get_userdata($user_id);

    $options = array(

    );

    $chart_default_colors = array('#3366cc','#dc3912','#ff9900','#109618', '#990099','#0099c6','#dd4477','#66aa00', '#b82e2e','#316395','#994499','#22aa99', '#aaaa11','#6633cc','#e67300','#8b0707', '#651067','#329262','#5574a6','#3b3eac', '#b77322','#16d620','#b91383','#f4359e', '#9c5935','#a9c413','#2a778d','#668d1c', '#bea413','#0c5922','#743411');

    $chart_types = array(
        'line_chart'   => "Line Chart",
        'bar_chart'    => "Bar Chart",
        'pie_chart'    => "Pie Chart",
        'column_chart' => "Column Chart",
        'org_chart'    => 'Org Chart',
        'donut_chart'  => 'Donut Chart',
    );

    $chart_types_names = array(
        'line_chart'   => "Line",
        'bar_chart'    => "Bar",
        'pie_chart'    => "Pie",
        'column_chart' => "Column",
        'org_chart'    => 'Org',
        'donut_chart'  => 'Donut',
    );

    $object = array(
        'title' => '',
        'description' => '',
        'type' => 'google-charts',
        'source_chart_type' => 'pie_chart',
        'source_type' => 'manual',
        'source' => '',
        'status' => 'published',
        'date_created' => current_time( 'mysql' ),
        'date_modified' => current_time( 'mysql' ),
        'options' => json_encode( $options ),
    );

    $chart_data = array(
        'chart' => $object,
        'source_type' => 'manual',
        'source' => '',
        'settings' => array(),
        'options' => array(),
    );

    $similar_charts = array(
        'pie_chart' => array(
            'pie_chart' => 'pie-chart.png',
            'donut_chart' => 'donut-chart.png',
        ),
        'donut_chart' => array(
            'pie_chart' => 'pie-chart.png',
            'donut_chart' => 'donut-chart.png',
        ),
        'bar_chart' => array(
            'bar_chart' => 'bar-chart.png',
            'column_chart' => 'column-chart.png',
            'line_chart' => 'line-chart.png',
        ),
        'line_chart' => array(
            'bar_chart' => 'bar-chart.png',
            'column_chart' => 'column-chart.png',
            'line_chart' => 'line-chart.png',
        ),
        'column_chart' => array(
            'bar_chart' => 'bar-chart.png',
            'column_chart' => 'column-chart.png',
            'line_chart' => 'line-chart.png',
        ),
    );

    $quiz_queries = array(
        'q1' => __("The number of times all the users have passed the particular quiz", "chart-builder"),
        'q2' => __("The number of times the current user has passed all quizzes daily", "chart-builder"),
        'q3' => __("The number of times the current user has passed the current quiz", "chart-builder"),
        'q4' => __("The average score of current user of each quiz", "chart-builder"),
        'q5' => __("The number of times the current user has passed each quiz overall", "chart-builder"),
        'q6' => __("The current user's scores of the chosen quiz (PRO)", "chart-builder"),
        'q7' => __("The average scores of current user of the quizzes for each quiz category (PRO)", "chart-builder"),
        'q8' => __("The number of times the user passed the chosen category quizzes (PRO)", "chart-builder"),
        'q9' => __("The number of people who got the particular score (PRO)", "chart-builder"),
        'q10' => __("The number of people based on the particular Interval score (PRO)", "chart-builder"),
        'q11' => __("The count of the logged-in users and guests for the last 7 days (PRO)", "chart-builder"),
        'q12' => __("The answers count for each question of the chosen quiz (PRO)", "chart-builder"),
        'q13' => __("The answers count of the chosen quiz/question category (PRO)", "chart-builder"),
        'q14' => __("The number of times all the users passed all the quizzes for the last 7 days (PRO)", "chart-builder")
    );

	$tooltip_trigger_options = array(
		"hover" => __("While hovering", "chart-builder"),
		"selection" => __("When selected", "chart-builder"),
		"none" => __("Disable", "chart-builder")
	);
    
    $tooltip_bold_options = array(
		"default" => __("Default", "chart-builder"),
		"true" => __("Enable", "chart-builder"),
		"false" => __("Disable", "chart-builder")
	);
    
    $tooltip_text_options = array(
		"value" => __("Value", "chart-builder"),
		"percentage" => __("Percent", "chart-builder"),
		"both" => __("Value & Percent", "chart-builder")
	);

    $focus_target_options = array(
		"datum" => __("Single data", "chart-builder"),
		"category" => __("Group data", "chart-builder"),
	);

    $legend_positions = array(
        "left" => __("Left of the chart", "chart-builder"),
		"right" => __("Right of the chart", "chart-builder"),
		"top" => __("Above the chart", "chart-builder"),
		"bottom" => __("Below the chart", "chart-builder"),
		"in" => __("Inside the chart", "chart-builder"),
		"labeled" => __("Labeled", "chart-builder"),
		"none" => __("Omit the legend", "chart-builder")
	);

    $legend_alignments = array(
        "start" => __("Start", "chart-builder"),
		"center" => __("Center", "chart-builder"),
		"end" => __("End", "chart-builder"),
	);

    $slice_texts = array(
        "percentage" => __("Percentage", "chart-builder"),
		"value" => __("Quantitative value", "chart-builder"),
		"label" => __("Name", "chart-builder"),
		"none" => __("Disable", "chart-builder")
	);
    
    $axes_text_positions = array(
        "in" => __("Inside the chart", "chart-builder"),
		"out" => __("Outside the chart", "chart-builder"),
		"none" => __("Hide", "chart-builder")
	);

    $haxis_slanted_options = array(
        "automatic" => __("Automatic", "chart-builder"),
		"true" => __("True", "chart-builder"),
		"false" => __("False", "chart-builder")
	);

    $title_positions = array(
        "left" => __("Left", "chart-builder"),
		"right" => __("Right", "chart-builder"),
		"center" => __("Center", "chart-builder")
	);
    
    $animation_easing_options = array(
        "linear" => __("Linear", "chart-builder"),
		"in" => __("Ease in", "chart-builder"),
		"out" => __("Ease out", "chart-builder"),
		"inAndOut" => __("Ease in and out", "chart-builder")
	);

    $multiple_data_format_options = array(
        "category" => __("Category", "chart-builder"),
		"series" => __("Series", "chart-builder"),
		"auto" => __("Auto", "chart-builder"),
		"none" => __("None", "chart-builder"),
	);

    $point_shape_options = array(
        "circle" => __("Circle", "chart-builder"),
		"triangle" => __("Triangle", "chart-builder"),
		"square" => __("Square", "chart-builder"),
		"diamond" => __("Diamond", "chart-builder"),
		"star" => __("Star", "chart-builder"),
		"polygon" => __("Polygon", "chart-builder"),
	);

    $crosshair_trigger_options = array(
        "focus" => __("Focus", "chart-builder"),
		"selection" => __("Selection", "chart-builder"),
		"both" => __("Focus and Selection", "chart-builder"),
		"none" => __("Disable", "chart-builder"),
	);
    
    $crosshair_orientation_options = array(
        "vertical" => __("Vertical", "chart-builder"),
		"horizontal" => __("Horizontal", "chart-builder"),
		"both" => __("Both", "chart-builder"),
	);

    $axes_format_options = array(
        "" => __("None", "chart-builder"),
		"decimal" => __("Decimal", "chart-builder"),
		"scientific" => __("Scientific", "chart-builder"),
		"currency" => __("Currency", "chart-builder"),
		"percent" => __("Percent", "chart-builder"),
		"short" => __("Short", "chart-builder"),
		"long" => __("Long", "chart-builder"),
	);

    $group_width_format_options = array(
        "%" => __("%", "chart-builder"),
		"px" => __("px", "chart-builder"),
	);

    $position_styles = array(
        "left" => 'margin-left:0',
        "right" => 'margin-right:0',
        "center" => 'margin:auto',
    );
    
    $org_chart_font_size_options = array(
        "small" => __("Small", "chart-builder"),
		"medium" => __("Medium", "chart-builder"),
		"large" => __("Large", "chart-builder")
	);

	$chart_source_default_data = CBActions()->get_charts_default_data();

    $heading = '';
    switch ($action) {
        case 'add':
            $heading = __( 'Add new chart', "chart-builder" );
            break;
        case 'edit':
            $heading = __( 'Edit chart', "chart-builder" );
            $object = $this->db_obj->get_item( $id );
            $chart_data = CBActions()->get_chart_data( $id );
            break;
    }

    if( isset( $_POST['ays_submit'] ) || isset( $_POST['ays_submit_top'] ) ) {
        $this->db_obj->add_or_edit_item( $id );
    }

    if( isset( $_POST['ays_apply'] ) || isset( $_POST['ays_apply_top'] ) ){
        $_POST['save_type'] = 'apply';
        $this->db_obj->add_or_edit_item( $id );
    }

    if( isset( $_POST['ays_save_new'] ) || isset( $_POST['ays_save_new_top'] ) ){
        $_POST['save_type'] = 'save_new';
        $this->db_obj->add_or_edit_item( $id );
    }


    $loader_iamge = '<span class="display_none ays_chart_loader_box"><img src="'. CHART_BUILDER_ADMIN_URL .'/images/loaders/loading.gif"></span>';

    /**
     * Data that need to get form @object variable
     *
     * @object is a data directly from database
     */

    // Date created
    $date_created = isset( $object['date_created'] ) && CBFunctions()->validateDate( $object['date_created'] ) ? esc_attr($object['date_created']) : current_time( 'mysql' );

    // Date modified
    $date_modified = current_time( 'mysql' );


    /**
     * Data that need to get form @chart_data variable
     */



    /**
     * Data that need to get form @chart variable
     */

    // Chart
    $chart = $chart_data['chart'];

    // Source type
    $source_type = stripslashes( $chart['source_type'] );

    // Chart type
    $source_chart_type = stripslashes( $chart['source_chart_type'] );

    if ($action == 'edit' && (!isset($chart_data['source']) || empty($chart_data['source']))) {
        $chart_source_default_data = ($source_chart_type == 'org_chart') ? $chart_source_default_data['orgTypeChart'] : $chart_source_default_data['commonTypeCharts'];
    }

    // Source
    $source = isset($chart_data['source']) && !empty($chart_data['source']) ? $chart_data['source'] : $chart_source_default_data;

    //Source Ordering for Org Chart Type
    $ordering = [];
    if (isset($chart_data['source']) && !empty($chart_data['source'])) {
        foreach($source as $key => $value) {
            if ($key != 0) {
                array_push($ordering, $key);
            }
        }
    } else {
        $ordering = [1, 2, 3, 4, 5];
    }

    // Title
    $title = stripcslashes( $chart['title'] );

    // Description
    $description = stripcslashes( $chart['description'] );

    // Status
    $status = stripslashes( $chart['status'] );

    // Quiz query
    $quiz_query = isset($chart_data['quiz_query']) ? stripslashes($chart_data['quiz_query']) : '';

    // Quiz id
    $quiz_id = isset($chart_data['quiz_id']) ? intval($chart_data['quiz_id']) : 0;

    // Change the author of the current chart
    $change_create_author = (isset($chart['author_id']) && $chart['author_id'] != '') ? absint( sanitize_text_field( $chart['author_id'] ) ) : $user_id;

    if ( $change_create_author  && $change_create_author > 0 ) {
        global $wpdb;
        $users_table = esc_sql( $wpdb->prefix . 'users' );
        $sql_users = "SELECT ID, display_name FROM {$users_table} WHERE ID = {$change_create_author}";

        $create_author_data = $wpdb->get_row($sql_users, "ARRAY_A");
    } else {
        $change_create_author = $user_id;
        $create_author_data = array(
            "ID" => $user_id,
            "display_name" => $user->data->display_name,
        );
    }

    /**
     * Data that need to get form @settings variable
     */

    // Settings
    $settings = $chart_data['settings'];

    // Width
	$settings['width'] = isset( $settings['width'] ) && $settings['width'] != '' ? esc_attr( $settings['width'] ) : '100';
    $settings['width_format'] = isset( $settings['width_format'] ) && $settings['width_format'] != '' ? esc_attr( $settings['width_format'] ) : '%';
	$settings['width_format_options'] = $group_width_format_options;

    // responsive width
	$settings['responsive_width'] = ( isset( $settings['responsive_width'] ) && $settings['responsive_width'] != '' ) ? $settings['responsive_width'] : 'off';
    $settings['responsive_width'] = isset( $settings['responsive_width'] ) && $settings['responsive_width'] == 'on' ? 'checked' : '';

    // position
    $settings['position'] = isset( $settings['position'] ) && $settings['position'] != '' ? esc_attr( $settings['position'] ) : 'center';
    $settings['position_styles'] = $position_styles;

    // Height
	$settings['height'] = isset( $settings['height'] ) && $settings['height'] != '' ? esc_attr( $settings['height'] ) : '400';
    $settings['height_format'] = isset( $settings['height_format'] ) && $settings['height_format'] != '' ? esc_attr( $settings['height_format'] ) : 'px';

    // Font size
	$settings['font_size'] = isset( $settings['font_size'] ) && $settings['font_size'] != '' ? esc_attr( $settings['font_size'] ) : '15';

	// Background color
	$settings['background_color'] = isset( $settings['background_color'] ) && $settings['background_color'] != '' ? esc_attr( $settings['background_color'] ) : '#ffffff';

    // Transparent background
	$settings['transparent_background'] = isset( $settings['transparent_background'] ) && $settings['transparent_background'] != '' ? esc_attr( $settings['transparent_background'] ) : 'off';
    $settings['transparent_background'] = isset( $settings['transparent_background'] ) && $settings['transparent_background'] == 'on' ? 'checked' : '';

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
	$settings['chart_left_margin'] = isset( $settings['chart_left_margin'] ) && $settings['chart_left_margin'] != '' ? esc_attr( $settings['chart_left_margin'] ) : '';
	$settings['chart_left_margin_for_js'] = isset( $settings['chart_left_margin'] ) && $settings['chart_left_margin'] != '' ? esc_attr( $settings['chart_left_margin'] ) : 'auto';

    // Chart Area right margin
	$settings['chart_right_margin'] = isset( $settings['chart_right_margin'] ) && $settings['chart_right_margin'] != '' ? esc_attr( $settings['chart_right_margin'] ) : '';
	$settings['chart_right_margin_for_js'] = isset( $settings['chart_right_margin'] ) && $settings['chart_right_margin'] != '' ? esc_attr( $settings['chart_right_margin'] ) : 'auto';

    // Chart Area top margin
    $settings['chart_top_margin'] = isset( $settings['chart_top_margin'] ) && $settings['chart_top_margin'] != '' ? esc_attr( $settings['chart_top_margin'] ) : '';
    $settings['chart_top_margin_for_js'] = isset( $settings['chart_top_margin'] ) && $settings['chart_top_margin'] != '' ? esc_attr( $settings['chart_top_margin'] ) : 'auto';
    
    // Chart Area bottom margin
	$settings['chart_bottom_margin'] = isset( $settings['chart_bottom_margin'] ) && $settings['chart_bottom_margin'] != '' ? esc_attr( $settings['chart_bottom_margin'] ) : '';
	$settings['chart_bottom_margin_for_js'] = isset( $settings['chart_bottom_margin'] ) && $settings['chart_bottom_margin'] != '' ? esc_attr( $settings['chart_bottom_margin'] ) : 'auto';

	// Title color
	$settings['title_color'] = isset( $settings['title_color'] ) && $settings['title_color'] != '' ? esc_attr( $settings['title_color'] ) : '#000000';

    // Title font size
	$settings['title_font_size'] = isset( $settings['title_font_size'] ) && $settings['title_font_size'] != '' ? esc_attr( $settings['title_font_size'] ) : '30';

    // Title Bold text
	$settings['title_bold'] = ( isset( $settings['title_bold'] ) && $settings['title_bold'] != '' ) ? esc_attr($settings['title_bold']) : 'on';
	$settings['title_bold'] = isset( $settings['title_bold'] ) && $settings['title_bold'] == 'on' ? 'checked' : '';

    // Title italic text
	$settings['title_italic'] = ( isset( $settings['title_italic'] ) && $settings['title_italic'] != '' ) ? esc_attr($settings['title_italic']) : 'off';
	$settings['title_italic'] = isset( $settings['title_italic'] ) && $settings['title_italic'] == 'on' ? 'checked' : '';

    // Title gap
	$settings['title_gap'] = isset( $settings['title_gap'] ) && $settings['title_gap'] != '' ? esc_attr( $settings['title_gap'] ) : '5';

    // Title position
    $settings['title_position'] = isset( $settings['title_position'] ) && $settings['title_position'] != '' ? esc_attr( $settings['title_position'] ) : 'left';
	$settings['title_positions'] = $title_positions;

    // description color
	$settings['description_color'] = isset( $settings['description_color'] ) && $settings['description_color'] != '' ? esc_attr( $settings['description_color'] ) : '#4c4c4c';
    
    // description font size
	$settings['description_font_size'] = isset( $settings['description_font_size'] ) && $settings['description_font_size'] != '' ? esc_attr( $settings['description_font_size'] ) : '16';

    // description Bold text
	$settings['description_bold'] = ( isset( $settings['description_bold'] ) && $settings['description_bold'] != '' ) ? esc_attr($settings['description_bold']) : 'off';
	$settings['description_bold'] = isset( $settings['description_bold'] ) && $settings['description_bold'] == 'on' ? 'checked' : '';

    // description italic text
	$settings['description_italic'] = ( isset( $settings['description_italic'] ) && $settings['description_italic'] != '' ) ? esc_attr($settings['description_italic']) : 'off';
	$settings['description_italic'] = isset( $settings['description_italic'] ) && $settings['description_italic'] == 'on' ? 'checked' : '';

    // description position
    $settings['description_position'] = isset( $settings['description_position'] ) && $settings['description_position'] != '' ? esc_attr( $settings['description_position'] ) : 'left';

    // Rotation degree
	$settings['rotation_degree'] = isset( $settings['rotation_degree'] ) && $settings['rotation_degree'] != '' ? esc_attr( $settings['rotation_degree'] ) : '0';

    // Is stacked
    $settings['is_stacked'] = ( isset( $settings['is_stacked'] ) && $settings['is_stacked'] != '' ) ? $settings['is_stacked'] : 'off';
    $settings['is_stacked'] = isset( $settings['is_stacked'] ) && $settings['is_stacked'] == 'on' ? 'checked' : '';

    // Line width
	$settings['line_width'] = isset( $settings['line_width'] ) && $settings['line_width'] != '' ? esc_attr( $settings['line_width'] ) : '2';

    // Slice border color
	$settings['slice_border_color'] = isset( $settings['slice_border_color'] ) && $settings['slice_border_color'] != '' ? esc_attr( $settings['slice_border_color'] ) : '#ffffff';

    // Reverse categories
    $settings['reverse_categories'] = ( isset( $settings['reverse_categories'] ) && $settings['reverse_categories'] != '' ) ? $settings['reverse_categories'] : 'off';
    $settings['reverse_categories'] = isset( $settings['reverse_categories'] ) && $settings['reverse_categories'] == 'on' ? 'checked' : '';

    // Slice text
    $settings['slice_text'] = isset( $settings['slice_text'] ) && $settings['slice_text'] != '' ? esc_attr( $settings['slice_text'] ) : 'percentage';
	$settings['slice_texts'] = $slice_texts;

	// Tooltip trigger
	$settings['tooltip_trigger'] = isset( $settings['tooltip_trigger'] ) && $settings['tooltip_trigger'] != '' ? esc_attr( $settings['tooltip_trigger'] ) : 'hover';
	$settings['tooltip_trigger_options'] = $tooltip_trigger_options;
    
    // Tooltip text
	$settings['tooltip_text'] = isset( $settings['tooltip_text'] ) && $settings['tooltip_text'] != '' ? esc_attr( $settings['tooltip_text'] ) : 'both';
	$settings['tooltip_text_options'] = $tooltip_text_options;

    // Multiple data format
    $settings['multiple_data_format'] = isset( $settings['multiple_data_format'] ) && $settings['multiple_data_format'] != '' ? esc_attr( $settings['multiple_data_format'] ) : 'auto';
    $settings['multiple_data_format_options'] = $multiple_data_format_options;

    // Data grouping settings
	$settings['data_grouping_limit'] = isset( $settings['data_grouping_limit'] ) && $settings['data_grouping_limit'] != '' ? esc_attr( $settings['data_grouping_limit'] ) : '0.5';
	$settings['data_grouping_label'] = isset( $settings['data_grouping_label'] ) && $settings['data_grouping_label'] != '' ? esc_attr( $settings['data_grouping_label'] ) : 'Other';
	$settings['data_grouping_color'] = isset( $settings['data_grouping_color'] ) && $settings['data_grouping_color'] != '' ? esc_attr( $settings['data_grouping_color'] ) : '#ccc';

    // Focus target
    $settings['focus_target'] = isset( $settings['focus_target'] ) && $settings['focus_target'] != '' ? esc_attr( $settings['focus_target'] ) : 'datum';
    $settings['focus_target_options'] = $focus_target_options;

	// Show color code
	$settings['show_color_code'] = ( isset( $settings['show_color_code'] ) && $settings['show_color_code'] != '' ) ? $settings['show_color_code'] : 'off';
	$settings['show_color_code'] = isset( $settings['show_color_code'] ) && $settings['show_color_code'] == 'on' ? 'checked' : '';

    // Italic text
	$settings['tooltip_italic'] = ( isset( $settings['tooltip_italic'] ) && $settings['tooltip_italic'] != '' ) ? $settings['tooltip_italic'] : 'off';
	$settings['tooltip_italic'] = isset( $settings['tooltip_italic'] ) && $settings['tooltip_italic'] == 'on' ? 'checked' : '';

    // Bold text
    $settings['tooltip_bold'] = isset( $settings['tooltip_bold'] ) && $settings['tooltip_bold'] != '' ? esc_attr( $settings['tooltip_bold'] ) : 'default';
    $settings['tooltip_bold_options'] = $tooltip_bold_options;

    // Tooltip text color
    $settings['tooltip_text_color'] = isset( $settings['tooltip_text_color'] ) && $settings['tooltip_text_color'] != '' ? esc_attr( $settings['tooltip_text_color'] ) : '#000000';

    // Tooltip font size
    $settings['tooltip_font_size'] = isset( $settings['tooltip_font_size'] ) && intval($settings['tooltip_font_size']) > 0 ? esc_attr( $settings['tooltip_font_size'] ) : $settings['font_size'];

    // Legend position
    $settings['legend_position'] = isset( $settings['legend_position'] ) && $settings['legend_position'] != '' ? esc_attr( $settings['legend_position'] ) : 'right';
	$settings['legend_positions'] = $legend_positions;

    // Legend alignment
    $settings['legend_alignment'] = isset( $settings['legend_alignment'] ) && $settings['legend_alignment'] != '' ? esc_attr( $settings['legend_alignment'] ) : 'start';
	$settings['legend_alignments'] = $legend_alignments;

    // Legend font color
	$settings['legend_color'] = isset( $settings['legend_color'] ) && $settings['legend_color'] != '' ? esc_attr( $settings['legend_color'] ) : '#000000';

    // Legend font size
    $settings['legend_font_size'] = isset( $settings['legend_font_size'] ) && intval($settings['legend_font_size']) > 0 ? esc_attr( $settings['legend_font_size'] ) : $settings['font_size'];

    // Legend Italic text
	$settings['legend_italic'] = ( isset( $settings['legend_italic'] ) && $settings['legend_italic'] != '' ) ? $settings['legend_italic'] : 'off';
	$settings['legend_italic'] = isset( $settings['legend_italic'] ) && $settings['legend_italic'] == 'on' ? 'checked' : '';

    // Legend Bold text
	$settings['legend_bold'] = ( isset( $settings['legend_bold'] ) && $settings['legend_bold'] != '' ) ? $settings['legend_bold'] : 'off';
	$settings['legend_bold'] = isset( $settings['legend_bold'] ) && $settings['legend_bold'] == 'on' ? 'checked' : '';

    // Opacity
	$settings['opacity'] = isset( $settings['opacity'] ) && $settings['opacity'] != '' ? esc_attr( $settings['opacity'] ) : '1.0';
    
    // Group width
	$settings['group_width'] = isset( $settings['group_width'] ) && $settings['group_width'] != '' ? esc_attr( $settings['group_width'] ) : '61.8';
	$settings['group_width_format'] = isset( $settings['group_width_format'] ) && $settings['group_width_format'] != '' ? esc_attr( $settings['group_width_format'] ) : '%';
	$settings['group_width_format_options'] = $group_width_format_options;

    // Show chart description
    if (!isset($settings['show_description'])) {
        $settings['show_description'] = 'checked';
    } else {
        $settings['show_description'] = ( $settings['show_description'] != '' ) ? $settings['show_description'] : 'off';
	    $settings['show_description'] = isset( $settings['show_description'] ) && $settings['show_description'] == 'on' ? 'checked' : '';
    }
    
    // Show chart title
    if (!isset($settings['show_title'])) {
        $settings['show_title'] = 'checked';
    } else {
        $settings['show_title'] = ( $settings['show_title'] != '' ) ? $settings['show_title'] : 'off';
	    $settings['show_title'] = isset( $settings['show_title'] ) && $settings['show_title'] == 'on' ? 'checked' : '';
    }
    
    // Enable interactivity
    if (!isset($settings['enable_interactivity'])) {
        $settings['enable_interactivity'] = 'checked';
    } else {
        $settings['enable_interactivity'] = ( $settings['enable_interactivity'] != '' ) ? $settings['enable_interactivity'] : 'off';
	    $settings['enable_interactivity'] = isset( $settings['enable_interactivity'] ) && $settings['enable_interactivity'] == 'on' ? 'checked' : '';
    }

    // Maximized view
	$settings['maximized_view'] = ( isset( $settings['maximized_view'] ) && $settings['maximized_view'] != '' ) ? $settings['maximized_view'] : 'off';
	$settings['maximized_view'] = isset( $settings['maximized_view'] ) && $settings['maximized_view'] == 'on' ? 'checked' : '';

    // Multiple data selection
    $settings['multiple_selection'] = ( isset( $settings['multiple_selection'] ) && $settings['multiple_selection'] != '' ) ? $settings['multiple_selection'] : 'off';
    $settings['multiple_selection'] = isset( $settings['multiple_selection'] ) && $settings['multiple_selection'] == 'on' ? 'checked' : '';

    // Point shape
    $settings['point_shape'] = isset( $settings['point_shape'] ) && $settings['point_shape'] != '' ? esc_attr( $settings['point_shape'] ) : 'circle';
    $settings['point_shape_options'] = $point_shape_options;
	
    // Point size
    $settings['point_size'] = isset( $settings['point_size'] ) && $settings['point_size'] != '' ? absint(esc_attr( $settings['point_size'] )) : '0';

    // Crosshair trigger
    $settings['crosshair_trigger'] = isset( $settings['crosshair_trigger'] ) && $settings['crosshair_trigger'] != '' ? esc_attr( $settings['crosshair_trigger'] ) : 'none';
    $settings['crosshair_trigger_options'] = $crosshair_trigger_options;
    
    // Crosshair orientation
    $settings['crosshair_orientation'] = isset( $settings['crosshair_orientation'] ) && $settings['crosshair_orientation'] != '' ? esc_attr( $settings['crosshair_orientation'] ) : 'both';
    $settings['crosshair_orientation_options'] = $crosshair_orientation_options;

    // Crosshair opacity
	$settings['crosshair_opacity'] = isset( $settings['crosshair_opacity'] ) && $settings['crosshair_opacity'] != '' ? esc_attr( $settings['crosshair_opacity'] ) : '1.0';

    // Orientation
    $settings['orientation'] = ( isset( $settings['orientation'] ) && $settings['orientation'] != '' ) ? $settings['orientation'] : 'off';
    $settings['orientation'] = isset( $settings['orientation'] ) && $settings['orientation'] == 'on' ? 'checked' : '';

    // Fill nulls
    $settings['fill_nulls'] = ( isset( $settings['fill_nulls'] ) && $settings['fill_nulls'] != '' ) ? $settings['fill_nulls'] : 'off';
    $settings['fill_nulls'] = isset( $settings['fill_nulls'] ) && $settings['fill_nulls'] == 'on' ? 'checked' : '';

    // Font size for org chart
    $settings['org_chart_font_size'] = isset( $settings['org_chart_font_size'] ) && $settings['org_chart_font_size'] != '' ? esc_attr( $settings['org_chart_font_size'] ) : 'medium';
    $settings['org_chart_font_size_options'] = $org_chart_font_size_options;
    
    // Donut hole size
    $settings['donut_hole_size'] = isset( $settings['donut_hole_size'] ) && $settings['donut_hole_size'] != '' ? esc_attr( $settings['donut_hole_size'] ) : '0.4';

    // Allow collapse
    $settings['allow_collapse'] = ( isset( $settings['allow_collapse'] ) && $settings['allow_collapse'] != '' ) ? $settings['allow_collapse'] : 'off';
    $settings['allow_collapse'] = isset( $settings['allow_collapse'] ) && $settings['allow_collapse'] == 'on' ? 'checked' : '';

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

    $settings['axes_text_positions'] = $axes_text_positions;
    $settings['axes_format_options'] = $axes_format_options;
    // Horizontal axis settings
    $settings['haxis_title'] = isset( $settings['haxis_title'] ) && $settings['haxis_title'] != '' ? esc_attr( $settings['haxis_title'] ) : '';
    $settings['haxis_label_font_size'] = isset( $settings['haxis_label_font_size'] ) && $settings['haxis_label_font_size'] != '' ? esc_attr( $settings['haxis_label_font_size'] ) : $settings['font_size'];
    $settings['haxis_label_color'] = isset( $settings['haxis_label_color'] ) && $settings['haxis_label_color'] != '' ? esc_attr( $settings['haxis_label_color'] ) : '#000000';
    $settings['haxis_text_position'] = isset( $settings['haxis_text_position'] ) && $settings['haxis_text_position'] != '' ? esc_attr( $settings['haxis_text_position'] ) : 'out';
	$settings['haxis_direction'] = ( isset( $settings['haxis_direction'] ) && $settings['haxis_direction'] != '' ) ? $settings['haxis_direction'] : '1';
	$settings['haxis_direction'] = isset( $settings['haxis_direction'] ) && $settings['haxis_direction'] == '-1' ? 'checked' : '';
    $settings['haxis_text_color'] = isset( $settings['haxis_text_color'] ) && $settings['haxis_text_color'] != '' ? esc_attr( $settings['haxis_text_color'] ) : '#000000';
    $settings['haxis_baseline_color'] = isset( $settings['haxis_baseline_color'] ) && $settings['haxis_baseline_color'] != '' ? esc_attr( $settings['haxis_baseline_color'] ) : '#000000';
    $settings['haxis_text_font_size'] = isset( $settings['haxis_text_font_size'] ) && $settings['haxis_text_font_size'] != '' ? absint(esc_attr( $settings['haxis_text_font_size'] )) : $settings['font_size'];
    $settings['haxis_slanted_options'] = $haxis_slanted_options;
    $settings['haxis_slanted'] = isset( $settings['haxis_slanted'] ) && $settings['haxis_slanted'] != '' ? esc_attr( $settings['haxis_slanted'] ) : 'automatic';
    $settings['haxis_slanted_text_angle'] = isset( $settings['haxis_slanted_text_angle'] ) && $settings['haxis_slanted_text_angle'] != '' && $settings['haxis_slanted_text_angle'] != '0' ? esc_attr( $settings['haxis_slanted_text_angle'] ) : '30';
    $settings['haxis_show_text_every'] = isset( $settings['haxis_show_text_every'] ) && $settings['haxis_show_text_every'] != '' ? esc_attr( $settings['haxis_show_text_every'] ) : '0';
    $settings['haxis_format'] = isset( $settings['haxis_format'] ) && $settings['haxis_format'] != '' ? esc_attr( $settings['haxis_format'] ) : '';
    $settings['haxis_max_value'] = isset( $settings['haxis_max_value'] ) && $settings['haxis_max_value'] != '' ? esc_attr( $settings['haxis_max_value'] ) : null;
    $settings['haxis_min_value'] = isset( $settings['haxis_min_value'] ) && $settings['haxis_min_value'] != '' ? esc_attr( $settings['haxis_min_value'] ) : null;
	$settings['haxis_gridlines_count'] = isset( $settings['haxis_gridlines_count'] ) && $settings['haxis_gridlines_count'] != '' ? esc_attr( $settings['haxis_gridlines_count'] ) : -1;$settings['haxis_italic'] = ( isset( $settings['haxis_italic'] ) && $settings['haxis_italic'] != '' ) ? $settings['haxis_italic'] : 'off';
	$settings['haxis_italic'] = isset( $settings['haxis_italic'] ) && $settings['haxis_italic'] == 'on' ? 'checked' : '';
	$settings['haxis_bold'] = ( isset( $settings['haxis_bold'] ) && $settings['haxis_bold'] != '' ) ? $settings['haxis_bold'] : 'off';
	$settings['haxis_bold'] = isset( $settings['haxis_bold'] ) && $settings['haxis_bold'] == 'on' ? 'checked' : '';
	$settings['haxis_title_italic'] = ( isset( $settings['haxis_title_italic'] ) && $settings['haxis_title_italic'] != '' ) ? $settings['haxis_title_italic'] : 'off';
	$settings['haxis_title_italic'] = isset( $settings['haxis_title_italic'] ) && $settings['haxis_title_italic'] == 'on' ? 'checked' : '';
	$settings['haxis_title_bold'] = ( isset( $settings['haxis_title_bold'] ) && $settings['haxis_title_bold'] != '' ) ? $settings['haxis_title_bold'] : 'off';
	$settings['haxis_title_bold'] = isset( $settings['haxis_title_bold'] ) && $settings['haxis_title_bold'] == 'on' ? 'checked' : '';
    $settings['haxis_gridlines_color'] = isset( $settings['haxis_gridlines_color'] ) && $settings['haxis_gridlines_color'] != '' ? esc_attr( $settings['haxis_gridlines_color'] ) : '#cccccc';
    $settings['haxis_minor_gridlines_color'] = isset( $settings['haxis_minor_gridlines_color'] ) && $settings['haxis_minor_gridlines_color'] != '' ? esc_attr( $settings['haxis_minor_gridlines_color'] ) : $settings['haxis_gridlines_color'];

    // Vertical axis settings
    $settings['vaxis_title'] = isset( $settings['vaxis_title'] ) && $settings['vaxis_title'] != '' ? esc_attr( $settings['vaxis_title'] ) : '';
    $settings['vaxis_label_font_size'] = isset( $settings['vaxis_label_font_size'] ) && $settings['vaxis_label_font_size'] != '' ? esc_attr( $settings['vaxis_label_font_size'] ) : $settings['font_size'];
    $settings['vaxis_label_color'] = isset( $settings['vaxis_label_color'] ) && $settings['vaxis_label_color'] != '' ? esc_attr( $settings['vaxis_label_color'] ) : '#000000';
    $settings['vaxis_text_position'] = isset( $settings['vaxis_text_position'] ) && $settings['vaxis_text_position'] != '' ? esc_attr( $settings['vaxis_text_position'] ) : 'out';
	$settings['vaxis_direction'] = ( isset( $settings['vaxis_direction'] ) && $settings['vaxis_direction'] != '' ) ? $settings['vaxis_direction'] : '1';
	$settings['vaxis_direction'] = isset( $settings['vaxis_direction'] ) && $settings['vaxis_direction'] == '-1' ? 'checked' : '';
    $settings['vaxis_text_color'] = isset( $settings['vaxis_text_color'] ) && $settings['vaxis_text_color'] != '' ? esc_attr( $settings['vaxis_text_color'] ) : '#000000';
    $settings['vaxis_baseline_color'] = isset( $settings['vaxis_baseline_color'] ) && $settings['vaxis_baseline_color'] != '' ? esc_attr( $settings['vaxis_baseline_color'] ) : '#000000';
    $settings['vaxis_text_font_size'] = isset( $settings['vaxis_text_font_size'] ) && $settings['vaxis_text_font_size'] != '' ? absint(esc_attr( $settings['vaxis_text_font_size'] )) : $settings['font_size'];
    $settings['vaxis_format'] = isset( $settings['vaxis_format'] ) && $settings['vaxis_format'] != '' ? esc_attr( $settings['vaxis_format'] ) : '';
    $settings['vaxis_max_value'] = isset( $settings['vaxis_max_value'] ) && $settings['vaxis_max_value'] != '' ? esc_attr( $settings['vaxis_max_value'] ) : null;
    $settings['vaxis_min_value'] = isset( $settings['vaxis_min_value'] ) && $settings['vaxis_min_value'] != '' ? esc_attr( $settings['vaxis_min_value'] ) : null;
    $settings['vaxis_gridlines_count'] = isset( $settings['vaxis_gridlines_count'] ) && $settings['vaxis_gridlines_count'] != '' ? esc_attr( $settings['vaxis_gridlines_count'] ) : -1;
    $settings['vaxis_italic'] = ( isset( $settings['vaxis_italic'] ) && $settings['vaxis_italic'] != '' ) ? $settings['vaxis_italic'] : 'off';
	$settings['vaxis_italic'] = isset( $settings['vaxis_italic'] ) && $settings['vaxis_italic'] == 'on' ? 'checked' : '';
	$settings['vaxis_bold'] = ( isset( $settings['vaxis_bold'] ) && $settings['vaxis_bold'] != '' ) ? $settings['vaxis_bold'] : 'off';
	$settings['vaxis_bold'] = isset( $settings['vaxis_bold'] ) && $settings['vaxis_bold'] == 'on' ? 'checked' : '';
    $settings['vaxis_title_italic'] = ( isset( $settings['vaxis_title_italic'] ) && $settings['vaxis_title_italic'] != '' ) ? $settings['vaxis_title_italic'] : 'off';
	$settings['vaxis_title_italic'] = isset( $settings['vaxis_title_italic'] ) && $settings['vaxis_title_italic'] == 'on' ? 'checked' : '';
	$settings['vaxis_title_bold'] = ( isset( $settings['vaxis_title_bold'] ) && $settings['vaxis_title_bold'] != '' ) ? $settings['vaxis_title_bold'] : 'off';
	$settings['vaxis_title_bold'] = isset( $settings['vaxis_title_bold'] ) && $settings['vaxis_title_bold'] == 'on' ? 'checked' : '';
    $settings['vaxis_gridlines_color'] = isset( $settings['vaxis_gridlines_color'] ) && $settings['vaxis_gridlines_color'] != '' ? esc_attr( $settings['vaxis_gridlines_color'] ) : '#cccccc';
    $settings['vaxis_minor_gridlines_color'] = isset( $settings['vaxis_minor_gridlines_color'] ) && $settings['vaxis_minor_gridlines_color'] != '' ? esc_attr( $settings['vaxis_minor_gridlines_color'] ) : $settings['vaxis_gridlines_color'];

    // Animation settings
    $settings['enable_animation'] = ( isset( $settings['enable_animation'] ) && $settings['enable_animation'] != '' ) ? $settings['enable_animation'] : 'off';
	$settings['enable_animation'] = isset( $settings['enable_animation'] ) && $settings['enable_animation'] == 'on' ? 'checked' : '';
    $settings['animation_duration'] = isset( $settings['animation_duration'] ) && $settings['animation_duration'] != '' ? absint(esc_attr( $settings['animation_duration'] )) : '1000';
    $settings['animation_startup'] = ( isset( $settings['animation_startup'] ) && $settings['animation_startup'] != '' ) ? $settings['animation_startup'] : 'on';
	$settings['animation_startup'] = isset( $settings['animation_startup'] ) && $settings['animation_startup'] == 'on' ? 'checked' : '';
    $settings['animation_easing_options'] = $animation_easing_options;
    $settings['animation_easing'] = isset( $settings['animation_easing'] ) && $settings['animation_easing'] != '' ? esc_attr( $settings['animation_easing'] ) : 'linear';

    $settings['enable_img'] = ( isset( $settings['enable_img'] ) && $settings['enable_img'] != '' ) ? $settings['enable_img'] : 'off';
	$settings['enable_img'] = isset( $settings['enable_img'] ) && $settings['enable_img'] == 'on' ? 'checked' : '';

    $count_slices = (isset($source) && !is_null($source) && count($source) > 0) ? count($source) - 1 : 0;
    $count_series = (isset($source[0]) && !is_null($source[0]) && count($source[0]) > 0) ? count($source[0]) - 1 : 0;
    $count_rows = (isset($source) && !is_null($source) && count($source) > 0) ? count(array_column($source, 0)) - 1 : 0;

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
	$settings['enable_row_settings'] = isset( $settings['enable_row_settings'] ) && $settings['enable_row_settings'] == 'on' ? 'checked' : '';

    $settings['rows_color'] = isset( $settings['rows_color'] ) && $settings['rows_color'] != '' ? json_decode($settings['rows_color'], true) : array_fill(0, $count_rows, '');
    $settings['rows_opacity'] = isset( $settings['rows_opacity'] ) && $settings['rows_opacity'] != '' ? json_decode($settings['rows_opacity'], true) : array_fill(0, $count_rows, 1.0);

/**
     * Data that need to get form @options variable
     */

    // Options
    $options = $object['options'];

    // Send data to JS
    $source_data_for_js = array(
        'source' => $source,
        'source_ordering' => $ordering,
        'action' => $action,
        'settings' => $settings,
        'chartType' => $source_chart_type,
        'chartTypesNames' => $chart_types_names,
        'chartTypesConnections' => $similar_charts,
        'imagesUrl' => CHART_BUILDER_ADMIN_URL.'/images',
        'addManualDataRow' => CHART_BUILDER_ADMIN_URL . '/images/icons/add-circle-outline.svg',
        // 'removeManualDataRow' => CHART_BUILDER_ADMIN_URL . '/images/icons/xmark.svg',
    );
    wp_localize_script($this->plugin_name, "ChartBuilderSourceData" , $source_data_for_js);