<?php
 
namespace MageRocket\ExamDemo\Setup\Patch\Data;
 
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
 
class AddProductAttribute implements DataPatchInterface
{
    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
 
    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
 
    /**
     * AddProductAttribute constructor.
     *
     * @param ModuleDataSetupInterface  $moduleDataSetup
     * @param EavSetupFactory           $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }
 
    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
 
        $eavSetup->addAttribute('catalog_product', 'is_trending', [
            'type' => 'int',
            'label' => 'Is Trending',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'default' => 0,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'visible' => true,
            'used_in_product_listing' => true,
            'user_defined' => true,
            'required' => false,
            'group' => 'General',
            'sort_order' => 80,
        ]);
    }
 
    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }
 
    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}