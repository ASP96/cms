<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\records;

use Craft;
use craft\app\enums\AttributeType;
use craft\app\enums\ColumnType;

Craft::$app->requireEdition(Craft::Client);

/**
 * Class EmailMessage record.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class EmailMessage extends BaseRecord
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
		return '{{%emailmessages}}';
	}

	/**
	 * Returns the email message’s locale.
	 *
	 * @return \yii\db\ActiveQueryInterface The relational query object.
	 */
	public function getLocale()
	{
		return $this->hasOne(Locale::className(), ['id' => 'locale']);
	}

	/**
	 * @inheritDoc BaseRecord::defineIndexes()
	 *
	 * @return array
	 */
	public function defineIndexes()
	{
		return [
			['columns' => ['key', 'locale'], 'unique' => true],
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
			'key'      => [AttributeType::String, 'required' => true, 'maxLength' => 150, 'column' => ColumnType::Char],
			'locale'   => [AttributeType::Locale, 'required' => true],
			'subject'  => [AttributeType::String, 'required' => true, 'maxLength' => 1000],
			'body'     => [AttributeType::String, 'required' => true, 'column' => ColumnType::Text],
		];
	}
}