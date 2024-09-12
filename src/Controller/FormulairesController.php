<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\ObjectTool;
use App\Form\ObjectToolType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
            return $this->redirectToRoute('app_user_summary', [
                'id' => $user->getId()
            ]);

        }

        $vars=['formulaireUser'=>$form];
        return $this->render('formulaires/user.html.twig', $vars);
    }

    #[Route('/formulaires/user/summary/{id}', name: 'app_user_summary')]
    public function userSummary(User $user): Response
    {
        return $this->render('formulaires/user_summary.html.twig', [
            'user' => $user
        ]);
    }


    #[Route('/formulaires/object', name: 'app_object_form')]
    public function objectAdd(Request $req, ManagerRegistry $doctrine):Response{

        $objectTool = new ObjectTool([]);
        $form = $this->createForm(ObjectToolType::class, $objectTool);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()){
            
            $em = $doctrine->getManager();
            $em->persist($objectTool);
            $em->flush();
            dd($objectTool);
            return $this->render('formulaires/object.tool.html.twig', $vars);
        }

        $vars=['formulaireObjectTool'=>$form];
        return $this->render('formulaires/object.tool.html.twig', $vars);

        
    }

}
