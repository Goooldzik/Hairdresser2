<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Client()
 * @method static Employee()
 * @method static Hairdresser()
 * @method static Admin()
 */
final class UserRole extends Enum
{
    const Client = 'client';
    const Employee = 'employee';
    const Hairdresser = 'hairdresser';
    const Admin = 'admin';
}
