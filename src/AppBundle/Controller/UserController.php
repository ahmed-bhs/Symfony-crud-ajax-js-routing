<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        $form = $this->createForm(UserType::class);

        return $this->render('index.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user/new", name="new_user", options={"expose"=true})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function newPersonAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'Use only ajax please!'), 400);
        }

        $form = $this->createForm(UserType::class, $user = new User());
        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new JsonResponse(array('message' => 'Success!'), 200);
        }
        $response = new JsonResponse(
            array(
                'message' => 'Error',
                'form' => $this->renderView('user/newUser.html.twig',
                    array(
                        'form' => $form->createView(),
                    ))), 400);

        return $response;
    }

    /**
     * @Route("/user/{id}/delete/", name="delete_user", options={"expose"=true})
     * @param User $id
     * @return Response
     */
    public function deleteUserAction(User $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();

        return new Response();
    }
}