<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/13/16 9:06 AM
 */

namespace ED\UserConnectionsBundle\Tests;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class BaseTestCase
 *
 * @package ED\UserConnectionsBundle\Tests
 */
abstract class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Boot symfony app
     */
    protected function bootSymfony()
    {
        require_once 'AppKernel.php';

        $kernel = new \AppKernel('test', true);
        $kernel->boot();

        $this->container = $kernel->getContainer();
        $this->em = $this->container->get('doctrine.orm.default_entity_manager');
    }
}