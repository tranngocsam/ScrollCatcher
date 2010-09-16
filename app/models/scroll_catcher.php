<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ScrollCatcher extends AppModel {
  var $belongsTo = array("CatcherType", "User");
  var $validate = array(
        'name' => array(
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
                'rule' => array("custom", "/^[a-z0-9\- _]*$/i"),
                'required' => true,
                'allowEmpty' => true,
                'message' => 'Username can contain only letters(A-Z), numbers(0-9) and hyphen (-)!'
            ),
        ),
        'speed' => array(
            'empty' => array(
                'rule' => 'numeric',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Please enter a valid number!'
            ),
        ),
        'distance' => array(
            'empty' => array(
                'rule' => 'numeric',
                'required' => true,
                'allowEmpty' => false,
                'on' => 'create',
                'message' => 'Please enter a valid number'
            ),
        ),
        'catcher_type_id' => array(
            'empty' => array(
                'rule' => 'numeric',
                'required' => true,
                'allowEmpty' => false,
                'on' => 'create',
                'message' => 'Please enter a valid catcher type!'
            ),
        ),
        'alert_content' => array(
            'check_alert_content_rule' => array(
                'rule' => 'check_alert_content_requirement',
                'required' => true,
                'message' => 'Please enter some text!'
            ),
        ),
        'iframe_url' => array(
            'iframe_url_rule' => array(
                'rule' => 'check_iframe_url_requirement',
                'required' => true,
                'message' => 'Please enter a valid url!'
            ),
        ),
        'dialogue_width' => array(
            'dialogue_width_rule' => array(
                'rule' => 'check_dialogue_width_requirement',
                'required' => true,
                'message' => 'Please enter a valid number!'
            ),
        ),
        'dialogue_height' => array(
            'dialogue_height_rule' => array(
                'rule' => 'check_dialogue_height_requirement',
                'required' => true,
                'message' => 'Please enter a valid number!'
            ),
        ),
    );

    function check_alert_content_requirement() {
      if ($this->data["ScrollCatcher"]["catcher_type_id"] == 1) {
        return $this->data["ScrollCatcher"]["alert_content"] != NULL;
      }

      return true;
    }

    function check_iframe_url_requirement() {
      if ($this->data["ScrollCatcher"]["catcher_type_id"] == 1) {
        return true;
      } else {
        $pattern = "/^(ht|f)tp(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?$/i";

        return preg_match($pattern, $this->data["ScrollCatcher"]["iframe_url"]);
      }
    }

    function check_dialogue_width_requirement() {
      if ($this->data["ScrollCatcher"]["catcher_type_id"] == 2) {
        return is_numeric($this->data["ScrollCatcher"]["dialogue_width"]);
      }

      return true;
    }

    function check_dialogue_height_requirement() {
      if ($this->data["ScrollCatcher"]["catcher_type_id"] == 2) {
        return is_numeric($this->data["ScrollCatcher"]["dialogue_height"]);
      }

      return true;
    }
}
