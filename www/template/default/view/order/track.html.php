<?php 
/**
 * The delivery view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1 (http://www.chanzhi.org/license/)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include TPL_ROOT . 'common/header.modal.html.php';?>
<table class='table table-form'>
  <tr>
    <th class='w-100px'><?php echo $lang->order->address;?></th>
    <td><?php echo $fullAddress;?></td>
  </tr>
  <tr>
    <th class='w-100px'><?php echo $lang->order->deliveriedDate;?></th>
    <td><?php echo $order->deliveriedDate;?></td>
  </tr>
  <tr>
    <th class='w-100px'><?php echo $lang->order->express;?></th>
    <td><?php echo $expressList[$order->express];?></td>
  </tr>
  <tr>
    <th class='w-100px'><?php echo $lang->order->waybill;?></th>
    <td><?php echo $order->waybill;?></td>
  </tr>
</table>
<?php include TPL_ROOT .'/common/footer.modal.html.php';?>
