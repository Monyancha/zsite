<?php
/**
 * The tree category zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->tree->add         = "Add";
$lang->tree->edit        = "Edit";
$lang->tree->addChild    = "Add a Sub";
$lang->tree->delete      = "Delete";
$lang->tree->browse      = "View Category";
$lang->tree->manage      = "Category Admin";
$lang->tree->fix         = "Fix Data";
$lang->tree->children    = "Subcategory";
$lang->tree->layout      = 'Layout';

$lang->tree->common           = 'Category';
$lang->tree->noCategories     = 'Please create a category.';
$lang->tree->timeCountDown    = "<strong id='countDown'>3</strong> seconds later, it will be redirected to Category page.";
$lang->tree->redirect         = 'Redirect Now';
$lang->tree->aliasRepeat      = 'Alias %s is existed. Do not add it again.';
$lang->tree->aliasConflict    = 'Alias %s is conflicted with system module. Do not add it.';
$lang->tree->aliasNumber      = 'Alias cannot be numbers.';
$lang->tree->hasChildren      = 'This board belongs to a sub board. Do not delete it.';
$lang->tree->confirmDelete    = "Do you want to delete this category?";
$lang->tree->successFixed     = "Fixed!";
$lang->tree->browseByCategory = 'View by Category';

$lang->tree->placeholder = new stdclass();
$lang->tree->placeholder->link = 'Enter a link. External one is OK.';

/* Lang items for article, products. */
$lang->category = new stdclass();
$lang->category->common     = 'Category';
$lang->category->name       = 'Name';
$lang->category->abbr       = 'Abbreviation';
$lang->category->alias      = 'Alias';
$lang->category->parent     = 'Parent Category';
$lang->category->desc       = 'Description';
$lang->category->keywords   = 'Keyword';
$lang->category->children   = "Child Category";
$lang->category->unsaleable = 'Not for Sale';
$lang->category->isLink     = 'Jump';
$lang->category->link       = 'Link';

/* Lang items for forum. */
$lang->board = new stdclass();
$lang->board->common     = 'Board';
$lang->board->name       = 'Board Name';
$lang->board->abbr       = 'Abbreviation';
$lang->board->alias      = 'Alias';
$lang->board->parent     = 'Parent Board';
$lang->board->desc       = 'Description';
$lang->board->keywords   = 'Keyword';
$lang->board->children   = "Child Board";
$lang->board->readonly   = 'Access Permission';
$lang->board->moderators = 'Moderator';
$lang->board->isLink     = 'Jump';
$lang->board->link       = 'Link';

$lang->board->readonlyList[0] = 'Public';
$lang->board->readonlyList[1] = 'Read Only';

$lang->board->placeholder = new stdclass();
$lang->board->placeholder->moderators  = 'Use comma to separate user names';
$lang->board->placeholder->setChildren = 'Set secondary board to display forum.';

/* Lang items for express. */
$lang->express = new stdclass();
$lang->express->common = 'Express';
$lang->express->name   = 'Express Name';

/* Lang items for wechat menu. */
$lang->wechatMenu = new stdclass();
$lang->wechatMenu->common     = 'Menu for public account';
$lang->wechatMenu->name       = 'Title';
$lang->wechatMenu->parent     = 'Parent Menu';
$lang->wechatMenu->children   = "Child Menu";
$lang->wechatMenu->delete     = "Detele";
$lang->wechatMenu->commit     = "Sync";

$lang->wechatMenu->setResponse = 'Response Settings';
