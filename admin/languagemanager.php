<?php

function languageAdminMain()
{
    xoops_cp_header();

    $classHandler = xoops_getModuleHandler('language', 'productcatalogue');

    $languages = $classHandler->getObjects();

    // todo: Use XoopsTpl?

    $smarty = new Smarty();

    $smarty->left_delimiter = '<{';

    $smarty->right_delimiter = '}>';

    $smarty->assign('languages', $languages);

    $smarty->display('../../templates/admin/prca_languages_list.htm');

    xoops_cp_footer();
}

function addNewLanguage($language_name)
{
    $classHandler = xoops_getModuleHandler('language', 'productcatalogue');

    /** @var Language $new_language */

    $new_language = $classHandler->create();

    $new_language->setVar('name', $language_name);

    $insert_result = $classHandler->insert($new_language);

    if (!$insert_result) {
        redirect_header('index.php?op=languagemanager', 3, "Unable to add language <b>$language_name</b>, reason unknown!");
    } else {
        redirect_header('index.php?op=languagemanager', 1, "Language <b>$language_name</b>, was added with id <b>$insert_result</b>!");
    }
}

function saveLanguage($id, $language_name)
{
    $classHandler = xoops_getModuleHandler('language', 'productcatalogue');

    $new_language = $classHandler->create();

    $new_language->setVar('id', $id);

    $new_language->setVar('name', $language_name);

    $insert_result = $classHandler->insert($new_language);

    if (!$insert_result) {
        redirect_header('index.php?op=languagemanager', 3, "Unable to update language <b>$language_name</b>, reason unknown!");
    } else {
        redirect_header('index.php?op=languagemanager', 1, "Language <b>$language_name</b>, was updated!");
    }
}

function deleteLanguage($id)
{
    $classHandler = xoops_getModuleHandler('language', 'productcatalogue');

    $language_to_delete = $classHandler->create();

    $language_to_delete->setVar('id', $id);

    if ($classHandler->delete($language_to_delete)) {
        redirect_header('index.php?op=languagemanager', 2, "Language with id <b>$id</b>, was deleted!");
    } else {
        redirect_header('index.php?op=languagemanager', 3, "Unable to delete language with id <b>$id</b>, reason unknown!");
    }
}

function editLanguage($id, $name)
{
    xoops_cp_header();

    require XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form = new XoopsThemeForm('Edit language', 'editlanguage', 'index.php', 'POST');

    $form->addElement(new XoopsFormHidden('op', 'languagemanager_savelanguage'));

    $form->addElement(new XoopsFormHidden('id', $id));

    $form->addElement(new XoopsFormLabel(_AM_ID, $id));

    $form->addElement(new XoopsFormText(_AM_LANGUAGE, 'name', 25, 255, $name));

    $form->addElement(new XoopsFormButton('', 'submit', _AM_SAVE, 'submit'));

    $form->display();

    echo '<div align="center"><a href="index.php?op=languagemanager">' . _AM_DISCARD . '</a></div>';

    xoops_cp_footer();
}
