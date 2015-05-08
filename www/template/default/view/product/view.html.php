<?php
/**
 * The view file of product module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php 
include TPL_ROOT . 'common/header.html.php'; 
include TPL_ROOT . 'common/treeview.html.php'; 

/* set categoryPath for topNav highlight. */
js::set('path',  $product->path);
js::set('productID', $product->id);
js::set('categoryID', $category->id);
js::set('categoryPath', explode(',', trim($category->path, ',')));
css::internal($product->css);
js::execute($product->js);
?>
<?php $common->printPositionBar($category, $product);?>
<div class='row'><?php $this->block->printRegion($layouts, 'product_view', 'topBanner', true);?></div>
<div class='row'>
  <div class='col-md-9 col-main'>
    <div class='row'><?php $this->block->printRegion($layouts, 'product_view', 'top', true);?></div>
    <div class='panel panel-body panel-product'>
      <div class='row'>
        <?php if(!empty($product->image->list)):?>
        <div class='col-md-5'>
          <div class='product-image media-wrapper'>
            <?php $title = $product->image->primary->title ? $product->image->primary->title : $product->name;?>
            <?php echo html::image($product->image->primary->fullURL, "title='{$title}' alt='{$product->name}'");?>
          </div>
          <?php if(count($product->image->list) > 1):?>
          <div class='product-image-menu row'>
            <?php foreach($product->image->list as $image):?>
            <?php $title = $image->title ? $image->title : $product->name;?>
            <div class='col-md-3 col-sm-2 col-xs-2'>
              <div class='product-image little-image'>
                <?php echo html::image($image->smallURL, "title='{$title}' alt='{$product->name}'");?>
              </div>
            </div>
            <?php endforeach;?>
          </div>
          <?php endif;?>
        </div>
        <div class='col-md-7'>
        <?php else:?>
        <div class='col-md-12'>
        <?php endif;?>
          <div class='product-property<?php echo empty($product->image->list) ? ' product-lack-img' : '';?>'>
            <h1 class='header-dividing'><?php echo $product->name;?></h1>
            <ul class='list-unstyled meta-list'>
              <?php
              $attributeHtml = '';
              if($product->promotion != 0)
              {
                  if($product->price != 0)
                  {
                      $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->price . "</span>";
                      $attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $lang->product->currencySymbols[$this->config->product->currency] . "</span> <del><strong class='text-latin'>" . $product->price . "</del></strong></span></li>";
                  }
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->promotion . "</span>";
                  $attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $lang->product->currencySymbols[$this->config->product->currency] . "</span> <strong class='text-danger text-latin text-lg'>" . $product->promotion . "</strong></span></li>";
              }
              else if($product->price != 0)
              {
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->price . "</span>";
                  $attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $lang->product->currencySymbols[$this->config->product->currency] . "</span> <strong class='text-important text-latin text-lg'>" . $product->price . "</strong></span></li>";
              }
              if($product->amount)
              {
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->amount . "</span>";
                  $attributeHtml .= "<span class='meta-value'>" . $product->amount . " <small>" . $product->unit . "</small></span></li>";
              }
              if($product->brand)
              {
                  $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->brand . "</span>";
                  $attributeHtml .= "<span class='meta-value'>" . $product->brand . " <small>" . $product->model . "</small></span></li>";
              }
              if($product->color)
              {
                $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->color . "</span>";
                $attributeHtml .= "<span class='meta-value'>" . $product->color . "</span></li>";
              }
              if($product->origin)
              {
                $attributeHtml .= "<li><span class='meta-name'>" . $lang->product->origin . "</span>";
                $attributeHtml .= "<span class='meta-value'>" . $product->origin . "</span></li>";
              }
              foreach($product->attributes as $attribute)
              {
                  if(empty($attribute->label) and empty($attribute->value)) continue;
                  $attributeHtml .= "<li><span class='meta-name'>" . $attribute->label . "</span>";
                  $attributeHtml .= "<span class='meta-value'>" . $attribute->value . "</span></li>";
              }
              if(empty($attributeHtml)) echo '<p class="product-summary">' . $product->desc . '</p>';
              echo $attributeHtml;
              ?>
              <?php if(commonModel::isAvailable('order')):?>
              <li id='countBox'>
                <span class='meta-name'><?php echo $lang->product->count; ?></span>
                <span class='meta-value'>
                  <div class='input-group'>
                    <span class='input-group-addon'><i class='icon icon-minus'></i></span>
                    <?php echo html::input('count', 1, "class='form-control'"); ?>
                    <span class='input-group-addon'><i class='icon icon-plus'></i></span>
                  </div>
                </span>
              </li>
              <?php endif;?>
            </ul>
            <?php if(commonModel::isAvailable('order')):?>
            <span id='buyBtnBox'>
              <label class='btn-buy'><?php echo $lang->product->buyNow;?></label>
              <label class='btn-cart'><?php echo $lang->product->addToCart;?></label>
            </span>
            <?php endif;?>
            <?php if(!commonModel::isAvailable('order') and $product->mall):?>
            <hr>
            <div class='btn-gobuy'>
            <?php echo html::a(inlink('redirect', "id={$product->id}"), $lang->product->buyNow, "class='btn btn-lg btn-primary' target='_blank'");?>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
      <h5 class='header-dividing'><i class='icon-file-text-alt text-muted'></i> <?php echo $lang->product->content;?></h5>
      <div class='article-content'>
        <?php echo $product->content;?>
      </div>
      <div class="article-files">
        <?php $this->loadModel('file')->printFiles($product->files);?>
      </div>
    </div>
    <?php if(commonModel::isAvailable('message')):?>
    <div id='comments'>
      <div id='commentBox'><?php echo $this->fetch('message', 'comment', "objectType=product&objectID={$product->id}");?></div>
      <?php echo html::a('', '', "name='comment'");?>
    </div>
    <?php endif;?>
    <div class='row'><?php $this->block->printRegion($layouts, 'product_view', 'bottom', true);?></div>
  </div>
  <div class='col-md-3 col-side'>
    <side class='page-side'><?php $this->block->printRegion($layouts, 'product_view', 'side');?></side>
  </div>
</div>
<div class='row'><?php $this->block->printRegion($layouts, 'product_view', 'bottomBanner', true);?></div>
<?php include TPL_ROOT . 'common/jplayer.html.php'; ?>
<?php include TPL_ROOT . 'common/footer.html.php'; ?>
