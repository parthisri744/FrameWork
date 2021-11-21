<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Table Class
class Table {
	// Class Variable
	private  $table_data=[];
	private $sql ,$theme ,$autoloadTime ,$pagination ,$defaultpagesize ,$table_filter ,$top_head;
	private $tableName,$tableApp,$tableCtrl,$globalSearch;
	private $thead = [],$data = [],$sorting =[],$data_type = [],$buttonName=[],$buttonLink=[];
	private $buttonTitle=[] ,$buttonColor=[] ,$filter=[], $filterType=[] ,$filterLabel=[];
	// Constructor
	public function __construct($data){
		$this->table_data = $data;
		//print_r($this->table_data);
		$this->Generate_Table();
		$this->create_table();
		//var_dump($this->pagination);
	}
	//Create  Table
	private function create_table(){
		$html  = "<md-card ng-init='loadData()' ng-cloak>";
		$html .= $this->table_top();
		$html .= " <md-table-container>";
		$html .= "<div style='background-color:white' class='padded'>";
		$html .= $this->create_filter();
		if($this->globalSearch=="yes"){
		$html .= $this->create_global_filter();
	    }
		$html .= "</div>";
		$html .= "<table layout-align='center center'  md-table md-row-select='options.rowSelection' multiple='{{options.multiSelect}}' md-progress='promise'>";
		$html .= $this->table_body();
		$html .= "</table>";
		$html .= "</md-table-container>";
		$html .= $this->table_body_footer();
		$html .= "</md-card>";
		$html .=  $this->Table_Script();
		echo $html;
	}
	// Table top Header
	private function table_top(){
		$html = '<md-toolbar class="md-accent">
		<div class="md-toolbar-tools">
			&nbsp;
			<span><strong>'. $this->top_head.'</strong></span>

			<div flex></div>  
			'.$this->create_button().' 
			<md-button class="md-icon-button md-raised" ng-click="loadStuff()">
				<md-icon>refresh</md-icon>
			</md-button>
		</div>
	</md-toolbar>';
	return $html;
	}
	// Table Body
	private function table_body(){
		$table  = $this->table_body_header();
		$table .= $this->table_body_content();
		return $table;
	}
	// Table Body Header
	private function table_body_header(){
		$table = "<thead md-head md-order='query.order' md-on-reorder='logOrder'>";
		$table .= "<tr md-row>";
		$table .= "<th md-column><span>SI.No</span></th>";
		for($i=0;$i < sizeof($this->thead);$i++){
			if($this->sorting[$i]==="yes"){
				$table .= "<th md-column md-order-by='".$this->data[$i]."'><span>".$this->thead[$i]."</span></th>";
			}else{
				$table .= "<th md-column ><span>".$this->thead[$i]."</span></th>";
			}
		}
		$table .= "</tr>";
		$table .= "</thead>";
		return  $table;  
	}
	// Get table Data Form DataBase
	private function fetch_table_data(){
		try {
		$database = new PDO("mysql:host=localhost;dbname=parthisri","root", "");
		$sql = $this->sql;
		$stmt = $database->query($sql);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($data);
		} catch (PDOException $e) {
		die("Could not connect to the database :" . $e->getMessage());
		}  
	}	
	// Table Body Content
	private function table_body_content(){
		$index = 1;
		$table = "<tbody md-body>";
		$table .= "<tr  md-row ng-repeat='codebox in codeboxdata| orderBy: query.order | limitTo: query.limit : (query.page -1) * query.limit $this->table_filter'>";
		$table .= "<td md-cell>{{".'$index'." +1}}</td>";
		for($i=0;$i<sizeof($this->data);$i++){

			if($this->data_type[$i]=="output"){ 
			$table .= "<td md-cell>{{codebox.".$this->data[$i]."}}</td>";
			}elseif($this->data_type[$i]=="string"){
				$table .= "<td md-cell>".is_string($this->data[$i])."</td>";
			}elseif($this->data_type[$i]=="int"){
				$table .= "<td md-cell>".intval($this->data[$i])."</td>";
			}elseif($this->data_type[$i]=="select"){
				$table .='<td md-cell><md-checkbox name="checkbox" aria-label="checkbox" ng-model="checkbox" ng-value="{{cust.ID}}"></md-checkbox></td>';
			}elseif($this->data_type[$i]=="button"){
				$table .= '<td md-cell><md-button class="md-primary md-raised"  ng-href="'.$this->sorting[$i].'">'.$this->data[$i].'</md-button></td>';
			}
		}
		$table .= "</tr>";
		$table .= "</tbody>";
		return  $table;   
		
	}

