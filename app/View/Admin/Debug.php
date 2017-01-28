<div class="content-wrapper ng-cloak" ng-app="debugConfigApp" ng-controller="debugConfigController as mainCtrl" ng-init="init()">
    <div class="padded">
        <section class="content-header">
            <h1>
                <span translate="">Quick Debugger</span>
            </h1>

            <ol class="breadcrumb">
                <li><a href="" ng-href="/admin"><i class="fa fa-dashboard"></i> <span translate="">Admin</span></a></li>
                <li class="active"><i class="fa fa-cog"></i> <span translate="">Debugger</span></li>
            </ol>
        </section>

        <section class="content">
            <form class="form-horizontal" name="debugForm" ng-submit="mainCtrl.save()">
                <div class="box box-{{debugForm.$valid && 'success' || 'danger'}}">
                    <div class="box-header with-border">
                        <span><span translate="">Setup</span> Debug</span>
                    </div>

                    <div class="box-body">
                        <div class="bs-docs-example">
                            <ul id="myTabs" class="nav nav-tabs">
                                <li class="active tab"><a ng-href="/admin/debug/phpinfo" target="theFrame">PhpInfo()</a></li>
                                <li class="tab"><a ng-href="/admin/debug/memtest" target="theFrame">Memcache test</a></li>
                                <li class="tab"><a ng-href="/admin/debug/opcache" target="theFrame">Opcache status</a></li>
                                <li><a ng-href="/admin/debug/adminer" target="_blank">Adminer</a></li>
                            </ul>
                        </div>
                        <div id="preview">
                            <iframe width="100%" height="100%" style="min-height:600px;" src="/admin/debug/phpinfo" frameborder="NO" id="theFrame" name="theFrame"></iframe>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
