angular.module("templates-backend", []).run(["$templateCache", function($templateCache) {$templateCache.put("options/backend.html","    <div ng-controller=\"OptionsCtrl\">\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\"></label>\n            <label class=\"col-lg-2 control-label\">Texto</label>\n            <label class=\"col-lg-2 control-label\">Valor</label>\n        </div><!--form control-->\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\">Opción 1</label>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Texto\" name=\"option[opt1][text]\" type=\"text\" ng-model=\"options.opt1.text\">\n            </div>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Valor\" name=\"option[opt1][value]\" type=\"text\" ng-model=\"options.opt1.value\">\n            </div>\n        </div><!--form control-->\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\">Opción 2</label>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Texto\" name=\"option[opt2][text]\" type=\"text\" ng-model=\"options.opt2.text\">\n            </div>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Valor\" name=\"option[opt2][value]\" type=\"text\" ng-model=\"options.opt2.value\">\n            </div>\n        </div><!--form control-->\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\">Opción 3</label>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Texto\" name=\"option[opt3][text]\" type=\"text\" ng-model=\"options.opt3.text\">\n            </div>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Valor\" name=\"option[opt3][value]\" type=\"text\" ng-model=\"options.opt3.value\">\n            </div>\n        </div><!--form control-->\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\">Opción 4</label>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Texto\" name=\"option[opt4][text]\" type=\"text\" ng-model=\"options.opt4.text\">\n            </div>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Valor\" name=\"option[opt4][value]\" type=\"text\" ng-model=\"options.opt4.value\">\n            </div>\n        </div><!--form control-->\n\n    </div>\n");
$templateCache.put("slider/backend.html","    <div ng-controller=\"SliderCtrl\">\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\"></label>\n            <label class=\"col-lg-2 control-label\">Texto</label>\n            <label class=\"col-lg-2 control-label\">Valor</label>\n        </div><!--form control-->\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\">Mínimo</label>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Texto\" name=\"option[min][text]\" type=\"text\" ng-model=\"options.min.text\">\n            </div>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Valor\" name=\"option[min][value]\" type=\"text\" ng-model=\"options.min.value\">\n            </div>\n        </div><!--form control-->\n\n    	<div class=\"form-group\">\n            <label class=\"col-lg-2 control-label\">Máximo</label>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Texto\" name=\"option[max][text]\" type=\"text\" ng-model=\"options.max.text\">\n            </div>\n            <div class=\"col-lg-2\">\n				<input class=\"form-control\" placeholder=\"Valor\" name=\"option[max][value]\" type=\"text\" ng-model=\"options.max.value\">\n            </div>\n        </div><!--form control-->\n\n    </div>\n");}]);
//# sourceMappingURL=templates-backend.js.map
