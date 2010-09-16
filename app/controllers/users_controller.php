<?php

class UsersController extends AppController {
  var $uses = array("User");
  var $components = array('Email');

  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow(array("edit", "forgot_password", "help"));
  }

  function edit($id = null) {
    if (isset($id) && $id != NULL && $id*1 > 0) {
      $edit_user = $this->User->findById($id);

      if (empty($edit_user) && $edit_user["User"]["group_id"] != 1) {
        $this->Session->setFlash('You do not have permission to edit this user.', "default");
        $this->redirect("home");

        return;
      }
    }

    if (!isset($id) || $id == NULL || $id*1 < 1) {
      if ($this->data && !empty($this->data)) {
        if (!isset($this->data["User"]["group_id"])) {
          $this->data["User"]["group_id"] = NULL;
        }

        if ($this->Auth->user("group_id") != 1 && $this->data["User"]["group_id"] == 1) {
          $this->Session->setFlash('You cannot create admin user.', "default");
          $this->redirect("home");

          return;
        }

        if (isset($this->data["User"]["agree"]) && $this->data["User"]["agree"] == "agreed") {
          $this->User->set($this->data);

            if ($this->User->validates()) {
              if ($this->data['User']['confirm_password'] != "") {
                $this->data['User']['password'] = $this->data['User']['confirm_password'];
              }

              $this->User->save($this->Auth->hashPasswords($this->data), false);
              $this->Session->setFlash('Thank you for registration', 'default');
              $this->data["User"]["password"] = $this->data["User"]["clear_password"];
              $this->Auth->login(array("User" => array("email" => $this->data["User"]["email"],
                                                       "password" => $this->Auth->password($this->data["User"]["clear_password"]))));
              $this->redirect("/scroll_catchers/edit");

              return;
            } else {
              $this->Session->setFlash('Please complete all of the required fields.', "default");
            }
        } else {
          $this->Session->setFlash('You have to agree to the Terms Of Services.', "default");
        }
      }
    } else {
      if ($this->data && !empty($this->data)) {
        $user = $this->User->findById($id);

        if (!isset($this->data["User"]["group_id"])) {
          $this->data["User"]["group_id"] = NULL;
        }

        if ($this->Auth->user("group_id") != 1 &&
                ($user["User"]["group_id"] == 1 || $this->data["User"]["group_id"] == 1)) {
          $this->Session->setFlash('You cannot update admin information.', "default");
          $this->redirect("home");

          return;
        }

        $this->User->set($this->data);

        if ($this->MathCaptcha->validates($this->data['User']['security_code'])) {
          if ($this->User->validates()) {
            if ($this->data['User']['confirm_password'] != "") {
              $this->data['User']['password'] = $this->data['User']['confirm_password'];
            }

            $this->User->save($this->Auth->hashPasswords($this->data), false);
            $this->Session->setFlash('The user has been successfully updated!', 'default');
            $this->redirect("login");

            return;
          } else {
            $this->Session->setFlash('Please complete all of the required fields', "default");
          }
        } else {
          $this->Session->setFlash('Please enter the correct answer to the math question.', "default");
        }
      } else {
        $user = $this->User->findById($id);

        if ($this->Auth->user("group_id") != 1 && $user["User"]["group_id"] == 1) {
          $this->Session->setFlash('You cannot edit admin information.', "default");
          $this->redirect("home");
          
          return;
        }

        $this->data = $user;
      }
    }
  }

  function delete($id) {
    if ($this->Auth->user("group_id") == 1 ) {
      $user = $this->User->findById($id);

      if (empty($user)) {
        $this->Session->setFlash('Invalid User ID', "default");
      } else {
        if ($user['User']['id'] == $this->Session->read('Auth.User.id')) {
          $this->Session->setFlash('Sorry, you cannot delete yourself', "default");
        } else {
          $this->User->del($id);
          $deleted_user = $this->User->findById($id);

          if ($this->User->del($id)) {
            $this->Session->setFlash("The user has been successfully deleted", 'default');
          } else {
            $this->Session->setFlash('Failed to delete '.$user['User']['name'].", please contact the administrator",
                    'error');
          }
        }
      }
    }

    $this->redirect('home');
  }

  function logout() {
    $this->Session->delete('Permissions');
    $this->Session->delete('CurrentUser');
    $this->Session->delete('Roles');
    $this->Session->delete('Variables');
    $this->Session->delete('LogoPath');
    $this->redirect($this->Auth->logout());
  }

  function login() {
    if ($this->Auth->user()) {
      if (!empty($this->data)) {
        if (empty($this->data['User']['remember_me'])) {
          $this->Cookie->del('User');
        } else {
          $cookie = array();
          $cookie['email'] = $this->data['User']['email'];
          $cookie['token'] = $this->data['User']['pasword'];
          $this->Cookie->write('User', $cookie, true, '+2 weeks');
        }
        unset($this->data['User']['remember_me']);
      }
      
      $this->redirect($this->Auth->redirect());
    } else {
      if (!empty($this->data)) {
        $this->Session->setFlash('Login is incorrect, please try again.', "default");
      }
    }
  }

  function home() {
    $id = $this->Auth->user("id");
    $current_user = $this->User->findById($id);
    $this->set("current_user", $current_user);
  }

  function forgot_password() {
    if (isset($this->data)) {
      if (isset($this->data["email"])) {
        $user = $this->User->findByEmail($this->data["email"]);

        if ($user != NULL && !empty($user)) {
          $new_plain_password = $this->random_password(8);
          $user["User"]["password"] = $new_plain_password;

          if ($this->User->save($this->Auth->hashPasswords($user), false)) {
            $this->Email->from = 'webmaster@lazr.com>';
            $this->Email->to = $this->data["email"];
            $this->Email->subject = 'New password';
            $this->Email->send('Your new password is '.$new_plain_password);
            $this->redirect("login");
          } else {
            $this->Session->setFlash("An internal error occurs, please contact the administrator.");
          }
        }
      } else {
        $this->Session->setFlash("Password was sent to your email, please check it.");
      }
    } 
  }

  function random_password($length) {
    $ch = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $l = strlen($ch) - 1;
    $str = "";

    for ($i=0; $i < $length; $i++)	 {
        $x = rand (0, $l);
        $str .= $ch[$x];
    }

    return $str;
  }

  function help() {
    
  }
}