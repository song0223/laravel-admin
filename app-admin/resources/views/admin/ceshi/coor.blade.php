<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="//cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=0Aa4246cf587e9a9a0385ea930e6b260"></script>

	<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
    <style type="text/css">  
        #container{height:750px;width:100%;}  
        
        .BMap_cpyCtrl {  
	        display: none;  
	    }  
	      
	    .anchorBL {  
	        display: none;  
	    }  
	    #monitor{
	    	width:140px;
	    	height: 55px;
	    	background-image:url('http://127.0.0.1/uni50nadmin/public/images/抬头时间.png');
	    	background-repeat:no-repeat;
	    }
    </style>
</head>
<body>
<img src="{{url('images/商标.png')}}" style="margin-left:4.5%" />
<!-- <img src="{{url('images/4.jpg')}}" onClick="ce()" style="float:right;margin-top:30px;margin-right:20px"/> -->


<div style="border-style:solid;border-color:#87CEFA"></div>
	<div id="container"></div>
	<span style="margin-left:50%">
	<img onClick="ceshi('light')" src="{{url('images/清新蓝.png')}}"/>
	<img onClick="ceshi('dark')" src="{{url('images/黑夜.png')}}"/>
	<img onClick="ceshi('redalert')" src="{{url('images/红色.png')}}"/>
	<img onClick="ceshi('googlelite')" src="{{url('images/精简.png')}}"/>
	<img onClick="ceshi('grassgreen')" src="{{url('images/自然绿.png')}}"/>
	<img onClick="ceshi('midnight')" src="{{url('images/午夜蓝.png')}}"/>
	<img onClick="ceshi('pink')" src="{{url('images/浪漫粉.png')}}"/>
	<img onClick="ceshi('darkgreen')" src="{{url('images/青春绿.png')}}"/>
	<img onClick="ceshi('bluish')" src="{{url('images/蓝绿.png')}}"/>
	<img onClick="ceshi('grayscale')" src="{{url('images/高灰.png')}}"/>
	<img onClick="ceshi('hardedge')" src="{{url('images/qiangbian.png')}}"/>
	<img onClick="ceshi('normal')" src="{{url('images/moren.png')}}"/>
	</span>
	
	<script type="text/javascript">
		var map = new BMap.Map("container"); // 创建地图实例  



		var point00 = new BMap.Point(121.3595930000,31.2280160000); // 创建点坐标  
		map.centerAndZoom(point00,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/yuan.png')}}", new BMap.Size(32,32));
		var marker00 = new BMap.Marker(point00,{icon:myIcon});  // 创建标注
		map.addOverlay(marker00);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts00 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "元一温控" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow00 = new BMap.InfoWindow("地址：上海市长宁区金钟路968号",opts00);
		marker00.addEventListener("click",function(){
			map.openInfoWindow(infoWindow00,point00);
		});



		
		//测试九
		var point0 = new BMap.Point(118.7984550000,31.9051610000); // 创建点坐标  
		map.centerAndZoom(point0,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker0 = new BMap.Marker(point0,{icon:myIcon});  // 创建标注
		map.addOverlay(marker0);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts0 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "南京卫岗乳业" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow0 = new BMap.InfoWindow("地址：南京市江宁区将军大道139号",opts0);
		marker0.addEventListener("click",function(){
			map.openInfoWindow(infoWindow0,point0);
		});


		var point1 = new BMap.Point(121.4613340000,31.2481040000); // 创建点坐标  
		map.centerAndZoom(point1,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker1 = new BMap.Marker(point1,{icon:myIcon});  // 创建标注
		map.addOverlay(marker1);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts1 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "协成国际（顺大）" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow1 = new BMap.InfoWindow("地址：上海市静安区长安路777号",opts1);
		marker1.addEventListener("click",function(){
			map.openInfoWindow(infoWindow1,point1);
		});




		var point2 = new BMap.Point(115.7446230000,28.6490130000); // 创建点坐标  
		map.centerAndZoom(point2,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker2 = new BMap.Marker(point2,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts2 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "南昌亚曼茶业" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow2 = new BMap.InfoWindow("地址：江西省南昌市新建区长堎工业园兴业大道81号",opts2);
		marker2.addEventListener("click",function(){
			map.openInfoWindow(infoWindow2,point2);
		});




		var point3 = new BMap.Point(113.9696550000,23.0537750000); // 创建点坐标  
		map.centerAndZoom(point3,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker3 = new BMap.Marker(point3,{icon:myIcon});  // 创建标注
		map.addOverlay(marker3);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts3 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "黑玫瑰食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow3 = new BMap.InfoWindow("地址：东莞市横沥三江工业区111号",opts3);
		marker3.addEventListener("click",function(){
			map.openInfoWindow(infoWindow3,point3);
		});




		var point4 = new BMap.Point(120.8300340000,31.3216590000); // 创建点坐标  
		map.centerAndZoom(point4,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker4 = new BMap.Marker(point4,{icon:myIcon});  // 创建标注
		map.addOverlay(marker4);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts4 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "尚融科技有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow4 = new BMap.InfoWindow("地址：苏州工业园区新发路68号",opts4);
		marker4.addEventListener("click",function(){
			map.openInfoWindow(infoWindow4,point4);
		});




		var point5 = new BMap.Point(121.3917660000,31.2480630000); // 创建点坐标  
		map.centerAndZoom(point5,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker5 = new BMap.Marker(point5,{icon:myIcon});  // 创建标注
		map.addOverlay(marker5);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts5 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "鼎昊食品（上海）公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow5 = new BMap.InfoWindow("地址：上海真北路1425号麦德龙总部2楼",opts5);
		marker5.addEventListener("click",function(){
			map.openInfoWindow(infoWindow5,point5);
		});


		var point6 = new BMap.Point(121.4415790000,31.2347280000); // 创建点坐标  
		map.centerAndZoom(point6,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker6 = new BMap.Marker(point6,{icon:myIcon});  // 创建标注
		map.addOverlay(marker6);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts6 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "芝心芝意企业管理有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow6 = new BMap.InfoWindow("地址：静安区武宁南路智慧广场488号1504室",opts6);
		marker6.addEventListener("click",function(){
			map.openInfoWindow(infoWindow6,point6);
		});


		var point7 = new BMap.Point(121.4425620000,31.1941610000); // 创建点坐标  
		map.centerAndZoom(point7,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker7 = new BMap.Marker(point7,{icon:myIcon});  // 创建标注
		map.addOverlay(marker7);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts7 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海优蕾贸易有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow7 = new BMap.InfoWindow("地址：上海市漕溪北路398号汇智大厦1702室",opts7);
		marker7.addEventListener("click",function(){
			map.openInfoWindow(infoWindow7,point7);
		});


		var point8 = new BMap.Point(113.5802240000,22.7298940000); // 创建点坐标  
		map.centerAndZoom(point8,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker8 = new BMap.Marker(point8,{icon:myIcon});  // 创建标注
		map.addOverlay(marker8);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts8 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "广州奥昆食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow8 = new BMap.InfoWindow("地址：广州市南沙区榄核镇万祥横街3号",opts8);
		marker8.addEventListener("click",function(){
			map.openInfoWindow(infoWindow8,point8);
		});



		var point9 = new BMap.Point(121.3958680000,31.2119900000); // 创建点坐标  
		map.centerAndZoom(point9,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker9 = new BMap.Marker(point9,{icon:myIcon});  // 创建标注
		map.addOverlay(marker9);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts9 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海允执国际贸易有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow9 = new BMap.InfoWindow("地址：上海长宁区仙霞路577弄4号",opts9);
		marker9.addEventListener("click",function(){
			map.openInfoWindow(infoWindow9,point9);
		});



		var point10 = new BMap.Point(120.4693120000,31.4205510000); // 创建点坐标  
		map.centerAndZoom(point10,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker10 = new BMap.Marker(point10,{icon:myIcon});  // 创建标注
		map.addOverlay(marker10);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts10 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "苏州市欧可巧克力食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow10 = new BMap.InfoWindow("地址：苏州市相城区望亭镇锦湖北路120号",opts10);
		marker10.addEventListener("click",function(){
			map.openInfoWindow(infoWindow10,point10);
		});


		var point11 = new BMap.Point(121.5501720000,31.2815830000); // 创建点坐标  
		map.centerAndZoom(point11,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker11 = new BMap.Marker(point11,{icon:myIcon});  // 创建标注
		map.addOverlay(marker11);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts11 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "百灵恬（上海）国际贸易有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow11 = new BMap.InfoWindow("地址：上海市杨浦区隆昌路588号2号楼2101",opts11);
		marker11.addEventListener("click",function(){
			map.openInfoWindow(infoWindow11,point11);
		});



		var point12 = new BMap.Point(121.5601690000,31.3352130000); // 创建点坐标  
		map.centerAndZoom(point12,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker12 = new BMap.Marker(point12,{icon:myIcon});  // 创建标注
		map.addOverlay(marker12);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts12 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海申古食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow12 = new BMap.InfoWindow("地址：上海市军工路2428号",opts12);
		marker12.addEventListener("click",function(){
			map.openInfoWindow(infoWindow12,point12);
		});



		var point13 = new BMap.Point(121.4037410000,31.2190560000); // 创建点坐标  
		map.centerAndZoom(point13,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker13 = new BMap.Marker(point13,{icon:myIcon});  // 创建标注
		map.addOverlay(marker13);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts13 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海普进贸易有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow13 = new BMap.InfoWindow("地址：上海市天山路600弄2号8楼",opts13);
		marker13.addEventListener("click",function(){
			map.openInfoWindow(infoWindow13,point13);
		});



		var point14 = new BMap.Point(121.3536980000,31.1436810000); // 创建点坐标  
		map.centerAndZoom(point14,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker14 = new BMap.Marker(point14,{icon:myIcon});  // 创建标注
		map.addOverlay(marker14);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts14 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海广福来实业有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow14 = new BMap.InfoWindow("地址：上海市闵行区中春路7001号D座1006室",opts14);
		marker14.addEventListener("click",function(){
			map.openInfoWindow(infoWindow14,point14);
		});



		var point15 = new BMap.Point(121.3748020000,31.1770150000); // 创建点坐标  
		map.centerAndZoom(point15,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker15 = new BMap.Marker(point15,{icon:myIcon});  // 创建标注
		map.addOverlay(marker15);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts15 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "杭州味全食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow15 = new BMap.InfoWindow("地址：上海市闵行区吴中路1688号C栋2楼",opts15);
		marker15.addEventListener("click",function(){
			map.openInfoWindow(infoWindow15,point15);
		});



		var point16 = new BMap.Point(119.4237560000,36.5110330000); // 创建点坐标  
		map.centerAndZoom(point16,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker16 = new BMap.Marker(point16,{icon:myIcon});  // 创建标注
		map.addOverlay(marker16);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts16 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "山东新和盛农牧集团有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow16 = new BMap.InfoWindow("地址：山东省潍坊市峡山生态经济开发区",opts16);
		marker16.addEventListener("click",function(){
			map.openInfoWindow(infoWindow16,point16);
		});




		var point17 = new BMap.Point(121.5260600000,31.0911250000); // 创建点坐标  
		map.centerAndZoom(point17,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker17 = new BMap.Marker(point17,{icon:myIcon});  // 创建标注
		map.addOverlay(marker17);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts17 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海百吉食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow17 = new BMap.InfoWindow("地址：上海市闵行区三鲁公路3585号5栋",opts17);
		marker17.addEventListener("click",function(){
			map.openInfoWindow(infoWindow17,point17);
		});




		var point18 = new BMap.Point(121.3509840000,31.1435120000); // 创建点坐标  
		map.centerAndZoom(point18,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker18 = new BMap.Marker(point18,{icon:myIcon});  // 创建标注
		map.addOverlay(marker18);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts18 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海憶霖食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow18 = new BMap.InfoWindow("地址：上海市闵行区中春路7039弄88号-5",opts18);
		marker18.addEventListener("click",function(){
			map.openInfoWindow(infoWindow18,point18);
		});




		var point19 = new BMap.Point(121.4094170000,31.1843830000); // 创建点坐标  
		map.centerAndZoom(point19,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker19 = new BMap.Marker(point19,{icon:myIcon});  // 创建标注
		map.addOverlay(marker19);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts19 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "凯爱瑞" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow19 = new BMap.InfoWindow("地址：上海市漕河泾开发区钦州北路1122号92号楼4楼",opts19);
		marker19.addEventListener("click",function(){
			map.openInfoWindow(infoWindow19,point19);
		});



		var point20 = new BMap.Point(121.2194980000,30.7951780000); // 创建点坐标  
		map.centerAndZoom(point20,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker20 = new BMap.Marker(point20,{icon:myIcon});  // 创建标注
		map.addOverlay(marker20);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts20 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海酣畅食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow20 = new BMap.InfoWindow("地址：上海市金山区廊下镇漕廊公路6996号3栋底层A",opts20);
		marker20.addEventListener("click",function(){
			map.openInfoWindow(infoWindow20,point20);
		});



		var point21 = new BMap.Point(114.1285670000,22.5482570000); // 创建点坐标  
		map.centerAndZoom(point21,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker21 = new BMap.Marker(point21,{icon:myIcon});  // 创建标注
		map.addOverlay(marker21);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts21 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "法念食品贸易（深圳）有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow21 = new BMap.InfoWindow("地址：深圳市罗湖区东门南路3005号2302室",opts21);
		marker21.addEventListener("click",function(){
			map.openInfoWindow(infoWindow21,point21);
		});





		var point22 = new BMap.Point(121.4478230000,31.1910600000); // 创建点坐标  
		map.centerAndZoom(point22,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker22 = new BMap.Marker(point22,{icon:myIcon});  // 创建标注
		map.addOverlay(marker22);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts22 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海亚太国际蔬菜有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow22 = new BMap.InfoWindow("地址：上海市徐汇区斜土路2899甲号A座701室",opts22);
		marker22.addEventListener("click",function(){
			map.openInfoWindow(infoWindow22,point22);
		});



		var point23 = new BMap.Point(113.8183120000,22.6813640000); // 创建点坐标  
		map.centerAndZoom(point23,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker23 = new BMap.Marker(point23,{icon:myIcon});  // 创建标注
		map.addOverlay(marker23);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts23 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "深圳西诺咖啡机制造公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow23 = new BMap.InfoWindow("地址：深圳宝安沙井新和大道丽诚科技工业园G栋3楼",opts23);
		marker23.addEventListener("click",function(){
			map.openInfoWindow(infoWindow23,point23);
		});




		var point24 = new BMap.Point(113.8936240000,22.7750920000); // 创建点坐标  
		map.centerAndZoom(point24,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker24 = new BMap.Marker(point24,{icon:myIcon});  // 创建标注
		map.addOverlay(marker24);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts24 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "深圳市优饮尚品食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow24 = new BMap.InfoWindow("地址：深圳市光明新区公明街道合水社区伯尼大厦4楼",opts24);
		marker24.addEventListener("click",function(){
			map.openInfoWindow(infoWindow24,point24);
		});





		var point25 = new BMap.Point(121.5377040000,31.0328110000); // 创建点坐标  
		map.centerAndZoom(point25,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker25 = new BMap.Marker(point25,{icon:myIcon});  // 创建标注
		map.addOverlay(marker25);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts25 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海荣悦贸易有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow25 = new BMap.InfoWindow("地址：上海市闵行区东晨南路4号",opts25);
		marker25.addEventListener("click",function(){
			map.openInfoWindow(infoWindow25,point25);
		});





		var point26 = new BMap.Point(121.4669410000,30.9576810000); // 创建点坐标  
		map.centerAndZoom(point26,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker26 = new BMap.Marker(point26,{icon:myIcon});  // 创建标注
		map.addOverlay(marker26);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts26 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海芝心芝意企业管理有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow26 = new BMap.InfoWindow("地址：上海市奉贤区工业综合开发区远东路818号1幢2层",opts26);
		marker26.addEventListener("click",function(){
			map.openInfoWindow(infoWindow26,point26);
		});



		var point27 = new BMap.Point(121.4233500000,31.1935810000); // 创建点坐标  
		map.centerAndZoom(point27,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker27 = new BMap.Marker(point27,{icon:myIcon});  // 创建标注
		map.addOverlay(marker27);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts27 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海世源供应链管理有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow27 = new BMap.InfoWindow("地址：上海市徐汇区吴中路51号1号楼1108-1110室",opts27);
		marker27.addEventListener("click",function(){
			map.openInfoWindow(infoWindow27,point27);
		});



		var point28 = new BMap.Point(121.3216670000,31.2029800000); // 创建点坐标  
		map.centerAndZoom(point28,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker28 = new BMap.Marker(point28,{icon:myIcon});  // 创建标注
		map.addOverlay(marker28);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts28 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "希杰上海商贸有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow28 = new BMap.InfoWindow("地址：上海闵行区申长路988号虹桥万科7号楼706室",opts28);
		marker28.addEventListener("click",function(){
			map.openInfoWindow(infoWindow28,point28);
		});




		var point29 = new BMap.Point(106.3230930000,38.5388790000); // 创建点坐标  
		map.centerAndZoom(point29,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/gong.png')}}", new BMap.Size(32,32));
		var marker29 = new BMap.Marker(point29,{icon:myIcon});  // 创建标注
		map.addOverlay(marker29);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts29 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "宁夏塞尚乳业有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"供应商"
		}
		var infoWindow29 = new BMap.InfoWindow("地址：宁夏银川德胜工业园区伊园路5号",opts29);
		marker29.addEventListener("click",function(){
			map.openInfoWindow(infoWindow29,point29);
		});





		


		//更换地图的样式模版
		function ceshi(id){
			var  mapStyle ={ 
			        features: ["road", "building","water","land"],//隐藏地图上的poi
			        style :id  //设置地图风格为高端黑
			    }
			map.setMapStyle(mapStyle);
			function checkhHtml5()   
		        {   
		            if (typeof(Worker) === "undefined")     
		            {   
		                if(navigator.userAgent.indexOf("MSIE 9.0")<=0)  
					   	{  
					 	 	alert("定制个性地图示例：IE9以下不兼容，推荐使用百度浏览器、chrome、firefox、safari、IE10");   
					   	}  
		            }  
		        }
			checkhHtml5();
    	}



  //   	//进入全屏
		// function requestFullScreen(element){
		//     var de = document.querySelector(element) || document.documentElement;
		//     if(de.requestFullscreen){
		//         de.requestFullscreen();
		//     }else if(de.mozRequestFullScreen){
		//         de.mozRequestFullScreen();
		//     }else if(de.webkitRequestFullScreen){
		//         de.webkitRequestFullScreen();
		//     }
		// }
		// //点击进入全屏
		// function ce(){
		// 	requestFullScreen('.content');
		// }
	</script>
</body>
</html>	


   

