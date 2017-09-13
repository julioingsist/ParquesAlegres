<?php 
/*
Plugin Name: Post and Categories index generator
Plugin URI: 
Description: Generates a index of post and catories. 
Version: 0.2.0
Author: Marco Constâncio
Author URI: http://www.betasix.net


*/

if (!defined('PCIG_PLUGIN_NAME'))
    define('PCIG_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('PCIG_PLUGIN_DIR'))
    define('PCIG_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . PCIG_PLUGIN_NAME);
    
function pcig_index_generator($params){   
	$all_content ="No category set";
	$display_types = array('list','tree');
	
	if(isset($params['category'])){
		$all_content ="";
		$content = array();							   					   
		
		if(isset($params['show'])){ $params['show']=explode(",",$params['show']); }
		
		if(!isset($params['display'])){
			$params['display']="tree";
		}else{
			if(!in_array($params['display'],$display_types)){
				$params['display']="tree";
			}
		}
		
		if(!isset($params['show'])){ $params['show']=array(); }
								
		if(!isset($params['links'])){
			$params['links']=array();
		}else{
			$params['links']=explode(",",$params['links']); 
		}
        
        $params['tags']="";

        if(isset($params['tags_or'])){
            $params['tags']="&tag=".$params['tags_or'];
        }	        
        if(isset($params['tags_and'])){
            $params['tags']="&tag=".str_replace(",","+",$params['tags_and']);
        }		

		if(!isset($params['postappend'])){ $params['postappend']=""; }
		if(!isset($params['postappend_link'])){ $params['postappend_link']=""; }
		
		if(!isset($params['postappend_separator'])){ 
            $params['postappend_separator']=""; 
        }else{
            switch($params['postappend_separator']){
                case 'comma': $params['postappend_separator']=", "; break;
                case 'space': $params['postappend_separator']=" "; break;
                case 'dash': $params['postappend_separator']=" - "; break;                
            }
        }	
        	
		if(!isset($params['postappend_prefix'])){ 
            $params['postappend_prefix']=""; 
        }else{
            switch($params['postappend_prefix']){
                case 'comma': $params['postappend_prefix']=", "; break;
                case 'space': $params['postappend_prefix']=" "; break;
                case 'dash': $params['postappend_prefix']=" - "; break;                
            }
        }	
        
		if(!isset($params['hide_empty'])){ 
			$params['hide_empty'] = 0; 
		}else{
			if($params['hide_empty']=="true"){
				$params['hide_empty'] = 1;
			}else{
				$params['hide_empty'] = 0;
			}
		}

		if(!isset($params['hide_categories'])){
			$params['hide_categories']=array();
		}else{
			$params['hide_categories']=explode(",",$params['hide_categories']); 
		}		

		if(!isset($params['hide_category_posts'])){
			$params['hide_category_posts']=array();
		}else{
			$params['hide_category_posts']=explode(",",$params['hide_category_posts']); 
		}			
		
		$category_by_slug = get_category_by_slug(trim($params['category']));	
		$category_by_id = get_category(trim($params['category']));	

		if($category_by_slug || $category_by_id){
	
			if($category_by_slug){ $category_object = $category_by_slug; }
			if($category_by_id){ $category_object = $category_by_id; }
            
            $pcig_content = pcig_get_content($category_object,$params);
  
			return $pcig_content;
		}else{
			return "There is no unique category with the slug '".$params['category']."'. Please insert a valid slug.\n";		
		}	
	}
    
	return $all_content; 
}


function pcig_get_content($category_object,$params){
	switch($params['display']){
		case 'list': $array_data = pcig_generate_category_list_array($category_object->term_id,$params); break;
		case 'tree': $array_data = pcig_generate_category_tree_array($category_object->term_id,$params); break;
	}	

	if(in_array("category_name",$params['show'])){
		$category_data = array();
		if(in_array("category_name",$params['links'])){
			$category_name = "<span class=\"pcig-category\"><a href=\"".get_category_link($category_object->term_id)."\" class=\"pcig-category-link\" title=\"".$category_object->name."\">".$category_object->name."</a></span>";
		}else{
			$category_name = "<span class=\"pcig-category\">".$category_object->name."</span>";
		}		
	
		if(in_array("post_title",$params['show'])){
			if(!in_array($category_object->slug,$params['hide_category_posts'])){	
				$posts_data = pcig_get_posts($category_object->term_id,$params);
				if($posts_data){
					$category_data = array_merge($category_data,$posts_data);
				}	
			}	
		}
		
		switch($params['display']){
			case 'list': array_unshift($array_data,$category_name,$category_data); break;
			case 'tree': $array_data = array($category_name,$category_data,$array_data); break;
		}			
	}else{
		//ADDON FOR A CATERGORY WIHT NO CHILD CATEGORIES
		$cat_args = array('type' => 'post', 'child_of' => $category_object->term_id, 
						  'orderby' => 'name', 'order' => 'ASC', 
						  'hide_empty' => 0, 'hierarchical' => 0, 
						  'exclude' => null, 'include' => null ,
						  'number' => null, 'taxonomy' => 'category',
						  'pad_counts' => false , 'parent' => $category_object->term_id);	
				  
		$subcategories = get_categories($cat_args);	 
		if(empty($subcategories)){
			$category_data = array();
			
			if(in_array("post_title",$params['show'])){
				if(!in_array($category_object->slug,$params['hide_category_posts'])){	
					$posts_data = pcig_get_posts($category_object->term_id,$params);
					if($posts_data){
						$category_data = array_merge($category_data,$posts_data);
					}	
				}	
			}
			
			switch($params['display']){
				case 'list': array_unshift($array_data,$category_data); break;
				case 'tree': $array_data = array($category_data,$array_data); break;
			}						
		}	
	}
	
	return "<ul class=\"pcig-ul-list pcig-top-ul-list\">".pcig_generate_tree($array_data)."</ul>";
}

function pcig_generate_category_tree_array($category_id,$params){
	
	$cat_args = array('type' => 'post', 'child_of' => $category_id, 
					  'orderby' => 'name', 'order' => 'ASC', 
					  'hide_empty' => 0, 'hierarchical' => 0, 
					  'exclude' => null, 'include' => null ,
					  'number' => null, 'taxonomy' => 'category',
					  'pad_counts' => false , 'parent' => $category_id);	
 			  
	$category_data = array();			 
	$subcategories = get_categories($cat_args);
	foreach($subcategories as $subcategory){
		if($params['hide_empty']){
			if(get_posts(array('category' => $subcategory->term_id))){
				$show_category=1;
			}else{
				$show_category=0;
			}
		}else{
			$show_category = 1;
		}	

		if(in_array($subcategory->slug,$params['hide_categories'])){
			$show_category = 0;			
		}		
		
		if($show_category){
			if(in_array("subcategory_name",$params['links'])){
				$subcategory_name = "<span class=\"pcig-category\"><a href=\"".get_category_link($subcategory->term_id)."\" class=\"pcig-category-link\" title=\"".$subcategory->name."\">".$subcategory->name."</a></span>";
			}else{
				$subcategory_name = "<span class=\"pcig-category\">".$subcategory->name."</span>";
			}
		
			$category_data[] = $subcategory_name;
			
			if(in_array("post_title",$params['show'])){
				if(!in_array($subcategory->slug,$params['hide_category_posts'])){	
					$posts_data = pcig_get_posts($subcategory->term_id,$params);
					
					if($posts_data){
						$category_data[] = $posts_data;
					}		
				}		
			}
					
			$category_child_data = pcig_generate_category_tree_array($subcategory->term_id,$params);

			if(!empty($category_child_data)){	
				$category_data[] = $category_child_data;
			}	
		}
	}
					
	return $category_data;
}

function pcig_generate_category_list_array($category_id,$params){
	
	$cat_args = array('type' => 'post', 'child_of' => $category_id, 'orderby' => 'name', 
					  'order' => 'ASC','hide_empty' => $params['hide_empty'], 
					  'hierarchical' => 1, 'exclude' => null, 'include' => null, 
					  'pad_counts' => false,'number' => null, 'taxonomy' => 'category');	
				 			  
	$category_data = array();		
	$subcategories = get_categories($cat_args);
	
	foreach($subcategories as $subcategory){

		if($params['hide_empty']){
			if($subcategory->category_count){
				$show_category = 1;
			}else{
				$show_category = 0;
			}		
		}else{
			$show_category = 1;
		}	

		if(in_array($subcategory->slug,$params['hide_categories'])){
			$show_category = 0;			
		}			
		
		if($show_category){
			if(in_array("subcategory_name",$params['links'])){
				$subcategory_name = "<span class=\"pcig-category\"><a href=\"".get_category_link($subcategory->term_id)."\" class=\"pcig-category-link\" title=\"".$subcategory->name."\">".$subcategory->name."</a></span>";
			}else{
				$subcategory_name = "<span class=\"pcig-category\">".$subcategory->name."</span>";
			}
			
			$category_data[] = $subcategory_name;

			if(in_array("post_title",$params['show'])){
				if(!in_array($subcategory->slug,$params['hide_category_posts'])){	
					$posts_data = pcig_get_posts($subcategory->term_id,$params);
					if($posts_data){
						$category_data[] = $posts_data;
					}		
				}
			}
		}
			
	}

	return $category_data;
}

function pcig_generate_tree($array_data){
	$tree_data = "";
	foreach($array_data as $node){
		if(is_array($node)){
			$tree_data .= "<ul class=\"pcig-ul-list\">".pcig_generate_tree($node)."</ul>";
		}else{
			$tree_data .="<li class=\"pcig-li-item\">".$node."</li>";
		}
	}
	return $tree_data;
}

function pcig_get_posts($category_id,$params=null){
	$post_names = array();

	$posts_data = pcig_get_category_posts($category_id,$params);
		        
	foreach($posts_data as $post_data){
		if(in_category($category_id, $post_data)){		
			$append = "";
			$append_link = "";
            
            if(!empty($params['postappend'])){
                $postappend_array = explode(",",htmlspecialchars_decode($params['postappend']));
                if(in_array("post_excerpt",$postappend_array)){	
                    $params['postappend'] = implode(",",array_diff($postappend_array,array("post_excerpt")));
                    $append.=$params['postappend_prefix']."<span class=\"pcig-post-excerpt\">".trim($post_data->post_excerpt)."</span>";
                }                
                
                $postappend_tags = pcig_find_tag_content($post_data->post_content,htmlspecialchars_decode($params['postappend']));
                if($postappend_tags){
                    $append.=$params['postappend_prefix'].implode($params['postappend_separator'],$postappend_tags);
                }	
            }		
            
            if(!empty($params['postappend_link'])){
                $postappend_link_array = explode(",",$params['postappend_link']);
                
                if(in_array("post_excerpt",$postappend_link_array)){
                    $params['postappend_link'] = implode(",",array_diff($postappend_link_array,array("post_excerpt")));
                    $append_link.=$params['postappend_prefix']."<span class=\"pcig-post_excerpt\">".trim($post_data->post_excerpt)."</span>";
                }			
                
                $postappend_link_tags = pcig_find_tag_content($post_data->post_content,htmlspecialchars_decode($params['postappend_link']));
                if($postappend_link_tags){
                    $append_link.=$params['postappend_prefix'].implode($params['postappend_separator'],$postappend_link_tags);
                }
            }
			
			if(in_array("post_title",$params['links'])){
				$post_name = "<span class=\"pcig-post-title\"><a href=\"".get_permalink($post_data->ID)."\" class=\"pcig-post-title-link\" title=\"".$post_data->post_title."\">".$post_data->post_title.$append_link."</a></span>  ";
			}else{
				$post_name = "<span class=\"pcig-post-title\">".$post_data->post_title.$append_link."</span>";
			}

			$post_names[] = $post_name.$append;
			
			if(isset($params['post_sections'])){
				$post_sections = explode(",",$params['post_sections']);
				
				if(in_array("post_excerpt",$post_sections)){
					$post_sections = implode(",",array_diff($post_sections,array("post_excerpt")));
					if(!empty($post_data->post_excerpt)){						
						$post_names[] = array($post_data->post_excerpt);
					}
				}else{
					$post_sections = implode(",",$post_sections);
				}
				
				$post_tags = pcig_find_tag_content($post_data->post_content,htmlspecialchars_decode($post_sections));
				if($post_tags){
					$post_names[] = $post_tags;
				}
			}		
		}
	}
	return $post_names;				  
}

function pcig_get_category_posts($category_id,$params){
	$extra_param="";
	
	if(isset($params["orderby"])){
		$extra_param.="&orderby=".$params["orderby"];
	}
	if(isset($params["order"])){
		$extra_param.="&order=".$params["order"];
	}

    $results = query_posts("cat=".$category_id.$params["tags"]."&posts_per_page=999".$extra_param);
	wp_reset_query();

	return $results;
}

function pcig_find_tag_content($post_content,$search_query){
	require_once 'simple_html_dom.php';

	$html = str_get_html($post_content);
    
	$tag_content = array();
    if($html){
        foreach($html->find($search_query) as $content) {
            $tag_content[] = $content->innertext;
        }
    }
	
	if(empty($tag_content)){
		return false;
	}else{
		return $tag_content;
	}
}

add_shortcode('pcig', 'pcig_index_generator');
