<?php

/**
 * Grid Grid Collection.
 *
 * @category  MageRocket
 * @package   MageRocket_ExamDemo
 * @author  MageRocket
 * @copyright  MageRocket 

 */
namespace MageRocket\ExamDemo\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'MageRocket\ExamDemo\Model\Grid',
            'MageRocket\ExamDemo\Model\ResourceModel\Grid'
        );
    }
}
