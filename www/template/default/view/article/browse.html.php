<?php 
include TPL_ROOT . 'common/header.html.php';

$path = array_keys($category->pathNames);
js::set('path', $path);
js::set('categoryID', $category->id);

include TPL_ROOT . 'common/treeview.html.php';
?>
<?php echo $common->printPositionBar($category);?>
<div class='row'><?php $this->block->printRegion($layouts, 'article_browse', 'topBanner', true);?></div>
<div class='row'>
  <div class='col-md-9 col-main'>
    <div class='list list-condensed'>
    <div class='row'><?php $this->block->printRegion($layouts, 'article_browse', 'top', true);?></div>
      <header><h2><?php echo $category->name;?></h2></header>
      <section class='items items-hover'>
        <?php foreach($sticks as $stick):?>
        <?php $url = inlink('view', "id=$stick->id", "category={$stick->category->alias}&name=$stick->alias");?>
        <div class='item'>
          <div class='item-heading'>
            <div class="text-muted pull-right">
              <span title="<?php echo $lang->article->views;?>"><i class='icon-eye-open'></i> <?php echo $stick->views;?></span> &nbsp; 
              <?php if($stick->comments):?><span title="<?php echo $lang->article->comments;?>"><i class='icon-comments-alt'></i> <?php echo $stick->comments;?></span> &nbsp;<?php endif;?> 
              <span title="<?php echo $lang->article->addedDate;?>"><i class='icon-time'></i> <?php echo substr($stick->addedDate, 0, 10);?></span>
            </div>
            <h4>
              <?php echo html::a($url, $stick->title);?>
              <span class='label label-danger'><?php echo $lang->article->stick;?></span>
            </h4>
          </div>
          <div class='item-content'>
            <?php if(!empty($stick->image)):?>
            <div class='media pull-right'>
              <?php
              $title = $stick->image->primary->title ? $stick->image->primary->title : $stick->title;
              echo html::a($url, html::image($stick->image->primary->smallURL, "title='{$title}' class='thumbnail'" ));
              ?>
            </div>
            <?php endif;?>
            <div class='text text-muted'><?php echo helper::substr($stick->summary, 120, '...');?></div>
          </div>
        </div>
        <?php unset($articles[$stick->id]);?>
        <?php endforeach;?>
        <?php foreach($articles as $article):?>
        <?php $url = inlink('view', "id=$article->id", "category={$article->category->alias}&name=$article->alias");?>
        <div class='item'>
          <div class='item-heading'>
            <div class="text-muted pull-right">
              <span title="<?php echo $lang->article->views;?>"><i class='icon-eye-open'></i> <?php echo $article->views;?></span> &nbsp; 
              <?php if($article->comments):?><span title="<?php echo $lang->article->comments;?>"><i class='icon-comments-alt'></i> <?php echo $article->comments;?></span> &nbsp;<?php endif;?> 
              <span title="<?php echo $lang->article->addedDate;?>"><i class='icon-time'></i> <?php echo substr($article->addedDate, 0, 10);?></span>
            </div>
            <h4><?php echo html::a($url, $article->title);?></h4>
          </div>
          <div class='item-content'>
            <?php if(!empty($article->image)):?>
            <div class='media pull-right'>
              <?php
              $title = $article->image->primary->title ? $article->image->primary->title : $article->title;
              echo html::a($url, html::image($article->image->primary->smallURL, "title='{$title}' class='thumbnail'" ));
              ?>
            </div>
            <?php endif;?>
            <div class='text text-muted'><?php echo helper::substr($article->summary, 120, '...');?></div>
          </div>
        </div>
        <?php endforeach;?>
      </section>
      <footer class='clearfix'><?php $pager->show('right', 'short');?></footer>
    </div>
    <div class='row'><?php $this->block->printRegion($layouts, 'article_browse', 'bottom', true);?></div>
  </div>
  <div class='col-md-3 col-side'><side class='page-side'><?php $this->block->printRegion($layouts, 'article_browse', 'side');?></side></div>
</div>
<div class='row'><?php $this->block->printRegion($layouts, 'article_browse', 'bottomBanner', true);?></div>
<?php include TPL_ROOT . 'common/footer.html.php';?>
