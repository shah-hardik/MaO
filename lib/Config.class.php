<?php

/**
 * Config Class
 * 
 * Class to handle config operations
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since May 28, 2013
 * 
 */
class Config {
    

    /**
     * Mechanism to access variable globally
     * @var Array $_vars
     */
    public static $_vars = array(); 


    # constructor
    public function __construct() {
        
    }
 
    public static function get_all_configs_subscription(){
        return q(" select * from configs 
		                                 where 
		                                 (
										  `key` = '30_days' or 
										  `key` = '60_days' or 
										  `key` = '90_days' or 
										  `key` = '120_days' or 
										  `key` = '365_days'
										 ) 
										 order by id ASC ");
    }
	public static function get_all_configs_fees(){
        return q(" select * from configs 
		                                 where 
		                                 (
										  `key` = 'subscription_fees' or 
										  `key` = 'school_percentage' 
										 ) 
										 order by id ASC ");
    }
    public static function get_config_detail($id){
        return qs(sprintf("select * from configs where `key` = '%s'",$id));
    }
	
	public static function get_config_amount($id){
        return qs(sprintf("select * from configs where `id` = '%s'",$id));
    }
	
	public static function get_config_user_amount(){
		$val = (Config::get_subscription_fees()*Config::get_school_percentage())/100;
		return $val;
	}
	
	public static function get_subscription_fees(){
	   $data = qs(sprintf("select value from configs where `key` = 'subscription_fees'"));
	   return $data['value']; 
	}
	public static function get_school_percentage(){
	   $data = qs(sprintf("select value from configs where `key` = 'school_percentage'"));
	   return $data['value'];
	}
	
	
	
    public static function update($id,$val) {
        // Escape array for sql hijacking prevention
        $data[$id] = $val;
        
        $map = array();
        //$map['config_value'] = 'value';
		$map[$id] = 'value';
        
        $ds = _bindArray($data,$map);
        $condition = " `key` = '".$id."'";
        return qu('configs',$ds,$condition);
    }

}

?>