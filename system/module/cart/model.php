<?php
/**
 * The model file of cart module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     cart
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class cartModel extends model
{
    /**
     * Add a prodcut to cart. 
     * 
     * @param  int    $productID 
     * @param  int    $count 
     * @access public
     * @return void
     */
    public function add($productID, $count)
    {

        $hasProduct = $this->dao->select('count(*) as count')->from(TABLE_CART)->where('account')->eq($this->app->user->account)->andWhere('product')->eq($productID)->fetch('count');

        if(!$hasProduct)
        {
            $product = new stdclass();
            $product->product = $productID;
            $product->account = $this->app->user->account;
            $product->count   = $count;
            $this->dao->insert(TABLE_CART)->data($product)->exec();
        }
        else
        {
            $this->dao->update(TABLE_CART)->set("count= count + {$count}")->where('account')->eq($this->app->user->account)->andWhere('product')->eq($productID)->exec();
        }

        return !dao::isError();
    }

    /**
     * Get product list in cart of an account.
     * 
     * @param  string $account 
     * @access public
     * @return void
     */
    public function getListByAccount($account = '')
    {
        $addedProducts = $this->dao->select('*')->from(TABLE_CART)->where('account')->eq($account)->fetchAll('product');

        /* Get products(use groupBy to distinct products).  */
        $products = $this->dao->select('t1.*, t2.category')->from(TABLE_PRODUCT)->alias('t1')
            ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
            ->where('t1.id')->in(array_keys($addedProducts))
            ->andWhere('t2.type')->eq('product')
            ->beginIF(RUN_MODE == 'front')->andWhere('t1.status')->eq('normal')->fi()
            ->groupBy('t2.id')
            ->fetchAll('id');

        if(empty($products)) return array();

        /* Get categories for these products. */
        $categories = $this->dao->select('t2.id, t2.name, t2.alias, t1.id AS product')
            ->from(TABLE_RELATION)->alias('t1')
            ->leftJoin(TABLE_CATEGORY)->alias('t2')->on('t1.category = t2.id')
            ->where('t2.type')->eq('product')
            ->andWhere('t1.id')->in(array_keys($products))
            ->fetchGroup('product', 'id');

        /* Assign categories to it's product. */
        foreach($products as $product) $product->categories = !empty($categories[$product->id]) ? $categories[$product->id] : array();

        /* Get images for these products. */
        $images = $this->loadModel('file')->getByObject('product', array_keys($products), $isImage = true);

        /* Assign images to it's product. */
        foreach($products as $product)
        {
            $product->count = $addedProducts[$product->id]->count;
            if(empty($images[$product->id])) continue;
            $product->image = new stdclass();
            if(isset($images[$product->id]))  $product->image->list = $images[$product->id];
            if(!empty($product->image->list)) $product->image->primary = $product->image->list[0];
        }
        
        return $products;

    }
}
