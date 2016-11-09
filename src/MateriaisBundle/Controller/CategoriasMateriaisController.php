<?php

namespace MateriaisBundle\Controller;

use MateriaisBundle\Entity\CategoriasMateriais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Categoriasmateriais controller.
 *
 * @Route("categoriasmateriais")
 */
class CategoriasMateriaisController extends Controller
{
    /**
     * Lists all categoriasMateriais entities.
     *
     * @Route("/", name="categoriasmateriais_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriasMateriais = $em->getRepository('MateriaisBundle:CategoriasMateriais')->findAll();

        return $this->render('MateriaisBundle:CategoriasMateriais:index.html.twig', array(
            'categoriasMateriais' => $categoriasMateriais,
        ));
    }

    /**
     * Creates a new categoriasMateriais entity.
     *
     * @Route("/new", name="categoriasmateriais_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categoriaMaterial = new Categoriasmateriais();
        $form = $this->createForm('MateriaisBundle\Form\CategoriasMateriaisType', $categoriaMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            //Usuario Logado
            $categoriaMaterial->setUsuarioCadastro($this->getUser()); 
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $categoriaMaterial->setDataCadastro($dataAtual);
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoriaMaterial);
            $em->flush($categoriaMaterial);

            return $this->redirectToRoute('categoriasmateriais_show', array('id' => $categoriaMaterial->getId()));
        }

        return $this->render('MateriaisBundle:CategoriasMateriais:new.html.twig', array(
            'categoriaMaterial' => $categoriaMaterial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categoriasMateriai entity.
     *
     * @Route("/{id}", name="categoriasmateriais_show")
     * @Method("GET")
     */
    public function showAction(CategoriasMateriais $categoriaMaterial)
    {
        $deleteForm = $this->createDeleteForm($categoriaMaterial);

        return $this->render('MateriaisBundle:CategoriasMateriais:show.html.twig', array(
            'categoriaMaterial' => $categoriaMaterial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categoriasMateriai entity.
     *
     * @Route("/{id}/edit", name="categoriasmateriais_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CategoriasMateriais $categoriaMaterial)
    {
        $deleteForm = $this->createDeleteForm($categoriaMaterial);
        $editForm = $this->createForm('MateriaisBundle\Form\CategoriasMateriaisType', $categoriaMaterial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoriasmateriais_show', array('id' => $categoriaMaterial->getId()));
        }

        return $this->render('MateriaisBundle:CategoriasMateriais:edit.html.twig', array(
            'categoriaMaterial' => $categoriaMaterial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categoriasMateriai entity.
     *
     * @Route("/{id}", name="categoriasmateriais_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CategoriasMateriais $categoriaMaterial)
    {
        $form = $this->createDeleteForm($categoriaMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categoriaMaterial);
            $em->flush($categoriaMaterial);
        }

        return $this->redirectToRoute('categoriasmateriais_index');
    }

    /**
     * Creates a form to delete a categoriasMateriai entity.
     *
     * @param CategoriasMateriais $categoriaMaterial The categoriasMateriai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategoriasMateriais $categoriaMaterial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoriasmateriais_delete', array('id' => $categoriaMaterial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
