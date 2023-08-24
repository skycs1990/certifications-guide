<?php
namespace MageRocket\ExamDemo\Model;

use Magento\Quote\Model\Quote\Address\RateResult\Error;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Carrier\AbstractCarrierOnline;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Shipping\Model\Rate\Result;
use Magento\Shipping\Model\Simplexml\Element;
use Magento\Ups\Helper\Config;
use Magento\Framework\Xml\Security;

class Carrier extends AbstractCarrierOnline implements CarrierInterface
{
    const CODE = 'mrcustomshipping';
    protected $_code = self::CODE;
    protected $_request;
    protected $_result;
    protected $_baseCurrencyRate;
    protected $_xmlAccessRequest;
    protected $_localeFormat;
    protected $_logger;
    protected $configHelper;
    protected $_errors = [];
    protected $_isFixed = true;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory, \Psr\Log\LoggerInterface $logger, Security $xmlSecurity, \Magento\Shipping\Model\Simplexml\ElementFactory $xmlElFactory, \Magento\Shipping\Model\Rate\ResultFactory $rateFactory, \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory, \Magento\Shipping\Model\Tracking\ResultFactory $trackFactory, \Magento\Shipping\Model\Tracking\Result\ErrorFactory $trackErrorFactory, \Magento\Shipping\Model\Tracking\Result\StatusFactory $trackStatusFactory, \Magento\Directory\Model\RegionFactory $regionFactory, \Magento\Directory\Model\CountryFactory $countryFactory, \Magento\Directory\Model\CurrencyFactory $currencyFactory, \Magento\Directory\Helper\Data $directoryData, \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry, \Magento\Framework\Locale\FormatInterface $localeFormat, Config $configHelper, array $data = [])
    {
        $this->_localeFormat = $localeFormat;
        $this->configHelper = $configHelper;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $xmlSecurity, $xmlElFactory, $rateFactory, $rateMethodFactory, $trackFactory, $trackErrorFactory, $trackStatusFactory, $regionFactory, $countryFactory, $currencyFactory, $directoryData, $stockRegistry, $data);
    }
    protected function _doShipmentRequest(\Magento\Framework\DataObject $request)
    {
        // Do shipment request to carrier web service, obtain Print Shipping Labels and process errors in response
        
    }

    public function getAllowedMethods()
    {
        //Return shipping method unique code and its values from here.
        return [$this->_code => $this->getConfigData('name') ];
    }

    public function collectRates(RateRequest $request)
    {
        $result = $this
            ->_rateFactory
            ->create();

        /*store shipping in session*/
        $method = $this
            ->_rateMethodFactory
            ->create();
        $method->setCarrier($this->_code);
        $method->setCarrierTitle('Custom Shipping');
        /* Use method name */
        $method->setMethod($this->_code);
        $method->setMethodTitle('Custom Shipping');
        $method->setCost(10);
        $method->setPrice(10);
        $result->append($method);
        return $result;
    }

    public function proccessAdditionalValidation(\Magento\Framework\DataObject $request)
    {
        return true;
    }
}