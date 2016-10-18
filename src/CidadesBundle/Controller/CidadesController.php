<?php

namespace CidadesBundle\Controller;

use CidadesBundle\Entity\Cidades;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cidade controller.
 *
 * @Route("cidades")
 */
class CidadesController extends Controller
{
    /**
     * Lists all cidade entities.
     *
     * @Route("/", name="cidades_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cidades = $em->getRepository('CidadesBundle:Cidades')->findAll();

        return $this->render('cidades/index.html.twig', array(
            'cidades' => $cidades,
        ));
    }

    /**
     * Creates a new cidade entity.
     *
     * @Route("/new", name="cidades_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cidade = new Cidades();
        $form = $this->createForm('CidadesBundle\Form\CidadesType', $cidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cidade);
            $em->flush($cidade);

            return $this->redirectToRoute('cidades_show', array('id' => $cidade->getId()));
        }

        return $this->render('cidades/new.html.twig', array(
            'cidade' => $cidade,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cidade entity.
     *
     * @Route("/{id}", name="cidades_show")
     * @Method("GET")
     */
    public function showAction(Cidades $cidade)
    {
        $deleteForm = $this->createDeleteForm($cidade);

        return $this->render('cidades/show.html.twig', array(
            'cidade' => $cidade,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cidade entity.
     *
     * @Route("/{id}/edit", name="cidades_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cidades $cidade)
    {
        $deleteForm = $this->createDeleteForm($cidade);
        $editForm = $this->createForm('CidadesBundle\Form\CidadesType', $cidade);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cidades_edit', array('id' => $cidade->getId()));
        }

        return $this->render('cidades/edit.html.twig', array(
            'cidade' => $cidade,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cidade entity.
     *
     * @Route("/{id}", name="cidades_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cidades $cidade)
    {
        $form = $this->createDeleteForm($cidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cidade);
            $em->flush($cidade);
        }

        return $this->redirectToRoute('cidades_index');
    }

    /**
     * Creates a form to delete a cidade entity.
     *
     * @param Cidades $cidade The cidade entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cidades $cidade)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cidades_delete', array('id' => $cidade->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
