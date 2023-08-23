<?php		
		
namespace MageRocket\ExamDemo\Api\Data;		
		
interface CustomAttributeInterface		
{		
    const VALUE = 'value';		
		
    /**		
     * Return value.		
     *		
     * @return string|null 		
     */		
    public function getValue();		
		
    /**		
     * Set value.		
     *		
     * @param string|null $value		
     * @return $this		
     */		
    public function setValue($value);		
}	