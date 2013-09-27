<?php

class HcraMembers_Interests extends Admin_Controller
{
	public $implement = 'Db_List_Behavior, Db_Form_Behavior';
	public $list_model_class = 'HcraMembers_Interest';
	public $list_record_url = null;

	public $form_preview_title = 'User Interest';
	public $form_create_title = 'New User Interest';
	public $form_edit_title = 'Edit User Interest';
	public $form_model_class = 'HcraMembers_Interest';
	public $form_not_found_message = 'User interest not found';
	public $form_redirect = null;

	public $form_edit_save_flash = 'User interest has been successfully saved';
	public $form_create_save_flash = 'User interest has been successfully added';
	public $form_edit_delete_flash = 'User interest has been successfully deleted';

	protected $required_permissions = array('user:manage_groups');

	public function __construct()
	{
		parent::__construct();
		$this->app_menu = 'user';
		$this->app_page = 'interest';
		$this->app_module_name = 'HcraMembers';

		$this->list_record_url = url('hcramembers/interests/edit');
		$this->form_redirect = url('hcramembers/interests');
	}

	public function index()
	{
		$this->app_page_title = 'User Interests';
	}
}

?>