<?php

namespace App\Controller;

use App\Entity\EtatCivil;
use App\Form\EtatCivilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/etat/civil")
 */
class EtatCivilController extends AbstractController
{
    /**
     * @Route("/", name="etat_civil_index", methods={"GET"})
     */
    public function index(): Response
    {
        $etatCivils = $this->getDoctrine()
            ->getRepository(EtatCivil::class)
            ->findAll();

        return $this->render('etat_civil/index.html.twig', [
            'etat_civils' => $etatCivils,
        ]);
    }

    /**
     * @Route("/new", name="etat_civil_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $etatCivil = new EtatCivil();
        $form = $this->createForm(EtatCivilType::class, $etatCivil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etatCivil);
            $entityManager->flush();

            return $this->redirectToRoute('etat_civil_index');
        }

        return $this->render('etat_civil/new.html.twig', [
            'etat_civil' => $etatCivil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="etat_civil_show", methods={"GET"})
     */
    public function show(EtatCivil $etatCivil): Response
    {
        return $this->render('etat_civil/show.html.twig', [
            'etat_civil' => $etatCivil,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="etat_civil_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EtatCivil $etatCivil): Response
    {
        $form = $this->createForm(EtatCivilType::class, $etatCivil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etat_civil_index');
        }

        return $this->render('etat_civil/edit.html.twig', [
            'etat_civil' => $etatCivil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="etat_civil_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EtatCivil $etatCivil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatCivil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($etatCivil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('etat_civil_index');
    }
}
