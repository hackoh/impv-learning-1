<?php

class Model_Inquiry extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'email',
		'tel',
		'type',
		'content',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'inquiries';

	public static function validate()
	{
		$val = Validation::forge('input');

		$val->add_field('name', '氏名', 'required|max_length[20]');
		$val->add_field('email', 'メールアドレス', 'required|max_length[255]');
		$val->add_field('tel', '電話番号', 'required|max_length[20]');
		$val->add_field('type', 'お問い合わせ種別', 'required|max_length[20]');
		$val->add_field('content', '内容', 'required|max_length[2000]');

		return $val;
	}

}
