<?php
namespace App\Enums;

/**
 * Class CompanyStatusEnum
 *
 * @package \App\Enum
 */
enum CompanyState: string
{
    case Draft = 'draft';

    case Published = 'published';

    case Archived = 'archived';

    case Hold = 'hold';
}
