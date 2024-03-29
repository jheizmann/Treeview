<?php
/*
 * Copyright (C) Vulcan Inc.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program.If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * @file
 * @ingroup TreeView_Language
 *
 * English version of the Treeview language class.
 * @author Thomas Schweitzer
*/
if (!defined('MEDIAWIKI')) die();

/**
 * German language labels for important Treeview labels (parser functions, ,...).
 *
 * @author Thomas Schweitzer
 */
class TVLanguageDe extends TVLanguage {

	protected $mParserFunctions = array(
		TVLanguage::PF_TREE				=> 'baum', 
		TVLanguage::PF_GENERATE_TREE	=> 'erzeugeBaum'
	);
	
	protected $mParserFunctionsParameters = array(
		TVLanguage::PFP_ROOT		=> 'wurzel', 
		TVLanguage::PFP_ROOT_LABEL	=> 'wurzelname', 
		TVLanguage::PFP_THEME		=> 'design',
		TVLanguage::PFP_PROPERTY	=> 'attribut',
		TVLanguage::PFP_SOLR_QUERY	=> 'solrquery',
		TVLanguage::PFP_FILTER		=> 'filter',
		TVLanguage::PFP_WIDTH		=> 'breite',
		TVLanguage::PFP_HEIGHT		=> 'höhe'
	);
	
}


