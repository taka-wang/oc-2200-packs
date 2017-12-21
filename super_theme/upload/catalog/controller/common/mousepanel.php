<?php
class ControllerCommonMousepanel extends Controller {
	public function index() {
		// Custom CSS
		$data['custom_css'] = $this->config->get('moupanel_custom_css');
		$data['custom_css_content'] = html_entity_decode(($this->config->get('moupanel_custom_css_content')), ENT_QUOTES, 'UTF-8');
		
		// Custom Javascript
		$data['custom_javascript'] = $this->config->get('moupanel_custom_javascript');
		$data['custom_javascript_content'] = html_entity_decode(($this->config->get('moupanel_custom_javascript_content')), ENT_QUOTES, 'UTF-8');

		// Custom Code
		$data['custom_code'] = $this->config->get('moupanel_custom_code');
		$data['custom_code_content'] = html_entity_decode(($this->config->get('moupanel_custom_code_content')), ENT_QUOTES, 'UTF-8');

        //Design
        //General
        if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}
        $data['backgroundcolor'] = $this->config->get('moupanel_backgroundcolor');
        if (is_file(DIR_IMAGE . $this->config->get('moupanel_backgroundimage'))) {
			$data['backgroundimage'] = $server . 'image/' . $this->config->get('moupanel_backgroundimage');
		} else {
			$data['backgroundimage'] = '';
		}

        $data['repeatbackground'] = $this->config->get('moupanel_repeatbackground');
        $data['moupanel_textcolor'] = $this->config->get('moupanel_textcolor');
        $data['moupanel_linkcolor'] = $this->config->get('moupanel_linkcolor');
        $data['moupanel_linkhover'] = $this->config->get('moupanel_linkhover');
        $data['moupanel_titlecolor'] = $this->config->get('moupanel_titlecolor');
        $data['moupanel_dropdownhv'] = $this->config->get('moupanel_dropdownhv');
        $data['moupanel_dropdownbghover'] = $this->config->get('moupanel_dropdownbghover');
        //End General
        //Top Nav
        $data['moupanel_topnavbg'] = $this->config->get('moupanel_topnavbg');
        $data['moupanel_topnavline'] = $this->config->get('moupanel_topnavline');
        $data['moupanel_topnavlinecolor'] = $this->config->get('moupanel_topnavlinecolor');

        $data['moupanel_languagehvbg'] = $this->config->get('moupanel_languagehvbg');
        $data['moupanel_languagecolorhv'] = $this->config->get('moupanel_languagecolorhv');

        $data['moupanel_toplink'] = $this->config->get('moupanel_toplink');
        $data['moupanel_toplinkhover'] = $this->config->get('moupanel_toplinkhover');
        $data['moupanel_topiconsize'] = $this->config->get('moupanel_topiconsize');
        $data['moupanel_topdropdownhv'] = $this->config->get('moupanel_topdropdownhv');
        //End Top Nav
        //Top Search
        $data['moupanel_searchinbg'] = $this->config->get('moupanel_searchinbg');
        $data['moupanel_searchbutton'] = $this->config->get('moupanel_searchbutton');
        $data['moupanel_searchiconsize'] = $this->config->get('moupanel_searchiconsize');
        //Top Cart
        $data['moupanel_topcartcolor'] = $this->config->get('moupanel_topcartcolor');
        $data['moupanel_topcartbg'] = $this->config->get('moupanel_topcartbg');

        $data['moupanel_topcartopen'] = $this->config->get('moupanel_topcartopen');
        $data['moupanel_topcartopenbg'] = $this->config->get('moupanel_topcartopenbg');
        $data['moupanel_topcartopenborder'] = $this->config->get('moupanel_topcartopenborder');
        $data['moupanel_topcartopenbosize'] = $this->config->get('moupanel_topcartopenbosize');

        //End Top Cart
        //Top Menu
        $data['moupanel_topmenbg'] = $this->config->get('moupanel_topmenbg');
        $data['moupanel_topmenborder'] = $this->config->get('moupanel_topmenborder');
        $data['moupanel_topmenbocolor'] = $this->config->get('moupanel_topmenbocolor');

