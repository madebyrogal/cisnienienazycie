<?php

namespace Acard\BackendBundle\Controller;

use Acard\BackendBundle\Handler\CityHandler;
use Acard\FrontendBundle\Entity\City;
use Acard\FrontendBundle\Form\CityType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CityController extends Controller
{
    public function listAction()
    {
        /** @var $cityHandler CityHandler */
        $cityHandler = $this->getHandlerFactory()->createHandler('City');

        return $this->render('AcardBackendBundle:City:list.html.twig', array('cities' => $cityHandler->getAllCities()));
    }

    public function editAction($id)
    {
        /** @var $request Request */
        $request = $this->get('request');

        /** @var $cityHandler CityHandler */
        $cityHandler = $this->getHandlerFactory()->createHandler('City');
        /** @var $city City */
        $city = $cityHandler->getCityById($id);

        if (!$city) {
            return $this->redirect($this->generateUrl('acard_backend_index'));
        }

        $form = $this->createForm(new CityType(), $city);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Zmiany zostały zapisane');
                $cityHandler->persistCity($city);
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:City:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function createAction()
    {
        /** @var $request Request */
        $request = $this->get('request');

        /** @var $cityHandler CityHandler */
        $cityHandler = $this->getHandlerFactory()->createHandler('City');

        $city = new City();
        $form = $this->createForm(new CityType(), $city);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                $cityHandler->persistCity($city);
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Miasto zostało dodane');
                return $this->redirect($this->generateUrl('acard_backend_city_index'));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:City:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function infoAction($id)
    {
        /** @var $cityHandler CityHandler */
        $cityHandler = $this->getHandlerFactory()->createHandler('City');

        $city = $cityHandler->getCityById($id);
        if (!$city) {
            return new JsonResponse(array('status' => 'error'));
        } else {
            return new JsonResponse(array(
                'status' => 'ok',
                'data' => $city->toArray()
            ));
        }
    }

    public function deleteAction($id)
    {
        /** @var $cityHandler CityHandler */
        $cityHandler = $this->getHandlerFactory()->createHandler('City');

        /** @var $city City */
        $city = $cityHandler->getCityById($id);

        if (!$city) {
            $session = $this->get('session');
            $session->getFlashBag()->add('error', 'Miasto nie istnieje w bazie');
            return $this->redirect($this->generateUrl('acard_backend_city_index'));
        } else {
            try {
                $cityHandler->deleteCity($city);
            } catch (\Exception $e) {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', $e->getMessage());
                return $this->redirect($this->generateUrl('acard_backend_city_index'));
            }

            $session = $this->get('session');
            $session->getFlashBag()->add('success', 'Miasto zostało usunięte');
            return $this->redirect($this->generateUrl('acard_backend_city_index'));
        }
    }
}
