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

namespace ConflictNetwork\Common\Implementation\Laravel\Shared;

use ConflictNetwork\Common\Contracts\Shared\TypeHolder as ITypeHolder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $type The type enumeration value.
 */
abstract class TypeHolder extends Model implements ITypeHolder {

	//
	// Internal abstraction methods.
	//

	/**
	 * Get the type.
	 *
	 * @return int
	 */
	public function getType() : int {
		return $this->type;
	}

}