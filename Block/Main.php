<?php

namespace Boangri\Ololo\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Boangri\Ololo\Model\ResourceModel\Portfolio\Collection as PortfolioCollection;
//use \Boangri\Ololo\Model\ResourceModel\Portfolio\CollectionFactory as PortfolioCollectionFactory;
//use \Boangri\Ololo\Model\Portfolio;

class Main extends Template
{
//    /**
//     * CollectionFactory
//     * @var null|CollectionFactory
//     */
//    protected $_postCollectionFactory = null;
//
//    /**
//     * Constructor
//     *
//     * @param Context $context
//     * @param PostCollectionFactory $postCollectionFactory
//     * @param array $data
//     */
//    public function __construct(
//        Context $context,
//        PostCollectionFactory $postCollectionFactory,
//        array $data = []
//    ) {
//        $this->_postCollectionFactory = $postCollectionFactory;
//        parent::__construct($context, $data);
//    }
//
//    /**
//     * @return Post[]
//     */
//    public function getPosts()
//    {
//        /** @var PostCollection $postCollection */
//        $postCollection = $this->_postCollectionFactory->create();
//        $postCollection->addFieldToSelect('*')->load();
//        return $postCollection->getItems();
//    }
//
//    /**
//     * For a given post, returns its url
//     * @param Post $post
//     * @return string
//     */
//    public function getPostUrl(
//        Post $post
//    ) {
//        return '/blog/post/view/id/' . $post->getId();
//    }

}
