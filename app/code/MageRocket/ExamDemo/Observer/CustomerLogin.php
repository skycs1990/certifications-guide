<?php
namespace MageRocket\ExamDemo\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Customer;

class Customerlogin implements ObserverInterface
{
  
    protected $_customerRepositoryInterface;
  

    public function __construct(\Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    )
    {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $customerData = $customer->getDataModel();
        $customerData->setCustomAttribute('last_login_at', (new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT));
        $customer->updateData($customerData);
        $customer->save();

    }
}