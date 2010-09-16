<?php
class User extends AppModel {
  var $belongsTo = array(
    "Group" => array("className" => "Group")
  );
  var $hasMany = array("ScrollCatcher");
  var $validate = array(
        'firstname' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Please enter a firstname!'
            ),
            'length' => array(
                'rule' => array('between', 3, 20),
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Username length should be 3~20 characters!'
            ),
            'alphanum' => array(
                'rule' => array("custom", "/^[a-z0-9\- ]*$/i"),
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Username can contain only letters(A-Z), numbers(0-9) and hyphen (-)!'
            )
        ),
        'lastname' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Please enter an lastname!'
            ),
            'length' => array(
                'rule' => array('between', 3, 20),
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Username length should be 3~20 characters!'
            ),
            'alphanum' => array(
                'rule' => array("custom", "/^[a-z0-9\- ]*$/i"),
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Username can contain only letters(A-Z), numbers(0-9) and hyphen (-)!'
            )
        ),
        'clear_password' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'allowEmpty' => false,
                'on' => 'create',
                'message' => 'Please enter a password'
            ),
            'length' => array(
                'rule' => array('between', 6, 20),
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Password length should be 6~20 characters!'
            )
        ),
        'confirm_password' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'allowEmpty' => false,
                'on' => 'create',
                'message' => 'Please enter a confirm password!'
            ),
            'emptyUpdate' => array(
                'rule' => 'emptyUpdate',
                'required' => true,
                'on' => 'update',
                'message' => 'Please enter a confirm password!'
            ),
            'match' => array(
                'rule' => 'matchPasswords',
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Password and Confirm password do not match. Please try again'
            )
        ),
        'email' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Please enter an email address!'
            ),
            'email' => array(
                'rule' => 'email',
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Please enter a valid email address!'
            )
        )
    );

    function emptyUpdate() {
        if (!empty($this->data['User']['clear_password']) && empty($this->data['User']['confirm_password'])) {
            return false;
        } else {
            return true;
        }
    }

    function matchPasswords() {
        if ($this->data['User']['clear_password'] != $this->data['User']['confirm_password']) {
            return false;
        } else {
            return true;
        }
    }
}
