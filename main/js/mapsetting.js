function initialize() {
  var latlng = new google.maps.LatLng(35.172753, 136.909913);
  var myOptions = {
    zoom: 17,/*拡大比率*/
    center: latlng,/*表示枠内の中心点*/
    scrollwheel: false,
    mapTypeControlOptions: { mapTypeIds: ['sample', google.maps.MapTypeId.ROADMAP] }/*表示タイプの指定*/
  };
  var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
  /*アイコン設定*/
  var icon = new google.maps.MarkerImage('/main/lib/images/icon/map.png',
    new google.maps.Size(77,99),/*アイコンサイズ設定*/
    new google.maps.Point(0,0)/*アイコン位置設定*/
    );
  var markerOptions = {
    position: latlng,
    map: map,
    icon: icon,
    title: '株式会社クラフツ',
  };
  var marker = new google.maps.Marker(markerOptions);
  /*取得スタイルの貼り付け*/
  var styleOptions = [
  {
    "stylers": [
    { "saturation": -100 },
    { "visibility": "simplified" },
    { "lightness": 22 }
    ]
  }
  ];
  var styledMapOptions = { name: '株式会社クラフツ' }
  var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
  map.mapTypes.set('sample', sampleType);
  map.setMapTypeId('sample');
}
google.maps.event.addDomListener(window, 'load', initialize);
