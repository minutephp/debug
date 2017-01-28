/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />

module Admin {
    export class DebugConfigController {
        constructor(public $scope: any, public $minute: any, public $ui: any, public $timeout: ng.ITimeoutService,
                    public gettext: angular.gettext.gettextFunction, public gettextCatalog: angular.gettext.gettextCatalog) {

            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');

            let tabs = $('#' + 'myTabs>li.tab');
            tabs.click(function () {
                tabs.removeClass('active');
                $(this).addClass('active');
            });
        }
    }

    angular.module('debugConfigApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('debugConfigController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', DebugConfigController]);
}
