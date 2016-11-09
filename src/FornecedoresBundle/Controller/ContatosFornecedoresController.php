<?php

namespace FornecedoresBundle\Controller;

use FornecedoresBundle\Entity\ContatosFornecedores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contatosfornecedore controller.
 *
 * @Route("contatosfornecedores")
 */
class ContatosFornecedoresController extends Controller
{
    /**
     * Lists all contatosFornecedores entities.
     *
     * @Route("/", name="contatosfornecedores_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contatosFornecedores = $em->getRepository('FornecedoresBundle:ContatosFornecedores')->findAll();

        return $this->render('FornecedoresBundle:ContatosFornecedores:index.html.twig', array(
            'contatosFornecedores' => $contatosFornecedores,
        ));
    }

    /**
     * Creates a new contatosFornecedore entity.
     *
     * @Route("/new", name="contatosfornecedores_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contatoFornecedor = new Contatosfornecedores();
        $form = $this->createForm('FornecedoresBundle\Form\ContatosFornecedoresType', $contatoFornecedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
            {
            //usuario fixo - modificar quando implantar controle de usuarios
            $contatoFornecedor->setUsuarioCadastro(1);
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $contatoFornecedor->setDataCadastro($dataAtual);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($contatoFornecedor);
            $em->flush($contatoFornecedor);

            return $this->redirectToRoute('fornecedores_show', array('id' => $contatosFornecedor->getFornecedor()->getId()));
        }

        return $this->render('FornecedoresBundle:ContatosFornecedores:new.html.twig', array(
            'contatoFornecedor' => $contatoFornecedor,
            'form' => $form->createView(),
            'origem' => 'newAction',
        ));
    }

    /**
     * Finds and displays a contatosFornecedore entity.
     *
     * @Route("/{id}", name="contatosfornecedores_show")
     * @Method("GET")
     */
    public function showAction(ContatosFornecedores $contatosFornecedore)
    {
        $deleteForm = $this->createDeleteForm($contatosFornecedore);

        return $this->render('FornecedoresBundle:ContatosFornecedores:show.html.twig', array(
            'contatosFornecedore' => $contatosFornecedore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contatosFornecedore entity.
     *
     * @Route("/{id}/edit", name="contatosfornecedores_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContatosFornecedores $contatosFornecedor)
    {
        $deleteForm = $this->createDeleteForm($contatosFornecedor);
        $editForm = $this->createForm('FornecedoresBundle\Form\ContatosFornecedoresType', $contatosFornecedor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fornecedores_show', array('id' => $contatosFornecedor->getFornecedor()->getId()));
        }

        return $this->render('FornecedoresBundle:ContatosFornecedores:edit.html.twig', array(
            'contatosFornecedor' => $contatosFornecedor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contatosFornecedore entity.
     *
     * @Route("/{id}", name="contatosfornecedores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContatosFornecedores $contatosFornecedore)
    {
        $form = $this->createDeleteForm($contatosFornecedore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contatosFornecedore);
            $em->flush($contatosFornecedore);
        }

        return $this->redirectToRoute('contatosfornecedores_index');
    }

    /**
     * Creates a form to delete a contatosFornecedore entity.
     *
     * @param ContatosFornecedores $contatosFornecedore The contatosFornecedore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContatosFornecedores $contatosFornecedore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contatosfornecedores_delete', array('id' => $contatosFornecedore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
     /**
     * Cria um novo contatos para fornecedor que foi passado por parametro
     *
     * @Route("/{id}/new", name="contatosfornecedores_new_with_fornecedor")
     * @Method({"GET", "POST"})
     */
    public function newWithFornecedorAction(Request $request, \FornecedoresBundle\Entity\Fornecedores $fornecedor)
    {
        $contatoFornecedor = new Contatosfornecedores();
        $contatoFornecedor->setFornecedor($fornecedor);
        $form = $this->createForm('FornecedoresBundle\Form\ContatosFornecedoresType', $contatoFornecedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            //usuario fixo - modificar quando implantar controle de usuarios
            $contatoFornecedor->setUsuarioCadastro(1);
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $contatoFornecedor->setDataCadastro($dataAtual);                    
                    
            $em = $this->getDoctrine()->getManager();
            $em->persist($contatoFornecedor);
            $em->flush($contatoFornecedor);

            return $this->redirectToRoute('fornecedores_show', array('id' => $contatosFornecedor->getFornecedor()->getId()));
        }

        return $this->render('FornecedoresBundle:ContatosFornecedores:new.html.twig', array(
            'contatoFornecedor' => $contatoFornecedor,
            'form' => $form->createView(),
            'origem' => 'newWithFornecedorAction',
        ));
    }
    
    
    
    
    
    
    
    
    
    
}
