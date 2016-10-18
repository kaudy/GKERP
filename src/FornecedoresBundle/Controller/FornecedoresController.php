<?php

namespace FornecedoresBundle\Controller;

use FornecedoresBundle\Entity\Fornecedores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fornecedore controller.
 *
 * @Route("fornecedores")
 */
class FornecedoresController extends Controller
{
    /**
     * Lists all fornecedore entities.
     *
     * @Route("/", name="fornecedores_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fornecedores = $em->getRepository('FornecedoresBundle:Fornecedores')->findAll();

        return $this->render('fornecedores/index.html.twig', array(
            'fornecedores' => $fornecedores,
        ));
    }

    /**
     * Creates a new fornecedore entity.
     *
     * @Route("/new", name="fornecedores_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fornecedor = new Fornecedores();
        $form = $this->createForm('FornecedoresBundle\Form\FornecedoresType', $fornecedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            
            //Seta Como ativo todos os fornecedores cadastrados            
            $fornecedor->setAtivo('S');
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($fornecedor);
            $em->flush($fornecedor);

            return $this->redirectToRoute('fornecedores_show', array('id' => $fornecedor->getId()));
        }

        return $this->render('fornecedores/new.html.twig', array(
            'fornecedor' => $fornecedor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fornecedore entity.
     *
     * @Route("/{id}", name="fornecedores_show")
     * @Method("GET")
     */
    public function showAction(Fornecedores $fornecedore)
    {
        $deleteForm = $this->createDeleteForm($fornecedore);

        return $this->render('fornecedores/show.html.twig', array(
            'fornecedore' => $fornecedore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fornecedore entity.
     *
     * @Route("/{id}/edit", name="fornecedores_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Fornecedores $fornecedore)
    {
        $deleteForm = $this->createDeleteForm($fornecedore);
        $editForm = $this->createForm('FornecedoresBundle\Form\FornecedoresType', $fornecedore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fornecedores_edit', array('id' => $fornecedore->getId()));
        }

        return $this->render('fornecedores/edit.html.twig', array(
            'fornecedore' => $fornecedore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fornecedore entity.
     *
     * @Route("/{id}", name="fornecedores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Fornecedores $fornecedore)
    {
        $form = $this->createDeleteForm($fornecedore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fornecedore);
            $em->flush($fornecedore);
        }

        return $this->redirectToRoute('fornecedores_index');
    }

    /**
     * Creates a form to delete a fornecedore entity.
     *
     * @param Fornecedores $fornecedore The fornecedore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Fornecedores $fornecedore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fornecedores_delete', array('id' => $fornecedore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
