<?php

namespace FabricantesBundle\Controller;

use FabricantesBundle\Entity\Marcas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Marca controller.
 *
 * @Route("marcas")
 */
class MarcasController extends Controller
{
    /**
     * Lists all marca entities.
     *
     * @Route("/", name="marcas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $marcas = $em->getRepository('FabricantesBundle:Marcas')->findAll();

        return $this->render('FabricantesBundle:Marcas:index.html.twig', array(
            'marcas' => $marcas,
        ));
    }

    /**
     * Creates a new marca entity.
     *
     * @Route("/new", name="marcas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $marca = new Marcas();
        $form = $this->createForm('FabricantesBundle\Form\MarcasType', $marca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            //Usuario Logado
            $marca->setUsuarioCadastro($this->getUser());
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $marca->setDataCadastro($dataAtual);            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($marca);
            $em->flush($marca);

            return $this->redirectToRoute('fabricantes_show', array('id' => $marca->getFabricante()->getId()));            
        }

        return $this->render('FabricantesBundle:Marcas:new.html.twig', array(
            'marca' => $marca,
            'form' => $form->createView(),
            'origem' => 'newAction',
        ));
    }

    /**
     * Finds and displays a marca entity.
     *
     * @Route("/{id}", name="marcas_show")
     * @Method("GET")
     */
    public function showAction(Marcas $marca)
    {
        $deleteForm = $this->createDeleteForm($marca);

        return $this->render('FabricantesBundle:Marcas:show.html.twig', array(
            'marca' => $marca,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing marca entity.
     *
     * @Route("/{id}/edit", name="marcas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Marcas $marca)
    {
        $deleteForm = $this->createDeleteForm($marca);
        $editForm = $this->createForm('FabricantesBundle\Form\MarcasType', $marca);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            return $this->redirectToRoute('fabricantes_show', array('id' => $marca->getFabricante()->getId()));
        }

        return $this->render('FabricantesBundle:Marcas:edit.html.twig', array(
            'marca' => $marca,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a marca entity.
     *
     * @Route("/{id}", name="marcas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Marcas $marca)
    {
        $form = $this->createDeleteForm($marca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($marca);
            $em->flush($marca);
        }

        return $this->redirectToRoute('marcas_index');
    }

    /**
     * Creates a form to delete a marca entity.
     *
     * @param Marcas $marca The marca entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Marcas $marca)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('marcas_delete', array('id' => $marca->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Cria um novo contatos para fornecedor que foi passado por parametro
     *
     * @Route("/{id}/new", name="marcas_new_with_fabricante")
     * @Method({"GET", "POST"})
     */
    public function newWithFabricanteAction(Request $request, \FabricantesBundle\Entity\Fabricantes $fabricante)
    {
        $marca = new Marcas();
        $marca->setFabricante($fabricante);
        $form = $this->createForm('FabricantesBundle\Form\MarcasType', $marca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            //usuario fixo - modificar quando implantar controle de usuarios
            $marca->setUsuarioCadastro($this->getUser());
            
            //Usuario Logado
            $dataAtual = new \DateTime("now");
            $marca->setDataCadastro($dataAtual); 
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($marca);
            $em->flush($marca);
            
            return $this->redirectToRoute('fabricantes_show', array('id' => $marca->getFabricante()->getId()));
        }

        return $this->render('FabricantesBundle:Marcas:new.html.twig', array(
            'marca' => $marca,
            'form' => $form->createView(),
            'origem' => 'newWithFabricanteAction',
        ));
    }
    
    
    /**
     * Edita somente o status da marca
     * Json como parametro
     *     
     * @Route("/ativo/", name="marcas_edit_ativo")
     * @Method({"POST"})
     */
    public function editAtivoAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $marca = $em->getRepository('FabricantesBundle:Marcas')->find($request->get('id_marca'));
        
        $marca_ativo = $request->get('marca_ativo');
        
        //Se marca ativo atual for S desativa senao ativa
        if($marca_ativo == 'S')
        {
            $marca_ativo = 'N';
        }else
        {
            $marca_ativo = 'S';
        }
        $marca->setAtivo($marca_ativo);
        $em->flush();
                
        $retorno = array(
            "status" => "ok",
            "marca_ativo" => $marca_ativo
        );
        return $this->json($retorno); 
    }
    
    
    
    
}
