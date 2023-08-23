<?php

    namespace MageRocket\ExamDemo\Observer;

    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;

    class AfterAddtoCart implements ObserverInterface
    {
        public function execute(\Magento\Framework\Event\Observer $observer) {
            $item  = $observer->getEvent()->getQuoteItem();
   
  
            $price = 100; //set your price here
            $item->setCustomPrice($price);
            $item->setOriginalCustomPrice($price);
            $item->getProduct()->setIsSuperMode(true);
        }

    }