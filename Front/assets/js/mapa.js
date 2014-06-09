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
                {hue: '#fa8273'},
                {saturation: -7},
                {lightness: 21},
                {visibility: 'on'}
            ]
        }, {
            featureType: 'road',
            elementType: 'all',
            stylers: [
                {hue: '#fa8273'},
                {saturation: -7},
                {lightness: 21},
                {visibility: 'on'}
            ]
        }, {
            featureType: 'landscape',
            elementType: 'all',
            stylers: [
                {hue: '#f8ebeb'},
                {saturation: 29},
                {lightness: 52},
                {visibility: 'on'}
            ]
        }
    ];

    var options = {
        mapTypeControlOptions: {
            mapTypeIds: ['Styled']
        },
        center: new google.maps.LatLng( -20.823263, -49.397858),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeId: 'Styled'
    };

    var div = document.getElementById('mapa');
    var map = new google.maps.Map(div, options);
    var styledMapType = new google.maps.StyledMapType(styles, {name: 'Styled'});
    map.mapTypes.set('Styled', styledMapType);
}

initialize();
