<?php

namespace FabricantesBundle\Controller;

use FabricantesBundle\Entity\Fabricantes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fabricantes controller.
 *
 * @Route("fabricantes")
 */
class FabricantesController extends Controller
{

    /**
     * Lists all fabricantes entities.
     *
     * @Route("/", name="fabricantes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fabricantes = $em->getRepository('FabricantesBundle:Fabricantes')->findAll();

        return $this->render('FabricantesBundle:Fabricantes:index.html.twig', array(
                    'fabricantes' => $fabricantes,
        ));
    }

    /**
     * Creates a new fabricante entity.
     *
     * @Route("/new", name="fabricantes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fabricante = new Fabricantes();
        $form = $this->createForm('FabricantesBundle\Form\FabricantesType', $fabricante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            //Usuario Logado
            $fabricante->setUsuarioCadastro($this->getUser()); 
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $fabricante->setDataCadastro($dataAtual);
            
            //Persiste o fabricante na base de dados
            $em = $this->getDoctrine()->getManager();
            $em->persist($fabricante);
            $em->flush($fabricante);

            return $this->redirectToRoute('fabricantes_show', array('id' => $fabricante->getId()));
        }

        return $this->render('FabricantesBundle:Fabricantes:new.html.twig', array(
                    'fabricante' => $fabricante,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fabricante entity.
     *
     * @Route("/{id}", name="fabricantes_show")
     * @Method("GET")
     */
    public function showAction(Fabricantes $fabricante)
    {
        $deleteForm = $this->createDeleteForm($fabricante);

        //Procura todas as marcas do fornecedor
        $em = $this->getDoctrine()->getManager();
        $marcas = $em->getRepository('FabricantesBundle:Marcas')
                ->findBy(array('fabricante' => $fabricante));

        return $this->render('FabricantesBundle:Fabricantes:show.html.twig', array(
                    'fabricante' => $fabricante,
                    'marcas' => $marcas,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fabricante entity.
     *
     * @Route("/{id}/edit", name="fabricantes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Fabricantes $fabricante)
    {
        $deleteForm = $this->createDeleteForm($fabricante);
        $editForm = $this->createForm('FabricantesBundle\Form\FabricantesType', $fabricante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fabricantes_show', array('id' => $fabricante->getId()));
        }

        return $this->render('FabricantesBundle:Fabricantes:edit.html.twig', array(
                    'fabricante' => $fabricante,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fabricante entity.
     *
     * @Route("/{id}", name="fabricantes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Fabricantes $fabricante)
    {
        $form = $this->createDeleteForm($fabricante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fabricante);
            $em->flush($fabricante);
        }

        return $this->redirectToRoute('fabricantes_index');
    }

    /**
     * Creates a form to delete a fabricante entity.
     *
     * @param Fabricantes $fabricante The fabricante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Fabricantes $fabricante)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('fabricantes_delete', array('id' => $fabricante->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
