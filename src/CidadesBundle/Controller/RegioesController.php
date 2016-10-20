<?php

namespace CidadesBundle\Controller;

use CidadesBundle\Entity\Regioes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Regio controller.
 *
 * @Route("regioes")
 */
class RegioesController extends Controller
{

    /**
     * Lists all regioes entities.
     *
     * @Route("/", name="regioes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $regioes = $em->getRepository('CidadesBundle:Regioes')->findAll();

        return $this->render('regioes/index.html.twig', array(
                    'regioes' => $regioes,
        ));
    }

    /**
     * Creates a new regiao entity.
     *
     * @Route("/new", name="regioes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $regioes = new Regioes();
        $form = $this->createForm('CidadesBundle\Form\RegioesType', $regioes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($regioes);
            $em->flush($regioes);

            return $this->redirectToRoute('regioes_index');
        }

        return $this->render('regioes/new.html.twig', array(
                    'regioes' => $regioes,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a regiao entity.
     *
     * @Route("/{id}", name="regioes_show")
     * @Method("GET")
     */
    public function showAction(Regioes $regiao)
    {
        $deleteForm = $this->createDeleteForm($regiao);

        return $this->render('regioes/show.html.twig', array(
                    'regiao' => $regiao,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing regio entity.
     *
     * @Route("/{id}/edit", name="regioes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Regioes $regioes)
    {
        $deleteForm = $this->createDeleteForm($regioes);
        $editForm = $this->createForm('CidadesBundle\Form\RegioesType', $regioes);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('regioes_index');
        }

        return $this->render('regioes/edit.html.twig', array(
                    'regioes' => $regioes,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a regio entity.
     *
     * @Route("/{id}", name="regioes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Regioes $regio)
    {
        $form = $this->createDeleteForm($regio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($regio);
            $em->flush($regio);
        }

        return $this->redirectToRoute('regioes_index');
    }

    /**
     * Creates a form to delete a regio entity.
     *
     * @param Regioes $regio The regio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Regioes $regio)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('regioes_delete', array('id' => $regio->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
