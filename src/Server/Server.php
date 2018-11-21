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

namespace ConflictNetwork\Common\Implementation\Laravel\Server;

use ConflictNetwork\Common\Contracts\Server\Server as IServer;
use ConflictNetwork\Common\Contracts\Server\ServerId as IServerId;
use ConflictNetwork\Common\Contracts\Server\ServerType as IServerType;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id     The unique auto-incrementing identifier.
 * @property string $hashId The unique hashed identifier.
 * @property int    $online The total number of players playing this game.
 * @property int    $max    The total number of slots available for this game.
 */
class Server extends Model implements IServer {

	//
	// Eloquent methods.
	//

	public function type() {
		return $this->hasOne(ServerType::class);
	}


	//
	// Internal abstraction methods.
	//

	/**
	 * Get the server id.
	 *
	 * @return \ConflictNetwork\Common\Contracts\Server\ServerId
	 */
	public function getId() : IServerId {
		return new ServerId($this->hashId, $this->id);
	}

	/**
	 * Get the server type.
	 *
	 * @return \ConflictNetwork\Common\Contracts\Server\ServerType
	 */
	public function getType() : IServerType {
		return $this->type();
	}

	/**
	 * Get the online player count.
	 *
	 * @return int
	 */
	public function getOnline() : int {
		return $this->online;
	}

	/**
	 * Get the max player slots.
	 *
	 * @return int
	 */
	public function getMax() : int {
		return $this->max;
	}

}