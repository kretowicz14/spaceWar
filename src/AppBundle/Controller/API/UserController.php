<?php

/**
 * Created by PhpStorm.
 * User: artur
 * Date: 22.01.17
 * Time: 17:51
 */

namespace AppBundle\Controller\API;


use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Util\TokenGenerator;

class UserController extends Controller
{

    /**
     * @Route("/api/register")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function newUserAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        if (!$this->get('fos_user.user_manager')->findUserByUsernameOrEmail($data['email']) || !$this->get('fos_user.user_manager')->findUserByUsernameOrEmail($data['username'])) {
            $user = new User();
            $user->setUsername($data['username']);
            $user->setPlainPassword($data['password']);
            $user->setEmail($data['email']);
            $user->setName($data['name']);
            $user->setSurname($data['surname']);
            $user->setEnabled(false);
            $user->setRoles(["ROLE_USER"]);
            $token = new TokenGenerator();
            $user->setConfirmationToken($token->generateToken());

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        } else {

        }


        return new JsonResponse(array('message' => ''));
    }
}