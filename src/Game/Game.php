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

namespace ConflictNetwork\Common\Implementation\Laravel\Game;

use ConflictNetwork\Common\Contracts\Game\Game as IGame;
use ConflictNetwork\Common\Contracts\Game\GameId as IGameId;
use ConflictNetwork\Common\Contracts\Game\GameType as IGameType;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id     The unique auto-incrementing identifier.
 * @property string $hashId The unique hashed identifier.
 * @property int    $online The total number of players playing this game.
 * @property int    $max    The total number of slots available for this game.
 */
class Game extends Model implements IGame {

	//
	// Eloquent methods.
	//

	public function type() {
		return $this->hasOne(GameType::class);
	}


	//
	// Internal abstraction methods.
	//

	/**
	 * Get the game id.
	 *
	 * @return \ConflictNetwork\Common\Contracts\Game\GameId
	 */
	public function getId() : IGameId {
		return new GameId($this->hashId, $this->id);
	}

	/**
	 * Get the game type.
	 *
	 * @return \ConflictNetwork\Common\Contracts\Game\GameType
	 */
	public function getType() : IGameType {
		return $this->type();
	}

	/**
	 * Get the total online player count for this game.
	 *
	 * @return int
	 */
	public function getOnline() : int {
		return $this->online;
	}

	/**
	 * Get the total max player slots for this game.
	 *
	 * @return int
	 */
	public function getMax() : int {
		return $this->max;
	}

}