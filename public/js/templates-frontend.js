angular.module("templates-frontend", []).run(["$templateCache", function($templateCache) {$templateCache.put("options/frontend.html","<div class=\"md-padding\">\n	<div layout=\"row\">\n	<h2 class=\"d-display-3\">\n		{{question.description}}\n\n		<md-input-container>\n			<label ng-hide=\"question.answer\">< SELECCIONAR ></label>\n			<md-select ng-model=\"question.answer\" md-on-open=\"openSelect()\" md-on-close=\"closeSelect()\">\n	          <md-option ng-repeat=\"opt in question.options\" ng-value=\"opt\">\n	            {{opt.text}}\n	          </md-option>\n	        </md-select>\n	    </md-input-container>\n\n		{{question.description_suffix}}\n	</h2>\n	</div>\n</div>\n");
$templateCache.put("slider/frontend.html","<div ng-controller=\"SliderCtrl\">\nFRONTEND! slider\n</div>\n");}]);
//# sourceMappingURL=templates-frontend.js.map
