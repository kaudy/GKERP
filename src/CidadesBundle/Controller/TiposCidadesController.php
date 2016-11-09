<?php

namespace CidadesBundle\Controller;

use CidadesBundle\Entity\TiposCidades;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tiposcidade controller.
 *
 * @Route("tiposcidades")
 */
class TiposCidadesController extends Controller
{
    /**
     * Lists all tiposCidade entities.
     *
     * @Route("/", name="tiposcidades_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tiposCidades = $em->getRepository('CidadesBundle:TiposCidades')->findAll();

        return $this->render('CidadesBundle:TiposCidades:index.html.twig', array(
            'tiposCidades' => $tiposCidades,
        ));
    }

    /**
     * Creates a new tiposCidade entity.
     *
     * @Route("/new", name="tiposcidades_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tiposCidade = new Tiposcidades();
        $form = $this->createForm('CidadesBundle\Form\TiposCidadesType', $tiposCidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tiposCidade);
            $em->flush($tiposCidade);

            return $this->redirectToRoute('tiposcidades_index');
        }

        return $this->render('CidadesBundle:TiposCidades:new.html.twig', array(
            'tiposCidade' => $tiposCidade,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tiposCidade entity.
     *
     * @Route("/{id}", name="tiposcidades_show")
     * @Method("GET")
     */
    public function showAction(TiposCidades $tiposCidade)
    {
        $deleteForm = $this->createDeleteForm($tiposCidade);

        return $this->render('CidadesBundle:TiposCidades:show.html.twig', array(
            'tiposCidade' => $tiposCidade,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tiposCidade entity.
     *
     * @Route("/{id}/edit", name="tiposcidades_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TiposCidades $tiposCidade)
    {
        $deleteForm = $this->createDeleteForm($tiposCidade);
        $editForm = $this->createForm('CidadesBundle\Form\TiposCidadesType', $tiposCidade);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tiposcidades_index');
        }

        return $this->render('CidadesBundle:TiposCidades:edit.html.twig', array(
            'tiposCidade' => $tiposCidade,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tiposCidade entity.
     *
     * @Route("/{id}", name="tiposcidades_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TiposCidades $tiposCidade)
    {
        $form = $this->createDeleteForm($tiposCidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tiposCidade);
            $em->flush($tiposCidade);
        }

        return $this->redirectToRoute('tiposcidades_index');
    }

    /**
     * Creates a form to delete a tiposCidade entity.
     *
     * @param TiposCidades $tiposCidade The tiposCidade entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TiposCidades $tiposCidade)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tiposcidades_delete', array('id' => $tiposCidade->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
