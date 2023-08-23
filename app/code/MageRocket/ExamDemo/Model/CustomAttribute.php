<?php		
		
namespace MageRocket\ExamDemo\Model;		
		
class CustomAttribute implements \MageRocket\ExamDemo\Api\Data\CustomAttributeInterface		
{		
    /**		
     * {@inheritdoc}		
     */		
    public function getValue()		
    {		
	return $this->getData(self::VALUE);	
    }		
		
    /**		
     * {@inheritdoc}		
     */		
    public function setValue($value)		
    {		
	return $this->setData(self::VALUE, $value);	
    }		
}