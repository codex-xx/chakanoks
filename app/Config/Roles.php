<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Roles extends BaseConfig
{
	public const BRANCH_MANAGER = 'branch_manager';
	public const INVENTORY_STAFF = 'inventory_staff';
	public const CENTRAL_ADMIN = 'central_admin';
	public const SUPPLIER = 'supplier';
	public const LOGISTICS_COORDINATOR = 'logistics_coordinator';
	public const FRANCHISE_MANAGER = 'franchise_manager';
	public const SYSTEM_ADMIN = 'sys_admin';

	public static function labels(): array
	{
		return [
			self::BRANCH_MANAGER => 'Branch Manager',
			self::INVENTORY_STAFF => 'Inventory Staff',
			self::CENTRAL_ADMIN => 'Central Office Admin',
			self::SUPPLIER => 'Supplier',
			self::LOGISTICS_COORDINATOR => 'Logistics Coordinator',
			self::FRANCHISE_MANAGER => 'Franchise Manager',
			self::SYSTEM_ADMIN => 'System Administrator (IT)',
		];
	}

	public static function adminRoles(): array
	{
		return [self::SYSTEM_ADMIN, self::CENTRAL_ADMIN, 'admin'];
	}
}


