<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ScrollCatchersController extends AppController {
  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow(array("script", "begin_monitor", "catch_scroll", "test"));
  }

  function edit($id = null) {
    header("Cache-Control: no-cache, no-store");
    header("Expires: 26 Jul 2009 05:00:00 GMT"); // Date in the past
    $current_user = $this->Auth->user("id");

    if ($current_user < 0) {
      $this->redirect("/users/login");
    }

    //Create scroll catcher.
    if (!isset($id) || $id == NULL || $id*1 < 1) {
      if ($this->data && !empty($this->data)) {
        if ($current_user == $this->data["ScrollCatcher"]["user_id"]) {
          $hasString = strtotime("now").$current_user;
          $this->data["ScrollCatcher"]["access_code"] = hash("md5", $hasString);
          $this->ScrollCatcher->set($this->data);

          if ($this->ScrollCatcher->save()) {
            $this->Session->setFlash('New catcher has been successfully created!','default');
            $this->data = null;
          } else {
            $this->Session->setFlash('Catcher information save failed. Please, try again.', 'default');
          }
        }
      }
    } else {
      $current_catcher = $this->ScrollCatcher->findById($id);
      
      if ($this->data && !empty($this->data)) {
        // If user edit user own catcher.
        if ($current_user == $current_catcher["ScrollCatcher"]["user_id"] &&
                $current_user == $this->data["ScrollCatcher"]["user_id"]) {
          $this->ScrollCatcher->set($this->data);

          if ($this->ScrollCatcher->save()) {
            $this->Session->setFlash('Catcher have been succefully updated!', 'default');
          } else {
            $this->Session->setFlash('Failed to update catcher. Please try again.', 'default');
          }
        }
				
        $this->redirect("edit");
      } else {
        $this->data = $current_catcher;
      }
    }

    $catcher_type_result = $this->ScrollCatcher->CatcherType->find("all");
    $catcher_types = array();

    foreach ($catcher_type_result as $index => $catcher_type) {
      $catcher_types[$catcher_type["CatcherType"]["id"]] = $catcher_type["CatcherType"]["name"];
    }

    $user_id = $this->Auth->user("id");
    $scroll_catcher_result = $this->ScrollCatcher->findAllByUserId($user_id);
    $scroll_catchers = array();

    foreach ($scroll_catcher_result as $index => $scroll_catcher) {
      $scroll_catchers[$scroll_catcher["ScrollCatcher"]["id"]] = $scroll_catcher["ScrollCatcher"];
    }

    $this->set("catcher_types", $catcher_types);
    $this->set("scroll_catchers", $scroll_catchers);
    $this->set("current_user", $current_user);
  }

  function script($access_code) {
    if ($access_code == NULL) {
      print_r("Invalid access code");

      return;
    }

    $scroll_catcher = $this->ScrollCatcher->findByAccessCode($access_code);

    if ($scroll_catcher == NULL || empty($scroll_catcher)) {
      print_r("Invalid access code");

      return;
    }

    if ($scroll_catcher["User"] != NULL && !$scroll_catcher["User"]["active"]) {
      print_r("This account is inactive");

      return;
    }

    $this->layout = NULL;
    $this->set("scroll_catcher", $scroll_catcher);
    $this->render("script.js");
  }

  function delete($id = NULL) {
    if ($id*1 > 0) {
      $current_user = $this->Auth->user("id");
      $this->ScrollCatcher->deleteAll(array("ScrollCatcher.id" => $id, "user_id" => $current_user));
    }

    $this->redirect("edit");
  }

  function begin_monitor($access_code = NULL) {
    if ($access_code == NULL) {
      print_r("Invalid access code");

      return;
    }

    $scroll_catcher = $this->ScrollCatcher->findByAccessCode($access_code);

    if ($scroll_catcher == NULL || empty($scroll_catcher)) {
      print_r("Invalid access code");

      return;
    }

    if ($scroll_catcher["User"] != NULL && !$scroll_catcher["User"]["active"]) {
      print_r("This account is inactive");

      return;
    }

    $this->ScrollCatcher->id = $scroll_catcher["ScrollCatcher"]["id"];
    $number_of_monitored_users = $scroll_catcher["ScrollCatcher"]["number_of_monitored_users"] + 1;
    $this->ScrollCatcher->saveField("number_of_monitored_users", $number_of_monitored_users);
    Configure::write ("debug", 0);
    $this->layout = NULL;
  }

  function catch_scroll($access_code = NULL) {
    if ($access_code == NULL) {
      print_r("Invalid access code");

      return;
    }

    $scroll_catcher = $this->ScrollCatcher->findByAccessCode($access_code);

    if ($scroll_catcher == NULL || empty($scroll_catcher)) {
      print_r("Invalid access code");

      return;
    }

    if ($scroll_catcher["User"] != NULL && !$scroll_catcher["User"]["active"]) {
      print_r("This account is inactive");

      return;
    }

    $this->ScrollCatcher->id = $scroll_catcher["ScrollCatcher"]["id"];
    $number_of_monitored_users = $scroll_catcher["ScrollCatcher"]["number_of_caught_users"] + 1;
    $this->ScrollCatcher->saveField("number_of_caught_users", $number_of_monitored_users);
    Configure::write ("debug", 0);
    $this->layout = NULL;
  }

  function test($access_code = NULL) {
    if ($access_code == NULL) {
      print_r("Invalid access code");

      return;
    }

    $this->set("access_code", $access_code);
  }
}