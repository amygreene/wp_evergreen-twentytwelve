<?php
//replace url in wp_register() to point to network_home register page
add_action( 'register' , 'register_replacement' );
function register_replacement( $link ){
	if ( ! is_user_logged_in() ) {
		if ( get_option('users_can_register') )
			$link = $before . '<a href="' . network_home_url('register', 'login') . '">' . __('Register') . '</a>' . $after;
		else
			$link = '';
	} else 
	{
		$link = $before . '<a href="' . admin_url() . '">' . __('Site Admin') . '</a>' . $after;
	}
	return $link;
}
?>