<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html >
<html lang="es">
    <head>
    	<title>jqGrid Básico(1) - Basico. </title>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_URL("assets/css/jquery-ui.css");?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_URL("assets/css/ui.jqgrid.css");?>" />
    
    </head>
    <body>
      <h1>La Grilla</h1>
    	
		<table id='list'></table>


		<script src="<?php echo base_URL("assets/js/jquery.js");?>" type="text/javascript"></script>
    	<script src="<?php echo base_URL("assets/js/i18n/grid.locale-es.js");?>" type="text/javascript"></script>
    	<script src="<?php echo base_URL("assets/js/jquery.jqGrid.min.js");?>" type="text/javascript"></script>
    	<script src="<?php echo base_URL("assets/js/jquery-ui.js");?>" type="text/javascript"></script>
		<script type="text/javascript">
			var mydata = [ {id:"1",invdate:"2007-10-01",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"}, {id:"2",invdate:"2007-10-02",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"}, {id:"3",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"}, {id:"4",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"}, {id:"5",invdate:"2007-10-05",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"}, {id:"6",invdate:"2007-09-06",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"}, {id:"7",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"}, {id:"8",invdate:"2007-10-03",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"}, {id:"9",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"} ];
			jQuery(document).ready(function(){
				$("#list").jqGrid({ 
					datatype: "local", 
					height: 250, 
					colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'], 
					colModel:[ 
						{name:'id',index:'id', width:60}, 
						{name:'invdate',index:'invdate', width:90}, 
						{name:'name',index:'name', width:100},
						{name:'amount',index:'amount', width:80, align:"right"}, 
						{name:'tax',index:'tax', width:80, align:"right"}, 
						{name:'total',index:'total', width:80,align:"right"}, 
						{name:'note',index:'note', width:150, sortable:false}
					], 
					caption: "http://sosinformatico.blogspot.com",
					altRows: true
				});
				for(var i=0;i<=mydata.length;i++) 
					jQuery("#list").jqGrid('addRowData',i+1,mydata[i]);
			});
		</script>
	</body>

  	

</html>