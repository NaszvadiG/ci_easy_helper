<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 *	Author: Md. Saddam Hossain
 *	E-mail: thedevsaddam@gmail.com
 *	Twitter: @thedevsaddam
 * 	Web: https://www.about.me/thedevsaddam
*/

//==========================================Code Start=========================================//

/**
 * Generate unique id
 *
 * @param  string  $prefix
 * @return string
 */
if ( ! function_exists('unique_id'))
{
    function unique_id($prefix = null)
    {	
    	$prefix = ($prefix == null)? 'thedevsaddam'.''.time().''.rand() : $prefix = $prefix.''.time().''.rand();
        return md5(uniqid ($prefix, true));
    }   
}

/**
 * String limitation or read more
 *
 * @param  string  $string
 * @param  string  $limit
 * @param  string  $url
 * @param  string  $url_text
 * @return string
 */

if ( ! function_exists('str_limit'))
{
    function str_limit($string = null, $limit = null, $url = null, $url_text = null)
    {	
    	$limit = ($limit == null)? 120 : $limit;
    	$url = ($url == null)? 'javascript:' : $url;
    	$url_text = ($url_text == null)? 'Read more' : $url_text;
    	if($string == null){
    		echo "Require string as first argument, limit as second argument [optional, default 120], url as third argument[optional]";
    		return false;
    	}
		// strip tags to avoid breaking any html
		$string = strip_tags($string);

		if (strlen($string) > $limit) {

		    // truncate string
		    $stringCut = substr($string, 0, $limit);

		    // make sure it ends in a word so assassinate doesn't become ass...
		    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="'.$url.'">'.$url_text.'</a>'; 
		}
		echo $string;
    }   
}


/**
 * Htmlentities check
 *
 * @param  string  $string
 * @return string
 */

//function for escape htmlentities
if ( ! function_exists('e'))
{
    function e($string = null)
    {	
    	$string = ($string == null)? false : $string;
    	return htmlspecialchars($string);       
    }   
}

/**
 * Die and dump an array or object
 *
 * @param  string  $data
 * @return string
 */
//start dd is die and dump
if ( ! function_exists('dd'))
{
	function dd($data = array() , $clean = false){

			if ($clean) {
				echo "<pre style='background-color:#ffffff; border:3px solid #ecf0f1; color:#df5000;'>";
				die(var_dump($data));
				echo "</pre>";	
			}else{
				echo "<pre style='background-color:#ffffff; border:3px solid #ecf0f1; color:#df5000;'>";
				print_r($data);
				echo "</pre>";			
			}

	}  
}

//end dd is die and dump

/**
 * Translate a string
 *
 * @param  string  $string
 * @return string
 */

//start translate
if ( ! function_exists('translate'))
{
	function translate($string = ''){
		$ci =& get_instance();
		return $ci->lang->line($string);
	}  
}

//end translate

/**
 * Encrypt a string to a hash value
 *
 * @param  string  $data, string $key
 * @return string
 */

// encryption function
if ( ! function_exists('enCrypt'))
{
	function enCrypt($data, $key = 'thedevsaddam') {
	   $salt = '967696b7709ebc3284e1ff233116761f6d06bce3';
	   $key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
	   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	   $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv));
	   return $encrypted;
	}
}
//end encryption function

/**
 * Decrypt a string to a hash value
 *
 * @param  string  $data, string $key
 * @return string
 */
// decryptin function
if ( ! function_exists('deCrypt'))
{
	function deCrypt($data, $key = 'thedevsaddam') {
	   $salt = '967696b7709ebc3284e1ff233116761f6d06bce3';
	   $key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
	   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	   $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($data), MCRYPT_MODE_ECB, $iv);
	   return $decrypted;
	}
}
// end decryptin function
	
/**
 * Collect the IP address
 * @return string IP address
 */
// getIP function
if ( ! function_exists('getIP'))
{
	function getIP() {
        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }

        return $ip;
	}
}
// end getIP function
	

/**
 * Send html email.
 *
 * @param  string  $from, string $to, string $subject, string $message
 * @return true on success or false on fail
 */

// sendMail function
if ( ! function_exists('sendMail'))
{
	function sendMail($from = null, $to = null, $subject = null, $message = null) {

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";        
        $headers .= "From: " . $from . ". \r\n";
        $headers .='Reply-To: webmaster@example.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
        $htmlmessage = '<html><body>'.wordwrap($message).'</body></html>';
        $rtm = mail($to, $subject, $htmlmessage, $headers);
        return $rtm;

	}
}
// end sendMail function

/**
 * Convert the given string to upper-case.
 *
 * @param  string  $value
 * @return string
 */

// upper function
if ( ! function_exists('upper'))
{
	function upper($value = null) {
		return mb_strtoupper($value);
	}
}
// end upper function
/**
 * Convert the given string to lower-case.
 *
 * @param  string  $value
 * @return string
 */
