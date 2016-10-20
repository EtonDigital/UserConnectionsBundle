<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/19/16 3:31 PM
 */

namespace ED\UserConnectionsBundle\EventSubscriber;


use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;

/**
 * Class MetadataEventSubscriber
 *
 * @package ED\UserConnectionsBundle\EventSubscriber
 */
class MetadataEventSubscriber implements EventSubscriber
{

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [
            Events::loadClassMetadata => 'mapUserWithFollowConnection'
        ];
    }

    /**
     * Add relation for user and FollowConnection
     *
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function mapUserWithFollowConnection(LoadClassMetadataEventArgs $eventArgs)
    {
        $metadata = $eventArgs->getClassMetadata();
    }
}