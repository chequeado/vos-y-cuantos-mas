<p class="answer-selection" ng-show="!saving">
    <span ng-if="votes.total_option>1">Además: De las <strong>@{{votes.total_question}} personas</strong> que jugaron este juego, <strong>@{{votes.total_option}}</strong> contestaron como vos. Esto representa el <strong>@{{((votes.total_option*100)/votes.total_question).toFixed(1)}}%</strong>.</span>
    <span ng-if="votes.total_option==1 && votes.total_question>1">De las <strong>@{{votes.total_question}} personas</strong> que jugaron este juego, sos la primera que contesta de esta manera. Esto representa el <strong>@{{((votes.total_option*100)/votes.total_question).toFixed(1)}}%</strong>.</span>
</p>
<p class="answer-selection" ng-show="saving">Calculando "Vos y cuántos más"...</p>
