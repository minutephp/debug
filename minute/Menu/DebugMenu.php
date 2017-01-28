<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 7/8/2016
 * Time: 7:57 PM
 */
namespace Minute\Menu {

    use Minute\Event\ImportEvent;

    class DebugMenu {
        public function adminLinks(ImportEvent $event) {
            $links = [
                'debug' => ['title' => 'Debug tools', 'icon' => 'fa-code', 'priority' => 98, 'parent' => 'expert', 'href' => '/admin/debug']
            ];

            $event->addContent($links);
        }
    }
}