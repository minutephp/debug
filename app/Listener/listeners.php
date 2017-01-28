<?php

/** @var Binding $binding */
use Minute\Event\AdminEvent;
use Minute\Event\Binding;
use Minute\Event\TodoEvent;
use Minute\Menu\DebugMenu;
use Minute\Todo\DebugTodo;

$binding->addMultiple([
    //debug
    ['event' => AdminEvent::IMPORT_ADMIN_MENU_LINKS, 'handler' => [DebugMenu::class, 'adminLinks']],

    //tasks
    ['event' => TodoEvent::IMPORT_TODO_ADMIN, 'handler' => [DebugTodo::class, 'getTodoList']],
]);