<!DOCTYPE html>
<html>
<head>
	<title>Floating</title>
<style type="text/css">
.zoom {
  position: fixed;
  bottom: 45px;
  right: 24px;
  height: 70px;
}
.zoom-fab {
  display: inline-block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  border-radius: 50%;
  background-color: #009688;
  vertical-align: middle;
  text-decoration: none;
  text-align: center;
  transition: 0.2s ease-out;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  color: #FFF;
}
.zoom-fab:hover {
  background-color: #4db6ac;
  box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14), 0 1px 7px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -1px rgba(0, 0, 0, 0.2);
}
.zoom-btn-large {
  width: 60px;
  height: 60px;
  line-height: 60px;
}
.zoom-menu {
  position: absolute;
  right: 70px;
  left: auto;
  top: 50%;
  transform: translateY(-50%);
  height: 100%;
  width: 500px;
  list-style: none;
  text-align: right;
}
.zoom-menu li {
  display: inline-block;
  margin-right: 10px;
}
.zoom-card {
  position: absolute;
  right: 150px;
  bottom: 70px;
  transition: box-shadow 0.25s;
  padding: 24px;
  border-radius: 2px;
  background-color: #009688;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
  color: #FFF;
}
.zoom-card ul {
  -webkit-padding-start: 0;
  list-style: none;
  text-align: left;}
.zoom-btn-person { background-color: #F44336; } 
.zoom-btn-person:hover { background-color: #e57373; }
.zoom-btn-doc { background-color: #ffeb3b; }
.zoom-btn-doc:hover { background-color: #fff176; }
.zoom-btn-tangram { background-color: #4CAF50; }
.zoom-btn-tangram:hover { background-color: #81c784; }
.zoom-btn-report { background-color: #2196F3; }
.zoom-btn-report:hover { background-color: #64b5f6; }
.zoom-btn-feedback { background-color: #9c27b0; }
.zoom-btn-feedback:hover { background-color: #ba68c8; }
.scale-transition { transition: transform 0.3s cubic-bezier(0.53, 0.01, 0.36, 1.63) !important; 
}
.scale-transition.scale-out {
  transform: scale(0);
  transition: transform 0.2s !important;
}
.scale-transition.scale-in { transform: scale(1); 
}
</style>
</head>
<body>
	<div class="zoom">
	<a class="zoom-fab zoom-btn-large" id="zoomBtn"><i class="zmdi zmdi-check"></i></a>
  <ul class="zoom-menu">
  	<li><a class="zoom-fab zoom-btn-sm zoom-btn-person scale-transition scale-out">Action 1</a></li>
  	<li><a class="zoom-fab zoom-btn-sm zoom-btn-doc scale-transition scale-out">Action 2</a></li>
  	<li><a class="zoom-fab zoom-btn-sm zoom-btn-tangram scale-transition scale-out">Action 3</a></li>
  	<li><a class="zoom-fab zoom-btn-sm zoom-btn-report scale-transition scale-out">Action 4</a></li>
  	<li><a class="zoom-fab zoom-btn-sm zoom-btn-feedback scale-transition scale-out">Action 5</a></li>
  </ul>
  <div class="zoom-card scale-transition scale-out">
  	<ul class="zoom-card-content">
  		<li>Content 1</li>
  		<li>Content 2</li>
	    <li>Content 3</li>
	    <li>Content 4</li>
		<li>Content 5</li>
	</ul>
  </div>
</div>
<script src="//code.jquery.com/jquery-3.2.1.min.js">
	$('#zoomBtn').click(function() {
  	$('.zoom-btn-sm').toggleClass('scale-out');
  	if (!$('.zoom-card').hasClass('scale-out')) {
    	$('.zoom-card').toggleClass('scale-out');
  	}
});
 
$('.zoom-btn-sm').click(function() {
  var btn = $(this);
  var card = $('.zoom-card');
  if ($('.zoom-card').hasClass('scale-out')) {
    $('.zoom-card').toggleClass('scale-out');
  }
  if (btn.hasClass('zoom-btn-person')) {
    card.css('background-color', '#d32f2f');
  } else if (btn.hasClass('zoom-btn-doc')) {
    card.css('background-color', '#fbc02d');
  } else if (btn.hasClass('zoom-btn-tangram')) {
    card.css('background-color', '#388e3c');
  } else if (btn.hasClass('zoom-btn-report')) {
    card.css('background-color', '#1976d2');
  } else {
    card.css('background-color', '#7b1fa2');
  }
});
</script>
</body>
</html>


