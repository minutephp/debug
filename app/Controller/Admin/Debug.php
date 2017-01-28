<?php
/**
 * Created by: MinutePHP framework
 */
namespace App\Controller\Admin {

    use Illuminate\Support\Str;
    use Minute\Cache\QCache;
    use Minute\Database\Database;
    use Minute\Http\Browser;
    use Minute\Routing\RouteEx;
    use Minute\View\Helper;
    use Minute\View\Redirection;
    use Minute\View\View;

    class Debug {
        /**
         * @var string
         */
        protected $adminer;
        /**
         * @var string
         */
        protected $opcache;
        /**
         * @var QCache
         */
        private $cache;
        /**
         * @var Browser
         */
        private $browser;
        /**
         * @var Database
         */
        private $database;

        /**
         * Debug constructor.
         *
         * @param QCache $cache
         * @param Browser $browser
         * @param Database $database
         */
        public function __construct(QCache $cache, Browser $browser, Database $database) {
            $this->cache    = $cache;
            $this->adminer  = sprintf('%s/external/adminer.php', __DIR__);
            $this->opcache  = sprintf('%s/external/opcache.php', __DIR__);
            $this->browser  = $browser;
            $this->database = $database;
        }

        public function phpinfo() {
            phpinfo();
        }

        public function memtest() {
            printf('<p>Storage class: <b>%s</b></p>', get_class($this->cache->getStorage()));
            printf('<p><b>Cache test: All values should be same</b></p>');

            for ($i = 0; $i < 10; $i++) {
                printf('<p>%s</p>', $this->cache->get('cache-test', function () { return Str::random(16); }));
            }

            printf('<hr>');
            printf('<a href="/admin/debug/flush">Flush cache</a>');
        }

        public function adminer() {
            if (!file_exists($this->adminer)) {
                $this->browser->download('https://www.adminer.org/static/download/4.2.5/adminer-4.2.5-mysql-en.php', $this->adminer);
            }

            return new Redirection('/admin/debug/adminer/launch?db=' . $this->database->getDsn()['database'] . '&username=');
        }

        public function opcache() {
            if (!file_exists($this->opcache)) {
                $this->browser->download('https://raw.githubusercontent.com/rlerdorf/opcache-status/master/opcache.php', $this->opcache);
            }

            try {
                include_once($this->opcache);
            } catch (\Throwable $e) {
            }

            exit(0);
        }

        public function flushCache () {
            printf('Cache cleared!');
            $this->cache->flush();
        }

        public function launch() {
            global $conn;
            $conn = $this->database->getDsn();
            include_once $this->adminer;
        }
    }
}

namespace {

    function adminer_object() {
        class AdminerSoftware extends Adminer {
            function credentials() {
                global $conn;

                return array($conn['host'], $conn['username'], $conn['password']);
            }
        }

        return new AdminerSoftware;
	}
}