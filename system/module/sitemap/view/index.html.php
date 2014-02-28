<?php
/**
 * The sitemap view file of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     sitemap
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php if($onlyBody == 'no') include '../../common/view/header.html.php'; ?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-sitemap'></i> <?php echo $lang->sitemap->common;?></strong>
    <div class='panel-actions'>
      <?php echo html::a($this->createLink('sitemap', 'index', '', '', 'xml'), '<i class="icon-code"></i> ' . $lang->sitemap->xmlVersion, "class='btn btn-primary'");?>
    </div>
  </div>
  <div class='panel-body'>
    <div class='clearfix sitemap-tree'>
      <ul class='tree'>
        <li><?php echo html::a(helper::createLink('company', 'index'), $lang->aboutUs);?></li>
        <?php if(!empty($pages)) foreach($pages as $page):?>
        <li><?php echo html::a(helper::createLink('page', 'view', "pageID={$page->id}", "name={$page->alias}"), $page->title);?></li>
        <?php endforeach;?>
      </ul>
    </div>
    <?php if(strpos($productTree, '<li>') !== false):?>
    <div class='clearfix sitemap-tree'> 
      <h4><?php echo $lang->sitemap->productCategory?></h4>
      <?php echo $productTree?>
    </div>
    <?php endif;?>

    <?php if(strpos($articleTree, '<li>') !== false):?>
    <div class='clearfix sitemap-tree'> 
      <h4><?php echo $lang->sitemap->articleCategory?></h4>
      <?php echo $articleTree?>
    </div>
    <?php endif;?>

    <?php if(strpos($blogTree, '<li>') !== false):?>
    <div class='clearfix sitemap-tree'> 
      <h4><?php echo $lang->sitemap->blogCategory?></h4>
      <?php echo $blogTree?>
    </div>
    <?php endif;?>

    <?php if($boards):?>
    <div class='clearfix sitemap-tree'>
      <h4><?php echo $lang->sitemap->boards;?></h4>
      <ul class='tree'>
        <?php foreach($boards as $parentBoard):?>
        <li>
          <?php echo $parentBoard->name;?>
          <?php if($parentBoard->children):?>
          <ul>
            <?php foreach($parentBoard->children as $child):?>
            <li><?php echo html::a(helper::createLink('forum', 'board', "id=$child->id", "category={$child->alias}"), $child->name);?></li>
            <?php endforeach;?>
          </ul>
          <?php endif;?>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
    <?php endif;?>
    <?php if(!empty($books)):?>
    <div class='clearfix sitemap-tree'>
      <h4><?php echo $lang->sitemap->books;?></h4>
      <ul class='tree'>
        <?php foreach($books as $book):?>
        <li><?php echo html::a(helper::createLink('book', 'browse', "nodeID=$book->id", "book={$book->alias}"), $book->title);?></li>
        <?php endforeach;?>
      </ul>
    </div>
    <?php endif;?>
  </div>
</div>
<?php if($onlyBody == 'no') include '../../common/view/footer.html.php';?>