        $data['moupanel_menulicolor'] = $this->config->get('moupanel_menulicolor');
        $data['moupanel_menulihover'] = $this->config->get('moupanel_menulihover');
        $data['moupanel_menulibghover'] = $this->config->get('moupanel_menulibghover');

        $data['moupanel_drmenubg'] = $this->config->get('moupanel_drmenubg');
        $data['moupanel_drmenulibghv'] = $this->config->get('moupanel_drmenulibghv');
        $data['moupanel_drmenuli'] = $this->config->get('moupanel_drmenuli');
        $data['moupanel_drmenulihv'] = $this->config->get('moupanel_drmenulihv');

        $data['moupanel_menuinnerbg'] = $this->config->get('moupanel_menuinnerbg');
        $data['moupanel_menuinnerbghover'] = $this->config->get('moupanel_menuinnerbghover');
        $data['moupanel_menuinnerlink'] = $this->config->get('moupanel_menuinnerlink');
        $data['moupanel_menuinnerlinkhover'] = $this->config->get('moupanel_menuinnerlinkhover');

        $data['moupanel_menushowallbg'] = $this->config->get('moupanel_menushowallbg');
        $data['moupanel_menushowallbghover'] = $this->config->get('moupanel_menushowallbghover');
        $data['moupanel_menushowalllink'] = $this->config->get('moupanel_menushowalllink');
        $data['moupanel_menushowalllinkhover'] = $this->config->get('moupanel_menushowalllinkhover');
        //End Top Menu
        //Product List
       $data['moupanel_product_list_bg'] = $this->config->get('moupanel_product_list_bg');
       $data['moupanel_product_list_bordersize'] = $this->config->get('moupanel_product_list_bordersize');
       $data['moupanel_product_list_bordercolor'] = $this->config->get('moupanel_product_list_bordercolor');

       $data['moupanel_product_name'] = $this->config->get('moupanel_product_name');
       $data['moupanel_product_description'] = $this->config->get('moupanel_product_description');
       $data['moupanel_product_price'] = $this->config->get('moupanel_product_price');

       $data['moupanel_product_btgroup'] = $this->config->get('moupanel_product_btgroup');
       $data['moupanel_product_btgroupborder'] = $this->config->get('moupanel_product_btgroupborder');
       $data['moupanel_product_btgroupcolor'] = $this->config->get('moupanel_product_btgroupcolor');

       $data['moupanel_product_cartbg'] = $this->config->get('moupanel_product_cartbg');
       $data['moupanel_product_cartbghover'] = $this->config->get('moupanel_product_cartbghover');

       $data['moupanel_product_cartcolor'] = $this->config->get('moupanel_product_cartcolor');
       $data['moupanel_product_cartcolorhover'] = $this->config->get('moupanel_product_cartcolorhover');

       $data['moupanel_product_wishlistborder'] = $this->config->get('moupanel_product_wishlistborder');
       $data['moupanel_product_wishlistbordercolor'] = $this->config->get('moupanel_product_wishlistbordercolor');

       $data['moupanel_product_wishlistbg'] = $this->config->get('moupanel_product_wishlistbg');
       $data['moupanel_product_wishlistbghover'] = $this->config->get('moupanel_product_wishlistbghover');

       $data['moupanel_product_wishlistcolor'] = $this->config->get('moupanel_product_wishlistcolor');
       $data['moupanel_product_wishlistcolorhover'] = $this->config->get('moupanel_product_wishlistcolorhover');

        //End Product list

       //Start Footer
       $data['moupanel_footer_bg'] = $this->config->get('moupanel_footer_bg');
       $data['moupanel_footer_border'] = $this->config->get('moupanel_footer_border');
       $data['moupanel_footer_bordercolor'] = $this->config->get('moupanel_footer_bordercolor');
       $data['moupanel_footer_textcolor'] = $this->config->get('moupanel_footer_textcolor');

       $data['moupanel_footer_linkcolor'] = $this->config->get('moupanel_footer_linkcolor');
       $data['moupanel_footer_linkhover'] = $this->config->get('moupanel_footer_linkhover');
       $data['moupanel_footer_titlecolor'] = $this->config->get('moupanel_footer_titlecolor');
       //End Footer

        return $this->load->view('common/mousepanel.tpl', $data);
	}
	public function info() {
		$this->response->setOutput($this->index());
	}
}