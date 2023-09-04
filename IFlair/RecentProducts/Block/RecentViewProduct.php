<?php

namespace IFlair\RecentProducts\Block;

//use IFlair\RecentProducts\Observer\Product\Data;

class RecentViewProduct extends \Magento\Framework\View\Element\Template
{	
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

    public function productCollection($skuColletion)
    {
    	
    	return $skuColletion;
    	//dd($skuColletion); 
    	//return __('Hello World');

    	//return $this->_prodctData->execute();	
    }
}