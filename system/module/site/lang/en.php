<?php
/**
 * The site module zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->site->common        = "Site";

$lang->site->type            = 'Type';
$lang->site->status          = 'Status';
$lang->site->pauseTip        = 'Tip for pause site';
$lang->site->name            = 'Name';
$lang->site->module          = 'Modules';
$lang->site->lang            = 'Language';
$lang->site->defaultLang     = 'Default Language';
$lang->site->domain          = 'Main Domain';
$lang->site->allowedDomain   = 'Allowed Domain';
$lang->site->keywords        = 'Site Keywords';
$lang->site->indexKeywords   = 'Index Keywords';
$lang->site->meta            = 'Meta';
$lang->site->desc            = 'Description';
$lang->site->icpSN           = 'ICP';
$lang->site->icpLink         = 'ICP Link';
$lang->site->slogan          = 'Slogan';
$lang->site->mission         = 'Mission';
$lang->site->copyright       = 'Copyright';
$lang->site->allowUpload     = 'Allow upload files';
$lang->site->allowedFiles    = 'Allowed file types';
$lang->site->captcha         = 'Captcha';
$lang->site->mailCaptcha     = 'Mail captcha';
$lang->site->twContent       = 'traditional contents';
$lang->site->cn2tw           = 'Copy from simplified Chinese content';
$lang->site->cdn             = 'CND Site';

$lang->site->importantOption = 'Important option';
$lang->site->checkIP         = 'Check login IP';
$lang->site->checkPosition   = 'Check login position';
$lang->site->allowedPosition = 'Allowed position';
$lang->site->checkSessionIP  = 'Check the login ip';
$lang->site->setsecurity     = 'Security setting';

$lang->site->setBasic      = "Baisc";
$lang->site->setLang       = "Languages";
$lang->site->setSecurity   = "Security";
$lang->site->setUpload     = "Upload";
$lang->site->setRobots     = "Robots";
$lang->site->setOauth      = "Oauth";
$lang->site->setSinaOauth  = "Weibo Oauth";
$lang->site->setQQOauth    = "QQ Oauth";
$lang->site->oauthHelp     = "Help";
$lang->site->setRecPerPage = "Record per page";
$lang->site->usePosition   = "Use current Position";

$lang->site->typeList = new stdclass();
$lang->site->typeList->portal = 'Portal';
$lang->site->typeList->blog   = 'Blog';

$lang->site->statusList = new stdclass();
$lang->site->statusList->normal = 'Normal';
$lang->site->statusList->pause  = 'Pause';

$lang->site->checkIPList = array();
$lang->site->checkIPList['open']  = 'Open';
$lang->site->checkIPList['close'] = 'Close';

$lang->site->checkPositionList = array();
$lang->site->checkPositionList['open']  = 'Open';
$lang->site->checkPositionList['close'] = 'Close';

$lang->site->sessionIpoptions = array();
$lang->site->sessionIpoptions[0] = 'Can chaneged';
$lang->site->sessionIpoptions[1] = 'Must be same';

$lang->site->captchaList = array();
$lang->site->captchaList['open']  = 'Open';
$lang->site->captchaList['close'] = 'Close';
$lang->site->captchaList['auto']  = 'Automatic';

$lang->site->moduleAvailable = array();
$lang->site->moduleAvailable['user']    = 'Member';
$lang->site->moduleAvailable['forum']   = 'Forum';
$lang->site->moduleAvailable['blog']    = 'Blog';
$lang->site->moduleAvailable['book']    = 'Book';
$lang->site->moduleAvailable['message'] = 'Message';
$lang->site->moduleAvailable['search']  = 'search';
$lang->site->moduleAvailable['shop']    = 'shop';

$lang->site->metaHolder       = 'Tags liek <meta>, <script>, <style>, <link> is accepted.';
$lang->site->fileAllowedRole  = 'Use "," to divide different extension name.';
$lang->site->domainTip        = 'Redirect all request to this domian.';
$lang->site->allowedDomainTip = 'Use "," to divide different domain.';
$lang->site->allowedIPTip     = 'Use "," to divide different IP.';
$lang->site->wrongAllowedIP   = 'Wrong IP';
$lang->site->changePosition   = 'Your current login position not in allowed position.';
$lang->site->safeModeholder   = "You'd better use Safe mode in a safe environment";
$lang->site->sessionIpTip     = 'If opened login ip would be checked.';

$lang->site->robots            = 'Robots';
$lang->site->robotsUnwriteable = 'Can not write robots file, please make sure %s writeable first.';
$lang->site->reloadForRobots   = 'Reload this ppage';
$lang->site->defaultTip        = 'Under maintenance.';
$lang->site->icpTip            = 'Only for site in China mainland';

$lang->site->setPage = new stdclass();
$lang->site->setPage->article = 'Article List';
$lang->site->setPage->product = 'Product List';
$lang->site->setPage->blog    = 'Blog List';
$lang->site->setPage->forum   = 'Thread List';
$lang->site->setPage->reply   = 'Reply List';
$lang->site->setPage->message = 'Message List';
$lang->site->setPage->comment = 'Comment List';
