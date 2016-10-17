<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/13/16 2:05 PM
 */

namespace ED\UserConnectionsBundle\Model\FollowConnection;


use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;

/**
 * Class FollowConnection
 *
 * @package ED\UserConnectionsBundle\Model\FollowConnection
 */
class FollowConnection implements FollowConnectionInterface
{
    const STATUS_PENDING  = 0;
    const STATUS_APPROVED = 1;
    const STATUS_IGNORED  = 2;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var ConnectableUserInterface
     */
    protected $follower;

    /**
     * @var ConnectableUserInterface
     */
    protected $followee;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return FollowConnectionInterface
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ConnectableUserInterface
     */
    public function getFollower()
    {
        return $this->follower;
    }

    /**
     * @param ConnectableUserInterface $follower
     *
     * @return FollowConnectionInterface
     */
    public function setFollower(ConnectableUserInterface $follower)
    {
        $this->follower = $follower;

        return $this;
    }

    /**
     * @return ConnectableUserInterface
     */
    public function getFollowee()
    {
        return $this->followee;
    }

    /**
     * @param ConnectableUserInterface $followee
     *
     * @return FollowConnectionInterface
     */
    public function setFollowee(ConnectableUserInterface $followee)
    {
        $this->followee = $followee;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return FollowConnectionInterface
     */
    public function setStatus($status)
    {
        if (!in_array($status, array(
            self::STATUS_PENDING,
            self::STATUS_APPROVED,
            self::STATUS_IGNORED
        ))) {
            throw new \InvalidArgumentException('Invalid value status');
        }

        $this->status = $status;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return FollowConnectionInterface
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}