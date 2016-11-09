<?php

namespace MateriaisBundle\Controller;

use MateriaisBundle\Entity\Materiais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Materiai controller.
 *
 * @Route("materiais")
 */
class MateriaisController extends Controller
{
    /**
     * Lists all materiais entities.
     *
     * @Route("/", name="materiais_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $materiais = $em->getRepository('MateriaisBundle:Materiais')->findAll();

        return $this->render('MateriaisBundle:Materiais:index.html.twig', array(
            'materiais' => $materiais,
        ));
    }

    /**
     * Creates a new materiai entity.
     *
     * @Route("/new", name="materiais_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $materiais = new Materiais();
        $form = $this->createForm('MateriaisBundle\Form\MateriaisType', $materiais);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            //Usuario Logado
            $materiais->setUsuarioCadastro($this->getUser()); 
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $materiais->setDataCadastro($dataAtual); 
            
            //Persiste o material na base de dados
            $em = $this->getDoctrine()->getManager();
            $em->persist($materiais);
            $em->flush($materiais);

            return $this->redirectToRoute('materiais_show', array('id' => $materiais->getId()));
        }

        return $this->render('MateriaisBundle:Materiais:new.html.twig', array(
            'materiais' => $materiais,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a materiai entity.
     *
     * @Route("/{id}", name="materiais_show")
     * @Method("GET")
     */
    public function showAction(Materiais $material)
    {
        $deleteForm = $this->createDeleteForm($material);

        return $this->render('MateriaisBundle:Materiais:show.html.twig', array(
            'material' => $material,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing materiai entity.
     *
     * @Route("/{id}/edit", name="materiais_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Materiais $materiai)
    {
        $deleteForm = $this->createDeleteForm($materiai);
        $editForm = $this->createForm('MateriaisBundle\Form\MateriaisType', $materiai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('materiais_show', array('id' => $materiai->getId()));
        }

        return $this->render('MateriaisBundle:Materiais:edit.html.twig', array(
            'materiai' => $materiai,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a materiai entity.
     *
     * @Route("/{id}", name="materiais_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Materiais $materiai)
    {
        $form = $this->createDeleteForm($materiai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($materiai);
            $em->flush($materiai);
        }

        return $this->redirectToRoute('materiais_index');
    }

    /**
     * Creates a form to delete a materiai entity.
     *
     * @param Materiais $materiai The materiai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Materiais $materiai)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materiais_delete', array('id' => $materiai->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Edita somente o status do material
     * Json como parametro
     *     
     * @Route("/ativo/", name="materiais_edit_ativo")
     * @Method({"POST"})
     */
    public function editAtivoAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $material = $em->getRepository('MateriaisBundle:Materiais')->find($request->get('id_material'));
        
        $material_ativo = $request->get('material_ativo');
        
        //Se material ativo atual for S desativa senao ativa
        if($material_ativo == 'S')
        {
            $material_ativo = 'N';
        }else
        {
            $material_ativo = 'S';
        }
        $material->setAtivo($material_ativo);
        $em->flush();
                
        $retorno = array(
            "status" => "ok",
            "material_ativo" => $material_ativo
        );
        return $this->json($retorno); 
    }
}
