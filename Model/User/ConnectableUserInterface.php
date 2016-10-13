<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/13/16 2:09 PM
 */

namespace ED\UserConnectionsBundle\Model\User;


/**
 * Interface ConnectableUserInterface
 *
 * @package ED\UserConnectionsBundle\Model\User
 */
interface ConnectableUserInterface
{
    /**
     * @return int
     */
    public function getId();
}