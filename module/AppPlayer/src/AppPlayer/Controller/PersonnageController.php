<?php

namespace AppPlayer\Controller;

use BPC\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PersonnageController extends AbstractActionController {

    const needAuth = true;
    const needAuthModo = false;
    const needAuthAdmin = false;
    const activeFullLayout = true;

    public function indexAction() {
        return new ViewModel();
    }

}
