<?php
/**
 * The setting view file of book module of Chanzhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-cog'></i> <?php echo $lang->book->setting;?></strong></div>
  <form method='post' id='ajaxForm' class='form-inline'>
    <table class='table table-form'>
      <tr>
        <th class='w-80px'><?php echo $lang->book->index;?></th>
        <td class='w-p40'><?php echo html::select('index', $books, isset($this->config->book->index) ? $this->config->book->index : '', "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->book->chapterList;?></th>
        <td><?php echo html::select('chapter', $lang->book->chapterTypeList, isset($this->config->book->chapterType) ? $this->config->book->chapterType : '', "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->book->fullScreen;?></th>
        <td><?php echo html::radio('fullScreen', $lang->book->fullScreenList, isset($this->config->book->fullScreen) ? $this->config->book->fullScreen : 0, "class='checkbox'");?></td>
        <td></td>
      </tr>
      <tr>
        <th></th>
        <td colspan='2'><?php echo html::submitButton();?></td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
