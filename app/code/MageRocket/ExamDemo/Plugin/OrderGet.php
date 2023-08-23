<?php		
		
namespace MageRocket\ExamDemo\Plugin;		
		
class OrderGet		
{		
		
		
    public function afterGet(		
	\Magento\Sales\Api\OrderRepositoryInterface $subject,	
	\Magento\Sales\Api\Data\OrderInterface $resultOrder	
    ) {		
	$resultOrder = $this->getTigrenAttribute($resultOrder);	
		
	return $resultOrder;	
    }		
		
    private function getTigrenAttribute(\Magento\Sales\Api\Data\OrderInterface $order)		
    {		
		
	try {	
	    // The actual implementation of the repository is omitted	
	    // but it is where you would load your value from the database (or any other persistent storage)	
	    //$tigrenAttributeValue = $this->tigrenExampleRepository->get($order->getEntityId());	
	} catch (NoSuchEntityException $e) {	
	    return $order;	
	}	
		
	$extensionAttributes = $order->getExtensionAttributes();	
	//$orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();	
	//$tigrenAttribute = $this->tigrenAttributeFactory->create();	
	$tigrenAttributeValue  = "Custom Attribute By SK";
	//$extensionAttributes->setCustomAttribute($tigrenAttributeValue);	
	
	//$order->setExtensionAttributes($extensionAttributes);	
		
	return $order;	
    }		
}		