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
		var point0 = new BMap.Point(113.2578470000,23.1445910000); // 创建点坐标  
		map.centerAndZoom(point0,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker0 = new BMap.Marker(point0,{icon:myIcon});  // 创建标注
		map.addOverlay(marker0);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts0 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "广州市苏达物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow0 = new BMap.InfoWindow("地址：广州市越秀区流花路",opts0);
		marker0.addEventListener("click",function(){
			map.openInfoWindow(infoWindow0,point0);
		});


		var point1 = new BMap.Point(121.2950000000,31.3785960000); // 创建点坐标  
		map.centerAndZoom(point1,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker1 = new BMap.Marker(point1,{icon:myIcon});  // 创建标注
		map.addOverlay(marker1);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts1 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "重庆雪峰冷藏物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow1 = new BMap.InfoWindow("地址：上海市嘉定区申霞路33号一楼雪峰冷藏物流上海分公司 ",opts1);
		marker1.addEventListener("click",function(){
			map.openInfoWindow(infoWindow1,point1);
		});




		var point2 = new BMap.Point(120.4046540000,36.1112830000); // 创建点坐标  
		map.centerAndZoom(point2,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker2 = new BMap.Marker(point2,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts2 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "青岛众合顺达物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow2 = new BMap.InfoWindow("地址：青岛市市北区福州北路159号昕苑丽都B座1302室",opts2);
		marker2.addEventListener("click",function(){
			map.openInfoWindow(infoWindow2,point2);
		});




		var point3 = new BMap.Point(120.6540280000,31.3149170000); // 创建点坐标  
		map.centerAndZoom(point3,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker3 = new BMap.Marker(point3,{icon:myIcon});  // 创建标注
		map.addOverlay(marker3);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts3 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "苏州加创冷链物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow3 = new BMap.InfoWindow("地址：江苏省苏州市锦书清华里4栋",opts3);
		marker3.addEventListener("click",function(){
			map.openInfoWindow(infoWindow3,point3);
		});




		var point4 = new BMap.Point(121.3705450000,31.1286470000); // 创建点坐标  
		map.centerAndZoom(point4,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker4 = new BMap.Marker(point4,{icon:myIcon});  // 创建标注
		map.addOverlay(marker4);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts4 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海裕络物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow4 = new BMap.InfoWindow("地址：上海市闵行区秀文路898号西子国际中心1号楼905",opts4);
		marker4.addEventListener("click",function(){
			map.openInfoWindow(infoWindow4,point4);
		});



		var point5 = new BMap.Point(121.3596860000,31.2227430000); // 创建点坐标  
		map.centerAndZoom(point5,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker5 = new BMap.Marker(point5,{icon:myIcon});  // 创建标注
		map.addOverlay(marker5);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts5 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海诺尔国际物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow5 = new BMap.InfoWindow("地址：上海市广顺路33号D南栋200室",opts5);
		marker5.addEventListener("click",function(){
			map.openInfoWindow(infoWindow5,point5);
		});


		var point6 = new BMap.Point(114.2795160000,30.5622430000); // 创建点坐标  
		map.centerAndZoom(point6,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker6 = new BMap.Marker(point6,{icon:myIcon});  // 创建标注
		map.addOverlay(marker6);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts6 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "武汉佑康肉类保鲜食品配送有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow6 = new BMap.InfoWindow("地址：湖北省武汉市汉阳区龟北路龟北花园4栋4单元102 ",opts6);
		marker6.addEventListener("click",function(){
			map.openInfoWindow(infoWindow6,point6);
		});


		var point7 = new BMap.Point(120.7390480000,31.3147180000); // 创建点坐标  
		map.centerAndZoom(point7,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker7 = new BMap.Marker(point7,{icon:myIcon});  // 创建标注
		map.addOverlay(marker7);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts7 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "镇江恒伟供应链股份有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow7 = new BMap.InfoWindow("地址：苏州园区南施街1号伊顿花园27-205",opts7);
		marker7.addEventListener("click",function(){
			map.openInfoWindow(infoWindow7,point7);
		});


		var point8 = new BMap.Point(121.4269660000,31.0684170000); // 创建点坐标  
		map.centerAndZoom(point8,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker8 = new BMap.Marker(point8,{icon:myIcon});  // 创建标注
		map.addOverlay(marker8);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts8 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海市闵行区都会路" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow8 = new BMap.InfoWindow("地址：上海市闵行区都会路",opts8);
		marker8.addEventListener("click",function(){
			map.openInfoWindow(infoWindow8,point8);
		});



		var point9 = new BMap.Point(121.4138160000,31.2134910000); // 创建点坐标  
		map.centerAndZoom(point9,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker9 = new BMap.Marker(point9,{icon:myIcon});  // 创建标注
		map.addOverlay(marker9);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts9 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海世源供应链管理有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow9 = new BMap.InfoWindow("地址：上海市遵义路100号",opts9);
		marker9.addEventListener("click",function(){
			map.openInfoWindow(infoWindow9,point9);
		});



		var point10 = new BMap.Point(121.3626240000,31.0315740000); // 创建点坐标  
		map.centerAndZoom(point10,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker10 = new BMap.Marker(point10,{icon:myIcon});  // 创建标注
		map.addOverlay(marker10);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts10 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海广德物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow10 = new BMap.InfoWindow("地址：上海市闵行区中青路",opts10);
		marker10.addEventListener("click",function(){
			map.openInfoWindow(infoWindow10,point10);
		});


		var point11 = new BMap.Point(102.7480950000,25.0063550000); // 创建点坐标  
		map.centerAndZoom(point11,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker11 = new BMap.Marker(point11,{icon:myIcon});  // 创建标注
		map.addOverlay(marker11);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts11 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "昆明银翔航空货运服务有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow11 = new BMap.InfoWindow("地址：昆明市春城路巫坝老机场东航货运处",opts11);
		marker11.addEventListener("click",function(){
			map.openInfoWindow(infoWindow11,point11);
		});



		var point12 = new BMap.Point(121.4218400000,31.2041970000); // 创建点坐标  
		map.centerAndZoom(point12,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker12 = new BMap.Marker(point12,{icon:myIcon});  // 创建标注
		map.addOverlay(marker12);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts12 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海中科浩飞物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow12 = new BMap.InfoWindow("地址：上海市中山西路1065号3101室",opts12);
		marker12.addEventListener("click",function(){
			map.openInfoWindow(infoWindow12,point12);
		});



		var point13 = new BMap.Point(121.4476700000,31.191841000); // 创建点坐标  
		map.centerAndZoom(point13,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker13 = new BMap.Marker(point13,{icon:myIcon});  // 创建标注
		map.addOverlay(marker13);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts13 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "上海途靠物流有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow13 = new BMap.InfoWindow("地址：上海市徐汇区斜土路2899甲号光启文化广场A座701室",opts13);
		marker13.addEventListener("click",function(){
			map.openInfoWindow(infoWindow13,point13);
		});



		var point14 = new BMap.Point(121.3748020000,31.1770150000); // 创建点坐标  
		map.centerAndZoom(point14,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker14 = new BMap.Marker(point14,{icon:myIcon});  // 创建标注
		map.addOverlay(marker14);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts14 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "杭州味全食品有限公司" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow14 = new BMap.InfoWindow("地址：上海市闵行区吴中路1688号C栋2楼",opts14);
		marker14.addEventListener("click",function(){
			map.openInfoWindow(infoWindow14,point14);
		});



		var point15 = new BMap.Point(121.4569670000,31.2270150000); // 创建点坐标  
		map.centerAndZoom(point15,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker15 = new BMap.Marker(point15,{icon:myIcon});  // 创建标注
		map.addOverlay(marker15);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts15 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "法国商会-Bridor" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow15 = new BMap.InfoWindow("地址：上海市静安区富民路83号2楼",opts15);
		marker15.addEventListener("click",function(){
			map.openInfoWindow(infoWindow15,point15);
		});



		var point16 = new BMap.Point(113.3211960000,23.1026680000); // 创建点坐标  
		map.centerAndZoom(point16,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/cang.png')}}", new BMap.Size(32,32));
		var marker16 = new BMap.Marker(point16,{icon:myIcon});  // 创建标注
		map.addOverlay(marker16);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts16 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,      // 信息窗口高度
		  title : "索玛集团 食品事业部" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"物流公司"
		}
		var infoWindow16 = new BMap.InfoWindow("地址：广州市海珠区广州大道南448号财智大厦2001房",opts16);
		marker16.addEventListener("click",function(){
			map.openInfoWindow(infoWindow16,point16);
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


   

