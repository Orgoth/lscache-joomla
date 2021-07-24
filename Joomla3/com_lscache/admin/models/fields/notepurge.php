<?php

/*
 *  @since      1.2.1
 *  @author     LiteSpeed Technologies <info@litespeedtech.com>
 *  @copyright  Copyright (c) 2017-2018 LiteSpeed Technologies, Inc. (https://www.litespeedtech.com)
 *  @license    https://opensource.org/licenses/GPL-3.0
 */

defined('JPATH_BASE') or die;

use Joomla\Utilities\ArrayHelper;

JFormHelper::loadFieldClass('note');

/**
 * Display Purge Url field
 *
 * @since  1.2.1
 */
class JFormFieldNotePurge extends JFormFieldNote
{
	protected $type = 'NotePurge';
    
	protected function getLabel()
	{
		$description = (string) $this->element['description'];
        $description = JText::_($description);
        $settings = JComponentHelper::getParams('com_lscache');
        $secureWords = $settings->get('cleanCache');
        $root = JURI::root();
        $description = str_replace('{webroot}', $root, $description);
        $description = str_replace('{secureword}', $secureWords, $description);
        
        $this->element['description'] = $description;
        return parent::getLabel();
    }
    
}
