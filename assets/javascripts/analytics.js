// Google Analytics events are defined here
jQuery(document).ready(function($){
  // FB like and unlike
  FB.Event.subscribe('edge.create', function(targetUrl) {
    console.log(targetUrl);
    _gaq.push(['_trackSocial', 'facebook', 'like', targetUrl]);
  });

  FB.Event.subscribe('edge.remove', function(targetUrl) {
    console.log(targetUrl);
    _gaq.push(['_trackSocial', 'facebook', 'unlike', targetUrl]);
  });

  // FB share
  FB.Event.subscribe('message.send', function(targetUrl) {
    console.log(targetUrl);
    _gaq.push(['_trackSocial', 'facebook', 'share', targetUrl]);
  });
});