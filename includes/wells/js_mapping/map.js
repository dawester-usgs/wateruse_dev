 var usgsWellsMapping = {
			ESRITopoBaseMapURI : 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}',
			map: null,
			wellsLayer:null,
			largeMapShown:false,
			layer: [2,3,8,9],
			data : [],
			
			wellMapInit : function(){
					map = L.map('map');	

					L.esri.basemapLayer('Gray').addTo(map);
					L.tileLayer(this.ESRITopoBaseMapURI).addTo(map);
					map.setView([34.746483  , -92.289597], 7); /* SET THE VIEW FOCUSED ON LITTLE ROCK,AR*/
					this.getLayer();
					this.getDataFromLayer(this.layer);
					
					
			},
			
			getLayer : function(){
				L.esri.featureLayer({
					url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8',
					color: '#BA454E',
					opacity: 0.25
				  }).addTo(map);
			},
			
			
			getDataFromLayer: function(e,layer){
				
			
				map.on('click',function(e){
				
					boundary = L.esri.query({
							url: 'https://gis.arkansas.gov/arcgis/rest/services/FEATURESERVICES/Boundaries/FeatureServer/8'
					});
					boundary.nearby(e.latlng,1);
					boundary.run(function(error,featureCollection,response){
						isBound = featureCollection.features.length;
					
					if (isBound ==1){
						$.each(usgsWellsMapping.layer,function(i,item){
							var url = 'https://gis.arkansas.gov/arcgis/rest/services/BASEMAP_DYNAMIC/MapServer/'+item
							
							var dynamicQuery =L.esri.query({
										url:url,
										returnGeometry:false
								});
							dynamicQuery.nearby(e.latlng,1);
							dynamicQuery.run(function(error,featureCollection,response){
								
								if(featureCollection !=null || featureCollection != "undefined"){
								
									if (item == '2'){
										quad_nm = featureCollection.features[0].properties.QUAD_NAME;
										$("#quad_nm").val(quad_nm);
										
									}else if (item =='9'){
										section = featureCollection.features[0].properties.SECTION_;
										county = featureCollection.features[0].properties.COUNTY;
										township = featureCollection.features[0].properties.TOWNSHIP;
										range = featureCollection.features[0].properties.RANGE;
										$("#section").val(section);
										$("#county").val(county);
										$("#township").val(township.replace(" ",""));
										$("#range").val(range.replace(" ",""));
									}else if (item == '3'){
										onefourthquad = featureCollection.features[0].properties.QUAD_NAME;
										direction = featureCollection.features[0].properties.DIRECTION;
										$("#onefourth").val(quad_nm);
										$("#direction").val(direction);	
									}else if(item=='8'){
										huc = featureCollection.features[0].properties.HUC_8;
										$("#huc").val(huc);
									}
									
								}
								});
						});
						
						$.ajax({
								type: 'GET',
								url: 'https://nationalmap.gov/epqs/pqs.php?x='+e.latlng.lng+'&y='+e.latlng.lat+'&units=Feet'+'&output=json',
								ContentType:"application/json",
								dataType:"json",
								async: "false",
								success:function(data){
									$.each(data,function(i,item){
										elevation = data['USGS_Elevation_Point_Query_Service'].Elevation_Query['Elevation'];
										if (elevation){
												$("#elevation").val(elevation);
											}
												
										});
									}

							});
						var quad1 = $("#quad_nm").val();
						var onefourth1 = $("#onefourth").val();
						var section1 = $("#section").val();
						var range1 = $("#range").val();
						var township1 = $("#township").val();
						var lat1 = $("#lat").val();
						var lng1 = $("#lng").val();
						var direction1 = $("#direction").val();
						var elevation1 = $("#elevation").val();
						var county1 = $("#county").val();
						var content;
						if (quad1 !='' && section !=''){
								content = 'Information for County: <strong>'+county1+'</strong>\
												<br>\
												Latitude: <strong>'+e.latlng.lat+'</strong>\
												<br>\
												Longitude: <strong>'+e.latlng.lng+'</strong>\
												<br>\
												Quad name: <strong>'+quad1+'</strong>\
												<br>\
												1/4 Quad name: <strong>'+onefourthquad+'</strong>\
												<br>\
												Section: <strong>'+section1+'</strong>\
												<br>\
												Range: <strong>'+range1+'</strong>\
												<br>\
												Township: <strong>'+township1+'</strong>\
												<br>\
												Direction: <strong>'+direction1+'</strong>\
												<br>\
												Elevation: <strong>'+elevation1+'</strong>\
												<br>\
												<br>\
												<a href="#"> Associate this ... </a>\
												';
								console.log(county1,quad1,section1);
							}
							var popup = L.popup();
								popup
								.setLatLng(e.latlng)
								.setContent(content)
								.openOn(map);
						
						
					}else{
						alert("out of bounds");
					}
					
					
					
						
				});
					
			});
		}
  
  }

  $(document).ready(function(){
  
	usgsWellsMapping.wellMapInit();
	$('#myModal').on('show.bs.modal', function(){
	  setTimeout(function() {
		map.invalidateSize();
	  }, 10);
	 });
  });
	
		