<?php
/**
 * The view file of product category of xirangEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.xirang.biz
 */
?>
<?php 
include '../../common/view/header.html.php'; 
include '../../common/view/treeview.html.php'; 

/* set categoryPath for topNav highlight. */
js::set('path',  json_encode($product->path));
js::set('productID', $product->id);
?>
<?php $common->printPositionBar($category, $product);?>
<div class='row'>
  <div class='col-md-9'>
      
    <?php $title = $product->image->primary->title ? $product->image->primary->title : $product->name;?>
    <?php if(empty($product->images)):?>
    <div class='primary'>
      <?php echo html::a(inlink('view', "id=$product->id"), html::image($themeRoot . 'default/images/main/noimage.gif', "title='{$title}' alt='{$product->name}'"), '', "class='big-image'");?>
    </div>
    <?php else:?>
    <div class='primary'>
      <?php echo html::a(inlink('view', "id=$product->id"), html::image($product->image->primary->smallURL, "title='{$title}' alt='{$product->name}'"), '', "class='big-image'");?>
      <ul class='list'>
        <?php foreach($product->image->list as $image):?>
        <?php $title = $image->title ? $image->title : $product->name;?>
        <li>
          <?php echo html::a(inlink('view', "id=$product->id"), html::image($image->smallURL, "title='{$title}' alt='{$product->name}'"), '', "class='little-image'");?>
        </li>
        <?php endforeach;?>
        <div class='c-both'></div>
      </ul>
    </div>
    <?php endif;?>

    <div class='property'>
      <h3><?php echo $product->name;?></h3>
      <table class='w-p100'>
        <?php if($product->promotion):?>
        <tr><th class='w-p50'><?php echo $lang->product->price . $lang->colon;?></th> <td><del><?php echo $lang->RMB . $product->price;?></del></td></tr>
        <tr><th><?php echo $lang->product->promotion . $lang->colon;?></th> <td><em><?php echo $lang->RMB . $product->promotion;?></em></td></tr>
        <?php else:?>
        <tr><th><?php echo $lang->product->price . $lang->colon;?></th> <td><em><?php echo $lang->RMB . $product->price;?></em></td></tr>
        <?php endif;?>
        <tr><th><?php echo $lang->product->unit   . $lang->colon;?></th> <td><?php echo $product->unit;?></td></tr>
        <tr><th><?php echo $lang->product->amount . $lang->colon;?></th> <td><?php echo $product->amount;?></td></tr>
        <tr><th><?php echo $lang->product->model  . $lang->colon;?></th> <td><?php echo $product->model;?></td></tr>
        <tr><th><?php echo $lang->product->brand  . $lang->colon;?></th> <td><?php echo $product->brand;?></td></tr>
        <tr><th><?php echo $lang->product->color  . $lang->colon;?></th> <td><?php echo $product->color;?></td></tr>
        <tr><th><?php echo $lang->product->origin . $lang->colon;?></th> <td><?php echo $product->origin;?></td></tr>
      </table>
    </div>
    <div class='c-both'></div>

    <div class='box radius mt-20px'>
      <h4><?php echo $lang->product->content;?></h4>
      <div class='content'><?php echo $product->content;?></div>
      <div class='f-left'><?php $this->loadModel('file')->printFiles($product->files);?></div>
      <div class='c-both'></div>
    </div>
    <div id='commentBox'></div>
    <?php echo html::a('', '', '', "name='comment'");?>
  </div>
  <?php include './side.html.php'; ?>
</div>
<?php include '../../common/view/footer.html.php'; ?>
