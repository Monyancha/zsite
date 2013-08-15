<?php $topCategories = $this->loadModel('tree')->getChildren(0);?>
<div class='span3'>
  <div class='widget radius'> 
    <h4><?php echo $lang->categoryMenu;?></h4>
    <ul>
      <?php foreach($topCategories as $topCategory):?>
      <li>
        <?php
        $browseLink = $this->createLink('article', 'browse', "categoryID={$topCategory->id}");
        echo "<i class='icon-chevron-right'></i>";
        echo html::a($browseLink, $topCategory->name, '', "id='category{$topCategory->id}'");
        ?>
      </li>
      <?php endforeach;?>
    </ul>
  </div>

  <div class='widget radius'>  
    <h4><?php echo $lang->company->contactUs;?></h4>
    <?php foreach($contact as $item => $value):?>
    <dl id='contact'>
      <dt><?php echo $this->lang->company->$item . $lang->colon;?></dt>
      <dd><?php echo $value;?></dd>
      <div class='c-both'></div>
    </dl>
    <?php endforeach;?>
  </div>
</div>
