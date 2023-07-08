Event.observe(window, 'load', function() {
	function jsColor(mainId, exceptions){
		if($$(mainId).length){
			var selection = 'input.input-text:not('+ exceptions +')';
			var selected_items = $$(mainId)[0].select(selection);
			selected_items.each(function(val){
				new jscolor.color(val);
			});
		}
	}
	jsColor('#meigee_indigo_design_base');
	jsColor('#meigee_indigo_design_catlabels');
	jsColor('#meigee_indigo_design_headerslider');
	jsColor('#meigee_indigo_design_menu', '#meigee_indigo_design_menu_submenu_top_link_divider_width, #meigee_indigo_design_menu_submenu_link_border_width, #meigee_indigo_design_menu_submenu_borders_width');
	jsColor('#meigee_indigo_design_header', '#meigee_indigo_design_header_top_border_width, #meigee_indigo_design_header_top_switchers_border_width, #meigee_indigo_design_header_links_divider_width, #meigee_indigo_design_header_login_border_width, #meigee_indigo_design_header_login_input_border_width, #meigee_indigo_design_header_login_divider_width, #meigee_indigo_design_header_bottom_border_width, #meigee_indigo_design_header_search_border_width');
	jsColor('#meigee_indigo_design_content', '#meigee_indigo_design_content_page_title_border_width, #meigee_indigo_design_content_toolbar_select_border_width, #meigee_indigo_design_content_toolbar_border_width');
	jsColor('#meigee_indigo_design_buttons', '#meigee_indigo_design_buttons_buttons_border_width, #meigee_indigo_design_buttons_buttons2_border_width');
	jsColor('#meigee_indigo_design_products', '#meigee_indigo_design_products_product_border_width');
	jsColor('#meigee_indigo_design_social_links', '#meigee_indigo_design_social_links_social_links_border_width');
	jsColor('#meigee_indigo_design_footer', '#meigee_indigo_design_footer_footer_divider_width, #meigee_indigo_design_footer_footer_link_border_width, #meigee_indigo_design_footer_footer_subscribe_input_border_width');
});