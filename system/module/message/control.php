<?php
/**
 * The control file of message module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1 (http://www.chanzhi.org/license/)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     message
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class message extends control
{
    /**
     * The index page of message front.
     * 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function index($pageID = 1)
    {
        $recPerPage = !empty($this->config->site->messageRec) ? $this->config->site->messageRec : $this->config->message->recPerPage;
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal = 0, $recPerPage, $pageID);

        $this->view->messages    = $this->message->getByObject($type = 'message', $objectType = 'message', $objectID = 0, $pager);
        $this->view->pager       = $pager;
        $this->view->title       = $this->lang->message->list;
        $this->view->startNumber = ($pageID - 1) * 10;
        $this->view->mobileURL   = helper::createLink('message', 'index', "pageID=$pageID", '', 'mhtml');
        $this->view->desktopURL  = helper::createLink('message', 'index', "pageID=$pageID", '', 'html');
        $this->display();
    }

    /**
     * Show the comment of one object, and print the comment form.
     * 
     * @param string $objectType 
     * @param string $objectID 
     * @access public
     * @return void
     */
    public function comment($objectType, $objectID, $pageID = 1)
    {
        $recPerPage = !empty($this->config->site->commentRec) ? $this->config->site->commentRec : $this->config->message->recPerPage;
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal = 0 , $recPerPage, $pageID);

        $this->view->objectType  = $objectType;
        $this->view->objectID    = $objectID;
        $this->view->showDetail  = $this->lang->message->showDetail;
        $this->view->hideDetail  = $this->lang->message->hideDetail;
        $this->view->comments    = $this->message->getByObject($type = 'comment', $objectType, $objectID, $pager);
        $this->view->pager       = $pager;
        $this->view->startNumber = ($pageID - 1) * 10;
        $this->lang->message     = $this->lang->comment;
        $this->display();
    }

    /**
     * View a message 
     * 
     * @param  int    $messageID 
     * @access public
     * @return void
     */
    public function view($messageID)
    {
        $message = $this->message->getByID($messageID);
        if($message->to != $this->app->user->account) die();

        $this->message->markReaded($message->id);
        if($message->link) $this->locate($message->link);

        $link = $this->message->getObjectLink($message);
        if($link) $this->locate($link);

        $this->locate($this->createLink('user', 'message'));
    }

    /**
     * show notify in msgBox.
     * 
     * @access public
     * @return string
     */
    public function notify()
    {
        $messages = $this->dao->select('COUNT(*) as count')->from(TABLE_MESSAGE)->where('`to`')->eq($this->app->user->account)->andWhere('readed')->eq(0)->fetch('count');
        if($messages) echo  html::a(helper::createLink('user', 'message'), sprintf($this->lang->user->message->mine, $messages));
    }

    /**
     * Get the latest approvaled messages.
     * 
     * @param  string $type 
     * @param  string $status 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function admin($type = 'message', $status = '0', $recTotal = 0, $recPerPage = 5, $pageID = 1)
    {
        if(!($this->loadModel('wechat')->getList())) unset($this->lang->message->menu->wechat);

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title    = $this->lang->message->common;
        $this->view->messages = $this->message->getList($type, $status, $pager);
        $this->view->pager    = $pager;
        $this->view->type     = $type;
        $this->view->status   = $status;
        $this->display();
    }

    /**
     * Post a message.
     * 
     * @param  string  $type
     * @access public
     * @return void
     */
    public function post($type)
    {
        $this->lang->message = $this->lang->$type;
        if($_POST)
        {
            $captchaConfig = isset($this->config->site->captcha) ? $this->config->site->captcha : 'auto';
            $needCaptcha   = false;
            if(($captchaConfig == 'auto' and $this->loadModel('guarder')->isEvil($this->post->content)) or $captchaConfig == 'open') $needCaptcha = true;

            /* If no captcha but is garbage, return the error info. */
            if($this->post->captcha === false and $needCaptcha)
            {
                $this->send(array('result' => 'fail', 'reason' => 'needChecking', 'captcha' => $this->loadModel('guarder')->create4Comment()));
            }

            $result = $this->message->post($type);
            $this->send($result);
        }
    }

    /**
     * Reply a message.
     * 
     * @param  int    $messageID 
     * @access public
     * @return void
     */
    public function reply($messageID)
    {
        if($_POST)
        {
            if(RUN_MODE == 'front')
            {
                $captchaConfig = isset($this->config->site->captcha) ? $this->config->site->captcha : 'auto';
                $needCaptcha   = false;
                if($captchaConfig == 'auto' and $this->loadModel('guarder')->isEvil($this->post->content)) $needCaptcha = true;
                if($captchaConfig == 'open')  $needCaptcha = true;
                if($captchaConfig == 'close') $needCaptcha = false;

                /* If no captcha but is garbage, return the error info. */
                if($this->post->captcha === false and $needCaptcha)
                {
                    $this->send(array('result' => 'fail', 'reason' => 'needChecking', 'captcha' => $this->loadModel('guarder')->create4MessageReply()));
                }
            }

            $replyID = $this->message->reply($messageID);
            if(!$replyID) $this->send(array('result' => 'fail', 'reason' => 'error', 'message' => dao::getError()));
            $this->message->setCookie($replyID);
            $this->send(array('result' => 'success', 'message' => $this->lang->sendSuccess));
        }

        $message = $this->message->getByID($messageID);

        $this->view->title      = "<i class='icon-mail-reply'></i> " . $this->lang->message->reply . ':' . $message->from;
        $this->view->modalWidth = 600;
        $this->view->message    = $message;
        $this->display();
    }

    /**
     * Pass messages.
     * 
     * @param  int    $messageID 
     * @param  string $type 
     * @access public
     * @return void
     */
    public function pass($messageID, $type)
    {
        $this->message->pass($messageID, $type);
        if(!dao::isError()) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /** 
     * Delete messages.
     *
     * @param int    $messageID 
     * @param string $type          single|pre
     * @access public
     * @return void
     */
    public function delete($messageID, $type)
    {
        $this->message->delete($messageID, $type);
        if(!dao::isError()) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /**
     * Batch delete messages.
     * 
     * @access public
     * @return void
     */
    public function batchDelete()
    {
        $messages = $this->post->messages;
        if(empty($messages)) $this->send(array('result' => 'fail', 'message' => $this->lang->message->noSelectedMessage));

        foreach($messages as $message) 
        {
            $result = $this->message->deleteByAccount($message);
            if(!$result) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->send(array('result' => 'success', 'message' => $this->lang->deleteSuccess, 'locate' => $this->createLink('user', 'message')));
    }

    /**
     * Add to blacklist. 
     * 
     * @param  int    $id 
     * @access public
     * @return void
     */
    public function addToBlacklist($id)
    {
        if($_POST)
        {
            $post = fixer::input('post')->get();
            //save keywords items.
            $keywords = explode(',', $post->keywords);
            $this->loadModel('guarder');
            foreach($keywords as $keyword)
            {
                if(empty($keyword)) continue;
                $this->guarder->punish('keywords', $keyword, 'message');
                if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            }

            foreach($this->post->item as $type => $item)
            {
                $this->guarder->punish($type, current($item), 'message', $this->post->hour[$type]);
            }
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate' => $this->server->http_referer));
        }
        $this->app->loadLang('guarder');
        $this->view->message = $this->message->getByID($id);
        $this->view->title   = $this->lang->addToBlacklist;
        $this->display();
    }
}
