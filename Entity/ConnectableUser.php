<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/18/16 2:50 PM
 */

namespace ED\UserConnectionsBundle\Entity;


use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;

/**
 * Class ConnectableUser
 *
 * @package ED\UserConnectionsBundle\Entity
 */
class ConnectableUser implements ConnectableUserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}