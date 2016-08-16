<?php

namespace Acard\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
#use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acard\FrontendBundle\Entity\Surgeries;
use Acard\FrontendBundle\Form\SurgeriesType;

/**
 * Surgeries controller.
 *
 */
class SurgeriesController extends Controller {

    /**
     * Lists all Surgeries entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcardFrontendBundle:Surgeries')->findAll();

        return $this->render('AcardBackendBundle:Surgeries:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Surgeries entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Surgeries();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Gabinet został dodany');
            return $this->redirect($this->generateUrl('surgeries'));
        }

        return $this->render('AcardBackendBundle:Surgeries:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Surgeries entity.
     *
     * @param Surgeries $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Surgeries $entity) {
        $form = $this->createForm(new SurgeriesType(), $entity, array(
            'action' => $this->generateUrl('surgeries_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Zapisz'));

        return $form;
    }

    /**
     * Displays a form to create a new Surgeries entity.
     *
     */
    public function newAction() {
        $entity = new Surgeries();
        $form = $this->createCreateForm($entity);

        return $this->render('AcardBackendBundle:Surgeries:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Surgeries entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcardFrontendBundle:Surgeries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Surgeries entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcardBackendBundle:Surgeries:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Surgeries entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcardFrontendBundle:Surgeries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Surgeries entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcardBackendBundle:Surgeries:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Surgeries entity.
     *
     * @param Surgeries $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Surgeries $entity) {
        $form = $this->createForm(new SurgeriesType(), $entity, array(
            'action' => $this->generateUrl('surgeries_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Zapisz'));

        return $form;
    }

    /**
     * Edits an existing Surgeries entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcardFrontendBundle:Surgeries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Surgeries entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'Gabinet został zapisany');
            return $this->redirect($this->generateUrl('surgeries'));
        }

        return $this->render('AcardBackendBundle:Surgeries:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Surgeries entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AcardFrontendBundle:Surgeries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Surgeries entity.');
        } else {
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'Gabinet został usunięty');
            return $this->redirect($this->generateUrl('surgeries'));
        }
    }

    /**
     * Creates a form to delete a Surgeries entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('surgeries_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
