<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      Anil Kumar Panigrahi
 * @copyright           Copyright (c) 2015, Anil Labs.
 * @license     
 * @link        http://www.anillabs.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Anil Labs core CodeIgniter class
 *
 * @package     CodeIgniter
 * @subpackage          Libraries
 * @category            Anil Labs 
 * @author      Anil Kumar Panigrahi
 * @link        http://www.anillabs.com
 */
class My_pagenation_lib
{
	function config_variable($total_rows,$per_page,$num_links)
	{
		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $total_rows;
		  $config["per_page"] = $per_page;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul style="background:white" class="pagination">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li>';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li>';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '&gt;';
		  $config["next_tag_open"] = '<li>';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = "&lt;";
		  $config["prev_tag_open"] = "<li>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='active'><a href='#'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li>";
		  $config["num_tag_close"] = "</li>";
		  $config['first_link'] = false;
          $config['last_link'] = false;
		  $config["num_links"] = $num_links;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  return $start = ($page - 1) * $config["per_page"];
	}
}
?>