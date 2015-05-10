<?php

namespace Eliastre100\PokeBattleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Eliastre100\PokeBattleBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function registerAction($name, $password, $email)
    {
	$user = new User();
	$user->setName($name);
	$user->setPassword($password);
	$user->setEmail($email);
	$user->setPoints(0);
	$user->setToken(uniqid());

	$em = $this->getDoctrine()->getManager();
    	$em->persist($user);

	$userExist = $em->getRepository('Eliastre100PokeBattleBundle:User')->findOneBy(array('name' => $name));
    	if(empty($userExist))
	{
	    $em->flush();
	    return new Response('Registered');
	}
	else
	{
	    return new Response('Fail');
	}
    }

    public function loginAction($name, $password)
    {
	$em = $this->getDoctrine()->getManager();
	$repository = $em->getRepository('Eliastre100PokeBattleBundle:User');

	$user = $repository->findOneBy(array('name' => $name, "password" => $password));
	if(!empty($user))
	{
	    $user->setToken(uniqid());
	    $em->flush();
	    return new Response($user->getToken());
	}
	else
	{
	    return new Response("fail");
	}
    }
}
