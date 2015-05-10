<?php

namespace Eliastre100\PokeBattleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Eliastre100PokeBattleBundle:Default:index.html.twig', array('name' => $name));
    }
}
