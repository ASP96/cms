<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\app\controllers;

use Craft;
use craft\app\web\Controller;
use yii\web\Response;

/**
 * The RoutesController class is a controller that handles various route related tasks such as saving, deleting and
 * re-ordering routes in the control panel.
 *
 * Note that all actions in the controller require an authenticated Craft session via [[Controller::allowAnonymous]].
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class RoutesController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        // All route actions require an admin
        $this->requireAdmin();
    }

    /**
     * Saves a new or existing route.
     *
     * @return Response
     */
    public function actionSaveRoute()
    {
        $this->requirePostRequest();
        $this->requireAjaxRequest();

        $urlParts = Craft::$app->getRequest()->getRequiredBodyParam('url');
        $template = Craft::$app->getRequest()->getRequiredBodyParam('template');
        $routeId = Craft::$app->getRequest()->getBodyParam('routeId');
        $locale = Craft::$app->getRequest()->getBodyParam('locale');

        if ($locale === '') {
            $locale = null;
        }

        $routeRecord = Craft::$app->getRoutes()->saveRoute($urlParts, $template, $routeId, $locale);

        if ($routeRecord->hasErrors()) {
            return $this->asJson(['errors' => $routeRecord->getErrors()]);
        }

        return $this->asJson([
            'success' => true,
            'routeId' => $routeRecord->id,
            'locale' => $routeRecord->locale
        ]);
    }

    /**
     * Deletes a route.
     *
     * @return Response
     */
    public function actionDeleteRoute()
    {
        $this->requirePostRequest();

        $routeId = Craft::$app->getRequest()->getRequiredBodyParam('routeId');
        Craft::$app->getRoutes()->deleteRouteById($routeId);

        return $this->asJson(['success' => true]);
    }

    /**
     * Updates the route order.
     *
     * @return Response
     */
    public function actionUpdateRouteOrder()
    {
        $this->requirePostRequest();
        $this->requireAjaxRequest();

        $routeIds = Craft::$app->getRequest()->getRequiredBodyParam('routeIds');
        Craft::$app->getRoutes()->updateRouteOrder($routeIds);

        return $this->asJson(['success' => true]);
    }
}
