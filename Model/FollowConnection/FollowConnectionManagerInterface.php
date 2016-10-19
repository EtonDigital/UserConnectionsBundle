<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/17/16 9:46 AM
 */

namespace ED\UserConnectionsBundle\Model\FollowConnection;


use ED\UserConnectionsBundle\Exception\FollowConnectionException;
use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;

/**
 * Interface FollowConnectionManagerInterface
 *
 * @package ED\UserConnectionsBundle\Manager
 */
interface FollowConnectionManagerInterface
{
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
    );

    /**
     * Save follow connection
     *
     * @param FollowConnectionInterface $followConnection
     *
     * @throws FollowConnectionException
     */
    public function saveFollowConnection(FollowConnectionInterface $followConnection);

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
    );

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
    );

    /**
     * Ignore follow request from another user
     *
     * @param FollowConnectionInterface $followConnection
     */
    public function ignoreFollowRequest(FollowConnectionInterface $followConnection);

    /**
     * Approve follow request from another user
     *
     * @param FollowConnectionInterface $followConnection
     */
    public function approveFollowRequest(FollowConnectionInterface $followConnection);

    /**
     * Block user from sending follow requests
     *
     * @param ConnectableUserInterface $userToBeBlocked
     * @param ConnectableUserInterface $userWhoIsBlocking
     */
    public function blockUser(
        ConnectableUserInterface $userToBeBlocked,
        ConnectableUserInterface $userWhoIsBlocking
    );

    /**
     * Unblock user from sending follow requests
     *
     * @param ConnectableUserInterface $userToBeUnlocked
     * @param ConnectableUserInterface $userWhoIsUnblocking
     */
    public function unblockUser(
        ConnectableUserInterface $userToBeUnlocked,
        ConnectableUserInterface $userWhoIsUnblocking
    );

    /**
     * Get user follow requests that are pending
     *
     * @param ConnectableUserInterface $user
     *
     * @return FollowConnectionInterface[]
     */
    public function getPendingFollowRequests(ConnectableUserInterface $user);

    /**
     * Get user ignored follow requests
     *
     * @param ConnectableUserInterface $user
     *
     * @return FollowConnectionInterface[]
     */
    public function getIgnoredFollowRequests(ConnectableUserInterface $user);

    /**
     * Get user followers
     *
     * @param ConnectableUserInterface $user
     *
     * @return ConnectableUserInterface[]
     */
    public function getFollowers(ConnectableUserInterface $user);

    /**
     * Get people that user follows
     *
     * @param ConnectableUserInterface $user
     *
     * @return ConnectableUserInterface[]
     */
    public function getFollowing(ConnectableUserInterface $user);

    /**
     * Check if user1 follows user2
     *
     * @param ConnectableUserInterface $userWhoFollows     user1
     * @param ConnectableUserInterface $userWhoIsFollowed  user2
     *
     * @return bool
     */
    public function isFollowing(
        ConnectableUserInterface $userWhoFollows,
        ConnectableUserInterface $userWhoIsFollowed
    );

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
    );

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
    );
}