<?php

namespace Eliastre100\PokeBattleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Eliastre100\PokeBattleBundle\Entity\User;
use Eliastre100\PokeBattleBundle\Entity\Party;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LobbyController extends Controller
{
    public function browseAction($token)
    {
	$em = $this->getDoctrine()->getManager();
	$repository = $em->getRepository('Eliastre100PokeBattleBundle:User');

	$user = $repository->findOneBy(array('token' => $token));
	if(!empty($user))
	{
	    $repository = $em->getRepository('Eliastre100PokeBattleBundle:Party');
	    $parties_sql = $repository->findAll();

	    foreach($parties_sql as $v){
		$parties[] = array(
			"Name" => $v->getName(),
			"Owner" => $v->getOwner()->getName(),
			"Number" => $v->getNumber(),
			"Level" => $v->getLevel());
	    }
	    return new JsonResponse($parties);
	}
	else
	{
	    return new JsonResponse(array());
	}
    }

    public function hostAction($token, $name)
    {
	$em = $this->getDoctrine()->getManager();
	$repository = $em->getRepository('Eliastre100PokeBattleBundle:User');

	$user = $repository->findOneBy(array('token' => $token));
	if(!empty($user))
	{
	    $party = new Party();
	    $party->setName($name);
	    $party->setOwner($user);
	    $party->setNumber(0);
	    $party->setLevel(0);
	    $party->setPresent(new \DateTime());
	
    	    $em->persist($party);
	    $em->flush();

	    return new Response("Created");
	}
	else
	{
	    return new Response("Fail");
	}
    }
}
