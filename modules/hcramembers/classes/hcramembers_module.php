<?php

class HcraMembers_Module extends Core_Module_Base
{

	protected function set_module_info()
	{
		return new Core_Module_Detail(
			"HCRA Members",
			"Extends PHPRoad Users module for use with HCRA Club",
			"Keyed-Up Media, LLC",
			"http://www.keyedupmedia.com/"
		);
	}

	public function subscribe_events()
	{
		Phpr::$events->add_event('user:on_extend_user_model', $this, 'extend_user_model');
		Phpr::$events->add_event('user:on_extend_user_form', $this, 'extend_user_form');
	}

	public function extend_user_model($user, $context) {
		$user->define_column('callsign', 'Callsign');
		$user->define_column('birthdate', 'Birthdate');
		$user->define_column('join_date', 'Join Date');
		$user->define_column('street_address', 'Street Address');
		$user->define_column('city', 'City');
		$user->define_column('state', 'State');
		$user->define_column('zip', 'Zip');
		$user->define_column('cell_phone', 'Cell Phone');
		$user->define_column('home_phone', 'Home Phone');
		$user->define_column('is_bod', 'Board of Directors');

		$user->add_relation('has_and_belongs_to_many', 'interests', array(
			'class_name'  => 'HcraMembers_Interest',
			'join_table'  => 'hcramembers_users_interests',
			'primary_key' => 'user_id',
			'foreign_key' => 'interest_id'
		));
		$user->define_multi_relation_column('interests', 'interests', 'Interests', '@name');
	}

	public function extend_user_form($user, $context) {
		$user->add_form_field('callsign', 'left')->tab('User');
		$user->add_form_field('birthdate', 'right')->tab('Membership');
		$user->add_form_field('join_date', 'left')->tab('Membership');
		$user->add_form_field('street_address', 'full')->tab('Membership');
		$user->add_form_field('city', 'left')->tab('Membership');
		$user->add_form_field('state', 'right')->tab('Membership');
		$user->add_form_field('zip', 'left')->tab('Membership');
		$user->add_form_field('cell_phone', 'left')->tab('Membership');
		$user->add_form_field('home_phone', 'right')->tab('Membership');
		$user->add_form_field('is_bod', 'left')->tab('Membership');
		$user->add_form_field('interests', 'left')->tab('Membership');
	}

}