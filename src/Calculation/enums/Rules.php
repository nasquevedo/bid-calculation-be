<?php

namespace App\Calculation\enums;

enum Rules: string
{
    case Basic = 'Basic';
    case Special = 'Special';
    case Association = 'Association';
    case Storage = 'Storage';
}