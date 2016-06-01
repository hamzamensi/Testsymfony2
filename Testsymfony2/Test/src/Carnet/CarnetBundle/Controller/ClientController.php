<?php

namespace Carnet\CarnetBundle\Controller;

use Carnet\CarnetBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Carnet\CarnetBundle\Entity\Client;
use Carnet\CarnetBundle\Form\ClientType;

/**
 * Client controller.
 *
 */
class ClientController extends Controller
{
    /**
     * Lists all Client entities.
     *
     */

    public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $findContact = $em->getRepository('CarnetBundle:Client')->findOneBy(array('id'=>$id));
        $em->remove($findContact);
        $em->flush();
        $contacts = $em->getRepository('CarnetBundle:Contact')->findBy(array('ajouterpar'=>$user));

        return $this->render('client/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $contacts = $em->getRepository('CarnetBundle:Contact')->findBy(array('ajouterpar'=>$user));

        return $this->render('client/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    public function compteAction()
    {




        return $this->render('client/compte.html.twig');
    }

    /**
     * Creates a new Client entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $contact = new Contact();
        $client = new Client();
        $form = $this->createForm('Carnet\CarnetBundle\Form\ClientType', $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $nouveaucontact = $em->getRepository('CarnetBundle:Client')->findOneBy(array('id'=>$client->getId()));
            $contact->setAjouterpar($user);
            $contact->setContact($nouveaucontact);
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('client_show', array('id' => $client->getId()));
        }

        return $this->render('client/new.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Client entity.
     *
     */
    public function showAction(Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);

        return $this->render('client/show.html.twig', array(
            'client' => $client,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Client entity.
     *
     */
    public function editAction(Request $request, Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);
        $editForm = $this->createForm('Carnet\CarnetBundle\Form\ClientType', $client);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_edit', array('id' => $client->getId()));
        }

        return $this->render('client/edit.html.twig', array(
            'client' => $client,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Client entity.
     *
     */
    public function deleteAction(Request $request, Client $client)
    {
        $form = $this->createDeleteForm($client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($client);
            $em->flush();
        }

        return $this->redirectToRoute('client_index');
    }

    /**
     * Creates a form to delete a Client entity.
     *
     * @param Client $client The Client entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Client $client)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('client_delete', array('id' => $client->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
