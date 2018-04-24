<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA_Compatible" content="IE=Edge, chrome=1">
  	<link type="text/css" rel="stylesheet" href="{{url('css/crystal.css')}}" />
  	<script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=0Aa4246cf587e9a9a0385ea930e6b260"></script>
    <title>元一</title>
    <style type="text/css">  
    	html,body{width:100%;overflow-x:hidden;}
        #container{height:753px;width:100%;}  
       
        .BMap_cpyCtrl {  
	        display: none;  
	    }  
	    .anchorBL {  
	        display: none;  
	    }  
    </style>
</head>
<body>

<div class="main" id="top">
    <!-- header头部start -->
    <div class="m-hd">
    	<div class="right">
    		<img src="{{url('images/4.jpg')}}" onClick="ce()" style="float:right;margin-top:30px;margin-right:20px"/>
    		<div class="timer">PM</div>
    		<div class="time" id="main">
    			<span style="letter-spacing:11px"><?php echo date('H',time())?></span>&nbsp;
    			<span style="letter-spacing:9px;margin-right:0px;margin-left:5px"><?php echo date('i',time())?></span>
    		</div>
    	</div>
   <div class="logo"><img src="{{url('images/logo.png')}}" /> </div>
                
  </div>
<!--content start -->
<div class="content">
<!--left start-->
<div class="c-left">
	<!--车辆温控 start-->
	<div class="cl-vehicle" style="width:89%;">
		<div class="clv-top"><img src="{{url('images/02.png')}}"/></div>
	   <div class="clv-c">
	   		   	    <div class="clv-cr">
	   	    	  <p><img src="{{url('images/08.png')}}">温度</p>
	   	    	  <p><img src="{{url('images/08.png')}}">配送状态</p>
	   	    </div>

	   	    <div class="clv-cl">
	   	    	 <p><img src="{{url('images/03.png')}}"/>冷藏</p>
	   	    	  <p><img src="{{url('images/04.png')}}"/>15-18°c</p>
	   	    	   <p><img src="{{url('images/05.png')}}"/>平均18°c</p>
	   	    	    <p><img src="{{url('images/06.png')}}"/>驾驶中</p>
	   	    	     <p><img src="{{url('images/07.png')}}"/>8:45PM</p>
	   	    </div>
	   	    <div class="clv-cc"><img src="{{url('images/14_1.png')}}" /> </div>
	   </div>
       <div class="clv-d">

       	 <div class="clv-dd">
       	   <div class="clv-dc on">
       	   	<p><img src="images/10.png" style="margin-left:5%"/>&nbsp;&nbsp;沪123456 </p>
       	   	<p>正在配送中</p>
       	   </div>
       	          	   <div class="clv-dc">
       	   	<p><img src="images/10.png" style="margin-left:5%"/>&nbsp;&nbsp;沪123456 </p>
       	   	<p>正在配送中</p>
       	   </div>
       	          	   <div class="clv-dc">
       	   	<p><img src="images/10.png" style="margin-left:5%"/>&nbsp;&nbsp;沪123456 </p>
       	   	<p>正在配送中</p>
       	   </div>
       	  </div>

       	  <div class="clv-dchi">
       	  	<span  class="left"><a><img src="images/16.png" /> </a></span>
       	  	<a class="on"></a>
       	  	<a></a>
       	  	<a></a>
       	  	<a></a>
       	  	<span  class="right"><a> <img src="images/15.png" /> </a></span>
       	  </div>
       </div>
           
	</div>
	<!--车辆温控 end-->
	<!--订单信息 start-->
	     <div class="cl-order" style="width:89%">
	 	<div class="clv-top">
	 		<img src="images/17.png"/ style="width:31%">
	 		<div class="clv-tr" style="width:69%;margin-top:3px">
	 			<span><img src="images/18.png" />未配送 </span>
	 			<span><img src="images/19.png" />正在配送 </span>
	 			<span><img src="images/20.png" />详情信息 </span>
	 			<span><img src="images/21.png" />发货地址 </span>
	 			<span><img src="images/22.png" />收货地址 </span>
	 			<span><img src="images/23.png" />订单正常</span>
	 			<span><img src="images/24.png" />订单异常 </span>
	 		</div>
	 	</div>

	     	<div class="clorder-c">
	     		
	     		<div class="clv-cl">
	   	    	 	<p><img src="images/25.png"/>116014297878787</p>

	   	    	 	<?php foreach ($list as $key => $val):?>
	   	    	  	<p><img src="images/25.png"/>{!!$val->order_num!!}</p>
		   	    	   <p>	   	    	   	
		   	    	   	<img src="images/26.png"/>{!!$val->vehicle_num!!}
		   	    	   	<img class="right" src="images/20.png" />
		   	    	   	<img class="right" src="images/19.png" />
		   	    	   </p>
		   	    	<?php endforeach;?>

	   	    	    <p><img src="images/25.png"/>116014297878787</p>
	   	        </div>

	     		<div class="clv-cl clv-cl2">
					   	    	 <p><img src="images/27.png"/>上海市浦东新区新江湾海域
				1330号11栋c座1301室</p>
					   	    	 <p><img src="images/28.png"/>上海市杨浦区打虎山路1330
				号11栋c座1301室</p>
	   	    	     
	   	    	</div>
	     	</div>
	     	
	     	
	     	
	     	
	     </div>
	<!--订单信息  end-->
