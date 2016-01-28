<?php

namespace Controller;

use \W\Controller\Controller;

class SkillController extends Controller
{
    private $alerts;
    private $manager;

    public function __construct()
    {
        $this->alerts = new \Service\Alerts();
        $this->manager = new \Manager\SkillManager();
    }

    /**
     * Search skills by tag and return result in JSON
     */
    public function search()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['q'])){
            
            $skills = $this->manager->findByTag($_POST['q']);
            
            if(!$skills){
                $skills = [['id' => 0, 'tag' => 'Aucun résultat.', 'disabled' => true]];
            }

            echo json_encode($skills);
        }
        else{
            return;
        }
    }
}