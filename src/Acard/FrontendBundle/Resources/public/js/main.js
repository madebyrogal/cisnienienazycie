(function($) {
	$.fn.equalHeights = function(minHeight, maxHeight) {
		tallest = (minHeight) ? minHeight : 0;
		this.each(function() {
			if($(this).height() > tallest) {
				tallest = $(this).height();
			}
		});
		if((maxHeight) && tallest > maxHeight) tallest = maxHeight;
		return this.each(function() {
			$(this).removeAttr("style").height(tallest).css("overflow","hidden");
		});
	};
})(jQuery);

var equalHeightsSet = function() {
	$(".m-teaser-box-desc p").equalHeights();

	if ($("body").hasClass("contact-page")) {
		$(".col-sm-8, .col-sm-4").equalHeights();

	}
};

function selectBoxes() {
	var selectBox = $(".selectBox");

    selectBox.each(function() {

        var $select = $(this);

        // Do not bind twice
        if ($select.data('binded') === true) {
            return;
        }

        var $input = $select.find('input[type=hidden]'),
            $selected = $select.children('.selected'),
            setValue = function(text, value) {
                // Insert default text
                setText(text);
                // Insert default value
                $input.val(value).trigger('change');
            },
            setText = function(text) {
                $selected.html(text);
            };

        // Set default text if value is empty
        if ($input.val() === '') {
            $selected.html($selected.attr('data-placeholder'));
        } else {
            // Set value
            setText(
                $select
                    .find('.selectOption[data-value="'+$input.val()+'"]')
                    .html()
            );
        }

		$select.on('click', function(e){
			$(this).toggleClass("is-visible")
            var $target = $(e.target);
            if ($target.hasClass('selected') || $target.hasClass('selectArrow')) {
            	$(".selectBox").not($select).parent(".dropdown-holder").removeClass("is-expanded");
            	$(".selectBox").not($select).find('.selectOptions').removeClass('shown');
            	$select
                    .toggleClass('toggleClose')
                    .parents('.dropdown-holder:first')
                        .toggleClass('is-expanded')
                        .end()
                    .find('.selectOptions')
                        .toggleClass('shown');
            } else if ($target.hasClass('selectOption')) {
                setValue($target.html(), $target.attr('data-value'));

			    $select
                    .toggleClass('toggleClose')
                    .parents('.dropdown-holder')
                        .toggleClass('is-expanded')
                        .end()
                    .find('.selectOptions')
                        .toggleClass('shown');
            }
		});

        $select.data('binded', true);
	});
};