// lower function
if ( ! function_exists('lower'))
{
	function lower($value = null) {
		return mb_strtolower($value);
	}
}
// end lower function

/**
 * Is a string contains matches?
 *
 * @param  string  $string, string $search
 * @return boolean
 */
// matches function
if ( ! function_exists('matches'))
{
	function matches($string = null, $search = null) {
		if (strpos($string, $search) !== false) {
		    return true;
		}else{
			return false;
		}
	}
}
// end matches function

/**
 * Generate font-awesome-icon
 *
 * @param  string  $url
 * @return stirng font-awesome-icon code
 */
// fontAwesomeSocial function
if ( ! function_exists('fontAwesomeSocial'))
{
	function fontAwesomeSocial($url = null) {
		$socials = array('facebook.com', 'twitter.com', 'linkedin.com', 'pinterest.com', 'google.com', 'instagram.com', 'flickr.com', 'dribbble.com', 'tumblr.com', 'github.com', 'bitbucket.org', 'youtube.com');
		$social_icons = array('facebook', 'twitter', 'linkedin', 'pinterest', 'google-plus', 'instagram', 'flickr', 'dribbble', 'tumblr', 'github', 'bitbucket', 'youtube');
		for ($i=0; $i <count($socials) ; $i++) { 
			if(matches($url, $socials[$i])){
				return "fa fa-".$social_icons[$i];
				break;
			}else{
				if($i+1 == count($socials)){ return "fa fa-check"; }
			}
		}
	}
}
// end fontAwesomeSocial function


//=============================Codeigniter CRUD & Other functionalities====================================


/**
 * Return a segment of the URI
 * 
 * @param  integer  $segment
 * @return strin $value
 */

// segment function
if ( ! function_exists('segment'))
{
	function segment($segment = null) {
		$ci =& get_instance();
		$segment = ($segment != null)? (int)trim($segment) : 1;
		return $ci->uri->segment($segment);
	}
}
// end segment function


/**
 * Return value of the given key of form data posted in POST method
 *
 * @param  string  $field_name
 * @return strinv $value
 */

// post function
if ( ! function_exists('post'))
{
	function post($field_name = null, $xxs_filter = null) {
		$ci =& get_instance();
		if($field_name != null){
			return $ci->input->post(trim($field_name), $xxs_filter);
		}else{
			return false;
		}
	}
}
// end post function



/**
 * * Return value of the given key of form data posted in GET method
 *
 * @param  string  $field_name
 * @return strinv $value
 */

// get function
if ( ! function_exists('get'))
{
	function get($field_name = null, $xxs_filter = null) {
		$ci =& get_instance();
		if($field_name != null){
			return $ci->input->get(trim($field_name), $xxs_filter);
		}else{
			return false;
		}
	}
}
// end get function



/**
 * Load a view
 *
 * @param  string  $view_name, array $data
 * @return strinv $value
 */

// view function
if ( ! function_exists('view'))
{
	function view() {
		$ci =& get_instance();
		$args = func_get_args();
		$num_of_args = func_num_args();
		if ($num_of_args == 0) {
			echo "View method required at least one argument! Note: Required a view page.";
			return false;
		}
		$pos = strpos($args[0], '.');
		$view_path = ($pos)? str_replace('.', '/', $args[0]) : $args[0];
		if($num_of_args==1){
			return $ci->load->view($view_path);
		}
		if($num_of_args==2){
			return $ci->load->view($view_path, $args[1]);
		}	    

	}
}
// end view function



/**
 * Insert data into Table
 *
 * @param  string  $table, array $data
 * @return boolean ture on success, false on fail
 */

// create function
if ( ! function_exists('create'))
{
	function create($table = null, $data = null) {
		$ci =& get_instance();

		if(!empty($table) || $table != null){
			$table = strtolower(trim($table));
		}else{
			echo "Table is not set! Please use a table name as first argument.";
			return false;
		}

		if(!is_array($data)){
			echo "Please use an array as second argument!";
			return false;
		}else{
			return $ci->db->insert($table, $data);
		}

	}
}
// end create function



/**
 * Retreive all the records of a table
 *
 * @param  string  $table, string $order, string $type
 * @return object , array
 */

// all function
if ( ! function_exists('all'))
{
	function all($table = null, $columns = '*', $order = null, $limit = null, $type = null) {
		$ci =& get_instance();

		if(!empty($table) || $table != null){
			$table = strtolower(trim($table));
		}else{
			echo "Table is not set! Please use a table name as first argument.";
			return false;
		}

		
		if(!empty($order) || $order != null){
			$order = strtolower(trim($order));
		}else{
			$order = 'asc';
		}

		if(!empty($type) || $type != null){
			$type = strtolower(trim($type));
		}else{
			$type = 'object';
		}

		if($columns === '*'){
			$ci->db->select('*');
		}else{
			$ci->db->select($columns);
		}

		$ci->db->from($table)->order_by('id',$order);
		
		if($limit != null){
			$ci->db->limit($limit);
		}

		$query = $ci->db->get();

		if($type == 'object'){
			return $query->result();
		}

		if($type == 'array'){
			return $query->result_array();
		}
	}
}
// end all function


