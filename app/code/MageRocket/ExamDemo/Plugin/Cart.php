<?php
    
    namespace MageRocket\ExamDemo\Plugin;

    class Cart
    {
        public function beforeAddProduct(
            \Magento\Checkout\Model\Cart $subject,
            $productInfo,
            $requestInfo = null
        ) {
            $requestInfo['qty'] = 5; // increasing quantity to 10
            return array($productInfo, $requestInfo);
        }

        public function aroundAddProduct(
            \Magento\Checkout\Model\Cart $subject,
            \Closure $proceed,
            $productInfo,
            $requestInfo = null
        ) {
            $requestInfo['qty'] = 15; // setting quantity to 10
            $result = $proceed($productInfo, $requestInfo);
            // change result here
            return $result;
        }
        
    }