</div>
<!--left end-->
<!--c-con start-->
<div class="c-con" style="width:38.8%;margin-left:-2.5%">
	<div id="container"></div>
	<span style="margin-left:45%">
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

	
</div>
<!--c-con end-->
<!--right start-->
<div class="c-right" style="width:27%">
	    <!--数据统计  start-->
	        
	        	<!-- <div class="clv-top"><img src="images/29.png"/></div>
	        	<div class="cr-num-c">
	        		<img src="images/30.png" />
	        	</div> -->
	        	<iframe src="{{url('tji')}}" height="380px" width="400px"></iframe>
	        	
	        
	    <!--数据统计  end-->
</div>
<!--right end-->




</div>
<!--content end-->


</div> 


<script type="text/javascript">
		var map = new BMap.Map("container"); // 创建地图实例  
		var type= new Array();
		//测试一
		var point = new BMap.Point(121.3604540000,31.2242570000);  // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放    
		//系统默认小图标代码(两行)
		//var marker = new BMap.Marker(point);        // 创建标注    
		//map.addOverlay(marker);                     // 将标注添加到地图中   
		//更换默认的地图小图标 
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);              // 将标注添加到地图中
		//测试二
		var poin = new BMap.Point(116.404,39.915);  // 创建点坐标  
		map.centerAndZoom(poin,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(poin,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);              // 将标注添加到地图中
		//测试三
		var point = new BMap.Point(114.3684990000,30.6128890000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中
		//测试四
		var point = new BMap.Point(121.3877020000,31.2605110000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中
		//测试五
		var point = new BMap.Point(121.3624050000,31.2400120000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中
		//测试六
		var point = new BMap.Point(121.3172750000,31.2659440000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中

		//测试六
		var point = new BMap.Point(104.7084680000,30.8018620000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中


		//测试六
		var point = new BMap.Point(111.9840960000,40.2223770000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中


		//测试六
		var point = new BMap.Point(123.9055440000,42.3317280000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中



		//测试六
		var point = new BMap.Point(102.7912110000,24.8232820000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中



		//测试六
		var point = new BMap.Point(108.8140350000,28.7677920000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中




		//测试六
		var point = new BMap.Point(115.8050070000,28.1173220000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中


		//测试六
		var point = new BMap.Point(105.4289320000,36.5984080000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中




		//测试六
		var point = new BMap.Point(113.6709210000,24.8732110000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中




		//测试六
		var point = new BMap.Point(113.6959450000,34.7912250000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中








		//测试七
		var point = new BMap.Point(121.4095490000,31.2977920000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中
		//测试八
		var poin = new BMap.Point(121.4621530000,31.2701410000); // 创建点坐标  
		map.centerAndZoom(poin,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker1 = new BMap.Marker(poin,{icon:myIcon});  // 创建标注
		map.addOverlay(marker1);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts1 = {
		  width : 100,     // 信息窗口宽度
		  height: 70,     // 信息窗口高度
		  title : "海底捞" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"吃火锅了~"
		}
		var infoWindow1 = new BMap.InfoWindow("地址：上海市浦东新区东昌路",opts1);
		marker1.addEventListener("click",function(){
			map.openInfoWindow(infoWindow1,poin);
		});
		//测试九
		var point = new BMap.Point(121.3365340000,31.2076490000); // 创建点坐标  
		map.centerAndZoom(point,5);
		map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
		var myIcon = new BMap.Icon("{{url('images/a1.png')}}", new BMap.Size(23,25));
		var marker2 = new BMap.Marker(point,{icon:myIcon});  // 创建标注
		map.addOverlay(marker2);      // 将标注添加到地图中
		//点击小图标,弹出图标标注信息详情
		var opts = {
		  width : 100,     // 信息窗口宽度
		  height: 70,     // 信息窗口高度
		  title : "海底捞火锅店" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"吃火锅了~"
		}
		var infoWindow = new BMap.InfoWindow("地址：上海市闵行区新虹街道建设村",opts);
		marker2.addEventListener("click",function(){
			map.openInfoWindow(infoWindow,point);
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
    	//进入全屏
		function requestFullScreen(element){
		    var de = document.querySelector(element) || document.documentElement;
		    if(de.requestFullscreen){
		        de.requestFullscreen();
		    }else if(de.mozRequestFullScreen){
		        de.mozRequestFullScreen();
		    }else if(de.webkitRequestFullScreen){
		        de.webkitRequestFullScreen();
		    }
		}
		//点击进入全屏
		function ce(){
			requestFullScreen('#container');
		}
	</script>



</body>
</html>
