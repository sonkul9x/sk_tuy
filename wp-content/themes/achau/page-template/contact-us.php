<?php
/**
 * Template Name: Contact Us
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<div id="site-content" class="main-container no-padding contact-us">
	<div class="container">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div id="map" class="wow fadeInUp"></div>
</div><!-- #site-content -->
<script>
	jQuery(document).ready(function($) {
		//VALIDATE FORM CONTACT
		$(".contact-text .wpcf7-form").validate({
			rules: {
				cname:{
					required: true,
				},
				cphone:{
					required: function(element) {
						if ($("#cemail").val().length > 0) {
							return false;
						}
						else {
							return true;
						}
					},
					number : true,
				},
				cemail:{
					required: function(element) {
						if ($("#cphone").val().length > 0) {
							return false;
						}
						else {
							return true;
						}
					},
					email: true,
				},
			},
			messages:{
				cname: " <?php echo __('Please enter your name.','achau') ?> ",
				cphone:{
					required: "<?php echo __('Please enter your phone.','achau'); ?>",
					number: "<?php echo __('Please enter your number.','achau'); ?>",
				},
				cemail: "<?php echo __('Please enter a valid email address.','achau'); ?>",
			},
			errorLabelContainer: $(".wpcf7-form div.error"),
		});
	});
	
	function initMap() {

		// Create a new StyledMapType object, passing it an array of styles,
		// and the name to be displayed on the map type control.
		var styledMapType = new google.maps.StyledMapType(
			[
			  {
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#212121"
				  }
				]
			  },
			  {
				"elementType": "labels.icon",
				"stylers": [
				  {
					"visibility": "off"
				  }
				]
			  },
			  {
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#757575"
				  }
				]
			  },
			  {
				"elementType": "labels.text.stroke",
				"stylers": [
				  {
					"color": "#212121"
				  }
				]
			  },
			  {
				"featureType": "administrative",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#757575"
				  }
				]
			  },
			  {
				"featureType": "administrative.country",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#9e9e9e"
				  }
				]
			  },
			  {
				"featureType": "administrative.land_parcel",
				"stylers": [
				  {
					"visibility": "off"
				  }
				]
			  },
			  {
				"featureType": "administrative.locality",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#bdbdbd"
				  }
				]
			  },
			  {
				"featureType": "poi",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#757575"
				  }
				]
			  },
			  {
				"featureType": "poi.park",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#181818"
				  }
				]
			  },
			  {
				"featureType": "poi.park",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#616161"
				  }
				]
			  },
			  {
				"featureType": "poi.park",
				"elementType": "labels.text.stroke",
				"stylers": [
				  {
					"color": "#1b1b1b"
				  }
				]
			  },
			  {
				"featureType": "road",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#8a8a8a"
				  }
				]
			  },
			  {
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#373737"
				  }
				]
			  },
			  {
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#02bc4e"
				  }
				]
			  },
			  {
				"featureType": "road.highway.controlled_access",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#02bc4e"
				  }
				]
			  },
			  {
				"featureType": "road.local",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#616161"
				  }
				]
			  },
			  {
				"featureType": "transit",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#757575"
				  }
				]
			  },
			  {
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
				  {
					"color": "#000000"
				  }
				]
			  },
			  {
				"featureType": "water",
				"elementType": "labels.text.fill",
				"stylers": [
				  {
					"color": "#3d3d3d"
				  }
				]
			  }
			],
			{name: 'Styled Map'});

		// Create a map object, and include the MapTypeId to add
		// to the map type control.
		var uluru = {lat: 9.970057, lng: 105.738956};
		var map = new google.maps.Map(document.getElementById('map'), {
		  center: uluru,
		  zoom: 11,
		  mapTypeControlOptions: {
			mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
					'styled_map']
		  }
		});
		
		var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
		
		//Associate the styled map with the MapTypeId and set it to display.
		map.mapTypes.set('styled_map', styledMapType);
		map.setMapTypeId('styled_map');
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaI0r1UZ7Il_B9PnCTSsNdrgS11VaXas&callback=initMap"></script>
	
<?php get_footer(); ?>