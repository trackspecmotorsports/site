<?php
$installer = $this;
$installer->startSetup();
$installer->addAttribute('catalog_category', 'meigee_cat_customlabel', array(
    'group'             => 'Meigee/Enhanced Categories',
    'label'             => 'Category Label',
    'note'              => "",
    'type'              => 'varchar',
    'input'             => 'select',
    'source'            => 'Meigee_CategoriesEnhanced/category_attribute_source_block_labels',
    'visible'           => true,
    'required'          => false,
    'backend'           => '',
    'frontend'          => '',
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'user_defined'      => true,
    'visible_on_front'  => true,
    'wysiwyg_enabled'   => false,
    'is_html_allowed_on_front'  => false,
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute('catalog_category', 'meigee_cat_labeltext', array(
    'group'             => 'Meigee/Enhanced Categories',
    'label'             => 'Label Text',
    'note'              => "",
    'type'              => 'text',
    'input'             => 'text',
    'visible'           => true,
    'required'          => false,
    'backend'           => '',
    'frontend'          => '',
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'user_defined'      => true,
    'visible_on_front'  => true,
    'wysiwyg_enabled'   => true,
    'is_html_allowed_on_front'  => true,
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$installer->endSetup();