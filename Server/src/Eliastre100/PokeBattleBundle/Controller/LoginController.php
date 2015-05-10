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
    	if($em->flush())
	{
		return new Response('Registered');
	}
	else
	{
		return new Response('Fail');
	}
    }
}
