<?php
/**
 * The html template file of step4 method of install module of xirangEPS.
 *
 * @copyright Copyright 2013-2013 �ൺϢ��������Ϣ���޹�˾ (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @author	  Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package	  xirangEPS
 * @version	  $Id: step4.html.php 867 2010-06-17 09:32:58Z wwccss $
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<div class='container'>
  <?php if(isset($error)):?>
  <table class='table table-bordered' align='center'>
	<caption><?php echo $lang->install->error;?></caption>
    <tr><td class='text-error'><?php echo $error;?></td></tr>
    <tr><td><?php echo html::backButton($lang->install->pre, 'btn btn-primary');?></td></tr>
  </table>
  <?php else:?>
  <form method='post'>
  <table class='table table-bordered' align='center'>
	<caption><?php echo $lang->install->setAdmin;?></caption>
    <tr valign='middle'>
      <th class='a-right w-100px'><?php echo $lang->install->account;?></th>
      <td><?php echo html::input('account', '', 'class="text-2"');?></td>
	</tr>
    <tr>
      <th class='a-right'><?php echo $lang->install->password;?></th>
      <td><?php echo html::input('password', '', 'class="text-2"');?></td>
	</tr>
    <tr><td colspan='2' class='a-center'><?php echo html::submitButton();?></td></tr>
  </table>
  </form>
  <?php endif;?>
</div>
<?php include './footer.html.php';?>
