<div id="mainArea" class='row'>
  <?php foreach($themes as $theme):?>
  <?php $link      = inlink('installtheme', "package={$theme->name}&downLink=&md5=");?>
  <?php $installed = (isset($installedThemes['default'][$theme->name]) or isset($installedThemes['mobile'][$theme->name]));?>
  <div class='col-md-3'>
    <div class='panel theme-panel'>
      <div class='panel-body'>
        <div class='theme-title' title="<?php echo $theme->name . '.zip'?>">
          <?php echo $theme->name . ".zip";?>
        </div>
      </div>
      <div class='actions'>
        <i class='span-time'><?php echo "<i class='icon icon-time'> </i>" . $theme->time;?></i>
        <i class='span-size'><?php echo "<i class='icon icon-file'> </i>" . helper::formatKB($theme->size / 1024);?></i>
        <?php if($installed) echo "<i class='text-muted icon icon-check'>{$lang->ui->installed}</i>";?>
        <?php if(!$installed):?>
        <?php echo html::a($link . '&type=theme', $lang->ui->importTypes->theme, "class='btn btn-xs btn-install' data-toggle='modal'");?>
        <?php echo html::a($link . "&type=full",  $lang->ui->importTypes->full, "class='btn btn-xs btn-install btn-full'");?>
        <?php echo html::a($link . "&type=full",  '', "class='hide' data-toggle='modal'");?>
        <?php endif;?>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<div class='div-tip text-danger'>
  <?php printf($lang->ui->packagePathTip, $packagePath);?>
</div>
<div id="packageSectionActions">
  <?php echo html::a(inlink('uploadTheme'), $lang->ui->uploadTheme . " <i class='icon icon-upload'></i>", "data-toggle='modal' class='btn btn-primary'");?>
</div>
<style>
.theme-panel > .panel-body{padding-top:4px !important; cursor:pointer;}
.theme-panel > .panel-body > .theme-title{font-size:16px; padding: 10px 0; color:#555; font-weight:bold;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
.theme-panel .span-size{margin-left:20px;}
.p-actions{margin-right:10px; padding-left:12px;}
.p-actions > i {font-size:13px; padding:4px; font-weight:bold;}
.panel-actions{margin-right: 0px}
.panel .actions{margin-top: 40px; background-color: #efefef; border-top: 1px solid #ccc;}
</style>
<script>
$().ready(function()
{
    $('.btn-full').click(function()
    {
        var $btn = $(this)
        bootbox.confirm(v.lang.fullImportTip, function(result)
        {
            if(result) $btn.next().click();
        });
        return false;
    });
});
</script>
