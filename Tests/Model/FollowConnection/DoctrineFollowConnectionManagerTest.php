<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/18/16 9:49 AM
 */

namespace Tests\Model\FollowConnection;


use ED\UserConnectionsBundle\Entity\ConnectableUser;
use ED\UserConnectionsBundle\Model\FollowConnection\DoctrineFollowConnectionManager;
use ED\UserConnectionsBundle\Entity\FollowConnection;
use ED\UserConnectionsBundle\Tests\BaseTestCase;
use \Mockery as m;

/**
 * Class DoctrineFollowConnectionManagerTest
 *
 * @package Tests\Model\FollowConnection
 */
class DoctrineFollowConnectionManagerTest extends BaseTestCase
{
    /**
     * @var DoctrineFollowConnectionManager
     */
    private $fcm;

    public function setUp()
    {
        $this->bootSymfony();

        $om = m::mock('Doctrine\Common\Persistence\ObjectManager')
            ->shouldReceive([
                'persist',
                'flush',
                'remove',
                'getRepository'
            ])
            ->once()
            ->andReturnNull()
            ->getMock();


        $this->fcm = new DoctrineFollowConnectionManager($om);
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(
            'ED\UserConnectionsBundle\Model\FollowConnection\DoctrineFollowConnectionManager',
            $this->fcm
        );
    }

    public function testItCreatesNewFollowConnectionInstance()
    {
        $user = m::mock('ED\UserConnectionsBundle\Model\User\ConnectableUserInterface');

        /** @noinspection PhpParamsInspection */
        $followConnection = $this->fcm->createFollowConnection(
            $user,
            $user,
            FollowConnection::STATUS_PENDING
        );

        $this->assertInstanceOf(
            'ED\UserConnectionsBundle\Model\FollowConnection\FollowConnectionInterface',
            $followConnection
        );
    }

    public function testSavesFollowConnection()
    {
        $followConnection = new FollowConnection();

        $follower = new ConnectableUser();
        $followee = new ConnectableUser();

        $followConnection->setFollower($follower);
        $followConnection->setFollowee($followee);
        $followConnection->setStatus(FollowConnection::STATUS_PENDING);

        $this->em->persist($followConnection);
        $this->em->flush();

    }
}