<?php
class ControllerCommonHeader extends Controller {
	public function index() {
		// Analytics
		$this->load->model('extension/extension');

		$data['analytics'] = array();

		$analytics = $this->model_extension_extension->getExtensions('analytics');

		foreach ($analytics as $analytic) {
			if ($this->config->get($analytic['code'] . '_status')) {
				$data['analytics'][] = $this->load->controller('analytics/' . $analytic['code']);
			}
		}

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->document->addLink($server . 'image/' . $this->config->get('config_icon'), 'icon');
		}

		$data['title'] = $this->document->getTitle();

		$data['base'] = $server;
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts();
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');
		
		$data['name'] = $this->config->get('config_name');

		

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_second_logo'))) {
			$data['second_logo'] = $server . 'image/' . $this->config->get('config_second_logo');
		} else {
			$data['second_logo'] = '';
		}

		$this->load->language('common/header');

		$data['text_home'] = $this->language->get('text_home');
		// Wishlist
		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');

			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->model_account_wishlist->getTotalWishlist());
		} else {
			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		}
		$data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', 'SSL'), $this->customer->getFirstName(), $this->url->link('account/logout', '', 'SSL'));
		
		$data['text_contact'] = $this->language->get('text_contact');
		$data['text_return'] = $this->language->get('text_return');
		$data['text_sitemap'] = $this->language->get('text_sitemap');
		$data['text_affiliate'] = $this->language->get('text_affiliate');
		$data['text_voucher'] = $this->language->get('text_voucher');
		$data['text_manufacturer'] = $this->language->get('text_manufacturer');
		
		$data['text_account'] = $this->language->get('text_account');
		$data['text_register'] = $this->language->get('text_register');
		$data['text_login'] = $this->language->get('text_login');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_transaction'] = $this->language->get('text_transaction');
		$data['text_download'] = $this->language->get('text_download');
		$data['text_logout'] = $this->language->get('text_logout');
		$data['text_checkout'] = $this->language->get('text_checkout');
		$data['text_category'] = $this->language->get('text_category');
		$data['text_all'] = $this->language->get('text_all');

		$data['home'] = $this->url->link('common/home');
		$data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', 'SSL');
		$data['register'] = $this->url->link('account/register', '', 'SSL');
		$data['login'] = $this->url->link('account/login', '', 'SSL');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['transaction'] = $this->url->link('account/transaction', '', 'SSL');
		$data['download'] = $this->url->link('account/download', '', 'SSL');
		$data['logout'] = $this->url->link('account/logout', '', 'SSL');
		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
		$data['contact'] = $this->url->link('information/contact');
		$data['telephone'] = $this->config->get('config_telephone');
		$data['mytemplate'] = $this->config->get('config_template');
		
		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', 'SSL');
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['affiliate'] = $this->url->link('affiliate/account', '', 'SSL');
		$data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
		$data['manufacturer'] = $this->url->link('product/manufacturer');


		$this->load->language('common/nav');

		$data['main_navigation'] = [
			[
				'label' => $this->language->get('nav_text_service'),
				'url' => $this->url->link('information/information', 'information_id=5'),
			],
			[
				'label' => $this->language->get('nav_text_payment'),
				'url' => $this->url->link('information/information', 'information_id=4'),
			],
			[
				'label' => $this->language->get('nav_text_delivery'),
				'url' => $this->url->link('information/information', 'information_id=6'),
			],
			[
				'label' => $this->language->get('nav_text_contacts'),
				'url' => $this->url->link('information/information', 'information_id=8'),
			],
			[
				'label' => $this->language->get('nav_text_certifications'),
				'url' => $this->url->link('information/information', 'information_id=9'),
			],
			[
				'label' => $this->language->get('nav_text_show-room'),
				'url' => $this->url->link('information/information', 'information_id=12'),
			],
		];

		$status = true;

		if (isset($this->request->server['HTTP_USER_AGENT'])) {
			$robots = explode("\n", str_replace(array("\r\n", "\r"), "\n", trim($this->config->get('config_robots'))));

			foreach ($robots as $robot) {
				if ($robot && strpos($this->request->server['HTTP_USER_AGENT'], trim($robot)) !== false) {
					$status = false;

					break;
				}
			}
		}

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);

			
				
				foreach ($children as $child) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);					
					// Level 2
					$children_level2 = $this->model_catalog_category->getCategories($child['category_id']);
					$children_data_level2 = array();
					foreach ($children_level2 as $child_level2) {
							$data_level2 = array(
									'filter_category_id'  => $child_level2['category_id'],
									'filter_sub_category' => true
							);
							$product_total_level2 = '';
							if ($this->config->get('config_product_count')) {
									$product_total_level2 = ' (' . $this->model_catalog_product->getTotalProducts($data_level2) . ')';
							}

							$children_data_level2[] = array(
									'name'  =>  $child_level2['name'],
									'href'  => $this->url->link('product/category', 'path=' . $child['category_id'] . '_' . $child_level2['category_id']),
									'id' => $category['category_id']. '_' . $child['category_id']. '_' . $child_level2['category_id']
							);
					}
					$children_data[] = array(
							'name'  => $child['name'],
							'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id']),
							'id' => $category['category_id']. '_' . $child['category_id'],
							'children_level2' => $children_data_level2,
					);
					
				}
		
				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}

		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['search'] = $this->load->controller('common/search');
		$data['cart'] = $this->load->controller('common/cart');
		
		$data['headertop'] = $this->load->controller('common/headertop');
		$data['headerbottom'] = $this->load->controller('common/headerbottom');
		
		// For page specific css
		if (isset($this->request->get['route'])) {
			if (isset($this->request->get['product_id'])) {
				$class = '-' . $this->request->get['product_id'];
			} elseif (isset($this->request->get['path'])) {
				$class = '-' . $this->request->get['path'];
			} elseif (isset($this->request->get['manufacturer_id'])) {
				$class = '-' . $this->request->get['manufacturer_id'];
			} else {
				$class = '';
			}

			$data['class'] = str_replace('/', '-', $this->request->get['route']) . $class;
		} else {
			$data['class'] = 'common-home';
		}
		
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');		

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/header.tpl', $data);
		} else {
			return $this->load->view('default/template/common/header.tpl', $data);
		}
		
	}
	
