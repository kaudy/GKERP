<?php

namespace MateriaisBundle\Controller;

use MateriaisBundle\Entity\TiposMateriais;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tiposmateriai controller.
 *
 * @Route("tiposmateriais")
 */
class TiposMateriaisController extends Controller
{
    /**
     * Lists all tiposMateriais entities.
     *
     * @Route("/", name="tiposmateriais_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tiposMateriais = $em->getRepository('MateriaisBundle:TiposMateriais')->findAll();

        return $this->render('MateriaisBundle:TiposMateriais:index.html.twig', array(
            'tiposMateriais' => $tiposMateriais,
        ));
    }

    /**
     * Creates a new tiposMateriai entity.
     *
     * @Route("/new", name="tiposmateriais_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoMaterial = new Tiposmateriais();
        $form = $this->createForm('MateriaisBundle\Form\TiposMateriaisType', $tipoMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            //Usuario Logado
            $tipoMaterial->setUsuarioCadastro($this->getUser()); 
            
            //Pega a data e horario atual do cadastro
            $dataAtual = new \DateTime("now");
            $tipoMaterial->setDataCadastro($dataAtual);
            
            //Persiste o material na base de dados
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoMaterial);
            $em->flush($tipoMaterial);

            return $this->redirectToRoute('tiposmateriais_show', array('id' => $tipoMaterial->getId()));
        }

        return $this->render('MateriaisBundle:TiposMateriais:new.html.twig', array(
            'tipoMaterial' => $tipoMaterial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tiposMateriai entity.
     *
     * @Route("/{id}", name="tiposmateriais_show")
     * @Method("GET")
     */
    public function showAction(TiposMateriais $tipoMaterial)
    {
        $deleteForm = $this->createDeleteForm($tipoMaterial);

        return $this->render('MateriaisBundle:TiposMateriais:show.html.twig', array(
            'tipoMaterial' => $tipoMaterial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tiposMateriai entity.
     *
     * @Route("/{id}/edit", name="tiposmateriais_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TiposMateriais $tipoMaterial)
    {
        $deleteForm = $this->createDeleteForm($tipoMaterial);
        $editForm = $this->createForm('MateriaisBundle\Form\TiposMateriaisType', $tipoMaterial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tiposmateriais_show', array('id' => $tipoMaterial->getId()));
        }

        return $this->render('MateriaisBundle:TiposMateriais:edit.html.twig', array(
            'tipoMaterial' => $tipoMaterial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tiposMateriai entity.
     *
     * @Route("/{id}", name="tiposmateriais_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TiposMateriais $tipoMaterial)
    {
        $form = $this->createDeleteForm($tipoMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoMaterial);
            $em->flush($tipoMaterial);
        }

        return $this->redirectToRoute('tiposmateriais_index');
    }

    /**
     * Creates a form to delete a tiposMateriai entity.
     *
     * @param TiposMateriais $tipoMaterial The tiposMateriai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TiposMateriais $tipoMaterial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tiposmateriais_delete', array('id' => $tipoMaterial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Edita somente o status do tipo do material
     * Json como parametro
     *     
     * @Route("/ativo/", name="tipos_materiais_edit_ativo")
     * @Method({"POST"})
     */
    public function editAtivoAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $tipoMaterial = $em->getRepository('MateriaisBundle:TiposMateriais')->find($request->get('id_tipo_material'));
        
        $tipo_material_ativo = $request->get('tipo_material_ativo');
        
        //Se material ativo atual for S desativa senao ativa
        if($tipo_material_ativo == 'S')
        {
            $tipo_material_ativo = 'N';
        }else
        {
            $tipo_material_ativo = 'S';
        }
        $tipoMaterial->setAtivo($tipo_material_ativo);
        $em->flush();
                
        $retorno = array(
            "status" => "ok",
            "tipomaterial_ativo" => $tipo_material_ativo
        );
        return $this->json($retorno); 
    }
    
    
    
}
