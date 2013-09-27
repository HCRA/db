<?php

class HcraMembers_Interest extends Db_ActiveRecord
{
	public $implement = 'Db_AutoFootprints, Db_Model_Attachments';
	public $auto_footprints_visible = true;
	public $auto_footprints_default_invisible = false;

	public $table_name = 'hcramembers_interests';

	public $calculated_columns = array(
		'user_num' => array(
			'sql'  => "(select count(*) from hcramembers_users_interests where interest_id=hcramembers_interests.id)",
			'type' => db_number
		)
	);

	public function define_columns($context = null)
	{
		$this->define_column('name', 'Name')->order('asc')->validation()->fn('trim')->required("Please specify the interest name");
		$this->define_column('user_num', 'Users')->validation()->fn('trim');
		$this->define_column('code', 'API Code')->invisible();
	}

	public function define_form_fields($context = null)
	{
		$this->add_form_field('name');
		$this->add_form_field('code');
	}

}