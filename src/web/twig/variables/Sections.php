<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\app\web\twig\variables;

use craft\app\models\Section;

/**
 * Class Sections variable.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class Sections
{
    // Public Methods
    // =========================================================================

    /**
     * Returns all sections.
     *
     * @param string|null $indexBy
     *
     * @return array
     */
    public function getAllSections($indexBy = null)
    {
        return \Craft::$app->getSections()->getAllSections($indexBy);
    }

    /**
     * Returns all editable sections.
     *
     * @param string|null $indexBy
     *
     * @return array
     */
    public function getEditableSections($indexBy = null)
    {
        return \Craft::$app->getSections()->getEditableSections($indexBy);
    }

    /**
     * Gets the total number of sections.
     *
     * @return integer
     */
    public function getTotalSections()
    {
        return \Craft::$app->getSections()->getTotalSections();
    }

    /**
     * Gets the total number of sections that are editable by the current user.
     *
     * @return integer
     */
    public function getTotalEditableSections()
    {
        return \Craft::$app->getSections()->getTotalEditableSections();
    }

    /**
     * Returns a section by its ID.
     *
     * @param integer $sectionId
     *
     * @return Section|null
     */
    public function getSectionById($sectionId)
    {
        return \Craft::$app->getSections()->getSectionById($sectionId);
    }

    /**
     * Returns a section by its handle.
     *
     * @param string $handle
     *
     * @return Section|null
     */
    public function getSectionByHandle($handle)
    {
        return \Craft::$app->getSections()->getSectionByHandle($handle);
    }
}
