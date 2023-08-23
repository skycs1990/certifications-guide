<?php
namespace MageRocket\ExamDemo\Setup;

use Magento\Eav\Model\Entity;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Model\Config;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory,Config $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        
        if (version_compare($context->getVersion(),'1.0.1','<')){
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
//            $attributeCode = 'last_login_at';

            // add/update frontend_model to the attribute
            $eavSetup->addAttribute(
                \Magento\Customer\Model\Customer::ENTITY, // customer entity code
                'last_login_at',
                [

                    'label' =>"Last Login",
                    'type' => 'datetime',
                    'input' => 'date',
                    'frontend' => \Magento\Eav\Model\Entity\Attribute\Frontend\Datetime::class,
                    'backend' => \Magento\Eav\Model\Entity\Attribute\Backend\Datetime::class,
                    'required' => false,
                    'user_defined' => true,
                    'visible' => true,
                    'system' => false,
                    'input_filter' => 'date',
                    'validate_rules' => '{"input_validation":"date"}',
                    'position'     => 999,


                ]
            );

            $eavSetup->addAttributeToSet(
                \Magento\Customer\Api\CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
                \Magento\Customer\Api\CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
                null,
                'last_login_at');

            $lastLogin = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'last_login_at');
            $lastLogin->setData(
                'used_in_forms',
                ['customer_account_edit','adminhtml_customer','customer_account_create'] 
            );
            $lastLogin->save(); 
        }
        $setup->endSetup();
    }
}