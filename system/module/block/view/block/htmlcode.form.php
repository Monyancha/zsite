<?php
/**
 * The code block form view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 �ൺϢ��������Ϣ���޹�˾ (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php
$content = '';
if(isset($block->content))
{
    if(!is_object($block->content) $content = $block->content;
    if(is_object($block->content)  $content = isset($block->content->content) ? $block->content->content : '';
}
?>
<?php $content = htmlspecialchars($content);?>
<tr>
  <th><?php echo $lang->block->htmlcode;?></th>
  <td><?php echo html::textarea('content', $content, "rows=20 class='form-control codeeditor' data-height='350'");?></td>
</tr>
