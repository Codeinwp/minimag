<?php
	class cwpConfig{
		public static $admin_page_menu_name ;
		public static  $admin_page_title 	;
		public static  $admin_page_header 	;
		public static  $admin_template_directory ;
		public static  $admin_template_directory_uri ;
		public static  $admin_uri 	;
		public static $admin_path  ;
		public static  $menu_slug 	;
		public static $structure;
		public static function init(){
			self::$admin_page_menu_name 	 = "Theme Options";
			self::$admin_page_title 		 = "Theme Options";
			self::$admin_page_header	 	 = "Theme Options";
			self::$admin_template_directory_uri  = get_template_directory_uri() . '/admin/layout';
			self::$admin_template_directory  = get_template_directory() . '/admin/layout';
			self::$admin_uri  		= 	get_template_directory_uri() . '/admin/'; 
			self::$admin_path 	 	= 	get_template_directory() . '/admin/';
			self::$menu_slug  		= 	"theme_options";
			self::$structure	= array(
						array(
							 "type"=>"tab",
							 "name"=>"General",
							 "options"=>array(
								array(
									
									"type"=>"image",
									"name"=>"Logo",
									"description"=>"Choose a logo",
									"id"=>"CMlogo",
									"default"=>"" 
								),		
								array(
									"type"=>"input_text",
									"name"=>"Facebook link",
									"description"=>"",
									"id"=>"CMfb",
									"default"=>"#"
								),
								array(
									"type"=>"input_text",
									"name"=>"Twitter link",
									"description"=>"",
									"id"=>"CMtw",
									"default"=>"#"
								),
								array(
									"type"=>"input_text",
									"name"=>"RSS link",
									"description"=>"",
									"id"=>"CMrss",
									"default"=>"#"
								),
							
										
								)
							 
						)
			
					); 
			 
		}	 
	
	} 
