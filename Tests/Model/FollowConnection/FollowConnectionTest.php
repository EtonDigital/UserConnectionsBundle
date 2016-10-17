<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/13/16 2:32 PM
 */

namespace ED\UserConnectionsBundle\Tests\Model\FollowConnection;


use ED\UserConnectionsBundle\Model\FollowConnection\FollowConnection;
use ED\UserConnectionsBundle\Tests\BaseTestCase;


/**
 * Class FollowConnectionTest
 *
 * @package ED\UserConnectionsBundle\Tests\Model\FollowConnection
 */
class FollowConnectionTest extends BaseTestCase
{
    /** @test */
    public function testInstanceOf()
    {
        $followConnection = new FollowConnection();

        $this->assertInstanceOf('ED\UserConnectionsBundle\Model\FollowConnection\FollowConnectionInterface', $followConnection);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidStatus()
    {
        $followConnection = new FollowConnection();

        $followConnection->setStatus(40);
    }

    public function testSetApprovedStatus()
    {
        $followConnection = new FollowConnection();

        $followConnection->setStatus(FollowConnection::STATUS_APPROVED);
    }

    public function testSetIgnoredStatus()
    {
        $followConnection = new FollowConnection();

        $followConnection->setStatus(FollowConnection::STATUS_IGNORED);
    }

    public function testSetPendingStatus()
    {
        $followConnection = new FollowConnection();

        $followConnection->setStatus(FollowConnection::STATUS_PENDING);
    }
}