<?php

$table = Db_Structure::extend_table('user', 'users');
	$table->column('callsign', db_varchar, 10);
	$table->column('birthdate', db_date);
	$table->column('join_date', db_date);
	$table->column('street_address', db_varchar, 100);
	$table->column('city', db_varchar, 100);
	$table->column('state', db_varchar, 100);
	$table->column('zip', db_varchar, 100);
	$table->column('cell_phone', db_varchar, 20);
	$table->column('home_phone', db_varchar, 20);
	$table->column('is_bod', db_bool);

$table = Db_Structure::table('hcramembers_interests');
	$table->footprints();
	$table->primary_key('id');
	$table->column('name', db_varchar, 100);
	$table->column('code', db_varchar, 100);

$table = Db_Structure::table('hcramembers_users_interests');
	$table->primary_keys('user_id', 'interest_id');