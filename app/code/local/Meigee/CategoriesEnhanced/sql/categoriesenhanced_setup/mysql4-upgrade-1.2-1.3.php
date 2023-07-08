<?php
$installer = $this;
$installer->startSetup();
$installer->addAttribute('catalog_category', 'meigee_cat_linktarget', array(
    'group'             => 'Meigee/Enhanced Categories',
    'label'             => 'Link target blank',
    'note'              => 'Choose "Yes" if you want open link in a new tab',
    'type'              => 'varchar',
    'input'             => 'select',
    'source'            => 'Meigee_CategoriesEnhanced/category_attribute_source_block_enabledisablelight',
    'default_value' => 0,
	'sort_order' => 6,
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
$installer->endSetup();