<?php
$config->article->create = new stdClass();
$config->article->edit   = new stdClass();
$config->article->create->requiredFields = 'categories, title, content';
$config->article->edit->requiredFields   = 'categories, title, content';

$config->article->editor = new stdclass();
$config->article->editor->create = array('id' => 'content', 'tools' => 'simpleTools');
$config->article->editor->edit   = array('id' => 'content', 'tools' => 'simpleTools');
