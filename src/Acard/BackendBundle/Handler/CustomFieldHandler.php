<?php

namespace Acard\BackendBundle\Handler;

use Acard\FrontendBundle\Entity\CustomField;

class CustomFieldHandler extends Handler
{
    public function getAllCustomFields()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:CustomField')->findAll();
    }

    public function getCustomField($id)
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:CustomField')->findOneBy(array(
            'id' => (int)$id
        ));
    }

    public function updateCustomField(CustomField $customField)
    {
        $this->getDoctrine()->getManager()->persist($customField);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }
} 