<?php
defined('_JEXEC') or die;

abstract class mod_restaurantsHelper
{
	public static function getHead($params, $module)
	{
		// get a jquery document object
		$document	= JFactory::getDocument();
	/*	
	if(file_exists(JPATH_BASE.'/templates/'.$template.'/html/mod_restaurants/js/default.js'))
		{
			$document->addScript(JURI::root().'templates/'.$template.'/html/mod_restaurants/js/default.js');	
		}
		else{
			$document->addScript(JURI::root().'modules/mod_restaurants/tmpl/js/btbase64.min.js');
			if($params->get('enable-custom-infobox')){
				$document->addScript(JURI::root().'modules/mod_restaurants/tmpl/js/infobox.js');		
			}
			$document->addScript(JURI::root().'modules/mod_restaurants/tmpl/js/default.js');	
		}
	*/
	if(file_exists(JPATH_BASE.'/templates/'.$template.'/html/mod_restaurants/css/styles.css'))
		{
			$document->addStyleSheet(JURI::root().'templates/'.$template.'/html/mod_restaurants/css/style.css');	
		}
		else{
			$document->addStyleSheet(JURI::root().'modules/mod_restaurants/tmpl/css/style.css');
		}
	}
	
	public static function getList(&$params)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('neighborhood, neighborhood_id, hex_text, hex_background, restaurant, address1, zip, website, phone, blurb, display_logo');
		$query->from('#__rl_v_restaurant_list');
		$query->order('sort_order ASC, restaurant ASC');
		$db->setQuery($query, 0 /*, $params->get('count', 5)*/);

		try
		{
			$results = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseError(500, $e->getMessage());
			return false;
		}

		foreach ($results as $k => $result)	
		{
			$results[$k] = new stdClass;
			$results[$k]-> neighborhood = htmlspecialchars( $result->neighborhood );
			$results[$k]-> bgcolor = htmlspecialchars( $result->hex_background );
			$results[$k]-> color = htmlspecialchars( $result->hex_text);
			$results[$k]-> nid = (int)$result->neighborhood_id;
			$results[$k]-> restaurant = htmlspecialchars( $result->restaurant,(ENT_COMPAT | ENT_HTML401),ini_get("default_charset"), false );
			$results[$k]-> address1 = htmlspecialchars( $result->address1 );
			$results[$k]-> zip = htmlspecialchars( $result->zip );
			$results[$k]-> website = htmlspecialchars( $result->website );
			$results[$k]-> phone = htmlspecialchars( $result->phone );
			//$results[$k]-> blurb = htmlspecialchars( $result->blurb,(ENT_COMPAT | ENT_HTML401),ini_get("default_charset"), false );
			$results[$k]-> blurb = $result->blurb;
			$results[$k]-> display_logo = (int)$result->display_logo;
		}

		return $results;
	}
}