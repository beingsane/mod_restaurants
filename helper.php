<?php
defined('_JEXEC') or die;

abstract class mod_restaurantsHelper
{
	public static function getList(&$params)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('neighborhood, neighborhood_id, hex_color_code, restaurant, address1, zip, website, phone, blurb, display_logo');
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
			$results[$k]-> color = htmlspecialchars( $result->hex_color_code );
			$results[$k]-> nid = (int)$result->neighborhood_id;
			$results[$k]-> restaurant = htmlspecialchars( $result->restaurant );
			$results[$k]-> address1 = htmlspecialchars( $result->address1 );
			$results[$k]-> zip = htmlspecialchars( $result->zip );
			$results[$k]-> website = htmlspecialchars( $result->website );
			$results[$k]-> phone = htmlspecialchars( $result->phone );
			$results[$k]-> blurb = htmlspecialchars( $result->blurb );
			$results[$k]-> display_logo = (int)$result->display_logo;
		}

		return $results;
	}
}