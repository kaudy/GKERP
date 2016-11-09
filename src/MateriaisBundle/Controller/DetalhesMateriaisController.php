<?php

namespace MateriaisBundle\Controller;

use MateriaisBundle\Entity\DetalhesMateriais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Detalhesmateriais controller.
 *
 * @Route("detalhesmateriais")
 */
class DetalhesMateriaisController extends Controller
{
    /**
     * Lists all detalhesMateriais entities.
     *
     * @Route("/", name="detalhesmateriais_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalhesMateriais = $em->getRepository('MateriaisBundle:DetalhesMateriais')->findAll();

        return $this->render('MateriaisBundle:DetalhesMateriais:index.html.twig', array(
            'detalhesMateriais' => $detalhesMateriais,
        ));
    }

    /**
     * Creates a new detalhesMateriais entity.
     *
     * @Route("/new", name="detalhesmateriais_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalheMaterial = new Detalhesmateriais();
        $form = $this->createForm('MateriaisBundle\Form\DetalhesMateriaisType', $detalheMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
             //Usuario Logado
            $detalheMaterial->setUsuarioCadastro($this->getUser()); 
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $detalheMaterial->setDataCadastro($dataAtual); 
            
            //Persiste o material na base de dados
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalheMaterial);
            $em->flush($detalheMaterial);

            return $this->redirectToRoute('detalhesmateriais_show', array('id' => $detalheMaterial->getId()));
        }

        return $this->render('MateriaisBundle:DetalhesMateriais:new.html.twig', array(
            'detalheMaterial' => $detalheMaterial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalhesMateriai entity.
     *
     * @Route("/{id}", name="detalhesmateriais_show")
     * @Method("GET")
     */
    public function showAction(DetalhesMateriais $detalheMaterial)
    {
        $deleteForm = $this->createDeleteForm($detalheMaterial);

        return $this->render('MateriaisBundle:DetalhesMateriais:show.html.twig', array(
            'detalheMaterial' => $detalheMaterial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalhesMateriai entity.
     *
     * @Route("/{id}/edit", name="detalhesmateriais_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetalhesMateriais $detalheMaterial)
    {
        $deleteForm = $this->createDeleteForm($detalheMaterial);
        $editForm = $this->createForm('MateriaisBundle\Form\DetalhesMateriaisType', $detalheMaterial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detalhesmateriais_show', array('id' => $detalheMaterial->getId()));
        }

        return $this->render('MateriaisBundle:DetalhesMateriais:edit.html.twig', array(
            'detalheMaterial' => $detalheMaterial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalhesMateriai entity.
     *
     * @Route("/{id}", name="detalhesmateriais_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetalhesMateriais $detalheMaterial)
    {
        $form = $this->createDeleteForm($detalheMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalheMaterial);
            $em->flush($detalheMaterial);
        }

        return $this->redirectToRoute('detalhesmateriais_index');
    }

    /**
     * Creates a form to delete a detalhesMateriai entity.
     *
     * @param DetalhesMateriais $detalheMaterial The detalhesMateriai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetalhesMateriais $detalheMaterial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detalhesmateriais_delete', array('id' => $detalheMaterial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