	// Table body Footer
	private function table_body_footer(){
		if($this->pagination=="show"){
		$table  = '<md-toolbar class="md-accent">';
		$table .= '<md-table-pagination md-limit="query.limit" md-limit-options="limitOptions" md-page="query.page" md-total="{{codeboxdata.length}}" md-page-select="options.pageSelect" md-boundary-links="options.boundaryLinks" md-on-paginate="logPagination"></md-table-pagination>';
		$table .= '</md-toolbar>';
		return $table;
	    }
	}
	private function create_button(){
		$btn='';
		for($i=0;$i<sizeof($this->buttonTitle);$i++){
		      $btn .= '<md-button class="md-raised" ng-href="'.$this->buttonLink[$i].'" style="color:white;background-color:'.$this->buttonColor[$i].'">'.$this->buttonTitle[$i].'</md-button>';
		}
		return $btn;
	}
	private function create_filter(){
		$filter ='';
		for($i=0;$i<sizeof($this->filter);$i++){
			  if($this->filterType[$i]=="text"){
			   $filter.='<md-input-container align="center" style="padding:5px">';
			   $filter.='<label>Search '.$this->filterLabel[$i].'</label>';
			//    $filter.='<md-icon md-svg-src="img/icons/ic_person_24px.svg" class="name"></md-icon>';
			   $filter.='<input ng-model="search'.$this->filter[$i].'" type="text">';
			   $filter.='</md-input-container>';
			   $this->table_filter .= '| filter: {"'.$this->filter[$i].'": search'.$this->filter[$i].'}';
			  }
 		}
		return $filter;
	}
	private function create_global_filter(){
			   $filter='<md-input-container>';
			   $filter.='<label>Global Search</label>';
			 //  $filter.='<md-icon md-svg-src="img/icons/ic_person_24px.svg" class="name"></md-icon>';
			   $filter.='<input ng-model="globalsearch" type="text">';
			   $filter.='</md-input-container>';
			   $this->table_filter .= '| filter: globalsearch';
	        	return $filter;
	}
	private function search_select_option($i){
			$filter  ='<md-input-container>'; 
			$filter .='<label>Select '.$this->filterLabel[$i].'</label>';
			$filter .='<md-select ng-model="search'.$this->filter[$i].'">';
			$filter .='<md-option ng-repeat="codeboxgender in codeboxdata  track by codeboxdata.'.$this->filter[$i].' " value="{{codeboxdata.'.$this->filter[$i].'}}">';
			$filter .='{{codeboxgender.'.$this->filter[$i].'}}';
			$filter .='</md-option>';
			$filter .='</md-select>';
			$filter .='</md-input-container>';
			$this->table_filter .= '| filter: {"'.$this->filter[$i].'": search'.$this->filter[$i].'}';
	}
	private function Generate_Table(){
		foreach($this->table_data as $key=>$value){
			//print_r($key);
			if(is_array($value) && $key=="data"){
				foreach($value as $key=>$value) {
					array_push($this->thead,$key);
					for($i=0;$i<sizeof($value);){
						array_push($this->data_type,isset($value[0])? htmlspecialchars($value[0]) : "");
						array_push($this->data,isset($value[1])? htmlspecialchars($value[1]) : "");
						array_push($this->sorting,isset($value[2])? htmlspecialchars($value[2]) : "no");
						break;
					}
				 }
			}elseif($key=="header"){
			//	print_r($value);
				$this->top_head =isset($value['title']) ? htmlspecialchars($value['title']) : "";
				$this->theme = isset($value['theme']) ? htmlspecialchars($value['theme']) : "blue";
				$this->autoload = isset($value['autoload']) ? htmlspecialchars($value['autoload']) : "no";
				$this->autoloadTime = isset($value['time']) ? htmlspecialchars($value['time']) : "2000";
				$this->globalSearch = isset($value['globalsearch']) ? htmlspecialchars($value['globalsearch']) : "yes";
			}elseif($key=="pagination"){
						//print_r($value);
					 $this->pagination =isset($value['option']) ? htmlspecialchars($value['option']) : "show";
					 $this->defaultpagesize =isset($value['pagesize']) ? htmlspecialchars($value['pagesize']) : "10";
			}elseif($key=="button"){
				//print_r($value);
				foreach($value as $key=>$value) {
					array_push($this->buttonTitle,$key);
					if(is_array($value)){
					 	for($i=0;$i<sizeof($value);){
							array_push($this->buttonName,isset($value[0]) ? htmlspecialchars($value[0]) : "");
							array_push($this->buttonLink,isset($value[1]) ? htmlspecialchars($value[1]) : "");
							array_push($this->buttonColor,isset($value[2]) ? htmlspecialchars($value[2]) : "");
						break;
					 	}
					 }
				}
			}elseif($key=="filter"){
				foreach($value as $key=>$value) {
					array_push($this->filter,$key);
					if(is_array($value)){
						for($i=0;$i<sizeof($value);){
							array_push($this->filterLabel,isset($value[0]) ? htmlspecialchars($value[0]) : "");
							array_push($this->filterType,isset($value[1]) ? htmlspecialchars($value[1]) : "");
							break;
						}
					}
				}
			}elseif($key=="table"){
				$this->tableName= isset($value['name']) ? htmlspecialchars($value['name']) : "test_table";
			    $this->tableApp=isset($value['app']) ? htmlspecialchars($value['app']) : "CodeDrive";
				$this->tableCtrl=isset($value['controller']) ? htmlspecialchars($value['controller']) : "CodeDriveCtrl";
		    }else{
				$this->sql = $this->table_data["sql"];
			}
	    }
	}
	public function __destruct(){
		//$this->Table_Script();
	}
	private function Table_Script(){   ?>
		<script>
			var app = angular.module('<?php echo isset($this->tableApp) ? htmlspecialchars($this->tableApp) : "CodeDrive"; ?>', ['ngMaterial', 'md.data.table'])
			.config(['$mdThemingProvider', function ($mdThemingProvider) {
				'use strict';
				$mdThemingProvider
				.theme('default')
				.primaryPalette('<?php echo (isset($this->theme) && strlen($this->theme)>2) ? $this->theme : "blue"  ?>')
				.accentPalette('<?php echo (isset($this->theme) && strlen($this->theme)>2) ? $this->theme : "blue"  ?>')
				.warnPalette('red')
				.backgroundPalette('grey');
			}])

			 app.controller('<?php echo isset($this->tableCtrl) ? htmlspecialchars($this->tableCtrl) : "CodeDriveCtrl";  ?>', ['$mdEditDialog', '$q', '$scope', '$timeout', '$http', '$interval', function ($mdEditDialog, $q, $scope, $timeout, $http, $interval) {
				//$scope.selected = [];
				<?php if($this->pagination=="show"){  ?>
				$scope.limitOptions = [10,50,100,400,500,1000];

				$scope.codeboxdata = [];

				$scope.options = {
					rowSelection: false,
					multiSelect: true,
					autoSelect: true,
					decapitate: false,
					largeEditDialog: true,
					boundaryLinks: true,
					limitSelect: true,
					pageSelect: true
				};

				$scope.query = {
					order: 'ID',
					limit: <?php echo $this->defaultpagesize; ?>,
					page: 1
				};
				<?php   }   ?>
				$scope.loadData=function() {
					var result = <?php $this->fetch_table_data();  ?>;
			     	$scope.codeboxdata =result;
				} 
			<?php	if($this->autoload=="yes"){  ?>
				$interval(function () {
					$scope.promise = $timeout(function () {
						$http({
							url: "GetData.php",  
							dataType: 'json', 
							method: 'POST', 
							data : {sql : '<?php echo $this->sql ?>'}
						}).success(function (response) {
							$scope.codeboxdata = response;
						}).error(function (error) {
							alert(JSON.stringify(error));
						})
					}, <?php  echo isset($this->autoloadTime) ? $this->autoloadTime : "2000" ?>);      
				}, 10000);
			  <?php }  ?>
				$scope.toggleLimitOptions = function () {
					$scope.limitOptions = $scope.limitOptions ? undefined : [5, 10, 15];
				};
				$scope.loadStuff = function () {
					$scope.promise = $timeout(function () {
						$http({
							url: "GetData.php",  
							dataType: 'json', 
							method: 'POST', 
							data : {sql : '<?php echo $this->sql ?>'}
						}).success(function (response) {
						//	debugger;
							$scope.codeboxdata = response;
							//console.log("reloading Successfully");
						}).error(function (error) {
							alert(JSON.stringify(error));
						})
					}, 2000);
				}

				$scope.logItem = function (item) {
					console.log(item.name, 'was selected');
				};

				$scope.logOrder = function (order) {
					console.log('order: ', order);
				};

				$scope.logPagination = function (page, limit) {
					console.log('page: ', page);
					console.log('limit: ', limit);
				}

			}]);
		</script>    
		<?php
		 }
}
?>