<div class="<?php echo esc_attr($html_class_prefix); ?>layer_container">
    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_content">
        <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box">
            <div class="<?php echo esc_attr($html_class_prefix); ?>close-type">
                <a href="?page=chart-builder">
                    <img src="<?php echo esc_url(CHART_BUILDER_ADMIN_URL); ?>/images/icons/cross.png">
                </a>
            </div>
            <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_blocks">
                <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block">
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="line_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/line-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_separate_title">
                        <span><?php echo __('Line Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="http://bit.ly/3P2ZDmy" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_each_block">
                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_layer_block">
                        <label class='<?php echo esc_attr($html_class_prefix); ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_custom_html" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?php echo esc_attr($html_class_prefix); ?>choose-source" value="bar_chart">
                            <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item">
                                <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_logo">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_logo_overlay">
                                        <img class="<?php echo esc_attr($html_class_prefix); ?>layer_icons" src="<?php echo esc_url(CHART_BUILDER_ADMIN_URL); ?>/images/icons/bar-chart-logo.png">
                                    </div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_checked">
                                        <img src="<?php echo esc_url(CHART_BUILDER_ADMIN_URL); ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_separate_title">
                        <span><?php echo  __('Bar Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="http://bit.ly/3iuLxxV" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_each_block">
                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_layer_block">
                        <label class='<?php echo esc_attr($html_class_prefix); ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_subscription" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?php echo esc_attr($html_class_prefix); ?>choose-source" value="pie_chart" >
                            <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item">
                                <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_logo">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_logo_overlay">
                                        <img class="<?php echo esc_attr($html_class_prefix); ?>layer_icons" src="<?php echo esc_url(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pie-chart-logo.png">
                                    </div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_checked">
                                        <img src="<?php echo esc_url(CHART_BUILDER_ADMIN_URL); ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_separate_title">
                        <span><?php echo  __('Pie Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="http://bit.ly/3BgvACe" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_each_block">
                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_box_layer_block">
                        <label class='<?php echo esc_attr($html_class_prefix); ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_subscription" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?php echo esc_attr($html_class_prefix); ?>choose-source" value="column_chart" >
                            <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item">
                                <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_logo">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_logo_overlay">
                                        <img class="<?php echo esc_attr($html_class_prefix); ?>layer_icons" src="<?php echo esc_url(CHART_BUILDER_ADMIN_URL); ?>/images/icons/column-chart-logo.png">
                                    </div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_checked">
                                        <img src="<?php echo esc_url(CHART_BUILDER_ADMIN_URL); ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>layer_item_separate_title">
                        <span><?php echo  __('Column Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="http://bit.ly/3Pc1CFe" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block">
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="org_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/org-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Org Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://bit.ly/3VQXop7" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block">
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="donut_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/donut-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Donut Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="http://bit.ly/3HgvEWi" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="histogram">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/histogram-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Histogram', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="http://bit.ly/3upA59L" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="geo_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay <?= $html_class_prefix; ?>layer_item_geo_chart">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/geo-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Geo Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="http://bit.ly/3iIq4Sc" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="area_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/area-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Area Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/area-chart-demo/" target="_blank"><?php echo  __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="gauge_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/gauge-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Gauge Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/gauge-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="combo_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/combo-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Combo Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/combo-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="stepped_area_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/stepped-area-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Stepped Area Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/stepped-area-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="bubble_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/bubble-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Bubble Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/bubble-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="scatter_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/scatter-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Scatter Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/scatter-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="table_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/table-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Table Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/table-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="timeline_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/timeline-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Timeline', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/timeline-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="candlestick_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/candlestick-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Candlestick Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/candlestick-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="gantt_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/gantt-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Gantt Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/gantt-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="sankey_diagram">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/sankey-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Sankey Diagram', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/sankey-diagram-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="treemap_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/treemap-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Treemap', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/threemap-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="word_tree">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/word-tree-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('Word Tree', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/word-tree-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
                <div class="<?= $html_class_prefix; ?>layer_box_each_block">
                    <div class="<?= $html_class_prefix; ?>layer_box_layer_block  only_pro">
                        <div class="pro_features">
                            <div>
                                <a href="https://ays-pro.com/wordpress/chart-builder/" target="_blank" title="PRO feature">
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-icon" style="background-image: url(<?php echo esc_attr(CHART_BUILDER_ADMIN_URL); ?>/images/icons/pro-features-icons/Locked_24x24.svg)"></div>
                                    <div class="<?php echo esc_attr($html_class_prefix); ?>pro-features-text"><?php echo __("Upgrade", "chart-builder"); ?></div>
                                </a>
                            </div>
                        </div>
                        <label class='<?= $html_class_prefix; ?>dblclick-layer'>
                            <input id="<?php echo esc_attr($this->plugin_name); ?>-modal_content_shortcode" type="radio" name="<?php echo esc_attr($this->plugin_name); ?>[modal_content]" class="<?= $html_class_prefix; ?>choose-source" value="3dpie_chart">
                            <div class="<?= $html_class_prefix; ?>layer_item">
                                <div class="<?= $html_class_prefix; ?>layer_item_logo">
                                    <div class="<?= $html_class_prefix; ?>layer_item_logo_overlay">
                                        <img class="<?= $html_class_prefix; ?>layer_icons" src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/3d-pie-chart-logo.png">
                                    </div>
                                    <div class="<?= $html_class_prefix; ?>layer_item_checked">
                                        <img src="<?= CHART_BUILDER_ADMIN_URL; ?>/images/icons/check.svg">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="<?= $html_class_prefix; ?>layer_item_separate_title">
                        <span><?php echo __('3D Pie Chart', "chart-builder") ?></span>
                    </div>
                    <div class="<?php echo esc_attr($html_class_prefix); ?>view_demo_content">
                        <a href="https://ays-demo.com/3d-pie-chart-demo/" target="_blank"><?php echo __('View demo', "chart-builder") ?></a>
                    </div>
                </div>
            </div>
            <!-- <div class="<?php // echo esc_attr($html_class_prefix); ?>select_button_layer">
                <div class="<?php // echo esc_attr($html_class_prefix); ?>select_button_item">
                    <input type="button" class="<?php // echo esc_attr($html_class_prefix); ?>layer_button" name="" value="Next >" disabled>
                </div>
            </div> -->
        </div>
    </div>
    <div class="<?php echo esc_attr($html_class_prefix); ?>select_button_layer">
        <div class="<?php echo esc_attr($html_class_prefix); ?>select_button_item">
            <input type="button" class="<?php echo esc_attr($html_class_prefix); ?>layer_button" name="" value="Next" disabled>
        </div>
    </div>
</div>