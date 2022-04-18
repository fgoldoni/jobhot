<?php
namespace App\Enums;

/**
 * Class JobState
 *
 * @package \App\Enums
 */
enum JobState: string
{
    case Draft = 'draft';

    case Published = 'published';

    case Archived = 'archived';

    case Hold = 'hold';
}
