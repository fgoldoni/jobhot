<?php
namespace App\Enums;

/**
 * Class CategoryType
 *
 * @package \App\Enums
 */
enum CategoryType: string
{
    case Area = 'area';
    case Industry = 'industry';
    case JobType = 'jobType';
    case JobLevel = 'jobLevel';
    case Gender = 'gender';
}
