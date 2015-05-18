<?php
$clientLang  = $this->app->getClientLang();
$enableLangs = explode(',', $config->site->lang);
$enableLangs = array_flip($enableLangs);
$langs       = $config->langs;
foreach($langs as $key => $value)
{
    if(!isset($enableLangs[$key])) unset($langs[$key]);
}
if(count($langs) > 1):
?>
<a href='###' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-globe icon-large'></i> &nbsp;<?php echo $langs[$clientLang]?><span class='caret'></span></a>
<ul class='dropdown-menu'>
  <?php
  unset($langs[$clientLang]);
  foreach($langs as $langKey => $currentLang) echo "<li><a rel='nofollow' href='javascript:selectLang(\"$langKey\")'>$currentLang</a></li>";
  ?>
</ul>
<?php endif;?>
