angular.module("templates-frontend", []).run(["$templateCache", function($templateCache) {$templateCache.put("options/frontend.html","<div ng-controller=\"OptionsCtrl\">\n	<button class=\"btn btn-default btn-lg\" ng-repeat=\"(key, opt) in question.options\" ng-click=\"clickAnswer(opt)\">{{opt.text}}</button>\n</div>\n");
$templateCache.put("slider/frontend.html","<div ng-controller=\"SliderCtrl\">\nFRONTEND! slider\n</div>\n");}]);
//# sourceMappingURL=templates-frontend.js.map
