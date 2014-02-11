<?php

/**
 * Extended controller
 * 
 * Let model / library enable autoload
 *
 * @author visvoy@gmail.com
 * @license free
 */
class MY_Controller extends CI_Controller {
    
    // anti: Indirect modification of overloaded property
    public $benchmark;
    public $hooks;
    public $config;
    public $log;
    public $utf8;
    public $uri;
    public $router;
    public $output;
    public $security;
    public $input;
    public $lang;
    public $load;

	/**
	 * Let model / library enable autoload
	 *
	 * @param string $key 
	 * @return object
	 */
    public function __get($key)
    {
        if ('db' == $key) {
            $this->load->database();
            return $this->db;
        }
        
        if (substr($key, 0, 3) == 'db_') {
            $this->{$key} = $this->load->database($key, true);
            return $this->{$key};
        }
        
        $suffix = strrchr($key, '_');
        
        if ('_model' == $suffix or '_mdl' == $suffix) {
            if (strpos(substr($key, -strlen($suffix)), '_')) {
                list($dir, $class) = explode('_', $key, 2);
                
                if (file_exists(APPPATH . 'models/' . $dir . '/' . $class . EXT)) {
                    $this->load->model($dir . '/' . $class, $key);
                    return $this->{$key};
                }
            }
            
            $this->load->model($key);
            return $this->{$key};
        }
        
        if ($suffix) {
            list($dir, $class) = explode('_', $key, 2);
            
            if (file_exists(APPPATH . 'libraries/' . $dir . '/' . $class . EXT)
            or file_exists(BASEPATH . 'libraries/' . $dir . '/' . $class . EXT)) {
                $this->load->library($dir . '/' . $class, '', $key);
                return $this->{$key};
            }
        }
        
        $this->load->library($key);
        return $this->{$key};
    }
    
} // class MY_Controller