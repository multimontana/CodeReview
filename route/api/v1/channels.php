<?php

use App\Broadcasting\Admin\AdminTestChannel;
use Illuminate\Support\Facades\Broadcast;

/**
 * Эвенты не в коем случаи не должны дублироваться,
 * в объеих каналах (web/api/v1/channels/php, admin/api/v1/channels/php)
 */

/**
 * Было сделанно для тестового подключения,
 * проверенне на клиенте все работает *
 */
Broadcast::channel('admin-test', AdminTestChannel::class);

