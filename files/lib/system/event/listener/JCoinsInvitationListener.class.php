<?php
namespace wcf\system\event\listener;
use wcf\system\event\listener\IParameterizedEventListener;
use wcf\system\user\jcoins\UserJCoinsStatementHandler;
use wcf\system\WCF;

/**
 * JCoins listener for invitations.
 *
 * @author		2017-2022 Zaydowicz
 * @license		GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package		com.uz.jcoins.invitation
 */
class JCoinsInvitationListener implements IParameterizedEventListener {
	/**
	 * @inheritdoc
	 */
	public function execute($eventObj, $className, $eventName, array &$parameters) {
		if (!MODULE_JCOINS || !MODULE_INVITE) return;
		
		if ($eventObj->getActionName() == 'create' && WCF::getUser()->userID) {
			UserJCoinsStatementHandler::getInstance()->create('com.uz.jcoins.statement.invitation', null, ['userID' => WCF::getUser()->userID]);
		}
	}
}
