<?php

namespace BPC\Mvc\Controller;

use Zend\Mvc\Controller as ZController;
use Zend\View\Model\ViewModel;

class AbstractActionController extends ZController\AbstractActionController {

    const needAuth = false;
    const needAuthModo = false;
    const needAuthAdmin = false;
    const activeFullLayout = false;

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        if (static::needAuth) {
            $auth = $this->getServiceLocator()->get("Zend\Authentication\AuthenticationService");
            if (!$auth->hasIdentity()) {
                return $this->redirect()->toRoute("home_login");
            }
        }
        $return = parent::onDispatch($e);
        if (static::activeFullLayout) {
            $this->customFullLayout($auth->getIdentity());
        }
        return $return;
    }

    private function customFullLayout($identity) {
        $this->layout("layout/layout_gamehub");
        $layout_part_user = new ViewModel(array("identity" => $identity));
        $layout_part_user->setTemplate("layout/layout_gamehub_part_user");
        $this->layout()->addChild($layout_part_user, "part_user");

        $layout_part_menuleft = new ViewModel(array("identity" => $identity));
        $layout_part_menuleft->setTemplate("layout/layout_gamehub_part_menuleft");
        $this->layout()->addChild($layout_part_menuleft, "part_menuleft");

        $layout_part_notification = new ViewModel(array("identity" => $identity));
        $layout_part_notification->setTemplate("layout/layout_gamehub_part_notification");
        $this->layout()->addChild($layout_part_notification, "part_notification");
    }

}
