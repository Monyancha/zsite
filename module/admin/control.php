<?php
/**
 * The control file of admin module of xirangEPS.
 *
 * @copyright   Copyright 2013-2013 �ൺϢ��������Ϣ���޹�˾ (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     admin
 * @version     $Id$
 * @link        http://www.xirang.biz
 */
class admin extends control
{
    /**
     * The index page of admin panel, print the sites.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->display();
    }
}
