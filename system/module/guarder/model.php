<?php
/**
 * The model file of guarder module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1 (http://www.chanzhi.org/license/)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     guarder
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class guarderModel extends model
{
    /**
     * Check something is evil or not.
     * 
     * @param  string $content 
     * @access public
     * @return bool
     */
    public function isEvil($content = '')
    {
        $isEvil = false;
        if(strpos($content, 'http://') !== false) return true;

        $lineCount = preg_match_all('/(?<=href=)([^\>]*)(?=\>)/ ', $content, $out);
        if($lineCount > 1) $isEvil = true;

        if($lineCount > 5) die();
        if(preg_match('/\[url=.*\].*\[\/url\]/U', $content)) die();

        return false;
    }

    /**
     * Create guarder for comment.
     * 
     * @access public
     * @return string
     */
    public function create4Comment()
    {
        $guarder = $this->createCaptcha();     
        return <<<EOT
<label for='captcha' class='col-sm-1 control-label'>{$this->lang->guarder->captcha}</label>
<div class='col-sm-11 required'>
  <table class='captcha'>
      <tr class='text-middle'>
        <td class='text-lg w-110px'><span class='label label-danger'>{$guarder->first} {$guarder->operator} {$guarder->second}</span></td>
        <td class='text-lg text-center w-40px'> {$this->lang->guarder->equal} </td>
        <td><input type='text'  name='captcha' id='captcha' class='w-80px inline-block form-control text-center' placeholder='{$this->lang->guarder->placeholder}'/> &nbsp;</td>
      </tr>
  </table>
</div>
EOT;
    }

    /**
     * Create guarder for comment.
     * 
     * @access public
     * @return string
     */
    public function create4Reply()
    {
        $guarder = $this->createCaptcha();     
        return <<<EOT
<table class='captcha'>
  <tr class='text-middle'>
    <td class='w-80px text-center'><label for='captcha'>{$this->lang->guarder->captcha}</label></td>
    <td class='w-110px text-lg'><span class='label label-danger'>{$guarder->first} {$guarder->operator} {$guarder->second}</span></td>
    <td class='w-40px text-lg text-center'>{$this->lang->guarder->equal}</td>
    <td>
      <input type='text'  name='captcha' id='captcha' class='w-80px inline-block form-control text-center' placeholder='{$this->lang->guarder->placeholder}'/> &nbsp;
    </td>
  </tr>
</table>
EOT;
    }

    /**
     * Create guarder for thread.
     * 
     * @access public
     * @return string
     */
    public function create4Thread()
    {
        $guarder = $this->createCaptcha();
        return <<<EOT
<label for='captcha' class='col-md-1 col-sm-2 control-label'>{$this->lang->guarder->captcha}</label>
<div class='col-md-7 col-sm-8 col-xs-11 required'>
  <table class='captcha'>
      <tr class='text-middle'>
        <td class='text-lg w-110px'><span class='label label-danger'>{$guarder->first} {$guarder->operator} {$guarder->second}</span></td>
        <td class='text-lg text-center w-40px'> {$this->lang->guarder->equal} </td>
        <td><input type='text'  name='captcha' id='captcha' class='w-80px inline-block form-control text-center' placeholder='{$this->lang->guarder->placeholder}'/> &nbsp;</td>
      </tr>
  </table>
</div>
EOT;
    }

    /**
     * Create guarder for message reply.
     * 
     * @access public
     * @return string
     */
    public function create4MessageReply()
    {
        $guarder = $this->createCaptcha();
        return <<<EOT
<th>{$this->lang->guarder->captcha}</th>
<td>
  <table class='captcha'>
    <tr class='text-middle'>
      <td class='text-lg w-110px'><span class='label label-danger'>{$guarder->first} {$guarder->operator} {$guarder->second}</span></td>
      <td class='text-lg text-center w-40px'> {$this->lang->guarder->equal} </td>
      <td><input type='text'  name='captcha' id='captcha' class='w-80px inline-block form-control text-center' placeholder='{$this->lang->guarder->placeholder}'/> &nbsp;</td>
    </tr>
  </table>
</td>
EOT;
    }

    /**
     * Create guarder.
     * 
     * @access public
     * @return object.
     */
    public function createCaptcha()
    {
        /* Get random two numbers and random operator. */
        $operators      = array_keys($this->lang->guarder->operators);
        $firstRand      = mt_rand(0, 10);
        $secondRand     = mt_rand(0, 10);
        $randomOperator = $operators[array_rand($operators)];

        /* Compute the result and save it to session. */
        $expression = "\$captcha = $firstRand $randomOperator $secondRand;";
        eval($expression);
        $this->session->set('captcha', $captcha);

        /* Return the guarder data. */
        $captcha = new stdclass();
        $captcha->first    = $this->lang->guarder->numbers[$firstRand];
        $captcha->second   = $this->lang->guarder->numbers[$secondRand];
        $captcha->operator = $this->lang->guarder->operators[$randomOperator];

        return $captcha;
    }

    /**
     * Save operation log.
     * 
     * @param  string    $type 
     * @param  string    $operation 
     * @access public
     * @return void
     */
    public function log($type, $operation)
    {
        
    }
}
