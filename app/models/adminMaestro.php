<?php

class AdminMaestro extends Eloquent{
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	public static $table = 'adminMaestros';
	
	

	public function set_password($string){
			$this->set_attribute('password',Hash::make($string));
		
	}
