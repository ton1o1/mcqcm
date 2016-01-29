<?php

namespace Controller;

use \W\Controller\Controller;
use Cocur\Slugify\Slugify;

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
            
            $slugify = new Slugify();
            $query = $slugify->slugify($_POST['q']);

            $skills = $this->manager->findByTag($query);
            
            if(!$skills){
                if($_POST['source'] == 'creator'){
                    $skills = [['id' => $query, 'tag' => $query], ['id' => 0, 'tag' => 'Aucun résultat. Appuyez sur "Entrer" pour ajouter cette compétence.', 'disabled' => true]];
                }
                else{
                    $skills = [['id' => 0, 'tag' => 'Aucun résultat. Réésayez avec un autre mot clé.', 'disabled' => true]];
                }

            }

            echo json_encode($skills);
        }
        else{
            return;
        }
    }
}