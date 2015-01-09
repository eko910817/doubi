<?php
	function get_user_protocol($user) {
		return array('id'=>$user->id,
				'name'=>$user->name, 'id'=>$user->head,
				'sex'=>$user->sex, 'location'=>$user->location, );
	}
?>