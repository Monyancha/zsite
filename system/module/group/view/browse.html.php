<?php
/**
 * The browse view file of group module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     group
 * @version     $Id: browse.html.php 4769 2013-05-05 07:24:21Z wwccss $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-group'></i> <?php echo $lang->group->browse;?></strong>
    <span class='panel-actions pull-right'><?php if(commonModel::hasPriv('group', 'create')) echo html::a($this->inlink('create'), $lang->group->create, "class='btn btn-primary' data-toggle='modal'");?></span>
  </div>
  <table class='table table-hover table-striped'>
    <thead>
      <tr>
       <th class='w-50px'><?php echo $lang->group->id;?></th>
       <th class='w-100px'><?php echo $lang->group->name;?></th>
       <th class='w-200px visible-lg'><?php echo $lang->group->desc;?></th>
       <th><?php echo $lang->group->users;?></th>
       <th class='w-150px text-center'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
    <?php
    $managePrivPriv   = commonModel::hasPriv('group', 'managePriv');
    $manageMemberPriv = commonModel::hasPriv('group', 'manageMember');
    $editPriv         = commonModel::hasPriv('group', 'edit');
    $deletePriv       = commonModel::hasPriv('group', 'delete');
    ?>
    <?php foreach($groups as $group):?>
    <?php $users = implode(' ', $groupUsers[$group->id]);?>
    <tr>
      <td class='text-center'><?php echo $group->id;?></td>
      <td><?php echo $group->name;?></td>
      <td class='visible-lg'><?php echo $group->desc;?></td>
      <td title='<?php echo $users;?>'><?php echo $users;?></td>
      <td class='text-center'>
        <?php if($managePrivPriv)   echo html::a(inlink('managePriv', "type=byGroup&param={$group->id}"), $lang->group->managePriv);?>
        <?php if($manageMemberPriv) echo html::a(inlink('manageMember', "groupID={$group->id}"), $lang->group->manageMember);?>
        <?php if($editPriv)         echo html::a(inlink('edit', "groupID={$group->id}"), $lang->edit, "data-toggle='modal'");?>
        <?php if($deletePriv)       echo html::a(inlink('delete', "groupID={$group->id}"), $lang->delete, "class='deleter'");?>
      </td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
