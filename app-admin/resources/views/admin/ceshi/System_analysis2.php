<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta http-equiv="X-UA_Compatible" content="IE=Edge, chrome=1">
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
		<link rel="stylesheet" href="css/tji/animsition.css" />
		<link rel="stylesheet" href="css/tji/drop-down.css" />
		<link rel="stylesheet" href="css/tji/t_common.css" />
		<link rel="stylesheet" href="css/tji/system.css" />
	</head>
	<body>
		<div style="background: white; solid #efeff5; width: 390px; overflow: hidden;">
			<div id="main3" style="height:360px; width: 390px; clear: both; border-top: 10px solid #efeff5;"></div>
		</div>
		<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
		<script src="http://www.jq22.com/jquery/jquery-ui-1.11.0.js"></script>
		<script src="js/tji/select-widget-min.js"></script>
		<script src="js/tji/jquery.animsition.min.js"></script>
		<script src="https://cdn.bootcss.com/echarts/3.5.3/echarts.min.js"></script>
		<script src="js/tji/macarons.js"></script>
		<script src="js/tji/common.js"></script>
		
		<script>
			$(document).ready(function() {
  			 
			    // 基于准备好的dom，初始化echarts实例
				var myChart3 = echarts.init(document.getElementById('main3'),'macarons');
		        // 指定图表的配置项和数据
				var date = ['2018/04/1','2018/04/2','2018/04/3','2018/04/4','2018/04/5','2018/04/6','2018/04/7','2018/04/8','2018/04/9','2018/04/10',
				'2018/04/11','2018/04/12','2018/04/13','2018/04/14','2018/04/15','2018/04/16','2018/04/17','2018/04/18'
				,'2018/04/19','2018/04/20','2018/04/21','2018/04/22','2018/04/23','2018/04/24','2018/04/25','2018/04/26','2018/04/27'
				,'2018/04/28','2018/04/29','2018/04/30'];
				
				
				function my_data(){
					var data = [];
					for( var i =0; i<30; i++){
						data.push(Math.round(Math.random() * (500 - 100) + 100));
					};
					return data;
				}
				
				var option3 = {
					title : {
				        text: '数据统计'
				    },
				    
				    tooltip : {
				        trigger: 'axis',
				        /* axisPointer : {         // 坐标轴指示器，坐标轴触发有效
				            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
				        }*/
				    },
				   
				    toolbox: {
				        show : true,
				        feature : {
				            mark : {show: true},
				            dataView : {show: true, readOnly: false},
				            magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
				            restore : {show: true},
				            saveAsImage : {show: true}
				        }
				    },
				    calculable : true,
				    xAxis : [
				        {
				            type : 'category',
				            boundaryGap : true,
				            data : date
				        }
				    ],
				    yAxis : [
				        {
				            type : 'value'
				        }
				    ],
				     grid: {
				        left: '3%',
				        right: '4%',
				        containLabel: true
				    },
				    dataZoom: [{
				        type: 'inside',
				        start: 74,
				        end: 100,
				    }, {
				        start: 74,
				        end: 100,
				        handleSize: '80%',
				        handleStyle: {
				            color: '#fff',
				            shadowBlur: 3,
				            shadowColor: 'rgba(0, 0, 0, 0.6)',
				            shadowOffsetX: 2,
				            shadowOffsetY: 2
				        }
				    }],
				    series : [
				        {
				            name:'日报',
				            type:'bar',
				            stack: '总量',
				            barMaxWidth : 30,
				            //itemStyle: {normal: {areaStyle: {type: 'default'}}},
				            data:my_data()
				        },
				        {
				            name:'周报',
				            type:'bar',
				            stack: '总量',
				            //itemStyle: {normal: {areaStyle: {type: 'default'}}},
				            data:my_data()
				        },
				        {
				            name:'月报',
				            type:'bar',
				            stack: '总量',
				            //itemStyle: {normal: {areaStyle: {type: 'default'}}},
				            data:my_data()
				        },
				        {
				            name:'年报',
				            type:'bar',
				            stack: '总量',
				            //itemStyle: {normal: {areaStyle: {type: 'default'}}},
				            data:my_data()
				        }
				    ]
				};
						
				
		        // 使用刚指定的配置项和数据显示图表。
		       
			 	myChart3.setOption(option3);
			 
			 	
			 	
			 	
			});
		</script>
	</body>
</html>
