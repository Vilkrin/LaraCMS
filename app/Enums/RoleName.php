<?php

namespace App\Enums;

enum RoleName: string
{
  case ADMIN = 'admin';
  case EDITOR = 'editor';
  case STAFF = 'staff';
  case CUSTOMER = 'customer';
}
