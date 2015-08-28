<?php
/**
 * The model file of nav of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1 (http://www.chanzhi.org/license/)
 * @author      Xiying Guan
 * @package     nav
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class navModel extends model
{
    /**
     * Get all navs 
     *
     * @param  string $type
     * @return array
     */
    public function getNavs($type = 'desktop_top')
    {
        global $config;

        if(!isset($config->nav->$type)) return $this->getDefault($type);
        $navs = json_decode($config->nav->$type);
        if(empty($navs)) return $this->getDefault($type);

        foreach($navs as $nav)
        {
            $nav->url = $this->getUrl($nav);   
            $nav->target = isset($nav->target) ? $nav->target : '';
            foreach($nav->children as $grade2Nav)
            {
                $grade2Nav->url = $this->getUrl($grade2Nav);   
                $grade2Nav->target = isset($grade2Nav->target) ? $grade2Nav->target : '';
                foreach($grade2Nav->children as $grade3Nav)
                {
                    $grade3Nav->url = $this->getUrl($grade3Nav);   
                    $grade3Nav->target = isset($grade3Nav->target) ? $grade3Nav->target : '';
                }
            }
        }
        return $navs;
    }
    
    /**
     * Get system navs as default.
     * 
     * @access public
     * @return array   
     */
    public function getDefault($type)
    {
        global $config;
        $defaultNavs = new stdclass();
        $defaultNavs->home    = $config->homeRoot;
        $defaultNavs->company = commonModel::createFrontLink('company', 'index');

        if($type == 'mobile_bottom')
        {
            $defaultNavs->contact = commonModel::createFrontLink('company', 'contact');
            unset($defaultNavs->home);
        }

        foreach($defaultNavs as $item => $url)
        {
            $nav = new stdclass();
            $nav->type   = 'system';
            $nav->system = $item;
            $nav->class  = 'nav-system-' . $item;
            $nav->title  = $this->lang->nav->system->$item;
            $nav->url    = $url;
            $nav->target = $type == 'mobile_bottom' ? 'modal' : '_self';
            $navs[] = $nav;
        }

        return $navs;
    }

    /**
     * Create form input tags of backend.
     *
     * @param int $grade
     * @param array $nav
     * @return string
     */
    public function createEntry($grade = 1, $nav = null)
    {
        if(empty($nav))
        {
            $nav = new stdclass();
            $nav->type   = 'system';
            $nav->system = 'home';
            $nav->title  = $this->lang->nav->system->home;
            $nav->url    = '';
        }

        $childGrade  = $grade + 1;
        $articleTree = $this->loadModel('tree')->getOptionMenu('article');
        $productTree = $this->loadModel('tree')->getOptionMenu('product');
        $pages       = $this->loadModel('article')->getPagePairs();

        $articleHidden = ($nav->type == 'article') ? '' : 'hide'; 
        $productHidden = ($nav->type == 'product') ? '' : 'hide'; 
        $pageHidden    = ($nav->type == 'page')    ? '' : 'hide'; 
        $system        = ($nav->type == 'system')  ? '' : 'hide'; 
        $urlHidden     = ($nav->type == 'custom')  ? '' : 'hide'; 

        $entry = '<i class="icon-folder-open-alt shut"></i><i class="icon icon-circle text-muted"></i>';
        if(isset($nav->children) && !empty($nav->children)) $entry = '<i class="icon-folder-close shut"></i>';

        /* nav type select tag. */
        $entry .= html::select("nav[{$grade}][type][]", $this->lang->nav->types, $nav->type, "class='navType form-control' grade='{$grade}'");

        /* artcle and system select tag. */
        $entry .= html::select("nav[{$grade}][article][]", $articleTree, isset($nav->article) ? $nav->article : '', "class='navSelector form-control {$articleHidden}'");
        $entry .= html::select("nav[{$grade}][product][]", $productTree, isset($nav->product) ? $nav->product : '', "class='navSelector form-control {$productHidden}'");
        $entry .= html::select("nav[{$grade}][page][]", $pages, isset($nav->page) ? $nav->page : '', "class='navSelector form-control {$pageHidden}'");
        $entry .= html::select("nav[{$grade}][system][]", $this->lang->nav->system, $nav->system, "class='navSelector form-control {$system}'");

        $entry .= html::input("nav[{$grade}][title][]", $nav->title, "placeholder='{$this->lang->nav->inputTitle}' class='input-default form-control titleInput'");

        /* url input tag. */
        $entry .= html::input("nav[{$grade}][url][]", $nav->url, "placeholder='{$this->lang->nav->inputUrl}' class='urlInput form-control {$urlHidden}'");

        /* hidden tags. */
        if($grade > 1 ) $entry .= html::hidden("nav[{$grade}][parent][]", '', "class='grade{$grade}parent'");
        $entry .= html::hidden("nav[{$grade}][key][]", '', "class='input grade{$grade}key'"); 

        /* nav target select. */
        $entry .= html::select("nav[$grade][target][]", $this->lang->nav->targetList, isset($nav->target) ? $nav->target : '_self', "class='form-control'");

        /* operate buttons. */
        $entry .= html::a('javascript:;', "<i class='icon icon-plus'> </i>", "class='plus{$grade}' title='{$this->lang->nav->add}'");
        $entry .= html::a('javascript:;', "<i class='icon icon-remove'> </i>", "class='remove' title='{$this->lang->delete}'");
        if($childGrade < 4) $entry .= html::a('javascript:;', "<i class='icon icon-sitemap'> </i>", "title='{$this->lang->nav->addChild}' class='plus{$childGrade}'");
        $entry .= "<a href='javascript:;'><i class='icon-move sort-handle sort-handle-" . $grade . "'></i></a>";

        return $entry;
    }

    /**
     * organize split navs to required structure.
     *
     * @param  array $navs         posted original nav .
     * @return array $organizeNavs   
     */
    public function organizeNav($navs)
    {
        $navCount = count($navs['title']); // get count by common item title.
        $organizedNavs = array();

        for($i = 0; $i < $navCount; $i++)
        {
            foreach($navs as $field => $values) $organizeNavs[$i][$field] = $values[$i];
        }

        foreach($organizeNavs as &$nav) $nav = $this->buildNav($nav);

        return $organizeNavs;
    }

    /**
     * group nav children by parent.
     *
     * @param  array $navs
     * @return array $navs
     */   
    public function group($navs)
    {
        $groupedNavs = array();
        foreach($navs as $nav)
        {
            if(!isset($groupedNavs[$nav['parent']])) $newData[$nav['parent']] = array();
            $groupedNavs[$nav['parent']][] = $nav;
        }
        return $groupedNavs;
    }

    /**
     * build url and class of nav.
     *
     * @param array $nav
     * return array
     */
    public function buildNav($nav)
    {
        /* Add class attribue to highlight current menu. */
        $nav['class'] = $nav['type'] != 'custom' ? 'nav-' . $nav['type'] . '-' . $nav[$nav['type']] : '';
        return $nav;
    }

    /**
     * get url of a nav.
     *
     * @param  array $nav
     * @return string
     */
    public function getUrl($nav)
    {
        global $config;

        if($nav->type == 'system') return $config->nav->system->{$nav->system};   

        if($nav->type == 'article')
        {   
            $category = $this->loadModel('tree')->getByID($nav->article);
            if(empty($category)) return commonModel::createFrontLink('article', 'index');
            return commonModel::createFrontLink('article', 'browse', "categoryID={$nav->article}", "category={$category->alias}");
        }

        if($nav->type == 'product')
        {
            $category = $this->loadModel('tree')->getByID($nav->product);
            if(empty($category)) return commonModel::createFrontLink('product', 'index');
            return commonModel::createFrontLink('product', 'browse', "categoryID={$nav->product}", "category={$category->alias}");
        }

        if($nav->type == 'page')
        {
            $page = $this->loadModel('article')->getByID($nav->page);
            if(empty($page)) return '';
            return commonModel::createFrontLink('page', 'view', "pageID={$nav->page}", "name={$page->alias}");
        }

        return $nav->url;
    }
}
