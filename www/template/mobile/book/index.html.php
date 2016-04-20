<?php include TPL_ROOT . 'common/header.html.php'; ?>
<div class='cards'>
  <?php foreach($books as $book):?>
  <div class='col-xs-6 col-sm-4 col-md-3'>
    <div class='card'>
      <h5 class='card-heading text-center'><?php echo html::a($this->createLink('book', 'browse', "nodeID=$book->id", "book=$book->alias"), $book->title);?></h5>
      <div class='card-content text-muted'><?php echo $book->summary;?></div>
      <div class='card-actions'>
        <span class='text-muted'><i class='icon-user'></i> <?php echo $book->author;?></span>
        <span class='text-muted'><i class='icon-time'></i> <?php echo $book->addedDate;?></span>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php include TPL_ROOT . 'common/footer.html.php';?>