/*
	Google maps
 */

    defaultLat = 52.520007;
    defaultLng = 13.404954;
    sites = [];
    lt = defaultLat;
    lg = defaultLng;
    provinces = {};
    prHTML = '';

    function initMapData() {
        $.get(mapDataUrl).success(function(data) {
            sites = data;
            provinces = {};
            prHTML = '';

            for (var i = 0; i < sites.length; i++) {
                var province = sites[i][3];

                if (provinces[province] === undefined) {
                    provinces[province] = [];
                }
                provinces[province].push(sites[i]);
            }

            var provincesArray = [];
            for (var provinceName in provinces) {
                provincesArray.push([provinceName, provinces[provinceName]]);
            }
            provincesArray.sort(function(a, b) { return a[0].localeCompare(b[0]); });

            for (var j = 0; j < provincesArray.length; j++) {
                prHTML += '<span id="'+provincesArray[j][0]+'" class="selectOption selectOptionProvince" data-value="'+provincesArray[j][0]+'">'+provincesArray[j][0]+'</span>';
            }


            $('#provinces').html(prHTML).mCustomScrollbar();

            var itWas = [], opHTML = '';
            // dodanie listy miast na początku
            for (var i = 0; i < sites.length; i++) {
                if (itWas.indexOf(sites[i][0] + sites[i][3]) === -1) {
                    opHTML += '<span class="selectOption selectOptionCity" data-value="'+sites[i][0]+'" data-province="'+sites[i][3]+'">'+sites[i][0]+'</span>';
                    itWas.push(sites[i][0] + sites[i][3]);
                }
            }

            $('#cities').html(opHTML);
            $('#cityLabel').text('Miasto');
            $('#cities').mCustomScrollbar({
                advanced:{
                    updateOnContentResize: true
                }
            });

            initializeMap(sites, lt, lg);
        });
    }

    $(document).on('click', '.selectOptionProvince', function() {
        var val = $(this).attr('data-value'),
            province = provinces[val],
            opHTML = '',
            itWas = [];

        var latSum = 0, lngSum = 0, uniqueCities = 0;

        for (var i = 0; i < province.length; i++) {
            if (itWas.indexOf(province[i][0]) === -1) {
                uniqueCities++;
                latSum += province[i][1];
                lngSum += province[i][2];
                opHTML += '<span class="selectOption selectOptionCity" data-value="'+province[i][0]+'" data-province="'+val+'">'+province[i][0]+'</span>';
                itWas.push(province[i][0]);
            }
        }

        var lt = (latSum/uniqueCities);
        var lg = (lngSum/uniqueCities);

        if (lt === 0) {
            lt = defaultLat;
            lg = defaultLng;
        } else {
            lg -= 1.2;
        }

        $('#cities').html(opHTML);
        $('#cityLabel').text('Miasto');

       $('#cities').mCustomScrollbar({
	        advanced:{
	    		updateOnContentResize: true
			}
       });
        initializeMap(province, lt, lg);
    });

    $(document).on('click', '.selectOptionCity', function() {
        var $op = $(this),
            city = $op.attr('data-value'),
            province = $op.attr('data-province'),
            data = provinces[province],
            arr = [];

        for (var i = 0; i < data.length; i++) {
            if (data[i][0] == city) {
                arr.push(data[i]);
            }
        }

         if (data[0] != undefined) {
            var lt = data[0][1];
            var lg = data[0][2];
       } 
       
       
       function initializeMapClick(sites, lt, lg) {
	        var lat = lt || 52.520007, lng = lg || 13.404954;
	        var centerMap = new google.maps.LatLng(lat, lng);
	        var myOptions = {
	            zoom: 9,
	            minZoom: 2,
	            center: centerMap,
	            disableDefaultUI: false,
	            mapTypeControl: true,
				panControl: true,
			    panControlOptions: {
			        position: google.maps.ControlPosition.RIGHT_TOP
			    },
			    zoomControl: true,
			    zoomControlOptions: {
			    	position: google.maps.ControlPosition.RIGHT_TOP
			    },
			    scaleControl: true,
			    streetViewControl: true,
			    streetViewControlOptions: {
			        position: google.maps.ControlPosition.RIGHT_TOP
			    },
				styles: mapstyle,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	           }
			var map = new google.maps.Map(document.getElementById("map"), myOptions);
			setMarkers(map, sites);
		}
       initializeMapClick(arr, lt, lg);
       
    });

	var mapstyle = [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#b5cbe4"}]},{"featureType":"landscape","stylers":[{"color":"#efefef"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#83a5b0"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#bdcdd3"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e3eed3"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]

	function initializeMap(sites, lt, lg) {
        var lat = lt || 52.520007, lng = lg || 13.404954;
        var centerMap = new google.maps.LatLng(lat, lng);
        var myOptions = {
            zoom: 6,
            minZoom: 2,
            center: centerMap,
            disableDefaultUI: false,
            mapTypeControl: true,
			panControl: true,
		    panControlOptions: {
		        position: google.maps.ControlPosition.RIGHT_TOP
		    },
		    zoomControl: true,
		    zoomControlOptions: {
		    	position: google.maps.ControlPosition.RIGHT_TOP
		    },
		    scaleControl: true,
		    streetViewControl: true,
		    streetViewControlOptions: {
		        position: google.maps.ControlPosition.RIGHT_TOP
		    },
			styles: mapstyle,
            mapTypeId: google.maps.MapTypeId.ROADMAP
           }
		var map = new google.maps.Map(document.getElementById("map"), myOptions);
		setMarkers(map, sites);

		
	}

	function setMarkers(map, markers) {
		var marker, i, infoBubble;
		infoBubble = new InfoBubble({
        	minWidth: 300,
          	maxWidth: 750,
          	disableAutoPan: false,
          	hideCloseButton: true,
          	padding: 0,
          	minHeight: 100,
          	maxHeight: 5000,
          	arrowSize: 10,
          	shadowStyle: 0,
          	borderRadius: 0
        });
        infoBubble.setArrowPosition(3);
        infoBubble.setArrowSize(0);

		for (i = 0; i < markers.length; i++) {
        	var sites = markers[i],
                siteLatLng = new google.maps.LatLng(sites[1], sites[2]),
                icon = "bundles/acardfrontend/img/marker-violet-big.png";
                iconChange = "bundles/acardfrontend/img/marker-violet-big.png",
                eventCity= sites[0],
                eventDate= sites[4],
                eventAddress= sites[5],
                eventStreet = sites[6],
                eventHours= sites[7],
                eventExtra= sites[8],

            	marker = new google.maps.Marker({
                position: siteLatLng,
                map: map,
                title: sites[0],
                icon: icon,
            });

			function bindInfoWindow(marker, map, infoBubble, strDescription) {
				google.maps.event.addListener(marker, "click", function() {
					infoBubble.setContent(strDescription);
	        		infoBubble.open(map, marker);
				  	this.setIcon(iconChange);
			    });
			}

			var descInfo = '<div class="marker"><span class="close-marker">X</span><b class="violet">' + eventCity +','+ eventDate+'</b><br><b>'+eventAddress+'</b><br><b>'+eventStreet+'</b><br><span class="eventHours">'+eventHours+'</span><br><br><span class="extraEvents">'+eventExtra+'</div><br>';

			bindInfoWindow(marker, map, infoBubble, descInfo);
			google.maps.event.addListener(map, 'click', function() {
				infoBubble.close(map, marker);
			});
       }
    }

 /*
 * 
 *
 *	You tube player
 *
 *
 */
	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    var player;

    function onYouTubeIframeAPIReady() {
    	player = new YT.Player('player', {
					 height: 300,
			         width: 460,
			         videoId: $("#player").data("mainvideoid"),
			         playerVars: {
			         	controls: 0,
			         	modestbranding: 0,
			          	showinfo: 0,
			          	rel: 0,
	                	wmode: "opaque"
			         },
			         events: {
			         	'onReady': onPlayerReady,
			            'onStateChange': onPlayerStateChange
			         }
	  		 	 });

	  			modalPlayer = new YT.Player('modalplayer', {
	  				height: 360,
			         width: 640,
			         videoId: $("#video").data("videoid"),
			         playerVars: {
			         	controls: 1,
			         	modestbranding: 0,
			          	showinfo: 0,
			          	rel: 0,
	                	wmode: "opaque"
			         },
	  		});
		}

	var interval= false;
	function onPlayerReady(event) {
		if (!interval) {
			interval = window.setInterval(function () {
				$(".drag").css("width", (parseFloat( (parseInt(event.target.getCurrentTime()) * 100)/ parseInt(event.target.getDuration())))+ '%');
		 	}, 1000);
		}
		$(".volumeControl img").click(function() {
			var playerVolume = player.getVolume();
			$(this).is("#volumeup") ?  player.setVolume(playerVolume+20)  : player.setVolume(playerVolume-20)
		})
		$(".progressBar").click(function(event) {
			var skipPercentage = ( (event.pageX- $(this).offset().left) / $(".progressBar").outerWidth() );
		   		player.seekTo(''+Math.round((player.getDuration() * skipPercentage))+'');
		});
	  }
	function onPlayerStateChange(event) {
		if (event.data == YT.PlayerState.PLAYING){
		}
    }
   	function  onPlayerReadyModal(event) {
   		event.target.playVideo()
   	}

    (function($) { $.fn.changeVideo = function() {
		player.loadVideoById($(this).data("videoid"));
		}
	})(jQuery);


$(window).load(function() {
	$(".m-photogallery-slides").mCustomScrollbar({
		horizontalScroll: true,
	    autoDraggerLength: false,
	    mouseWheelPixels: 320
	})
	//$(".selectOptions").mCustomScrollbar()
})

$(document).ready(function() {
	if($("body").hasClass("home-page") || $("body").hasClass("kalendarium")) {
        initMapData();
       
 	}
 	
	equalHeightsSet();
 	selectBoxes();
 	
 	$(".videoItem").click(function() {
    	$(this).changeVideo()
	});
	$('a.nyroModal').nyroModal({zIndexStart:9999,  galleryCounts: false});
	
});
$(document).mouseup(function (e)
{
    var container = $(".modal-dialog");
	if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        $("#video").modal("hide")
    }
});
