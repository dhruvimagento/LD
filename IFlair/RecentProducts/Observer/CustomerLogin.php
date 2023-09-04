<?php

namespace IFlair\RecentProducts\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
{
	protected $customerSession;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->customerSession = $customerSession;
    } 

	public function execute(Observer $observer)
	{
	    $customer = $observer->getEvent()->getCustomer(); //Get customer object
		//print_r($customer->getData()); //Print current Customer Data
	    $id = $this->customerSession->getCustomerId();
	    $firstName = $customer['firstname'];
	    $lastName = $customer['lastname'];
	    
        $customValue = array($firstName, $lastName);
        $setValye = $this->customerSession->setValue($customValue); //set value in customer session
        $getValue = $this->customerSession->getValue(); //Get value from customer session
        
		//dd($getValue);	
    }
}