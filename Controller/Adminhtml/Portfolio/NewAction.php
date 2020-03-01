<?php
namespace Boangri\Ololo\Controller\Adminhtml\Portfolio;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class NewAction
 */
class NewAction extends Action
{
    const ADMIN_RESOURCE = 'Boangri_Ololo::portfolio';
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
