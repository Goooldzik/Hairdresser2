<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Dashboard()
 * @method static Users()
 * @method static UsersManagement()
 * @method static Visits()
 * @method static VisitsManagement()
 * @method static Settings()
 */
final class UserPermission extends Enum
{
    const Dashboard = 'dashboard';

    const Users = 'users';
    const UsersManagement = 'users-management';

    const Visits = 'visits';
    const VisitsManagement = 'visits-management';

    const Profile = 'profile';

    const Settings = 'settings';
}
