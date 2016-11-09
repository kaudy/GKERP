<?php

namespace MateriaisBundle\Controller;

use MateriaisBundle\Entity\TiposUnidades;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tiposunidade controller.
 *
 * @Route("tiposunidades")
 */
class TiposUnidadesController extends Controller
{
    /**
     * Lists all tiposUnidades entities.
     *
     * @Route("/", name="tiposunidades_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tiposUnidades = $em->getRepository('MateriaisBundle:TiposUnidades')->findAll();

        return $this->render('MateriaisBundle:TiposUnidades:index.html.twig', array(
            'tiposUnidades' => $tiposUnidades,
        ));
    }

    /**
     * Creates a new tiposUnidade entity.
     *
     * @Route("/new", name="tiposunidades_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoUnidade = new TiposUnidades();
        $form = $this->createForm('MateriaisBundle\Form\TiposUnidadesType', $tipoUnidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {            
            //Usuario Logado
            $tipoUnidade->setUsuarioCadastro($this->getUser()); 
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            
            $tipoUnidade->setDataCadastro($dataAtual);
            
            //Persiste o material na base de dados
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoUnidade);
            $em->flush($tipoUnidade);

            return $this->redirectToRoute('tiposunidades_show', array('id' => $tipoUnidade->getId()));
        }

        return $this->render('MateriaisBundle:TiposUnidades:new.html.twig', array(
            'tiposUnidade' => $tipoUnidade,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tiposUnidade entity.
     *
     * @Route("/{id}", name="tiposunidades_show")
     * @Method("GET")
     */
    public function showAction(TiposUnidades $tipoUnidade)
    {
        $deleteForm = $this->createDeleteForm($tipoUnidade);

        return $this->render('MateriaisBundle:TiposUnidades:show.html.twig', array(
            'tipoUnidade' => $tipoUnidade,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tiposUnidade entity.
     *
     * @Route("/{id}/edit", name="tiposunidades_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TiposUnidades $tipoUnidade)
    {
        $deleteForm = $this->createDeleteForm($tipoUnidade);
        $editForm = $this->createForm('MateriaisBundle\Form\TiposUnidadesType', $tipoUnidade);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tiposunidades_show', array('id' => $tipoUnidade->getId()));
        }

        return $this->render('MateriaisBundle:TiposUnidades:edit.html.twig', array(
            'tipoUnidade' => $tipoUnidade,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tiposUnidade entity.
     *
     * @Route("/{id}", name="tiposunidades_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TiposUnidades $tipoUnidade)
    {
        $form = $this->createDeleteForm($tipoUnidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoUnidade);
            $em->flush($tipoUnidade);
        }

        return $this->redirectToRoute('tiposunidades_index');
    }

    /**
     * Creates a form to delete a tiposUnidade entity.
     *
     * @param TiposUnidades $tipoUnidade The tiposUnidade entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TiposUnidades $tipoUnidade)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tiposunidades_delete', array('id' => $tipoUnidade->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
