<?php
class ControllerModuleTimezone extends Controller {
	private $error = array();
	private $version = '2.3';

	public function index() {
	  if (version_compare($this->version, $this->config->get('timezone_version'), 'gt')) $this->install();
	  
		$data['lng'] = $this->load->language('module/timezone');
		
		$data['token'] = $this->session->data['token'];

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('timezone', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('module/timezone', 'token=' . $this->session->data['token'] . '&refreshModCache=1', 'SSL'));
		}
		
		$data['success'] = isset($this->session->data['success']) ? $this->session->data['success'] : '';
		unset($this->session->data['success']);

		$data['heading_title'] = $this->language->get('heading_title') . ' - ' . $this->version;

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('module/timezone', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('module/timezone', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['timezones'] = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
    $data['db_time'] = $this->db->query("SELECT NOW() AS now")->row['now'];
    $data['php_time'] = date('Y-m-d H:i:s');
		
		$data['status'] = $this->config->get('timezone_status');
		$data['timezone'] = $this->config->get('timezone_timezone');
		$data['version'] = $this->config->get('timezone_version');

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/timezone.tpl', $data));
	} //index end

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/timezone')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	} //validate end
	
	public function install() {
	  $this->db->query("UPDATE " . DB_PREFIX . "modification SET version = '" . $this->db->escape($this->version) . "' WHERE code = 'timezone'");
	  $this->db->query("DELETE FROM " . DB_PREFIX . "modification WHERE code = 'default_timezone'");
	  $this->db->query("DELETE FROM " . DB_PREFIX . "setting WHERE `key` = 'timezone_version'");
	  $this->db->query("INSERT INTO " . DB_PREFIX . "setting SET code = 'timezone', `key` = 'timezone_version', `value` = '" . $this->db->escape($this->version) . "'");
    
    $this->response->redirect($this->url->link('module/timezone', 'token=' . $this->session->data['token'] . '&refreshModCache=1', 'SSL'));
	} //install end
} //class end