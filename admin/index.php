<?php

// ------------------------------------------------------------------------ //
// XOOPS - PHP Content Management System                      //
// Copyright (c) 2000 XOOPS.org                           //
// <https://www.xoops.org>                             //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// //
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// //
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //

require_once('../../../include/cp_header.php');
require_once('../../../class/smarty/Smarty.class.php');
require_once('languagemanager.php');
require_once('categorymanager.php');
require_once('extrafieldmanager.php');

function main()
{
    xoops_cp_header();

    include('menu.php');

    echo '<h4><div align="center">Product Catalogue Administration</div></h4>';

    echo '<br><table class="outer" cellspacing="1" cellpadding="4" width="80%" align="center"><tr><td align="center" class="even">';

    foreach ($adminmenu as $menu_item) {
        echo '<p><a href="../' . $menu_item['link'] . '">' . $menu_item['title'] . '</a></p>';
    }

    echo '</td></tr></table>';

    xoops_cp_footer();
}

// post overwrites get here
$op = 'main';
if (isset($_GET)) {
    foreach ($_GET as $k => $v) {
        ${$k} = $v;
    }
}
if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        ${$k} = $v;
    }
}

switch ($op) {
    case 'languagemanager':
        languageAdminMain();
        break;
    case 'languagemanager_addlanguage':
        if (isset($language_name)) {
            addNewLanguage($language_name);
        } else {
            echo 'Unable to add language, name was empty!';
        }
        break;
    case 'languagemanager_deletelanguage':
        if (isset($id)) {
            deleteLanguage($id);
        } else {
            echo 'Unable to delete language, id was empty!';
        }
        break;
    case 'languagemanager_editlanguage':
        if (isset($id) && isset($name)) {
            editLanguage($id, $name);
        } else {
            echo 'Unable to delete language, id and/or name were empty!';
        }
        break;
    case 'languagemanager_savelanguage':
        if (isset($id) && isset($name)) {
            saveLanguage($id, $name);
        } else {
            echo 'Unable to save language, id and/or name were empty!';
        }
        break;
    case 'categorymanager':
        categoryAdminMain();
        break;
    case 'extrafieldmanager':
        if (isset($item_type)) {
            extraFieldAdminMain($item_type);
        } else {
            extraFieldAdminMain();
        }
        break;
    case 'productmanager':
        xoops_cp_header();
        echo '<h4>' . _AM_MANAGE_PRODUCTS . '</h4>';
        xoops_cp_footer();
        break;
    case 'main':
    default:
        main();
        break;
}
