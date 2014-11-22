<?php
/**
 * The control file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class site extends control
{
    /**
     * set site basic info.
     * 
     * @access public
     * @return void
     */
    public function setBasic()
    {
        $allowedTags = $this->app->user->admin == 'super' ? $this->config->allowedTags->admin : $this->config->allowedTags->front;

        if(!empty($_POST))
        {
            $setting = fixer::input('post')
                ->stripTags('desc,meta', $allowedTags)
                ->join('modules', ',')
                ->remove('allowedFiles')
                ->setDefault('modules', '')
                ->get();

            $result  = $this->loadModel('setting')->setItems('system.common.site', $setting);
            $cache   = $this->loadModel('cache')->createConfigCache();

            if(!$cache) $this->send(array('result' => 'fail', 'message' => sprintf($this->lang->error->noWritable, $this->app->getTmpRoot() . 'cache')));
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate' => inlink('setbasic')));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }

        $this->view->title = $this->lang->site->setBasic;
        $this->display();
    }

    /**
     * Set robots.
     * 
     * @access public
     * @return void
     */
    public function setRobots()
    {
        if(!empty($_POST))
        {
            $setting = new stdclass();
            $setting->robots = $this->post->robots;
            $result  = $this->loadModel('setting')->setItems('system.common.site', $setting);

            if(!$result) $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
            $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate' => inlink('setrobots')));
        }

        $this->view->title = $this->lang->site->setBasic;
        $this->display();
    }


    /**
     * Set upload configures.
     * 
     * @access public
     * @return void
     */
    public function setUpload()
    {
        if(!empty($_POST))
        {
            $setting = fixer::input('post')->remove('allowedFiles')->setDefault('allowUpload', '0')->get();

            $dangers = explode(',', $this->config->file->dangers);
            $allowedFiles = trim(strtolower($this->post->allowedFiles), ',');
            $allowedFiles = str_replace($dangers, '', $allowedFiles);
            $allowedFiles = seo::unify($allowedFiles, ',');
            $allowedFiles = ',' . $allowedFiles . ','; 
            $fileConfig   = array('allowed' => $allowedFiles);
            $this->loadModel('setting')->setItems('system.common.file', $fileConfig);

            $result  = $this->loadModel('setting')->setItems('system.common.site', $setting);
            $cache   = $this->loadModel('cache')->createConfigCache();

            if(!$cache) $this->send(array('result' => 'fail', 'message' => sprintf($this->lang->error->noWritable, $this->app->getTmpRoot() . 'cache')));
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate' => inlink('setupload')));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }

        $this->view->title = $this->lang->site->setUpload;
        $this->display();
    }

    /**
     * set site basic info.
     * 
     * @access public
     * return void
     */
    public function setOauth()
    {
        if(!empty($_POST))
        {
            $provider = $this->post->provider;
            $oauth    = array($provider => helper::jsonEncode($_POST));
            $result   = $this->loadModel('setting')->setItems('system.common.oauth', $oauth);
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
        }
        $this->view->title = $this->lang->site->setOauth;
        $this->display();
    }
}
