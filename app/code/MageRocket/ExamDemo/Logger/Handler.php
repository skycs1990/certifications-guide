<?php
/**
 * Grid Logger Handler.
 * @category  MageRocket
 * @package   MageRocket_ExamDemo
 * @author  MageRocket
 * @copyright  MageRocket 

 */

namespace MageRocket\ExamDemo\Logger;

class Handler extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * Logging level.
     *
     * @var int
     */
    public $loggerType = Logger::INFO;

    /**
     * File name.
     *
     * @var string
     */
    public $fileName = '/var/log/grid.log';
}
