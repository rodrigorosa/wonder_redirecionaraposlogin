<?php

class Wonder_RedirecionarAposLogin_Model_Observer
{
  public function redirecionar($observer)
  {
    $session = Mage::getSingleton('customer/session');
    if (strpos(Mage::helper('core/http')->getHttpReferer(), 'checkout') === false) {
        $session->setAfterAuthUrl(Mage::getBaseUrl());
    } else {
        $session->setAfterAuthUrl(Mage::helper('core/http')->getHttpReferer());
    }

    $session->setBeforeAuthUrl('');
  }
}
