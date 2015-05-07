<?php
/**
 * The control file of address of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     address 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class address extends control
{
    /**
     * Browse products in my address.
     * 
     * @access public
     * @return void
     */
    public function browse()
    {
        $this->app->loadLang('user');
        $this->view->title     = $this->lang->address->browse;
        $this->view->addresses = $this->address->getListByAccount($this->app->user->account);
        $this->display();
    }

    /**
     * Create an address.
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        if($_POST)
        {
            $result = $this->address->create();
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->display();
    }

    /**
     * Edit an address.
     * 
     * @param  int    $id 
     * @access public
     * @return void
     */
    public function edit($id)
    {
        if($_POST)
        {
            $result = $this->address->update($id);
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }
        $this->view->address = $this->dao->select('*')->from(TABLE_ADDRESS)->where('id')->eq($id)->fetch();
        $this->display();
    }

    /**
     * Delete an address.
     * 
     * @param  int    $id 
     * @access public
     * @return void
     */
    public function delete($id)
    {
        $this->dao->delete()->from(TABLE_ADDRESS)->where('id')->eq($id)->exec();
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result' => 'success', 'message' => $this->lang->deleteSuccess, 'locate' => inlink('browse')));
    }
}
