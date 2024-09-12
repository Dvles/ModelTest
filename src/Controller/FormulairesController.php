<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormulairesController extends AbstractController
{
    #[Route('/formulaires', name: 'app_formulaire')]
    public function index(): Response
    {
        return $this->render('formulaires/index.html.twig', [
            'controller_name' => 'UserFormulaireController',
        ]);
    }

    #[Route('/formulaires/user', name: 'app_user_form')]
    public function userSignUp(Request $req, ManagerRegistry $doctrine): Response 
    {

        $user = new User();
        $form=$this->createForm(UserType::class, $user);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()){

            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            dd($user);

        }

        $vars=['formulaireUser'=>$form];
        return $this->render('formulaires/user.html.twig', $vars);
    }
}
