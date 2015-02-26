<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\records;

use craft\app\enums\AttributeType;

/**
 * Element record class.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class Element extends BaseRecord
{
	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 *
	 * @return string
	 */
	public static function tableName()
	{
		return '{{%elements}}';
	}

	/**
	 * @inheritDoc BaseRecord::defineIndexes()
	 *
	 * @return array
	 */
	public function defineIndexes()
	{
		return [
			['columns' => ['type']],
			['columns' => ['enabled']],
			['columns' => ['archived, dateCreated']],
		];
	}

	// Protected Methods
	// =========================================================================

	/**
	 * @inheritDoc BaseRecord::defineAttributes()
	 *
	 * @return array
	 */
	protected function defineAttributes()
	{
		return [
			'type'     => [AttributeType::ClassName, 'required' => true],
			'enabled'  => [AttributeType::Bool, 'default' => true],
			'archived' => [AttributeType::Bool, 'default' => false],
		];
	}
}