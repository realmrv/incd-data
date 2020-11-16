<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Data
 * @package App\Models
 *
 * @property string $last_name
 * @property string $first_name
 * @property string $page_uid
 */
class Data extends Model
{
    use HasFactory;
}
