<?php
/**
 * The article category zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     article
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->article->common      = 'Article';
$lang->article->setting     = 'Basic Settings';
$lang->article->createDraft = 'Save the draft';
$lang->article->post        = 'Contribute';
$lang->article->check       = 'Review';
$lang->article->reject      = 'Reject';

$lang->article->id         = 'ID';
$lang->article->category   = 'Category';
$lang->article->categories = 'Category';
$lang->article->title      = 'Title';
$lang->article->alias      = 'Alias';
$lang->article->content    = 'Content';
$lang->article->source     = 'Source';
$lang->article->copySite   = 'Site';
$lang->article->copyURL    = 'URL';
$lang->article->keywords   = 'Keyword';
$lang->article->summary    = 'Summary';
$lang->article->author     = 'Author';
$lang->article->editor     = 'Edit';
$lang->article->addedDate  = 'Publish Time';
$lang->article->editedDate = 'Edit Time';
$lang->article->status     = 'Status';
$lang->article->type       = 'Type';
$lang->article->views      = 'View';
$lang->article->comments   = 'Comment';
$lang->article->stick      = 'Stick Up';
$lang->article->order      = 'Sort';
$lang->article->isLink     = 'Redirect';
$lang->article->link       = 'Link';
$lang->article->css        = 'CSS';
$lang->article->js         = 'JS';
$lang->article->layout     = 'Layout';

$lang->article->forward2Blog     = 'Copy to Blog';
$lang->article->forward2Forum    = 'Copy to Forum';
$lang->article->selectCategories = 'Select a Category';
$lang->article->selectBoard      = 'Select a Board';
$lang->article->confirmReject    = 'Do you want to reject it?';

$lang->submittion= new stdclass();
$lang->submittion->common  = 'Contribute';
$lang->submittion->check   = 'Review';
$lang->submittion->list    = 'Contribution List';
$lang->submittion->publish = 'Publish';
$lang->submittion->reject  = 'Reject';

$lang->submittion->status[0] = '';
$lang->submittion->status[1] = '<span class="label label-xsm label-primary">' . 'To be reviewed' .'</span>';
$lang->submittion->status[2] = '<span class="label label-xsm label-success">' . 'Pass' . '</span>';
$lang->submittion->status[3] = 'Reject';

$lang->submittion->typeList = array();
$lang->submittion->typeList['article'] = 'Article';
$lang->submittion->typeList['blog']    = 'Blog';

$lang->article->onlyBody = 'Display body only(for custom).';

$lang->article->list          = 'List';
$lang->article->admin         = 'Maintain';
$lang->article->create        = 'Publish';
$lang->article->setcss        = 'CSS Settings';
$lang->article->setjs         = 'JS Settings';
$lang->article->edit          = 'Edit';
$lang->article->files         = 'Attachment';
$lang->article->images        = 'Image';

$lang->article->submittion     = 'Contribute';
$lang->article->submissionTime = 'Contribute Time';
$lang->article->noSubmittion   = 'You have no contribution yet. Please contribute and earn points!';

$lang->article->submittionOptions = new stdclass;
$lang->article->submittionOptions->open  = 'On';
$lang->article->submittionOptions->close = 'Off';

$lang->blog->common = 'Blog';
$lang->blog->admin  = 'Maintain';
$lang->blog->list   = 'List';
$lang->blog->create = 'Publish';
$lang->blog->edit   = 'Edit';

$lang->page->common = 'Page';
$lang->page->admin  = 'Maintain`';
$lang->page->list   = 'List';
$lang->page->create = 'Add';
$lang->page->edit   = 'Edit';

$lang->article->sourceList['original']      = 'Original';
$lang->article->sourceList['copied']        = 'Copied';
$lang->article->sourceList['translational'] = 'Translated';
$lang->article->sourceList['article']       = 'Repost';

$lang->article->statusList['normal'] = 'Normal';
$lang->article->statusList['draft']  = 'Draft';

$lang->article->sticks[0] = 'No Stickup';
$lang->article->sticks[1] = 'Category Stickup';
$lang->article->sticks[2] = 'Global Stickup';

$lang->article->successStick   = 'Sticked to Top!';
$lang->article->successUnstick = 'Stickup cancelled!';

$lang->article->confirmDelete = 'Do you want to delete this article?';
$lang->article->categoryEmpty = 'Choose a category';

$lang->article->lblAddedDate = '<strong>Added on </strong> %s &nbsp;&nbsp;';
$lang->article->lblAuthor    = "<strong>Author </strong> %s &nbsp;&nbsp;";
$lang->article->lblSource    = '<strong>Source </strong>';
$lang->article->lblViews     = '<strong>Viewed </strong> %s';
$lang->article->lblEditor    = 'Last edited by %s on %s';
$lang->article->lblComments  = '<strong>Commented by </strong> %s';

$lang->article->none      = 'The End';
$lang->article->previous  = 'Previous';
$lang->article->next      = 'Next';
$lang->article->directory = 'Back to directory';
$lang->article->noCssTag  = 'No &lt;style&gt;&lt;/style&gt; tag';
$lang->article->noJsTag   = 'No &lt;script&gt;&lt;/script&gt;tag';

$lang->article->placeholder = new stdclass();
$lang->article->placeholder->addedDate = 'You can select a date to publish.';
$lang->article->placeholder->link      = 'Enter the link here. External link is OK.';

$lang->article->approveMessage = 'Your contribution <strong>%s</strong> has passed the review. You earned <strong>+%s</strong> points. Thanks for your support!';
$lang->article->rejectMessage  = 'Your contribution <strong>%s</strong> cannot pass the review. You can edit it and submit for review again. Thanks for your support!';

$lang->article->forwardFrom = 'Repost from';
