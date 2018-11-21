<?php

/**
 *     ___                 __  _  _        _      ___    __
 *    / __\  ___   _ __   / _|| |(_)  ___ | |_   / _ \  /__\
 *   / /    / _ \ | '_ \ | |_ | || | / __|| __| / /_)/ /_\
 *  / /___ | (_) || | | ||  _|| || || (__ | |_ / ___/ //__
 *  \____/  \___/ |_| |_||_|  |_||_| \___| \__|\/     \__/
 *
 *
 *  Copyright (C) 2018 Conflict Network.
 *
 *  This is private software, you cannot redistribute and/or modify it in any way
 *  unless given explicit permission to do so. If you have not been given explicit
 *  permission to view or modify this software you should take the appropriate actions
 *  to remove this software from your device immediately.
 *
 * @author Jack Noordhuis
 *
 *
 */

declare(strict_types=1);

namespace ConflictNetwork\Common\Implementation\Laravel\Player;

use ConflictNetwork\Common\Contracts\Player\Player as IPlayer;
use ConflictNetwork\Common\Contracts\Player\PlayerId as IPlayerId;
use ConflictNetwork\Common\Contracts\Server\ServerId as IServerId;
use ConflictNetwork\Common\Implementation\Laravel\Server\ServerId;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id           The unique auto-incrementing identifier.
 * @property string $hashId       The unique hashed identifier.
 * @property string $last_address The players last known ip address.
 * @property int    $last_server  The unique identifier of the last server the player was on.
 */
class Player extends Model implements IPlayer {

	//
	// Internal abstraction methods.
	//

	/**
	 * Get the player id.
	 *
	 * @return \ConflictNetwork\Common\Contracts\Player\PlayerId
	 */
	public function getId() : IPlayerId {
		return new PlayerId($this->hashId, $this->id);
	}

	/**
	 * Get the last known IP address.
	 *
	 * @return string
	 */
	public function getLastAddress() : string {
		return $this->last_address;
	}

	/**
	 * Get the last server id.
	 *
	 * @return \ConflictNetwork\Common\Contracts\Server\ServerId
	 */
	public function getLastServerId() : IServerId {
		return new ServerId($this->last_server);
	}

}