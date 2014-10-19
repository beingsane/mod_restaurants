<?php
defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

mod_restaurantsHelper::getHead($params,$module);
$list = mod_restaurantsHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_restaurants', $params->get('layout', 'default'));