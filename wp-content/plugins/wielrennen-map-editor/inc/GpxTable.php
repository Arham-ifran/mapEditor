<?php 
	if(!class_exists('WP_List_Table')) {
		require_once( ABSPATH . 'wp-admin/includes/screen.php' );
		require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	}
	class GpxTable extends WP_List_Table {

		protected 
			$_data = [],
			$db,
			$viwe_links = [];

		public 
			$bulk_actions = [],
			$default_columns = [],
			$sortable_columns = [],
			$columns = [],
			$order_column = 'id';
		function __construct($args){
			
			parent::__construct($args);
		}

		private static $addedClosures = array();

	    public function __set($name, $value) {
	        if ($value instanceof \Closure) {
	            self::$addedClosures[$name] = $value;
	        } else {
	            parent::__set($name, $value);
	        }
	    }

	    public function __get($name) {
	    	return $this->$name;
	    }

	    public function __isset($name) {
	    	return isset($this->$name);
	    }

	    public function __call($method, $arguments) {
	        if (isset(self::$addedClosures[$method]))
	            return call_user_func_array(self::$addedClosures[$method], $arguments);
	        return call_user_func_array($method, $arguments);
	    }

	    public function set_views($viwe_links = []) {
	    	$this->viwe_links = $viwe_links;
	    }

		protected function get_views() { 
			return $this->viwe_links;
		}

		public function column_default($item, $column_name) {
			if (in_array($column_name, $this->default_columns)) {
				return $item[$column_name];
			}
		}

		public function get_sortable_columns() {
		    return $this->sortable_columns;
		}

		public function usort_reorder( $a, $b ) {
			// If no sort, default to title
			$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : $this->order_column;
			// If no order, default to asc
			$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
			// Determine sort order
			$result = strcmp( $a[$orderby], $b[$orderby] );
			// Send final sort direction to usort
			return ( $order === 'asc' ) ? $result : -$result;
		}
		public function get_bulk_actions() {
		    return $this->bulk_actions;
		}

		public function process_bulk_action($callback = '') {
			if (is_callable($callback)) {
				return $callback($this->current_action());
			}
		}

		public function get_columns() {
			return $this->columns;
		}
	  
		public function prepare_items() {
			global $wpdb; //This is used only if making any database queries

			$columns = $this->get_columns();
			$h_idden = [];
			$sortable = $this->get_sortable_columns();
			$this->_column_headers = [$columns, $h_idden, $sortable];

			$data = $this->table_data();
			// usort( $data, [&$this, 'usort_reorder' ] );
			// print_r(usort( $data, [&$this, 'usort_reorder' ] ));

			$this->process_bulk_action();

			$per_page = 10;
			$current_page = $this->get_pagenum();
			$total_items = count($data);

			$this->_data = array_slice($data,(($current_page-1)*$per_page),$per_page); 

			$this->items = $this->_data;

			$this->set_pagination_args([
				'total_items' => $total_items,                  //WE have to calculate the total number of items
				'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
				'total_pages' => ceil($total_items/$per_page)	//WE have to calculate the total number of pages
			]);
		}
		protected function table_data() {}

		
	}
	class Gpx_List_Table extends GpxTable {
		function __construct() {
			$args = [ 
				'singular'  => 'user',
				'plural'    => 'users',
				'ajax'      => true      
			];
			parent::__construct($args);
		}
		function column_title($item){       
			$actions = [
				'view'     => sprintf('<a href="javascript:void(0)"  class="edit_gpx_info" data-id="'.$item['id'].'">Edit Info</a>',$_REQUEST['page'],'id',$item['id']),
			];
			

        //Return the title contents
			return sprintf('%1$s %2$s',
				/*$1%s*/ $item['title'],          
				/*$2%s*/ $this->row_actions($actions)
			);
		}

		function column_edit($item){
			$config_id = $item["config_id"];       
			$actions = [
				'view'     => sprintf('<a target="_blank" href="'.get_site_url().'/aangepaste-kaart/#/'.$config_id.'">Edit Map</a>',$_REQUEST['page'],'id',$item['id']),
			];
			

        //Return the title contents
			return sprintf('%1$s %2$s',
				/*$1%s*/  'Custom Map',          
				/*$2%s*/ $this->row_actions($actions)
			);
		}
		function column_delete($item){
			$config_id = $item["config_id"];       
			$actions = [
				'view'     => sprintf('<a href="javascript:void()" class="delete_map" data-value="'.$config_id.'">Delete Map</a>',$_REQUEST['page'],'id',$item['id']),
			];
			

        //Return the title contents
			return sprintf('%1$s %2$s',
				/*$1%s*/  'Custom Map',          
				/*$2%s*/ $this->row_actions($actions)
			);
		}

		function column_is_active($item){       
			
			$result = ($item["is_active"] == 1 ? "Active": "Disabled");
			
			return sprintf('%1$s',
				 '<span type="button" >'.$result.'</span>'
			);
		}
		


		public function column_id($item) {
	        return sprintf(
	            '<input type="checkbox" name="id[]" value="%s">', $item['id']
	        );    
	    }

	    protected function table_data() {
	    	global $wpdb;
	        $wie_gpx = $wpdb->prefix.'admin_wie_gpx';
			$sql = "SELECT * FROM $wie_gpx";
			$sql .= " WHERE is_admin = 1";
			if(!empty($_GET['s'])){
				$search = $_GET['s'];
				$sql .= " AND (title LIKE '%{$search}%' OR 
                name LIKE '%{$search}%'
					 )";
			}
			$sql .= ' ORDER BY id DESC';
			$rows = $wpdb->get_results($sql, ARRAY_A);
			return $rows;
	    }
	}
