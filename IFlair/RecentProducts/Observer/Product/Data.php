<?php

namespace IFlair\RecentProducts\Observer\Product;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Data implements ObserverInterface
{
	protected $customerSession;
	protected $resultPageFactory;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->customerSession = $customerSession;
        $this->resultPageFactory = $resultPageFactory;
    }
    
	public function execute(Observer $observer)
	{
		$resultPage = $this->resultPageFactory->create();

	    $product = $observer->getProduct();
	    $originalName = $product->getName();
	    $sku = $product->getSku();
	    
	    $catid = $product->getCategoryId();
	    $entid = $product->getEntityId();

	    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();	
		$SessionCollection =  $objectManager->get('Magento\Customer\Model\Session');		
		
		/*if($SessionCollection->isLoggedIn()) 
		{*/
			$items = array();		
			$items = $this->customerSession->getValue();	
			//if($items && !in_array($sku, $items))
			if($items)
			{			
				//dd($items);			
				array_push($items, $sku);
				$this->customerSession->setValue($items);								
			}
			else
			{	
				$items = explode(' ', $sku);			
				$this->customerSession->setValue($items);			
			}	
			$a = array_unique($items);
			$data = json_encode($a);
			//dd($data);
			$cookie_name = "RecentProduct";			
			setcookie($cookie_name, $data); 
						
			/*$block = $resultPage->getLayout()
            ->createBlock(\IFlair\RecentProducts\Block\RecentViewProduct::class)
            ->setData('customdata',$_COOKIE)
            ->setTemplate("IFlair_RecentProducts::recentview.phtml")->toHtml();*/
			//dd($data);			
			//echo $block;*/
			return;
		//}
		
    }
/*    public function customerProductData($data)
    {
    	return $this->execute();
    }*/
}