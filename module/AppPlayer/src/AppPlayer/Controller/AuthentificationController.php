<?php

namespace AppPlayer\Controller;

use AppPlayer\Form\InscriptionForm;
use AppPlayer\Form\LoginForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthentificationController extends AbstractActionController {

    public function loginAction() {
        $loginForm = new LoginForm();
        if ($this->getRequest()->isPOST()) {
            $loginForm->setData($this->getRequest()->getPOST());
            if ($loginForm->isValid()) {
                $authentificationAdapter = $this->getServiceLocator()->get("BPC\Authentication\Adapter\BPCAdapter");
                $authentificationAdapter->setServiceLocator($this->getServiceLocator());
                $authentificationAdapter->setData($loginForm->getData());
                $auth = $this->getServiceLocator()->get("Zend\Authentication\AuthenticationService");
                $auth->setAdapter($authentificationAdapter);
                $auth->authenticate();
                if ($this->identity() != null) {
                    return $this->redirect()->toRoute("home_connected", array("controller" => "AppPlayer\Controller\Index", "action" => "index"));
                } else {
                    $viewModel = new ViewModel(array("form_login" => $loginForm));
                    $this->layout("layout/layout_login");
                    return $viewModel;
                }
            } else {
                $viewModel = new ViewModel(array("form_login" => $loginForm));
                $this->layout("layout/layout_login");
                return $viewModel;
            }
        } else {
            $viewModel = new ViewModel(array("form_login" => $loginForm));
            $this->layout("layout/layout_login");
            return $viewModel;
        }
    }

    private function loginView(LoginForm $loginForm, $messageErr = null, $messageWarn = null) {
        $viewModel = new ViewModel(array(
            "form_login" => $loginForm,
            "form_login_messageErr" => $messageErr,
            "form_login_messageWarn" => $messageWarn,
        ));
        $this->layout("layout/layout_login");
        return $viewModel;
    }

    public function logoutAction() {
        $auth = $this->getServiceLocator()->get("Zend\Authentication\AuthenticationService");
        $auth->clearIdentity();
        return $this->redirect()->toRoute("home");
    }

    public function inscriptionAction() {
        $inscriptionForm = new InscriptionForm();
        return $this->inscriptionView($inscriptionForm);
    }

    private function inscriptionView(InscriptionForm $inscriptionForm, $messageErr = null, $messageWarn = null) {
        $viewModel = new ViewModel(array(
            "form_login" => new LoginForm(),
            "form_inscription" => $inscriptionForm,
            "form_inscription_messageErr" => $messageErr,
            "form_inscription_messageWarn" => $messageWarn,
        ));
        $this->layout("layout/layout_login");
        $viewModel->setTemplate("app-player/authentification/login");
        $renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
        $renderer->inlineScript()->appendScript("
            jQuery(document).ready(function() {  
                jQuery('.login-form').hide();
                jQuery('.register-form').show();
            });
        ");
        return $viewModel;
    }

}
