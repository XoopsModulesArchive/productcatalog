<?php

//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <https://www.xoops.org>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //
// Author: Guy Mahieu                                          				 //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

$modversion['name'] = _MI_PRODUCT_CATALOGUE_NAME;
$modversion['version'] = '0.1.0';
$modversion['author'] = 'Guy Mahieu';
$modversion['description'] = _MI_PRODUCT_CATALOGUE_DESC;
$modversion['credits'] = '';
$modversion['license'] = 'GPL';
$modversion['help'] = '';
$modversion['official'] = 0;
$modversion['image'] = 'images/logo.png';
$modversion['dirname'] = _MI_DIR_NAME;

// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'prca_products';
$modversion['tables'][1] = 'prca_categories';
$modversion['tables'][2] = 'prca_product_categories';
$modversion['tables'][3] = 'prca_languages';
$modversion['tables'][4] = 'prca_translations';
$modversion['tables'][5] = 'prca_images';
$modversion['tables'][6] = 'prca_item_images';
$modversion['tables'][7] = 'prca_extra_fields';
$modversion['tables'][8] = 'prca_extra_field_values';

// these tables will be supported in the future:
// $modversion['tables'][]	= "prca_prices";
// $modversion['tables'][]	= "prca_price_groups";
// $modversion['tables'][]	= "prca_prices_price_groups";

// Admin
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Search
// $modversion['hasSearch'] = 1;
// $modversion['search']['file'] = "include/search.inc.php";
// $modversion['search']['func'] = "search_function";

// Smarty
$modversion['use_smarty'] = 1;

// Comments
$modversion['hasComments'] = 0;

// Notification
$modversion['hasNotification'] = 0;
