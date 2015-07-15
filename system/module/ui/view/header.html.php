<?php $templates       = $this->loadModel('ui')->getTemplates(); ?>
<?php $currentTemplate = $this->config->template->name; ?>
<?php $currentTheme    = $this->config->template->theme; ?>
<?php $customThemePriv = commonModel::hasPriv('ui', 'customTheme');?>
<nav id='menu'>
  <ul class='nav'>
    <li class='nav-item-primary'>
      <a href='javascript:;' data-toggle='dropdown'><i class="icon icon-desktop"></i> <?php echo $lang->ui->clientDesktop;?> &nbsp;<i class='icon-caret-down'></i></a>
      <ul class='dropdown-menu'>
        <li class="active"><a href='###'><i class="icon icon-desktop"></i> <?php echo $lang->ui->clientDesktop;?></a></li>
        <li><a href='###'><i class="icon icon-mobile-phone"></i> <?php echo $lang->ui->clientMobile;?></a></li>
      </ul>
    </li>
    <li class="divider angle"></li>
    <li class='menu-theme-picker'>
      <a href='javascript:;' data-toggle='dropdown'><span class='menu-template-name'><?php echo $templates[$currentTemplate]['name'];?></span><i class="icon icon-angle-right"></i><span class='menu-theme-name'><?php echo $templates[$currentTemplate]['themes'][$currentTheme]?></span> &nbsp;<i class='icon-caret-down'></i></a>
      <div class='dropdown-menu theme-picker-dropdown'>
        <div class='theme-picker' data-template='<?php echo $currentTemplate?>' data-theme='<?php echo $currentTheme?>'>
          <div class='menu-templates'>
            <ul class='nav'>
              <?php $templateThemes = ''; ?>
              <?php foreach($templates as $code => $tpl):?>
              <?php
              $isCurrent    = $currentTemplate == $code;
              $themeName    = $isCurrent ? $currentTheme : 'default';
              $themesList   = '';
              ?>
              <li class='menu-template <?php if($isCurrent) echo 'active';?>' data-template='<?php echo $code; ?>'>
                <?php commonModel::printLink('ui', 'settemplate', "template={$code}&theme={$themeName}", $tpl['name']) ?>
              </li>
              <?php
              foreach($tpl['themes'] as $theTheme => $name)
              {
                  $selectThemeUrl = $this->createLink('ui', 'setTemplate', "template={$code}&theme={$theTheme}");
                  $themeClass = $isCurrent && $currentTheme == $theTheme ? 'current' : '';
                  $themesList .= "<div class='theme menu-theme {$themeClass}' data-url='{$selectThemeUrl}' data-theme='{$theTheme}'><div class='theme-card'><i class='icon-ok icon'></i>";
                  $themesList .= "<div class='theme-img'>" . html::image($webRoot . "template/{$code}/theme/{$theTheme}/preview.png") . '</div>';
                  $themesList .= "<div class='theme-name'>{$name}</div>";
                  $themesList .= '</div></div>';
              }
              ?>
              <?php $templateThemes .= "<div class='menu-themes clearfix" . ($isCurrent ? ' show' : '') . "' data-template='{$code}'>" . $themesList . '</div>'; ?>
              <?php endforeach;?>
            </ul>
          </div>
          <div class='menu-themes-list'>
            <?php echo $templateThemes; ?>
          </div>
        </div>
        <div class='theme-picker-footer'>
          <div class='pull-right'>
            <?php commonModel::printLink('ui', 'customTheme', '', '<i class="icon-cog"></i> ' . $lang->ui->customtheme, 'class="btn btn-link"')?>
            <?php commonModel::printLink('ui', 'setTemplate', '', '<i class="icon-cogs"></i> ' . $lang->ui->setTemplate, 'class="btn btn-link"')?>
          </div>
          <?php echo $lang->ui->currentTheme ?>： <span class='menu-template-name'><?php echo $templates[$config->template->name]['name'];?></span> <i class="icon icon-angle-right"></i> <span class='menu-theme-name'><?php echo $templates[$config->template->name]['themes'][$currentTheme]?></span>
        </div>
      </div>
    </li>
    <li class="divider"></li>
  </ul>
  <?php $moduleMenu = commonModel::createModuleMenu($this->moduleName, '', false);?>
  <?php if($moduleMenu) echo $moduleMenu;?>
  <div class="pull-right">
    <ul class="nav">
      <li><?php commonModel::printLink('package', 'upload', '', '<i class="icon-download-alt"></i> ' . $lang->ui->installTemplate, "data-toggle='modal' data-width='600'")?></li>
      <li><?php commonModel::printLink('ui', 'uploadTheme', '', '<i class="icon-download-alt"></i> ' . $lang->ui->uploadTheme, "data-toggle='modal' data-width='600'")?></li>
      <li><?php commonModel::printLink('ui', 'exportTheme', '', '<i class="icon-upload-alt"></i> ' . $lang->ui->exportTheme, "data-toggle='modal' data-width='600'")?></li>
    </ul>
  </div>
</nav>
<script>
$(function()
{
    var $themePicker = $('#menu .theme-picker');

    var refreshPicker = function(template)
    {
        var currentTemplate = $themePicker.attr('data-template');
        var currentTheme = $themePicker.attr('data-theme');
        if(!template || typeof(template) !== 'string') template = $(this).data('template') || currentTemplate;

        $themePicker.find('.menu-template.hover').removeClass('hover');
        $themePicker.find('.menu-template[data-template="' + template + '"]').addClass('hover');

        $themePicker.find('.menu-theme.current').removeClass('current');
        $themePicker.find('.menu-themes.show').removeClass('show');
        $themePicker.find('.menu-themes[data-template="' + template + '"]').addClass('show');
        $themePicker.find('.menu-themes[data-template="' + currentTemplate + '"] .menu-theme[data-theme="' + currentTheme + '"]').addClass('current');
    };

    $themePicker.on('mouseenter', '.menu-template', refreshPicker)
    .on('click', '.menu-template > a, .menu-theme', function(e)
    {
        var $this = $(this);
        $.getJSON($this.attr('href') || $this.data('url'), function(response)
        {
            if(response.result == 'success')
            {
                messager.success(response.message);
                window.location.reload();
            }
            else
            {
                bootbox.alert(data.message);
            }
        });
        return false;
    }).on('click', '.btn-custom', function(e){e.stopPropagation();});

    $('.menu-theme-picker').on('show.bs.dropdown show.zui.dropdown', refreshPicker);

    refreshPicker();

    window.refreshThemePicker = function(template, theme)
    {
        $themePicker.find('.menu-template.active').removeClass('active');
        $themePicker.find('.menu-template[data-template="' + template + '"]').addClass('active');
        $themePicker.find('.menu-theme.active').removeClass('active');
        $themePicker.find('.menu-theme[data-theme="' + theme + '"]').addClass('active');
        $themePicker.attr('data-template', template).attr('data-theme', theme);
        refreshPicker(template, theme);
    };
});
</script>
