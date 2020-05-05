<div class="row">
            <div class="col-sm-12 col-md-4" style="padding-bottom : 30px ">
              <div class="card text-white bg-danger">
                <div class="card-body"> 
                  <div class="mr-5 float-left">Total User <strong><?php echo $user_count ; ?></strong></div>
                  <div class="mr-5 float-right"><i class="fa fa-fw fa-User"></i>
              </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ; ?>C_Config/data_user">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                  <i class="fa fa-fw fa-arrow-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-sm-12 col-md-4" style="padding-bottom : 30px ">
              <div class="card text-white bg-info">
                <div class="card-body">
                  <div class="mr-5 float-left">Total OLT <strong><?php echo $olt_count ; ?></strong></div>
                  <div class="mr-5 float-right"><i class="fa fa-fw fa-table"></i>
              </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ; ?>C_Config/data_config">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                  <i class="fa fa-fw fa-arrow-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-sm-12 col-md-4" style="padding-bottom : 30px ">
              <div class="card text-white bg-success">
                <div class="card-body">
                  <div class="mr-5 float-left">Total Config <strong><?php echo $grafik_all ; ?></strong></div>
                  <div class="mr-5 float-right"><i class="fa fa-fw fa-dashboard"></i>
              </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ; ?>C_Config/config">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                  <i class="fa fa-fw fa-arrow-right"></i>
                  </span>
                </a>
              </div>
            </div>
  
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
     <div id="chartdivday" style="width: 100%; height: 400px;"></div>
    </div>  
    <div class="col-md-6 col-sm-12">
     <div id="chartdiv" style="width: 100%; height: 400px;"></div>
    </div>
    <div class="col-md-6 col-sm-12">
     <div id="chartdivolt" style="width: 100%; height: 350px;"></div>
    </div>

</div>
<script>

   $(document).ready(function() {
         AmCharts.makeChart("chartdiv",
				{
          "hideCredits":true,
					"type": "serial",
					"categoryField": "category",
					"startDuration": 1,
          "colors": [
						"#F44336"
					],
            "export": {
             "enabled": true
          },
					"categoryAxis": {
						"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[value]]",
							"bullet": "round",
              "bulletBorderAlpha": 1,
              "bulletColor": "#FFFFFF",
							"id": "AmGraph-1",
              "hideBulletsCount": 50,
							"title": "Total Config",
							"valueField": "column-1",
              "useLineColorForBulletBorder": true,
              "balloon":{
                  "drop":true,
                  "maxWidth" : 30 
              }              
						}
          ],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Graphic Total Config "
						}
					],
					"allLabels": [],
          "chartCursor": {
             "limitToGraph":"g1"
          },           
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Graphic Total Config Monthly (<?php echo date(Y) ?>)"
						}
					],
					"dataProvider": [
						{
							"category": "Jan",
							"column-1": <?php echo $grafik_jan ; ?>
						},
						{
							"category": "Feb",
							"column-1": <?php echo $grafik_feb ; ?>
						},
						{
							"category": "Mar",
							"column-1": <?php echo $grafik_mar ; ?>
						},
						{
							"category": "Apr",
							"column-1": <?php echo $grafik_apr ; ?>
						},
						{
							"category": "May",
							"column-1": <?php echo $grafik_may ; ?>
						},
						{
							"category": "Jun",
							"column-1": <?php echo $grafik_jun ; ?>
						},
						{
							"category": "Jul",
							"column-1": <?php echo $grafik_jul ; ?>
						},
						{
							"category": "Aug",
							"column-1": <?php echo $grafik_aug ; ?>
						},
						{
							"category": "Sep",
							"column-1": <?php echo $grafik_sep ; ?>
						},
						{
							"category": "Oct",
							"column-1": <?php echo $grafik_oct ; ?>
						},
						{
							"category": "Nov",
							"column-1": <?php echo $grafik_nov ; ?>
						},
						{
							"category": "Dec",
							"column-1": <?php echo $grafik_dec ; ?>
						}

            
						]
				}
			);    
        var dayconfig = <?php echo json_encode($get_date_history); ?> ;
        var oltconfig = <?php echo json_encode($get_olt_history); ?> ;
        
        AmCharts.makeChart("chartdivday",
				{
          "hideCredits":true,
					"type": "serial",
            "dataDateFormat": "YYYY-MM-DD",
					"categoryField": "date",
					"startDuration": 1,
          "colors": [
						"#F44336"
					],
            "export": {
             "enabled": true
          },
					"categoryAxis": {
            "parseDates": true,
            "dashLength": 1,
            "minorGridEnabled": true,
          },
          "mouseWheelZoomEnabled": true,
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[value]]",
              "bulletColor": "#FFFFFF",
							"id": "AmGraph-1",
              "hideBulletsCount": 50,
							"title": "Total Config",
							"valueField": "total",
              "useLineColorForBulletBorder": true,
              "balloon":{
                  "drop":true,
                  "maxWidth" : 30 
              }              
						}
          ],
          "chartScrollbar": {
              "autoGridCount": true,
              "graph": "g1",
              "backgroundColor" : "#F44336" ,
              "scrollbarHeight": 40
          },
          "chartCursor": {
             "limitToGraph":"g1"
          },           
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Graphic Total Config "
						}
					],
           
					"allLabels": [],
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Graphic Total Config Daily (<?php echo date(Y) ?>)"
						}
					],
					"dataProvider": dayconfig
				}
			);      
           
           
           
           
     var chartolt =  AmCharts.makeChart("chartdivolt",
      {
          "hideCredits":true,
      "type": "serial",
      "categoryField": "device",
      "startDuration": 1,
         "colors": [
						"#F44336"
					],  
            "export": {
             "enabled": true
          },
      "categoryAxis": {
          "gridPosition": "start",
          "labelRotation": 45
       },
      "chartCursor": {
        "enabled": true
      },
      "chartScrollbar": {
        "enabled": true,
        "backgroundColor" : "#F44336",
                    
      },
                  
      "trendLines": [],
      "graphs": [
        {
          "fillAlphas": 1,
          "id": "AmGraph-1",
          "title": "graph 1",
          "type": "column",
          "valueField": "total"
        }
      ],
      "guides": [],
      "valueAxes": [
        {
          "id": "ValueAxis-1",
          "title": "Total Config OLT"
        }
      ],
      "allLabels": [],
      "balloon": {},
      "titles": [
        {
          "id": "Title-1",
          "size": 15,
          "text": "Grafik OLT Usage"
        }
      ],
                          
      "dataProvider": oltconfig 
     }
    );      
    chartolt.addListener("rendered", zoomChart);
    zoomChart();

function zoomChart() {
    chartolt.zoomToIndexes(oltconfig.length - 6, oltconfig.length - 1);
}
    });
</script>
