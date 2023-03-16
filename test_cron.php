<?php
require __DIR__ . '/../app/bootstrap.php';

class TestMyClass
    extends \Magento\Framework\App\Http
    implements \Magento\Framework\AppInterface
{
    public function launch()
    {
        $this->_state->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);
        $myClass = $this->_objectManager->create('Vendor\ModuleName\Path\To\Class');
        $myClass->execute(); // In cron jobs we usually use the execute() method as the entry point
        return $this->_response;
    }
}

$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication('TestMyClass');
$bootstrap->run($app);
