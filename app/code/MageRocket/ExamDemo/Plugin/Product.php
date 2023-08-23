<?php
    
    namespace MageRocket\ExamDemo\Plugin;

    class Product
    {
        public function afterGetName(\Magento\Catalog\Model\Product $subject, $result) {
            return "Apple ".$result; // Adding Apple in product name
        }
    }