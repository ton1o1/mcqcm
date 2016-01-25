<?php

namespace Service;

class AlertManager
{
    public function add($params = array())
    {
        $defaults = array(
            'type' => 'info',
            'content' => null,
        );
        $params = array_merge($defaults, $params);

        // Check type
        $typesAvailable = ['info', 'success', 'warning', 'danger'];
        if(!in_array($params['type'], $typesAvailable)){
            return false;
        }

        // Check content
        if(empty($params['content'])){
            return false;
        }

        // Create new alert in session
        $_SESSION['alerts'][] = ['type' => $params['type'], 'content' => $params['content']];
    }

    public function clear($alerts){

        unset($_SESSION['alerts']);

    }

    public function get($type){

        $html ='';

        // Check type
        $typesAvailable = ['info', 'success', 'warning', 'danger'];
        if(!in_array($type, $typesAvailable)){
            return $html;
        }

        if(!empty($_SESSION['alerts'])){
            foreach($_SESSION['alerts'] as $key => $value) {
                if($value['type'] == $type){
                    $html .= $value;
                    $this->clear($_SESSION['alerts'][$key]);
                }
            }
        }

        return $html;
    }

    public function getAll(){

        $html ='';

        if(!empty($_SESSION['alerts'])){
            foreach($_SESSION['alerts'] as $key => $value) {
                $html .= '<div class="alert alert-' . $value['type'] . '" role="alert">' . $value['content'] . '</div>';
            }
        }

        // Clear all alerts
        $this->clear($_SESSION['alerts']);

        return $html;
    }
}