<?php
/**
 * The comment module zh-cn file of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     comment
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->guarder = new stdclass();

$lang->guarder->common       = 'Security Settings';
$lang->guarder->action       = 'Action';
$lang->guarder->then         = 'Then';
$lang->guarder->setBlacklist = 'Blacklist';
$lang->guarder->setWhitelist = 'Whitelist';
$lang->guarder->setCaptcha   = 'Verification Code';
$lang->guarder->addBlacklist = 'Add to Blacklist';
$lang->guarder->addCaptcha   = 'Add verification code';
$lang->guarder->getEmailCode = 'Get verification code';

$lang->guarder->captcha        = 'Verification Code';
$lang->guarder->question       = 'Question';
$lang->guarder->answer         = 'Answer';
$lang->guarder->numbers        = array('Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten');
$lang->guarder->operators      = array('*' => 'multiply', '-' => 'minus', '+' => 'plus');
$lang->guarder->equal          = '=';
$lang->guarder->placeholder    = 'numbers/letters';
$lang->guarder->password       = 'Admin Password';
$lang->guarder->passwordHolder = 'Enter current account password';
$lang->guarder->identityTip    = 'Enter IP, Email, account, or sensitive words.';
$lang->guarder->captchaTip     = 'Once custom verification code set, frontend will automatically call those codes.';

$lang->guarder->verify        = 'Current action requires admin privilege verification for security reasons.';
$lang->guarder->okFile        = 'File Mode';
$lang->guarder->created       = 'Created';
$lang->guarder->email         = 'Email verification';
$lang->guarder->setSecurity   = 'Security Question';
$lang->guarder->captcha       = 'Verification Code';
$lang->guarder->needVerify    = 'Admin verification is required.';
$lang->guarder->emailFail     = 'Please enter correct verification code.';
$lang->guarder->questionFail  = 'Please enter correct answers to security question.';
$lang->guarder->verifySuccess = 'Verified! Please continue.';
$lang->guarder->noConfigure   = "Email settings cannot be found.";
$lang->guarder->noEmail       = "No Email address entered";
$lang->guarder->noQuestion    = "No security questions set up.";
$lang->guarder->noCaptcha     = "Email verification is disabled.";
$lang->guarder->okFileVerify  = "Please create <span class='red'>%s</span> on your web server and enter <span class='red'>%s</span>.";
$lang->guarder->sendSuccess   = 'Verification code has been sent to %s';
$lang->guarder->options       = 'Verification options';

$lang->guarder->blacklistModes['all']      = 'All';
$lang->guarder->blacklistModes['ip']       = 'IP Address';
$lang->guarder->blacklistModes['account']  = 'Account';
$lang->guarder->blacklistModes['keywords'] = 'Keyword';
$lang->guarder->blacklistModes['guard']    = 'Website';
$lang->guarder->blacklistModes['email']    = 'Email';

$lang->guarder->whitelist = new stdclass();
$lang->guarder->whitelist->ip            = 'IP whitelist';
$lang->guarder->whitelist->account       = 'Account whitelist';
$lang->guarder->whitelist->accountHolder = 'Multiple accounts, please use comma to separate them, such as zhangsan, lisi';
$lang->guarder->whitelist->ipHolder      = 'Multiple IP, please use comma to separate them, such as 202.194.133.1,202.194.132.0/28';
$lang->guarder->whitelist->wrongIP       = 'IP Error';

$lang->guarder->permanent = 'Permanent';
$lang->guarder->interval  = 'within mins';
$lang->guarder->perDay    = 'exceed per day';
$lang->guarder->exceed    = 'exceed';
$lang->guarder->times     = 'times';
$lang->guarder->disable   = 'Disable';

$lang->guarder->operationList = new stdclass();

$lang->guarder->operationList->ip = new stdclass();
$lang->guarder->operationList->ip->logonFailure    = 'Login failed.';
$lang->guarder->operationList->ip->register        = 'Registration count';
$lang->guarder->operationList->ip->resetPassword   = 'Reset Password';
$lang->guarder->operationList->ip->resetPWDFailure = ' Password reset failed.';
$lang->guarder->operationList->ip->postThread      = 'Post Thread';
$lang->guarder->operationList->ip->postComment     = 'Post Comment';
$lang->guarder->operationList->ip->postReply       = 'Post Reply';
$lang->guarder->operationList->ip->post            = 'Post Request';
$lang->guarder->operationList->ip->search          = 'Search Times';
$lang->guarder->operationList->ip->error404        = 'Error 404';
$lang->guarder->operationList->ip->captchaFail     = 'Verification Error';

$lang->guarder->operationList->account = new stdclass();
$lang->guarder->operationList->account->logonFailure    = 'Login failed.';
$lang->guarder->operationList->account->resetPassword   = 'Reset Password';
$lang->guarder->operationList->account->resetPWDFailure = ' Password reset failed.';
$lang->guarder->operationList->account->postThread      = 'Post Thread';
$lang->guarder->operationList->account->postComment     = 'Post Comment';
$lang->guarder->operationList->account->postReply       = 'Post Reply';
$lang->guarder->operationList->account->post            = 'Post Request';
$lang->guarder->operationList->account->search          = 'Search Times';
$lang->guarder->operationList->account->error404        = 'Error 404';
$lang->guarder->operationList->account->captchaFail     = 'Verification Error';

$lang->guarder->punishOptions = array();
$lang->guarder->punishOptions[5]     = '5 mins'; 
$lang->guarder->punishOptions[10]    = '10 mins'; 
$lang->guarder->punishOptions[30]    = '30 mins'; 
$lang->guarder->punishOptions[60]    = '1 hour'; 
$lang->guarder->punishOptions[720]   = '12 hours'; 
$lang->guarder->punishOptions[1440]  = '24 hours'; 
$lang->guarder->punishOptions[10080] = '1 week'; 
$lang->guarder->punishOptions[43200] = '1 month'; 
$lang->guarder->punishOptions[0]     = 'Permanent'; 

$lang->blacklist = new stdclass();
$lang->blacklist->type        = 'Type';
$lang->blacklist->title       = 'Title';
$lang->blacklist->identity    = 'Content';
$lang->blacklist->reason      = 'Reason';
$lang->blacklist->expiredDate = 'Expire Time';
$lang->blacklist->ip          = 'IP';
$lang->blacklist->keywords    = 'Keyword';
$lang->blacklist->account     = 'Account';
$lang->blacklist->email       = 'Email';
$lang->blacklist->other       = 'Other';
