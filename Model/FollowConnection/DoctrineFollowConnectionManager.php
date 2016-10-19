<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/18/16 9:44 AM
 */

namespace ED\UserConnectionsBundle\Model\FollowConnection;


use Doctrine\Common\Persistence\ObjectManager;
use ED\UserConnectionsBundle\Entity\FollowConnection;
use ED\UserConnectionsBundle\Exception\FollowConnectionException;
use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;

/**
 * Class DoctrineFollowConnectionManager
 *
 * @package ED\UserConnectionsBundle\Model\FollowConnection
 */
class DoctrineFollowConnectionManager implements FollowConnectionManagerInterface
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * DoctrineFollowConnectionManager constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Create new FollowConnectionInterface instace
     *
     * @param ConnectableUserInterface $follower
     * @param ConnectableUserInterface $followee
     * @param int                      $status
     *
     * @return FollowConnectionInterface
     */
    public function createFollowConnection(
        ConnectableUserInterface $follower,
        ConnectableUserInterface $followee,
        $status = FollowConnection::STATUS_PENDING
    )
    {
        $followConnection = new FollowConnection();

        $followConnection->setFollower($follower);
        $followConnection->setFollowee($followee);
        $followConnection->setStatus($status);

        return $followConnection;
    }

    /**
     * Save follow connection
     *
     * @param FollowConnectionInterface $followConnection
     *
     * @throws FollowConnectionException
     */
    public function saveFollowConnection(FollowConnectionInterface $followConnection)
    {
        // TODO: Implement saveFollowConnection() method.
    }

    /**
     * Follow user
     *
     * @param ConnectableUserInterface $userToBeFollowed
     * @param ConnectableUserInterface $userWhoIsFollowing
     * @param int                      $status
     *
     * @throws FollowConnectionException
     */
    public function follow(
        ConnectableUserInterface $userToBeFollowed,
        ConnectableUserInterface $userWhoIsFollowing,
        $status = FollowConnection::STATUS_APPROVED
    )
    {
        // TODO: Implement follow() method.
    }

    /**
     * Unfollow user
     *
     * @param ConnectableUserInterface $userToUnfollow
     * @param ConnectableUserInterface $userWhoUnfollows
     *
     * @throws FollowConnectionException
     */
    public function unfollow(
        ConnectableUserInterface $userToUnfollow,
        ConnectableUserInterface $userWhoUnfollows
    )
    {
        // TODO: Implement unfollow() method.
    }

    /**
     * Ignore follow request from another user
     *
     * @param FollowConnectionInterface $followConnection
     */
    public function ignoreFollowRequest(FollowConnectionInterface $followConnection)
    {
        // TODO: Implement ignoreFollowRequest() method.
    }

    /**
     * Approve follow request from another user
     *
     * @param FollowConnectionInterface $followConnection
     */
    public function approveFollowRequest(FollowConnectionInterface $followConnection)
    {
        // TODO: Implement approveFollowRequest() method.
    }

    /**
     * Block user from sending follow requests
     *
     * @param ConnectableUserInterface $userToBeBlocked
     * @param ConnectableUserInterface $userWhoIsBlocking
     */
    public function blockUser(
        ConnectableUserInterface $userToBeBlocked,
        ConnectableUserInterface $userWhoIsBlocking
    )
    {
        // TODO: Implement blockUser() method.
    }

    /**
     * Unblock user from sending follow requests
     *
     * @param ConnectableUserInterface $userToBeUnlocked
     * @param ConnectableUserInterface $userWhoIsUnblocking
     */
    public function unblockUser(
        ConnectableUserInterface $userToBeUnlocked,
        ConnectableUserInterface $userWhoIsUnblocking
    )
    {
        // TODO: Implement unblockUser() method.
    }

    /**
     * Get user follow requests that are pending
     *
     * @param ConnectableUserInterface $user
     *
     * @return FollowConnectionInterface[]
     */
    public function getPendingFollowRequests(ConnectableUserInterface $user)
    {
        // TODO: Implement getPendingFollowRequests() method.
    }

    /**
     * Get user ignored follow requests
     *
     * @param ConnectableUserInterface $user
     *
     * @return FollowConnectionInterface[]
     */
    public function getIgnoredFollowRequests(ConnectableUserInterface $user)
    {
        // TODO: Implement getIgnoredFollowRequests() method.
    }

    /**
     * Get user followers
     *
     * @param ConnectableUserInterface $user
     *
     * @return ConnectableUserInterface[]
     */
    public function getFollowers(ConnectableUserInterface $user)
    {
        // TODO: Implement getFollowers() method.
    }

    /**
     * Get people that user follows
     *
     * @param ConnectableUserInterface $user
     *
     * @return ConnectableUserInterface[]
     */
    public function getFollowing(ConnectableUserInterface $user)
    {
        // TODO: Implement getFollowing() method.
    }

    /**
     * Check if user1 follows user2
     *
     * @param ConnectableUserInterface $userWhoFollows    user1
     * @param ConnectableUserInterface $userWhoIsFollowed user2
     *
     * @return bool
     */
    public function isFollowing(
        ConnectableUserInterface $userWhoFollows,
        ConnectableUserInterface $userWhoIsFollowed
    )
    {
        // TODO: Implement isFollowing() method.
    }

    /**
     * Check if user has sent follow request to other user
     *
     * @param ConnectableUserInterface $userWhoSentRequest
     * @param ConnectableUserInterface $userWhoReceivedRequest
     *
     * @return bool
     */
    public function isFollowRequestSent(
        ConnectableUserInterface $userWhoSentRequest,
        ConnectableUserInterface $userWhoReceivedRequest
    )
    {
        // TODO: Implement isFollowRequestSent() method.
    }

    /**
     * Check if user is blocked by other user
     *
     * @param ConnectableUserInterface $userWhoIsBlocked
     * @param ConnectableUserInterface $userWhoBlocked
     *
     * @return bool
     */
    public function isBlocked(
        ConnectableUserInterface $userWhoIsBlocked,
        ConnectableUserInterface $userWhoBlocked
    )
    {
        // TODO: Implement isBlocked() method.
    }
}