var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {	
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	
    var styles = [
		{
			featureType: 'road.highway',
			elementType: 'all',
			stylers: [
				{ hue: '#fa8273' },
				{ saturation: -7 },
				{ lightness: 21 },
				{ visibility: 'on' }
			]
		},{
			featureType: 'road',
			elementType: 'all',
			stylers: [
				{ hue: '#fa8273' },
				{ saturation: -7 },
				{ lightness: 21 },
				{ visibility: 'on' }
			]
		},{
			featureType: 'landscape',
			elementType: 'all',
			stylers: [
				{ hue: '#f8ebeb' },
				{ saturation: 29 },
				{ lightness: 52 },
				{ visibility: 'on' }
			]
		}
	];

    var options = {
    	mapTypeControlOptions: {
			mapTypeIds: [ 'Styled']
		},
        center: new google.maps.LatLng(-20.823032756039623, -49.41631380000001),
		zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeId: 'Styled'
    };

    var div = document.getElementById('mapa');
var map = new google.maps.Map(div, options);
var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
map.mapTypes.set('Styled', styledMapType);
}

initialize();

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}

	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

function carregarPontos() {
	
	$.getJSON('js/pontos.json', function(pontos) {
		
		var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(pontos, function(index, ponto) {
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
				title: "Meu ponto personalizado! :-D",
				icon: 'img/marcador.png'
			});
			
			var myOptions = {
				content: "<p>" + ponto.Descricao + "</p>",
				pixelOffset: new google.maps.Size(-150, 0)
        	};

			infoBox[ponto.Id] = new InfoBox(myOptions);
			infoBox[ponto.Id].marker = marker;
			
			infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
				abrirInfoBox(ponto.Id, marker);
			});
			
			markers.push(marker);
			
			latlngbounds.extend(marker.position);
			
		});
		
		var markerCluster = new MarkerClusterer(map, markers);
		
		map.fitBounds(latlngbounds);
		
	});
	
}

carregarPontos();