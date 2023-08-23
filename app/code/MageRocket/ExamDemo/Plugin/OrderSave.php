<?php		
		
namespace MageRocket\ExamDemo\Plugin;		
		
use Magento\Framework\Exception\CouldNotSaveException;		
		
class OrderSave		
{		
		
		
    public function afterSave(		
	\Magento\Sales\Api\OrderRepositoryInterface $subject,	
	\Magento\Sales\Api\Data\OrderInterface $resultOrder	
    ) {		
		$resultOrder = $this->saveCustomAttribute($resultOrder);	
		
		return $resultOrder;	
    }		
		
    private function saveCustomAttribute(\Magento\Sales\Api\Data\OrderInterface $order)		
    {		
	$extensionAttributes = $order->getExtensionAttributes();	
	if (	
	    null !== $extensionAttributes &&	
	    null !== $extensionAttributes->getCustomAttribute()	
	) {	
	    $tigrenAttributeValue = $extensionAttributes->getCustomAttribute()->getValue();	
	    try {	
	        // The actual implementation of the repository is omitted	
	        // but it is where you would save to the database (or any other persistent storage)	
	       // $this->tigrenExampleRepository->save($order->getEntityId(), $tigrenAttributeValue);	
	    	
	    } catch (\Exception $e) {	
	        throw new CouldNotSaveException(	
	            __('Could not add attribute to order: "%1"', $e->getMessage()),	
	            $e	
	        );	
	    }	
	}	
	return $order;	
    }		
}		
	