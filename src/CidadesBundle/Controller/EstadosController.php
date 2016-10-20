<?php

namespace CidadesBundle\Controller;

use CidadesBundle\Entity\Estados;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Estado controller.
 *
 * @Route("estados")
 */
class EstadosController extends Controller
{
    /**
     * Lists all estado entities.
     *
     * @Route("/", name="estados_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estados = $em->getRepository('CidadesBundle:Estados')->findAll();

        return $this->render('estados/index.html.twig', array(
            'estados' => $estados,
        ));
    }

    /**
     * Creates a new estado entity.
     *
     * @Route("/new", name="estados_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $estado = new Estados();
        $form = $this->createForm('CidadesBundle\Form\EstadosType', $estado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estado);
            $em->flush($estado);

            return $this->redirectToRoute('estados_index');
        }

        return $this->render('estados/new.html.twig', array(
            'estado' => $estado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estado entity.
     *
     * @Route("/{id}", name="estados_show")
     * @Method("GET")
     */
    public function showAction(Estados $estado)
    {
        $deleteForm = $this->createDeleteForm($estado);

        return $this->render('estados/show.html.twig', array(
            'estado' => $estado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estado entity.
     *
     * @Route("/{id}/edit", name="estados_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Estados $estado)
    {
        $deleteForm = $this->createDeleteForm($estado);
        $editForm = $this->createForm('CidadesBundle\Form\EstadosType', $estado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estados_index');
        }

        return $this->render('estados/edit.html.twig', array(
            'estado' => $estado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estado entity.
     *
     * @Route("/{id}", name="estados_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Estados $estado)
    {
        $form = $this->createDeleteForm($estado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estado);
            $em->flush($estado);
        }

        return $this->redirectToRoute('estados_index');
    }

    /**
     * Creates a form to delete a estado entity.
     *
     * @param Estados $estado The estado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estados $estado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estados_delete', array('id' => $estado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
