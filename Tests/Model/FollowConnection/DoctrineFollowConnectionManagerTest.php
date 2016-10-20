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

    /**
     * @var DoctrineFollowConnectionManager
     */
    private $fcmMocked;

    public function setUp()
    {
        parent::setUp();

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


        $this->fcm = $this->container->get('ed_user_connections.follow_connection_manager');
        $this->fcmMocked = new DoctrineFollowConnectionManager($om);
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
        $this->em->persist($follower);
        $this->em->flush();

        $followee = new ConnectableUser();
        $this->em->persist($followee);
        $this->em->flush();

        $followConnection->setFollower($follower);
        $followConnection->setFollowee($followee);
        $followConnection->setStatus(FollowConnection::STATUS_PENDING);

        $this->fcm->saveFollowConnection($followConnection);

        $followConnectionFromDb = $this->em
            ->getRepository(FollowConnection::class)
            ->find(1);

        $this->assertNotNull($followConnection);
        $this->assertInstanceOf(FollowConnection::class, $followConnectionFromDb);
    }

    public function testFindsFollowConnectionById()
    {
        $followConnection = new FollowConnection();

        $follower = new ConnectableUser();
        $this->em->persist($follower);
        $this->em->flush();

        $followee = new ConnectableUser();
        $this->em->persist($followee);
        $this->em->flush();

        $followConnection->setFollower($follower);
        $followConnection->setFollowee($followee);
        $followConnection->setStatus(FollowConnection::STATUS_PENDING);

        $this->em->persist($followConnection);
        $this->em->flush();

        $followConnectionFromDb = $this->fcm->findFollowConnection(1);

        $this->assertNotNull($followConnectionFromDb);
        $this->assertInstanceOf(FollowConnection::class, $followConnectionFromDb);
    }

    public function testItFollowsAnotherUser()
    {
        $follower = new ConnectableUser();
        $this->em->persist($follower);
        $this->em->flush();

        $followee = new ConnectableUser();
        $this->em->persist($followee);
        $this->em->flush();
        
        $this->fcm->follow($followee, $follower);
        
        $followConnection = $this->em
            ->getRepository(FollowConnection::class)
            ->findOneBy(array(
                'followee' => $followee,
                'follower' => $follower
            ));

        $this->assertInstanceOf(FollowConnection::class, $followConnection);
        $this->assertEquals($follower->getId(), $followConnection->getFollower()->getId());
        $this->assertEquals($follower->getId(), $followConnection->getFollower()->getId());
    }

    public function testUnfollowUser()
    {
        $follower = new ConnectableUser();
        $this->em->persist($follower);
        $this->em->flush();

        $followee = new ConnectableUser();
        $this->em->persist($followee);
        $this->em->flush();

        $this->fcm->follow($followee, $follower);

        $followConnection = $this->em
            ->getRepository(FollowConnection::class)
            ->findOneBy(array(
                'followee' => $followee,
                'follower' => $follower
            ));

        $this->assertInstanceOf(FollowConnection::class, $followConnection);
        $this->assertEquals($follower->getId(), $followConnection->getFollower()->getId());
        $this->assertEquals($follower->getId(), $followConnection->getFollower()->getId());

        $this->fcm->unfollow($followee, $follower);

        $followConnection = $this->em
            ->getRepository(FollowConnection::class)
            ->findOneBy(array(
                'followee' => $followee,
                'follower' => $follower
            ));

        $this->assertNull($followConnection);
    }

    public function testIsFollowing()
    {
        $follower = new ConnectableUser();
        $this->em->persist($follower);
        $this->em->flush();

        $followee = new ConnectableUser();
        $this->em->persist($followee);
        $this->em->flush();

        $isFollowing = $this->fcm->isFollowing($follower, $followee);
        $this->assertFalse($isFollowing);

        $this->fcm->follow($followee, $follower);

        $isFollowing = $this->fcm->isFollowing($follower, $followee);
        $this->assertTrue($isFollowing);
    }

    public function testGetFollowers()
    {
        $follower = new ConnectableUser();
        $this->em->persist($follower);
        $this->em->flush();

        $follower2 = new ConnectableUser();
        $this->em->persist($follower2);
        $this->em->flush();

        $follower3 = new ConnectableUser();
        $this->em->persist($follower3);
        $this->em->flush();

        $user = new ConnectableUser();
        $this->em->persist($user);
        $this->em->flush();

        $this->fcm->follow($user, $follower);
        $this->fcm->follow($user, $follower2);
        $this->fcm->follow($user, $follower3);


        $followers = $this->fcm->getFollowers($user);
        
        $this->assertCount(3, $followers);
    }

    public function testGetFollowing()
    {
        $follower = new ConnectableUser();
        $this->em->persist($follower);
        $this->em->flush();

        $user1 = new ConnectableUser();
        $this->em->persist($user1);
        $this->em->flush();

        $user2 = new ConnectableUser();
        $this->em->persist($user2);
        $this->em->flush();

        $user3 = new ConnectableUser();
        $this->em->persist($user3);
        $this->em->flush();

        $this->fcm->follow($user1, $follower);
        $this->fcm->follow($user2, $follower);
        $this->fcm->follow($user3, $follower);

        $following = $this->fcm->getFollowing($follower);

        $this->assertCount(3, $following);
    }
}