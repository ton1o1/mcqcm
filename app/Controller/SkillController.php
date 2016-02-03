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
        if(!empty($_POST['q'])){
            
            $slugify = new Slugify();

            $query = $slugify->slugify($_POST['q']);
            $page = 1;

            if(!empty($_POST['page'])){
            
                $pageInt = (int) $_POST['page'];

                if($pageInt > 1){
                    $page = $pageInt;
                }
            }

            $total = $this->manager->totalByTag($query);
            $skills = $this->manager->findByTag($query, $page);
            $exactTag = $this->manager->findExactTag($query);
            
            if(!$skills){
                if($_POST['source'] == 'creator'){
                    $skills = [['id' => $query, 'tag' => $query], ['id' => 0, 'tag' => 'Aucun résultat. Appuyez sur "Entrer" pour créer ce tag.', 'disabled' => true]];
                }
                else{
                    $skills = [['id' => 0, 'tag' => 'Aucun résultat. Réésayez avec un autre mot clé.', 'disabled' => true]];
                }
            }
            else{
                if($_POST['source'] == 'creator' && !$exactTag){
                    $skills[] = ['id' => $query, 'tag' => $query, 'new' => true];
                }
            }

            $result = [];

            foreach($skills as $skill){
                $result[] = ['id' => $skill['id'].'|'.$skill['tag'], 'tag' => $skill['tag']];
            }

            $result = ['results' => $result, 'total' => $total['COUNT(*)']];

            echo json_encode($result);
        }
        else{
            return;
        }
    }
}