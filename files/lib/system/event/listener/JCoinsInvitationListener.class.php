<?php

/*
 * Copyright by Udo Zaydowicz.
 * Modified by SoftCreatR.dev.
 *
 * License: http://opensource.org/licenses/lgpl-license.php
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
namespace wcf\system\event\listener;

use wcf\system\user\jcoins\UserJCoinsStatementHandler;
use wcf\system\WCF;

/**
 * JCoins listener for invitations.
 */
class JCoinsInvitationListener implements IParameterizedEventListener
{
    /**
     * @inheritdoc
     */
    public function execute($eventObj, $className, $eventName, array &$parameters)
    {
        if (!MODULE_JCOINS || !MODULE_INVITE) {
            return;
        }

        if ($eventObj->getActionName() == 'create' && WCF::getUser()->userID) {
            UserJCoinsStatementHandler::getInstance()->create('com.uz.jcoins.statement.invitation', null, ['userID' => WCF::getUser()->userID]);
        }
    }
}
