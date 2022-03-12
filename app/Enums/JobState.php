<?php
namespace App\Enums;

/**
 * Class JobState
 *
 * @package \App\Enums
 */
enum JobState: string
{
    case Draft = 'Draft';
    case Published = 'Published';
    case Archived = 'Archived';
    case Hold = 'Hold';
}
