<?php
class ControllerModuleMoupanel extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('module/moupanel');
		$this->load->model('localisation/language');
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('moupanel', $this->request->post);
			
			if (isset($this->request->post['save']) && $this->request->post['save'] == 'stay') {
				$this->session->data['success'] = $this->language->get('text_success');
				$this->response->redirect($this->url->link('module/moupanel', 'token=' . $this->session->data['token'], 'SSL'));
			}
				
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		
		// Language starts
		$data['heading_title'] = $this->language->get('heading_title');
        $data['edit_title'] = $this->language->get('edit_title');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_stay'] = $this->language->get('button_stay');
		$data['button_cancel'] = $this->language->get('button_cancel');

        $data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
        $data['entry_status'] = $this->language->get('entry_status');

		// Tabs

		$data['tab_custom_css'] = $this->language->get('tab_custom_css');
        $data['tab_design'] = $this->language->get('tab_design');
		
		// Custom CSS
		$data['text_custom_css'] = $this->language->get('text_custom_css');
        $data['text_content_css'] = $this->language->get('text_content_css');
		$data['text_help_css'] = $this->language->get('text_help_css');
        //Custom Javascript
        $data['text_custom_javascript'] = $this->language->get('text_custom_javascript');
        $data['text_help_javascript'] = $this->language->get('text_help_javascript');
        $data['text_content_javascript'] = $this->language->get('text_content_javascript');
        //Custom Code
        $data['text_custom_code'] = $this->language->get('text_custom_code');
        $data['text_help_code'] = $this->language->get('text_help_code');
        $data['text_content_code'] = $this->language->get('text_content_code');

        //Custom style

        //General
        $data['tab_themepanel'] = $this->language->get('tab_themepanel');
        $data['text_general'] = $this->language->get('text_general');
        $data['help_general'] = $this->language->get('help_general');
        $data['text_topiconsize'] = $this->language->get('text_topiconsize');

        $data['text_top_bar'] = $this->language->get('text_top_bar');
        $data['text_top_cart'] = $this->language->get('text_top_cart');
        $data['text_top_search'] = $this->language->get('text_top_search');
        $data['text_top_menu'] = $this->language->get('text_top_menu');

        $data['text_background'] = $this->language->get('text_background');
        $data['text_color'] = $this->language->get('text_color');
        $data['text_hover'] = $this->language->get('text_hover');
        $data['text_border'] = $this->language->get('text_border');
        $data['text_backgroundhover'] = $this->language->get('text_backgroundhover');

        $data['text_linkcolor'] = $this->language->get('text_linkcolor');
        $data['text_linkhover'] = $this->language->get('text_linkhover');
        $data['text_color'] = $this->language->get('text_color');
        $data['text_titlecolor'] = $this->language->get('text_titlecolor');

        $data['text_dropdownhover'] = $this->language->get('text_dropdownhover');
        $data['text_dropdownbg'] = $this->language->get('text_dropdownbg');

        $data['help_title'] = $this->language->get('help_title');
        $data['help_dropdownlihover'] = $this->language->get('help_dropdownlihover');
        $data['help_languagebghv'] = $this->language->get('help_languagebghv');

        $data['entry_backgroundimage'] = $this->language->get('entry_backgroundimage');
        $data['help_backgroundimage'] = $this->language->get('help_backgroundimage');
        $data['entry_repeatbackground'] = $this->language->get('entry_repeatbackground');
        $data['entry_backgroundcolor'] = $this->language->get('entry_backgroundcolor');
        //Top Nav
        $data['text_topnavbg'] = $this->language->get('text_topnavbg');
        $data['text_topborderline'] = $this->language->get('text_topborderline');
        $data['text_topcolorline'] = $this->language->get('text_topcolorline');
        $data['help_topborderline'] = $this->language->get('help_topborderline');
        $data['text_toplanguagebghv'] = $this->language->get('text_toplanguagebghv');
        $data['text_toplanguagecolorhv'] = $this->language->get('text_toplanguagecolorhv');
        //Search
        $data['text_searchinput'] = $this->language->get('text_searchinput');
        $data['text_searchbutton'] = $this->language->get('text_searchbutton');
        //Cart
        $data['text_cartopen'] = $this->language->get('text_cartopen');
        $data['text_cartopenborder'] = $this->language->get('text_cartopenborder');
        $data['text_cartopenbg'] = $this->language->get('text_cartopenbg');
        $data['text_cartopenborderwidth'] = $this->language->get('text_cartopenborderwidth');
        //Menu
        $data['text_border'] = $this->language->get('text_border');
        $data['text_bordercolor'] = $this->language->get('text_bordercolor');
        $data['text_dropdownbg'] = $this->language->get('text_dropdownbg');
        $data['text_dropdowncolor'] = $this->language->get('text_dropdowncolor');

        $data['text_dropdown'] = $this->language->get('text_dropdown');
        $data['text_seeall'] = $this->language->get('text_seeall');

        $data['text_toplink'] = $this->language->get('text_toplink');
        $data['text_toplinkhover'] = $this->language->get('text_toplinkhover');
        $data['text_topaccountcolorhv'] = $this->language->get('text_topaccountcolorhv');
        $data['help_accounthv'] = $this->language->get('help_accounthv');
        //Products Modules
        $data['text_product_list'] = $this->language->get('text_product_list');
        $data['help_product_list'] = $this->language->get('help_product_list');

        $data['text_product_name'] = $this->language->get('text_product_name');
        $data['text_product_description'] = $this->language->get('text_product_description');
        $data['text_product_price'] = $this->language->get('text_product_price');
        $data['text_product_tax'] = $this->language->get('text_product_tax');

        $data['text_add_to_cart'] = $this->language->get('text_add_to_cart');
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['text_btgroup'] = $this->language->get('text_btgroup');
        $data['text_border_left'] = $this->language->get('text_border_left');

        //Footer
        $data['text_footer'] = $this->language->get('text_footer');
        $data['text_border_top'] = $this->language->get('text_border_top');
        $data['text_footer'] = $this->language->get('text_footer');
		// Language ends



		
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
			
		} 
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		
		$data['token'] = $this->session->data['token'];
		
		// Content starts


		
		// Custom CSS starts

		if (isset($this->request->post['moupanel_custom_css'])) {
			$data['moupanel_custom_css'] = $this->request->post['moupanel_custom_css'];
		} else {
			$data['moupanel_custom_css'] = $this->config->get('moupanel_custom_css');
		}

		if (isset($this->request->post['moupanel_custom_css_content'])) {
			$data['moupanel_custom_css_content'] = $this->request->post['moupanel_custom_css_content'];
		} else {
			$data['moupanel_custom_css_content'] = $this->config->get('moupanel_custom_css_content');
		}
		// Custom CSS ends
		
		// Custom Javascript starts

		if (isset($this->request->post['moupanel_custom_javascript'])) {
			$data['moupanel_custom_javascript'] = $this->request->post['moupanel_custom_javascript'];
		} else {
			$data['moupanel_custom_javascript'] = $this->config->get('moupanel_custom_javascript');
		}

		if (isset($this->request->post['moupanel_custom_javascript_content'])) {
			$data['moupanel_custom_javascript_content'] = $this->request->post['moupanel_custom_javascript_content'];
		} else {
			$data['moupanel_custom_javascript_content'] = $this->config->get('moupanel_custom_javascript_content');
		}
		// Custom Javascript ends

        // Custom Code starts

		if (isset($this->request->post['moupanel_custom_code'])) {
			$data['moupanel_custom_code'] = $this->request->post['moupanel_custom_code'];
		} else {
			$data['moupanel_custom_code'] = $this->config->get('moupanel_custom_code');
		}

		if (isset($this->request->post['moupanel_custom_code_content'])) {
			$data['moupanel_custom_code_content'] = $this->request->post['moupanel_custom_code_content'];
		} else {
			$data['moupanel_custom_code_content'] = $this->config->get('moupanel_custom_code_content');
		}
		// Custom Code ends

                //General Starts
        if (isset($this->request->post['moupanel_backgroundcolor'])) {
			$data['moupanel_backgroundcolor'] = $this->request->post['moupanel_backgroundcolor'];
		} else {
			$data['moupanel_backgroundcolor'] = $this->config->get('moupanel_backgroundcolor');
		}

        $this->load->model('tool/image');

        if (isset($this->request->post['moupanel_backgroundimage'])) {
			$data['moupanel_backgroundimage'] = $this->request->post['moupanel_backgroundimage'];
		} else {
			$data['moupanel_backgroundimage'] = $this->config->get('moupanel_backgroundimage');
		}

		if (isset($this->request->post['moupanel_backgroundimage']) && is_file(DIR_IMAGE . $this->request->post['moupanel_backgroundimage'])) {
			$data['backgroundimage'] = $this->model_tool_image->resize($this->request->post['moupanel_backgroundimage'], 100, 100);
		} elseif ($this->config->get('moupanel_backgroundimage') && is_file(DIR_IMAGE . $this->config->get('moupanel_backgroundimage'))) {
			$data['backgroundimage'] = $this->model_tool_image->resize($this->config->get('moupanel_backgroundimage'), 100, 100);
		} else {
			$data['backgroundimage'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

        if (isset($this->request->post['moupanel_repeatbackground'])) {
			$data['moupanel_repeatbackground'] = $this->request->post['moupanel_repeatbackground'];
		} else {
			$data['moupanel_repeatbackground'] = $this->config->get('moupanel_repeatbackground');
		}
        $data['repeatbackgrounds'] = array(
        'no-repeat',
		'repeat-x',
		'repeat-y',
        'repeat',
        );

        if (isset($this->request->post['moupanel_textcolor'])) {
			$data['moupanel_textcolor'] = $this->request->post['moupanel_textcolor'];
		} else {
			$data['moupanel_textcolor'] = $this->config->get('moupanel_textcolor');
		}

        if (isset($this->request->post['moupanel_linkcolor'])) {
			$data['moupanel_linkcolor'] = $this->request->post['moupanel_linkcolor'];
		} else {
			$data['moupanel_linkcolor'] = $this->config->get('moupanel_linkcolor');
		}
        if (isset($this->request->post['moupanel_linkhover'])) {
			$data['moupanel_linkhover'] = $this->request->post['moupanel_linkhover'];
		} else {
			$data['moupanel_linkhover'] = $this->config->get('moupanel_linkhover');
		}

        if (isset($this->request->post['moupanel_titlecolor'])) {
			$data['moupanel_titlecolor'] = $this->request->post['moupanel_titlecolor'];
		} else {
			$data['moupanel_titlecolor'] = $this->config->get('moupanel_titlecolor');
		}

        if (isset($this->request->post['moupanel_dropdownhv'])) {
			$data['moupanel_dropdownhv'] = $this->request->post['moupanel_dropdownhv'];
		} else {
			$data['moupanel_dropdownhv'] = $this->config->get('moupanel_dropdownhv');
		}
        if (isset($this->request->post['moupanel_dropdownbghover'])) {
			$data['moupanel_dropdownbghover'] = $this->request->post['moupanel_dropdownbghover'];
		} else {
			$data['moupanel_dropdownbghover'] = $this->config->get('moupanel_dropdownbghover');
		}
        //Top Nav
        if (isset($this->request->post['moupanel_topnavbg'])) {
			$data['moupanel_topnavbg'] = $this->request->post['moupanel_topnavbg'];
		} else {
			$data['moupanel_topnavbg'] = $this->config->get('moupanel_topnavbg');
		}
        if (isset($this->request->post['moupanel_topnavline'])) {
			$data['moupanel_topnavline'] = $this->request->post['moupanel_topnavline'];
		} else {
			$data['moupanel_topnavline'] = $this->config->get('moupanel_topnavline');
		}
        if (isset($this->request->post['moupanel_topnavlinecolor'])) {
			$data['moupanel_topnavlinecolor'] = $this->request->post['moupanel_topnavlinecolor'];
		} else {
			$data['moupanel_topnavlinecolor'] = $this->config->get('moupanel_topnavlinecolor');
		}
        if (isset($this->request->post['moupanel_languagehvbg'])) {
			$data['moupanel_languagehvbg'] = $this->request->post['moupanel_languagehvbg'];
		} else {
			$data['moupanel_languagehvbg'] = $this->config->get('moupanel_languagehvbg');
		}
        if (isset($this->request->post['moupanel_languagecolorhv'])) {
			$data['moupanel_languagecolorhv'] = $this->request->post['moupanel_languagecolorhv'];
		} else {
			$data['moupanel_languagecolorhv'] = $this->config->get('moupanel_languagecolorhv');
		}

        if (isset($this->request->post['moupanel_toplink'])) {
			$data['moupanel_toplink'] = $this->request->post['moupanel_toplink'];
		} else {
			$data['moupanel_toplink'] = $this->config->get('moupanel_toplink');
		}
        if (isset($this->request->post['moupanel_toplinkhover'])) {
			$data['moupanel_toplinkhover'] = $this->request->post['moupanel_toplinkhover'];
		} else {
			$data['moupanel_toplinkhover'] = $this->config->get('moupanel_toplinkhover');
		}
        if (isset($this->request->post['moupanel_topiconsize'])) {
			$data['moupanel_topiconsize'] = $this->request->post['moupanel_topiconsize'];
		} else {
			$data['moupanel_topiconsize'] = $this->config->get('moupanel_topiconsize');
		}
        if (isset($this->request->post['moupanel_topdropdownhv'])) {
			$data['moupanel_topdropdownhv'] = $this->request->post['moupanel_topdropdownhv'];
		} else {
			$data['moupanel_topdropdownhv'] = $this->config->get('moupanel_topdropdownhv');
		}
        //Top Search
        if (isset($this->request->post['moupanel_searchinbg'])) {
			$data['moupanel_searchinbg'] = $this->request->post['moupanel_searchinbg'];
		} else {
			$data['moupanel_searchinbg'] = $this->config->get('moupanel_searchinbg');
		}
        if (isset($this->request->post['moupanel_searchbutton'])) {
			$data['moupanel_searchbutton'] = $this->request->post['moupanel_searchbutton'];
		} else {
			$data['moupanel_searchbutton'] = $this->config->get('moupanel_searchbutton');
		}
        if (isset($this->request->post['moupanel_searchiconsize'])) {
			$data['moupanel_searchiconsize'] = $this->request->post['moupanel_searchiconsize'];
		} else {
			$data['moupanel_searchiconsize'] = $this->config->get('moupanel_searchiconsize');
		}
        //Top Cart
        if (isset($this->request->post['moupanel_topcartcolor'])) {
			$data['moupanel_topcartcolor'] = $this->request->post['moupanel_topcartcolor'];
		} else {
			$data['moupanel_topcartcolor'] = $this->config->get('moupanel_topcartcolor');
		}
        if (isset($this->request->post['moupanel_topcartbg'])) {
			$data['moupanel_topcartbg'] = $this->request->post['moupanel_topcartbg'];
		} else {
			$data['moupanel_topcartbg'] = $this->config->get('moupanel_topcartbg');
		}


        if (isset($this->request->post['moupanel_topcartopen'])) {
			$data['moupanel_topcartopen'] = $this->request->post['moupanel_topcartopen'];
		} else {
			$data['moupanel_topcartopen'] = $this->config->get('moupanel_topcartopen');
		}
        if (isset($this->request->post['moupanel_topcartopenbg'])) {
			$data['moupanel_topcartopenbg'] = $this->request->post['moupanel_topcartopenbg'];
		} else {
			$data['moupanel_topcartopenbg'] = $this->config->get('moupanel_topcartopenbg');
		}
        if (isset($this->request->post['moupanel_topcartopenborder'])) {
			$data['moupanel_topcartopenborder'] = $this->request->post['moupanel_topcartopenborder'];
		} else {
			$data['moupanel_topcartopenborder'] = $this->config->get('moupanel_topcartopenborder');
		}
        if (isset($this->request->post['moupanel_topcartopenbosize'])) {
			$data['moupanel_topcartopenbosize'] = $this->request->post['moupanel_topcartopenbosize'];
		} else {
			$data['moupanel_topcartopenbosize'] = $this->config->get('moupanel_topcartopenbosize');
		}
        //Top Menu
        if (isset($this->request->post['moupanel_topmenbg'])) {
			$data['moupanel_topmenbg'] = $this->request->post['moupanel_topmenbg'];
		} else {
			$data['moupanel_topmenbg'] = $this->config->get('moupanel_topmenbg');
		}
        if (isset($this->request->post['moupanel_topmenborder'])) {
			$data['moupanel_topmenborder'] = $this->request->post['moupanel_topmenborder'];
		} else {
			$data['moupanel_topmenborder'] = $this->config->get('moupanel_topmenborder');
		}
        if (isset($this->request->post['moupanel_topmenbocolor'])) {
			$data['moupanel_topmenbocolor'] = $this->request->post['moupanel_topmenbocolor'];
		} else {
			$data['moupanel_topmenbocolor'] = $this->config->get('moupanel_topmenbocolor');
		}

        if (isset($this->request->post['moupanel_menulicolor'])) {
			$data['moupanel_menulicolor'] = $this->request->post['moupanel_menulicolor'];
		} else {
			$data['moupanel_menulicolor'] = $this->config->get('moupanel_menulicolor');
		}
        if (isset($this->request->post['moupanel_menulihover'])) {
			$data['moupanel_menulihover'] = $this->request->post['moupanel_menulihover'];
		} else {
			$data['moupanel_menulihover'] = $this->config->get('moupanel_menulihover');
		}
        if (isset($this->request->post['moupanel_menulibghover'])) {
			$data['moupanel_menulibghover'] = $this->request->post['moupanel_menulibghover'];
		} else {
			$data['moupanel_menulibghover'] = $this->config->get('moupanel_menulibghover');
		}



        if (isset($this->request->post['moupanel_menuinnerbg'])) {
			$data['moupanel_menuinnerbg'] = $this->request->post['moupanel_menuinnerbg'];
		} else {
			$data['moupanel_menuinnerbg'] = $this->config->get('moupanel_menuinnerbg');
		}
        if (isset($this->request->post['moupanel_menuinnerbghover'])) {
			$data['moupanel_menuinnerbghover'] = $this->request->post['moupanel_menuinnerbghover'];
		} else {
			$data['moupanel_menuinnerbghover'] = $this->config->get('moupanel_menuinnerbghover');
		}
        if (isset($this->request->post['moupanel_menuinnerlink'])) {
			$data['moupanel_menuinnerlink'] = $this->request->post['moupanel_menuinnerlink'];
		} else {
			$data['moupanel_menuinnerlink'] = $this->config->get('moupanel_menuinnerlink');
		}
        if (isset($this->request->post['moupanel_menuinnerlinkhover'])) {
			$data['moupanel_menuinnerlinkhover'] = $this->request->post['moupanel_menuinnerlinkhover'];
		} else {
			$data['moupanel_menuinnerlinkhover'] = $this->config->get('moupanel_menuinnerlinkhover');
		}


        if (isset($this->request->post['moupanel_menushowallbg'])) {
			$data['moupanel_menushowallbg'] = $this->request->post['moupanel_menushowallbg'];
		} else {
			$data['moupanel_menushowallbg'] = $this->config->get('moupanel_menushowallbg');
		}
        if (isset($this->request->post['moupanel_menushowallbghover'])) {
			$data['moupanel_menushowallbghover'] = $this->request->post['moupanel_menushowallbghover'];
		} else {
			$data['moupanel_menushowallbghover'] = $this->config->get('moupanel_menushowallbghover');
		}
        if (isset($this->request->post['moupanel_menushowalllink'])) {
			$data['moupanel_menushowalllink'] = $this->request->post['moupanel_menushowalllink'];
		} else {
			$data['moupanel_menushowalllink'] = $this->config->get('moupanel_menushowalllink');
		}
        if (isset($this->request->post['moupanel_menushowalllinkhover'])) {
			$data['moupanel_menushowalllinkhover'] = $this->request->post['moupanel_menushowalllinkhover'];
		} else {
			$data['moupanel_menushowalllinkhover'] = $this->config->get('moupanel_menushowalllinkhover');
		}


        //Product list
        if (isset($this->request->post['moupanel_product_list_bg'])) {
			$data['moupanel_product_list_bg'] = $this->request->post['moupanel_product_list_bg'];
		} else {
			$data['moupanel_product_list_bg'] = $this->config->get('moupanel_product_list_bg');
		}
        if (isset($this->request->post['moupanel_product_list_bordersize'])) {
			$data['moupanel_product_list_bordersize'] = $this->request->post['moupanel_product_list_bordersize'];
		} else {
			$data['moupanel_product_list_bordersize'] = $this->config->get('moupanel_product_list_bordersize');
		}
        if (isset($this->request->post['moupanel_product_list_bordercolor'])) {
			$data['moupanel_product_list_bordercolor'] = $this->request->post['moupanel_product_list_bordercolor'];
		} else {
			$data['moupanel_product_list_bordercolor'] = $this->config->get('moupanel_product_list_bordercolor');
		}


        if (isset($this->request->post['moupanel_product_name'])) {
			$data['moupanel_product_name'] = $this->request->post['moupanel_product_name'];
		} else {
			$data['moupanel_product_name'] = $this->config->get('moupanel_product_name');
		}
        if (isset($this->request->post['moupanel_product_description'])) {
			$data['moupanel_product_description'] = $this->request->post['moupanel_product_description'];
		} else {
			$data['moupanel_product_description'] = $this->config->get('moupanel_product_description');
		}
        if (isset($this->request->post['moupanel_product_price'])) {
			$data['moupanel_product_price'] = $this->request->post['moupanel_product_price'];
		} else {
			$data['moupanel_product_price'] = $this->config->get('moupanel_product_price');
		}


        if (isset($this->request->post['moupanel_product_btgroup'])) {
			$data['moupanel_product_btgroup'] = $this->request->post['moupanel_product_btgroup'];
		} else {
			$data['moupanel_product_btgroup'] = $this->config->get('moupanel_product_btgroup');
		}
        if (isset($this->request->post['moupanel_product_btgroupborder'])) {
			$data['moupanel_product_btgroupborder'] = $this->request->post['moupanel_product_btgroupborder'];
		} else {
			$data['moupanel_product_btgroupborder'] = $this->config->get('moupanel_product_btgroupborder');
		}
        if (isset($this->request->post['moupanel_product_btgroupcolor'])) {
			$data['moupanel_product_btgroupcolor'] = $this->request->post['moupanel_product_btgroupcolor'];
		} else {
			$data['moupanel_product_btgroupcolor'] = $this->config->get('moupanel_product_btgroupcolor');
		}


        if (isset($this->request->post['moupanel_product_cartbg'])) {
			$data['moupanel_product_cartbg'] = $this->request->post['moupanel_product_cartbg'];
		} else {
			$data['moupanel_product_cartbg'] = $this->config->get('moupanel_product_cartbg');
		}
        if (isset($this->request->post['moupanel_product_cartbghover'])) {
			$data['moupanel_product_cartbghover'] = $this->request->post['moupanel_product_cartbghover'];
		} else {
			$data['moupanel_product_cartbghover'] = $this->config->get('moupanel_product_cartbghover');
		}


        if (isset($this->request->post['moupanel_product_cartcolor'])) {
			$data['moupanel_product_cartcolor'] = $this->request->post['moupanel_product_cartcolor'];
		} else {
			$data['moupanel_product_cartcolor'] = $this->config->get('moupanel_product_cartcolor');
		}
        if (isset($this->request->post['moupanel_product_cartcolorhover'])) {
			$data['moupanel_product_cartcolorhover'] = $this->request->post['moupanel_product_cartcolorhover'];
		} else {
			$data['moupanel_product_cartcolorhover'] = $this->config->get('moupanel_product_cartcolorhover');
		}


        if (isset($this->request->post['moupanel_product_wishlistborder'])) {
			$data['moupanel_product_wishlistborder'] = $this->request->post['moupanel_product_wishlistborder'];
		} else {
			$data['moupanel_product_wishlistborder'] = $this->config->get('moupanel_product_wishlistborder');
		}
        if (isset($this->request->post['moupanel_product_wishlistbordercolor'])) {
			$data['moupanel_product_wishlistbordercolor'] = $this->request->post['moupanel_product_wishlistbordercolor'];
		} else {
			$data['moupanel_product_wishlistbordercolor'] = $this->config->get('moupanel_product_wishlistbordercolor');
		}


        if (isset($this->request->post['moupanel_product_wishlistbg'])) {
			$data['moupanel_product_wishlistbg'] = $this->request->post['moupanel_product_wishlistbg'];
		} else {
			$data['moupanel_product_wishlistbg'] = $this->config->get('moupanel_product_wishlistbg');
		}
        if (isset($this->request->post['moupanel_product_wishlistbghover'])) {
			$data['moupanel_product_wishlistbghover'] = $this->request->post['moupanel_product_wishlistbghover'];
		} else {
			$data['moupanel_product_wishlistbghover'] = $this->config->get('moupanel_product_wishlistbghover');
		}


        if (isset($this->request->post['moupanel_product_wishlistcolor'])) {
			$data['moupanel_product_wishlistcolor'] = $this->request->post['moupanel_product_wishlistcolor'];
		} else {
			$data['moupanel_product_wishlistcolor'] = $this->config->get('moupanel_product_wishlistcolor');
		}
        if (isset($this->request->post['moupanel_product_wishlistcolorhover'])) {
			$data['moupanel_product_wishlistcolorhover'] = $this->request->post['moupanel_product_wishlistcolorhover'];
		} else {
			$data['moupanel_product_wishlistcolorhover'] = $this->config->get('moupanel_product_wishlistcolorhover');
		}

        // End Product List
        //Start Footer
        if (isset($this->request->post['moupanel_footer_bg'])) {
			$data['moupanel_footer_bg'] = $this->request->post['moupanel_footer_bg'];
		} else {
			$data['moupanel_footer_bg'] = $this->config->get('moupanel_footer_bg');
		}
        if (isset($this->request->post['moupanel_footer_border'])) {
			$data['moupanel_footer_border'] = $this->request->post['moupanel_footer_border'];
		} else {
			$data['moupanel_footer_border'] = $this->config->get('moupanel_footer_border');
		}
        if (isset($this->request->post['moupanel_footer_bordercolor'])) {
			$data['moupanel_footer_bordercolor'] = $this->request->post['moupanel_footer_bordercolor'];
		} else {
			$data['moupanel_footer_bordercolor'] = $this->config->get('moupanel_footer_bordercolor');
		}
        if (isset($this->request->post['moupanel_footer_textcolor'])) {
			$data['moupanel_footer_textcolor'] = $this->request->post['moupanel_footer_textcolor'];
		} else {
			$data['moupanel_footer_textcolor'] = $this->config->get('moupanel_footer_textcolor');
		}

        if (isset($this->request->post['moupanel_footer_linkcolor'])) {
			$data['moupanel_footer_linkcolor'] = $this->request->post['moupanel_footer_linkcolor'];
		} else {
			$data['moupanel_footer_linkcolor'] = $this->config->get('moupanel_footer_linkcolor');
		}
         if (isset($this->request->post['moupanel_footer_linkhover'])) {
			$data['moupanel_footer_linkhover'] = $this->request->post['moupanel_footer_linkhover'];
		} else {
			$data['moupanel_footer_linkhover'] = $this->config->get('moupanel_footer_linkhover');
		}

        if (isset($this->request->post['moupanel_footer_titlecolor'])) {
			$data['moupanel_footer_titlecolor'] = $this->request->post['moupanel_footer_titlecolor'];
		} else {
			$data['moupanel_footer_titlecolor'] = $this->config->get('moupanel_footer_titlecolor');
		}

        //Design ends

		// Content ends


   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/moupanel', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

		
		$data['action'] = $this->url->link('module/moupanel', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/moupanel.tpl', $data));
	}
	

	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/moupanel')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
				
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>