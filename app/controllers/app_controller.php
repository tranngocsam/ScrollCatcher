<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class AppController extends Controller {
  var $components = array("Auth", "Session");
  var $helpers = array("Html", "Javascript", "Form", "Session");
  
  function beforeFilter(){
    $this->Auth->fields = array('username' => 'email', 'password' => 'password');
    $this->Auth->loginAction = array("controller" => "users", "action" => "login");
    $this->Auth->loginRedirect = array("controller" => "ScrollCatchers", "action" => "edit");
    $this->Auth->authorize = "controller";
    $this->Auth->userScope = array('User.active = 1');
  }

  function beforeRender() {
    if ($this->Auth->user("id") != NULL && $this->Auth->user("id") > 0) {
      $this->set("logged_in", true);
    } else {
      $this->set("logged_in", false);
    }
  }

  function isAuthorized() {
    return $this->isPermitted($this->name, $this->action);
    //return true;
  }

  function isPermitted($controllerName, $controllerAction) {
    return true;
  }
}
?>