/**
 * Retreive a single record of an table
 *
 * @param  string  $table, string $column, string $where, string $type
 * @return row object , row array
 */

// find function
if ( ! function_exists('find'))
{
	function find($table = null, $columns = '*', $array = [], $wild = null, $or_array = [], $where = true, $order_by = null ,$type = null) {
		$ci =& get_instance();

		if(!empty($table) || $table != null){
			$table = strtolower(trim($table));
		}else{
			echo "Table is not set! Please use a table name as first argument.";
			return false;
		}

		if (!is_array($array)) {
			echo "An associative array required!";
			return false;
		}


		if(!empty($type) || $type != null){
			$type = strtolower(trim($type));
		}else{
			$type = 'object';
		}

		if($columns === '*'){
			$ci->db->select('*');
		}else{
			$ci->db->select($columns);
		}

		$ci->db->from($table);

		if ($where) {
			$ci->db->where($array);
			if(is_array($or_array) && !empty($or_array)){
				$ci->db->or_where($or_array);
			}		
		}else{
			$ci->db->like($array);
			if(is_array($or_array) && !empty($or_array)){
				$ci->db->or_like($or_array);
			}
		}

		if (!empty($order_by) && $order_by != null) {
			$ci->db->order_by($order_by);
		}

		if ($wild == null) {
			$ci->db->limit(1);
		}
		if (is_int($wild) && $wild != null){
			$ci->db->limit($wild);
		}

		$query = $ci->db->get();
		if($wild != '*' && !is_int($wild)){
			if($type == 'object'){
				return $query->row();
			}

			if($type == 'array'){
				return $query->row_array();
			}			
		}else{
			if($type == 'object'){
				return $query->result();
			}

			if($type == 'array'){
				return $query->result_array();
			}
		}


	}
}
// end find function

/**
 * Update data / record of the Table
 *
 * @param  string  $table, array $data, string $where, string $find_row
 * @return boolean ture on success, false on fail
 */

// update function
if ( ! function_exists('update'))
{
	function update($table = null, $data = null, $array = [], $or_array = []) {
		$ci =& get_instance();

		if(!empty($table) || $table != null){
			$table = strtolower(trim($table));
		}else{
			echo "Table is not set! Please use a table name as first argument.";
			return false;
		}

		if(!is_array($data)){
			echo "Please use an array as second argument!";
			return false;
		}else{
			if (!is_array($array)) {
				echo "An associative array required!";
				return false;
			}else{
				$ci->db->where($array);
				if(!empty($or_array)){
					$ci->db->or_where($or_array);
				}
				return $ci->db->update($table, $data);
			}
		}

	}
}
// end update function


/**
 * Update record if exist or Create new record if not exist
 *
 * @param  string  $table, array $data, string $where, string $find_row
 * @return boolean ture on success, false on fail
 */

// create_update function
if ( ! function_exists('create_update'))
{
	function create_update($table = null, $data = null, $array = [], $or_array = []) {
		$ci =& get_instance();

		if(!empty($table) || $table != null){
			$table = strtolower(trim($table));
		}else{
			echo "Table is not set! Please use a table name as first argument.";
			return false;
		}

		//check the row exist?
		$exist = find($table, $array, 1, $or_array);
		$isExist = (empty($exist))? false : true;

		if ($isExist) {
			// update the row
			if(!is_array($data)){
				echo "Please use an array as second argument!";
				return false;
			}else{
				if (!is_array($array)) {
					echo "An associative array required!";
					return false;
				}else{
					$ci->db->where($array);
					if(!empty($or_array)){
						$ci->db->or_where($or_array);
					}
					$return = $ci->db->update($table, $data);
					return ($return)? 'updated' : false;
				}
			}			
		}else{
			//create row
			if(!is_array($data)){
				echo "Please use an array as second argument!";
				return false;
			}else{
				$return = $ci->db->insert($table, $data);
				return ($return)? 'created' : false;
			}		
		}



	}
}
// end create_update function


/**
 * Update record of the Table
 *
 * @param  string  $table, array $data, string $where, string $find_row
 * @return boolean ture on success, false on fail
 */

// delete function
if ( ! function_exists('delete'))
{
	function delete($table = null, $array= [], $or_array = []) {
		$ci =& get_instance();

		if(!empty($table) || $table != null){
			$table = strtolower(trim($table));
		}else{
			echo "Table is not set! Please use a table name as first argument.";
			return false;
		}

		if (!is_array($array)) {
			echo "An associative array required!";
			return false;
		}else{
			$ci->db->where($array);
			if(!empty($or_array)){
				$ci->db->or_where($or_array);
			}
			return $ci->db->delete($table);
		}
	}
}
// end delete function
