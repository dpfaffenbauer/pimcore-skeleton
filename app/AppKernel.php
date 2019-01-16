<?php

use Pimcore\HttpKernel\BundleCollection\BundleCollection;
use Pimcore\Kernel;

class AppKernel extends Kernel
{
    /**
     * Adds bundles to register to the bundle collection. The collection is able
     * to handle priorities and environment specific bundles.
     *
     * @param BundleCollection $collection
     */
    public function registerBundlesToCollection(BundleCollection $collection)
    {
        $collection->addBundle(new \AppBundle\AppBundle);
        $collection->addBundle(new \Symfony\WebpackEncoreBundle\WebpackEncoreBundle());
    }
}
