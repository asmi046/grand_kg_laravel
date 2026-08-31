<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>

    ymaps.ready(init);

    function init () {
        let centerMap =[{{ $geo }}]
        var myMap = new ymaps.Map("map_in_page", {
            // Координаты центра карты
            center: centerMap,
            // Масштаб карты
            zoom: 17,
            // Выключаем все управление картой
            controls: ['geolocationControl','zoomControl']
        });

        var myGeoObjects = [];


        var clusterer = new ymaps.Clusterer({
            clusterDisableClickZoom: false,
            clusterOpenBalloonOnClick: false,
            preset: 'islands#greenClusterIcons',
        });

        myGeoObjects = new ymaps.Placemark([{{ $geo }}],
            {
                hintContent: '<div class="map-hint">{{ $adres }}</div>',
                balloonContent: '<div class="map-hint"><b>«{{$name}}»</b> <br/> {{ $adres }} <br/>  {{ $phone }} </div>',
            }, {
                preset: 'islands#icon',
                iconColor: '#2E85B6'
            }

        );
        clusterer.add(myGeoObjects);

        myMap.geoObjects.add(clusterer);
        // Отключим zoom
        myMap.behaviors.disable('scrollZoom');

    }

</script>

<div id="map_in_page" class="map_in_page">

</div>
