<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/13/16 11:19 AM
 */

namespace ED\UserConnectionsBundle\Model\FollowConnection;
use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;


/**
 * Interface FollowConnectionInterface
 *
 * @package ED\UserConnectionsBundle\Model\FollowConnection
 */
interface FollowConnectionInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     *
     * @return FollowConnectionInterface
     */
    public function setId($id);

    /**
     * @return ConnectableUserInterface
     */
    public function getFollower();

    /**
     * @param ConnectableUserInterface $user
     *
     * @return FollowConnectionInterface
     */
    public function setFollower(ConnectableUserInterface $user);

    /**
     * @return ConnectableUserInterface
     */
    public function getFollowee();

    /**
     * @param ConnectableUserInterface $user
     *
     * @return FollowConnectionInterface
     */
    public function setFollowee(ConnectableUserInterface $user);

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @param $status
     *
     * @return FollowConnectionInterface
     */
    public function setStatus($status);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param \DateTime $dateTime
     *
     * @return FollowConnectionInterface
     */
    public function setCreatedAt(\DateTime $dateTime);
}