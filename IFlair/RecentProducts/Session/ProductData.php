<?php 
namespace IFlair\RecentProducts\Session;

class ProductData 
{
	protected $_coreSession;
	public function __construct(

	    \Magento\Framework\Session\SessionManagerInterface $coreSession

	){
	    $this->_coreSession = $coreSession;
	}

	public function setValue($value){
		$this->_coreSession->start();
		$this->_coreSession->setMessage($value);
	}

	public function getValue(){
		$this->_coreSession->start();
		return $this->_coreSession->getMessage();
	}

	public function unSetValue(){
		$this->_coreSession->start();
		return $this->_coreSession->unsMessage();
	}
}

?>