/// <reference path="../../../../../../../public/static/bower_components/minute/_all.d.ts" />
var Admin;
(function (Admin) {
    var DebugConfigController = (function () {
        function DebugConfigController($scope, $minute, $ui, $timeout, gettext, gettextCatalog) {
            this.$scope = $scope;
            this.$minute = $minute;
            this.$ui = $ui;
            this.$timeout = $timeout;
            this.gettext = gettext;
            this.gettextCatalog = gettextCatalog;
            gettextCatalog.setCurrentLanguage($scope.session.lang || 'en');
            var tabs = $('#' + 'myTabs>li.tab');
            tabs.click(function () {
                tabs.removeClass('active');
                $(this).addClass('active');
            });
        }
        return DebugConfigController;
    }());
    Admin.DebugConfigController = DebugConfigController;
    angular.module('debugConfigApp', ['MinuteFramework', 'AdminApp', 'gettext'])
        .controller('debugConfigController', ['$scope', '$minute', '$ui', '$timeout', 'gettext', 'gettextCatalog', DebugConfigController]);
})(Admin || (Admin = {}));
