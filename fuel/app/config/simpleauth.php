<?php
return array(
    /**
     * Groups as id => array(name => <string>, roles => <array>)
     */
    'groups' => array(
   	  -1   => array('name' => 'Banned', 'roles' => array('banned')),
   	  0	=> array('name' => 'Guests', 'roles' => array()),
   	  1	=> array('name' => 'Users', 'roles' => array('user')),
   	  50   => array('name' => 'Moderators', 'roles' => array('user', 'moderator')),
   	  100  => array('name' => 'Administrators', 'roles' => array('user', 'moderator', 'admin')),
    ),
);