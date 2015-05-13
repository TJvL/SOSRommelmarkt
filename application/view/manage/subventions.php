
<?php Type::check("ArrayList:SubventionRequest", $model) ?>

<div class="container">
    <div class="white">
        <div class="row">
            <div class="span8">             
                <div class="widget stacked ">
                    <div class="widget-header">
                        <i class="icon-user"></i>
                        <h3>Instellingen</h3>
                    </div> 
                    <div class="widget-content">
                        <div class="tabbable"> <!-- Only required for left/right tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">Subsidie verzoeken</a></li>
                                <li><a href="#tab2" data-toggle="tab">Subsidie content</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1">
                                    <div class="container" ng-app="subventionApp" ng-controller="subventionController">
                                        <div class="white">
                                            <div class="row">
                                                <div class="col-sm-12">

                                                    <h1>Subsidie verzoeken</h1>

                                                    <!-- TODO: Message if there are no subventions-->

                                                    <!-- Status filters for subventions -->

                                                    <button class="btn btn-red" ng-click="statusFilter = null">Alles</button>
                                                    <button class="btn btn-red" ng-click="statusFilter = {status:'nieuw'}">Nieuw</button>
                                                    <button class="btn btn-red" ng-click="statusFilter = {status:'geaccepteerd'}">Geaccepteerd</button>
                                                    <button class="btn btn-red" ng-click="statusFilter = {status:'afgewezen'}">Afgewezen</button>

                                                    <!-- Collapse list of all subventions -->
                                                    <div class="list-group collapse-group margin-ver-lg">

                                                        <div ng-repeat="subventionRequest in subventions | filter:statusFilter">

                                                            <a class="list-group-item collapse-group-item col-md-8">
                                                                <div class="collapse-button col-md-12">
                                                                    <div class="col-sm-8">
                                                                        <h4 class="list-group-item-heading">{{subventionRequest.firm}}</h4>
                                                                        <p class="list-group-item-text">{{subventionRequest.elucidation}}</p>
                                                                    </div>
                                                                    <div class="col-sm-4"><p>Status: {{subventionRequest.status}}<i class="fa fa-expand fa-2x pull-right"></i></p></div>
                                                                </div>
                                                                <div class="collapse col-md-12">
                                                                 <div class="table-responsive">
                                                                    <table class="table table-condensed col-md-8">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">Contactpersoon</th>
                                                                                <td>{{subventionRequest.contactperson}}</td>
                                                                            </tr>


                                                                            <tr>
                                                                                <th scope="row">Onderneming</th>
                                                                                <td>{{subventionRequest.firm}}</td>
                                                                            </tr>


                                                                            <tr>
                                                                                <th scope="row">KVK</th>
                                                                                <td>{{subventionRequest.kvk}}</td>
                                                                            </tr>


                                                                            <tr>
                                                                                <th scope="row">Adres</th>
                                                                                <td>{{subventionRequest.adress}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Postcode</th>
                                                                                <td>{{subventionRequest.postalcode}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Plaats</th>
                                                                                <td>{{subventionRequest.city}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Telefoon (1)</th>
                                                                                <td>{{subventionRequest.phonenumber1}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Telefoon (2)</th>
                                                                                <td>{{subventionRequest.phonenumber2}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Fax</th>
                                                                                <td>{{subventionRequest.fax}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">E-Mail</th>
                                                                                <td>{{subventionRequest.email}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Toelichting</th>
                                                                                <td>{{subventionRequest.elucidation}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Activiteiten</th>
                                                                                <td>{{subventionRequest.activities}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">Resultaten</th>
                                                                                <td>{{subventionRequest.results}}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                     </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-8"><!-- just a spacer --></div>
                                                                        <div class="col-md-4">

                                                                                <button id="{{subventionRequest.id}}" onClick="print_sub(this.id)" type="button" title="Print" class="btn btn-default">
                                                                                    <span class="glyphicon glyphicon-print  col-sm-1" aria-hidden="true"></span>
                                                                                </button>

                                                                                <!-- TODO: Change delete js function to request in manage controller -->
                                                                                <button id="{{subventionRequest.id}}" onClick="delete_sub(this.id)" type="button" title="Print" class="btn btn-default">
                                                                                    <span class="glyphicon glyphicon-trash col-sm-1" aria-hidden="true"></span>
                                                                                </button>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="col-md-4">

                                                                <form class="form-inline" action="<?php echo ROOT_PATH;?>/manage/changeSubventionStatus" method="Post">

                                                                    <div class="input-group">
                                                                        <input type='hidden' name='id' value={{subventionRequest.id}}>
                                                                        <input type='hidden' name='status' value={{selectedStatus}}>

                                                                        <select class="form-control" ng-model="selectedStatus"
                                                                                ng-options="opt as opt for opt in statuses">
                                                                        </select>

                                                                        </select>
                                                                         <span class="input-group-btn">
                                                                            <input type="submit" title="Change quantity" class="btn btn-red" value="Verander status">
                                                                         </span>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                            <!--Load the collapse again after filtering -->
                                                            <script>loadCollapse()</script>

                                                        </div><!--End of repeat-->

                                                    </div>
                                                </div>

                                                <script>
                                                    var app = angular.module("subventionApp", []);
                                                    app.controller("subventionController", function($scope){
                                                        $scope.subventions = <?php echo $model->getJSON(); ?>;
                                                        $scope.statuses = <?php echo json_encode(SubventionRequest::getAllStatuses()); ?>;
                                                        $scope.selectedStatus = $scope.statuses[2];

                                                    });

                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab2">

                                    <p>test</p>
                                </div>
                            </div>


