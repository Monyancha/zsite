<?php include '../../common/view/header.admin.html.php';?>
<form method='post' action='<?php echo inlink('save');?>' id='dataform'>
<table align='center' class='table'>
  <caption><?php echo $lang->mail->edit;?></caption>
  <tr>
    <th class='rowhead w-150px'><?php echo $lang->mail->turnon; ?></th>
    <td><?php echo html::radio('turnon', $lang->mail->turnonList, 1);?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->fromAddress; ?></th>
    <td><?php echo html::input('fromAddress', $mailConfig->fromAddress, 'class=text-3');?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->fromName; ?></th>
    <td><?php echo html::input('fromName', $mailConfig->fromName, 'class=text-3');?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->host; ?></th>
    <td><?php echo html::input('host', $mailConfig->host, 'class=text-3');?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->port; ?></th>
    <td><?php echo html::input('port', $mailConfig->port, 'class=text-3');?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->auth; ?></th>
    <td><?php echo html::radio('auth', $lang->mail->authList, $mailConfig->auth, 'onchange=setAuth(this.value)'); ?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->username; ?></th>
    <td><?php echo html::input('username', $mailConfig->username, 'class=text-3') ?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->password; ?></th>
    <td><?php echo html::password('password', $mailConfig->password, 'class="text-3" autocomplete="off"') ?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->secure; ?></th>
    <td><?php echo html::radio('secure', $lang->mail->secureList, $mailConfig->secure); ?></td>
  </tr>
  <tr>
    <th class='rowhead'><?php echo $lang->mail->debug; ?></th>
    <td><?php echo html::radio('debug', $lang->mail->debugList, $mailConfig->debug);?></td>
  </tr>
  <tr>
     <td colspan='2' class='a-center'>
       <?php 
       echo html::submitButton();
       if($this->config->mail->turnon and $mailExist) echo html::linkButton($lang->mail->test, inlink('test'));
       echo html::linkButton($lang->mail->reset, inlink('reset'));
       ?>
     </td>
   </tr>
</table>
</form>
<?php include '../../common/view/footer.admin.html.php';?>
