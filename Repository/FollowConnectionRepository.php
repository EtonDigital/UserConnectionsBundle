<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/20/16 5:06 PM
 */

namespace ED\UserConnectionsBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use ED\UserConnectionsBundle\Entity\FollowConnection;
use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;

/**
 * Class FollowConnectionRepository
 *
 * @package ED\UserConnectionsBundle\Repository
 */
class FollowConnectionRepository extends EntityRepository
{
    /**
     * Get doctrine query for user followers
     *
     * @param ConnectableUserInterface $user
     *
     * @return Query
     */
    public function getUserFollowersQuery(ConnectableUserInterface $user)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('cu')
            ->from('EDUserConnectionsBundle:ConnectableUser', 'cu')
            ->join('cu.followers', 'f')
            ->where('f.followee = :user')
            ->setParameter('user', $user)
            ->getQuery();
    }

    /**
     * Get doctrine query for people that user follows
     *
     * @param ConnectableUserInterface $user
     *
     * @return Query
     */
    public function getUserFollowingQuery(ConnectableUserInterface $user)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('cu')
            ->from('EDUserConnectionsBundle:ConnectableUser', 'cu')
            ->join('cu.following', 'f')
            ->where('f.follower = :user')
            ->setParameter('user', $user)
            ->getQuery();
    }
}