/* # Заказать звонок */

	public function callback() {	
		$this->load->language('common/header');
		
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && isset($this->request->post['phone']) ) {

			$json = array();
			
			if (empty($this->request->post['phone']) || ! preg_match('/^[0-9\-+)(]*$/', $this->request->post['phone'])) {	
				
				$json['error'] = $this->language->get('error_callback');;				
			} else {
				
				$this->mail($this->request->post['phone']);
				$json['success'] = $this->language->get('success_callback');				
			}

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}	
	}	

	
	private function mail($telephone) {

		$message  = $this->language->get('text_title') . "\n\n";	
		$message .= HTTP_SERVER . "\n\n";	
		$message .= $this->language->get('text_phone') . $telephone . "\n";

		$mail = new Mail();
		$mail->protocol 	 = $this->config->get('config_mail_protocol');
		$mail->parameter 	 = $this->config->get('config_mail_parameter');
		$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
		$mail->smtp_username = $this->config->get('config_mail_smtp_username');
		$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
		$mail->smtp_port 	 = $this->config->get('config_mail_smtp_port');
		$mail->smtp_timeout  = $this->config->get('config_mail_smtp_timeout');
		$mail->setTo($this->config->get('config_email'));
		$mail->setFrom($this->config->get('config_email'));
		$mail->setSender(html_entity_decode($this->language->get('text_customer'), ENT_QUOTES, 'UTF-8'));
		$mail->setSubject(html_entity_decode($this->language->get('text_title'), ENT_QUOTES, 'UTF-8'));
		$mail->setText($message);
		$mail->send();
        
	}
	
}