<?php

function optionsframework_options() {
	$options = array();
   // HEADER
	$options[] = array(
		'name' => __('General Options', 'onetone'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Upload Logo', 'onetone'),
		'id' => 'logo',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Favicon', 'onetone'),
		'desc' => __('An icon associated with a URL that is variously displayed, as in a browser\'s address bar or next to the site name in a bookmark list. Learn more about', 'onetone'),
		'id' => 'favicon',
		'type' => 'upload');
		
		$options[] = array(
		'name' =>  __('Post & Page Background', 'onetone'),
		'id' => 'page_background',
		'std' => $page_background,
		'type' => 'background' );
		
			
	$options[] = array(
		'name' =>  __('Header Menu Font Color', 'onetone'),
		'id' => 'font_color',
		'std' => '#ddd',
		'type' => 'color' );
	
	$options[] = array(
		'name' =>  __('Links Color', 'onetone'),
		'id' => 'links_color',
		'std' => '#963',
		'type' => 'color' );
	
	$options[] = array(
		'name' =>  __('Back to Top Button', 'onetone'),
		'id' => 'back_to_top_btn',
		'std' => 'show',
		'class' => 'mini',
		'type' => 'select',
		'options'=>array("show"=>"show","hide"=>"hide")
		);
		
		
	$options[] = array(
		'name' => __('Custom CSS', 'onetone'),
		'desc' => __('The following css code will add to the header before the closing &lt;/head&gt; tag.', 'onetone'),
		'id' => 'custom_css',
		'std' => 'body{margin:0px;}',
		'type' => 'textarea');
	
		////HOME PAGE
		$options[] = array(
		'name' => __('Home Page', 'onetone'),
		'type' => 'heading');
		
		//HOME PAGE SECTION
		
	   $options[] = array(
		'name' => __('Content Sections Num', 'onetone'),
		'desc' => __('The number of home page sections.', 'onetone'),
		'id' => 'section_num',
		'std' => '6',
		'type' => 'text');
		
		$options[] = array('name' => __('Section Background Video', 'onetone'),'std' => 'ab0TSkLe-E0','desc' => __('YouTube Video ID', 'onetone'),'id' => 'section_background_video_0',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Video Controls', 'onetone'),
		'desc' => __('Display video control buttons.', 'onetone'),
		'id' => 'video_controls',
		'std' => '1',
		'class' => 'mini',
		'options' => array('1'=>'yes','0'=>'no'),
		'type' => 'select');
		
		$video_background_section = array("0"=>"No video background");
		if( is_numeric( $section_num ) ){
		for($i=1; $i <= $section_num; $i++){
			$video_background_section[$i] = "Secion ".$i;
			}
		}
		$options[] = array('name' => __('Video Background Section', 'onetone'),'std' => '1','id' => 'video_background_section',
		'type' => 'select','options'=>$video_background_section);
		
		
		$options[] = array('name' => __('Section 1 Content', 'onetone'),'std' => 'content','id' => 'section_1_content',
		'type' => 'select','options'=>array("content"=>"Content","slider"=>"Slider"));
		
	  
		
		
		
		if(isset($section_num) && is_numeric($section_num) && $section_num>0){
		$section_num = $section_num;
		}
		else{
		$section_num = $default_section_num;
		}
	
		for($i=0; $i < $section_num; $i++){
		
		if(!isset($section_title[$i])){$section_title[$i] = "";}
		if(!isset($section_menu[$i])){$section_menu[$i] = "";}
		if(!isset($section_background[$i])){$section_background[$i] = array('color' => '',
		'image' => '',
		'repeat' => '',
		'position' => '',
		'attachment'=>'');}
		if(!isset($section_css_class[$i])){$section_css_class[$i] = "";}
		if(!isset($section_content[$i])){$section_content[$i] = "";}
		
		$options[] = array('name' => sprintf(__('Section %s', 'onetone'),($i+1)),'id' => 'slide_group_start_'.$i.'','type' => 'start_group','class'=>'group_close');
		$options[] = array('name' => __('Section Title', 'onetone'),'id' => 'section_title_'.$i.'','type' => 'text','std'=>$section_title[$i]);
		$options[] = array('name' => __('Menu Title', 'onetone'),'id' => 'menu_title_'.$i.'','type' => 'text','std'=>$section_menu[$i],'desc'=>'This title will display in the header menu. It is required');
		$options[] = array('name' => __('Menu Slug', 'onetone'),'id' => 'menu_slug_'.$i.'','type' => 'text','std'=>'','desc'=>'The  "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.');
		
		
		
		$options[] = array('name' =>  __('Section Background', 'onetone'),'id' => 'section_background_'.$i.'','std' => $section_background[$i],'type' => 'background' );
		
		$options[] = array('name' => __('Parallax Scrolling Background Image', 'onetone'),'std' => 'no','id' => 'parallax_scrolling_'.$i.'',
		'type' => 'select','class'=>'mini','options'=>array("no"=>"no","yes"=>"yes"));
		
	    if($i == 0){
		
		}
		
		$options[] = array('name' => __('Section Css Class', 'onetone'),'id' => 'section_css_class_'.$i.'','type' => 'text','std'=>$section_css_class[$i]);
	   
	  
	   
	   $options[] = array('name' => __('Section Content', 'onetone'),'id' => 'section_content_'.$i,'std' => $section_content[$i],'type' => 'editor');
	
		$options[] = array('name' => '','id' => 'slide_group_end_'.$i.'','type' => 'end_group');
		
		}
		
	return $options;
}