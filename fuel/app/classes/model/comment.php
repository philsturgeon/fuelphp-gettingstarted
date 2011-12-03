<?php
class Model_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'email',
		'website',
		'message',
		'post_id',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array('post', 'user');

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

}
