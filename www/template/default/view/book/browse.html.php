<?php include TPL_ROOT . 'common/header.html.php'; ?>
<?php if(isset($node)) $common->printPositionBar($node->origins);?>
<div class='row'><?php $this->block->printRegion($layouts, 'book_browse', 'topBanner', true);?></div>
<div class='row'>
  <div class='col-md-3'>
    <nav class='booksNav'>
      <ul class='nav nav-primary nav-stacked'>
        <li class='nav-heading'><strong><?php echo $lang->book->list;?></strong></li>
        <?php
        if(!empty($books))
        {
            foreach($books as $menu)
            {
                echo '<li' . (($menu->title == $book->title) ? " class='active'" : '') . '>' . html::a(inlink('browse', "bookID=$menu->id", "book=$menu->alias"), '<i class="icon-book"></i> &nbsp;' . $menu->title . '<i class="icon-chevron-right"></i>') . '</li>';
            }
        }
        ?>
      </ul>
    </nav>
    <?php $this->block->printRegion($layouts, 'book_browse', 'side');?>
  </div>

  <div class='col-md-9'>
    <div class='row'><?php $this->block->printRegion($layouts, 'book_browse', 'top', true);?></div>
    <div class='panel panel-block'>
      <?php if(!empty($book) && $book->title): ?>
      <div class='panel-heading'>
        <strong class='title'><?php echo $book->title;?></strong>
      </div>
      <?php endif; ?>
      <div class='panel-body'>
        <div  class='books'><?php if(!empty($catalog)) echo $catalog;?></div>
      </div>
    </div>
    <div class='row'><?php $this->block->printRegion($layouts, 'book_browse', 'bottom', true);?></div>
  </div>
</div>  
<div class='row'><?php $this->block->printRegion($layouts, 'book_browse', 'bottomBanner', true);?></div>
<?php include TPL_ROOT . 'common/footer.html.php';?>
