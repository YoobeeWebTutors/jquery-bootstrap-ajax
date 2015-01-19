<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bootstrap Dynamic Tabs with AJAX</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
	.nav-container{
		margin: 20px;
	}
</style>
</head>
<body>
<div class="nav-container">
    <ul class="nav nav-tabs">
        <li class="active filled" data-id="0"><a data-toggle="tab" href="#i0">Section 1</a></li>
        <li data-id="1"><a data-toggle="tab" href="#i1">Section 2</a></li>
	<li data-id="2"><a data-toggle="tab" href="#i2">Section 3</a></li>
    </ul>
    <div class="tab-content">
        <div id="i0" class="tab-pane fade in active">
            <h3>Section 1</h3>
            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
        </div>
        <div id="i1" class="tab-pane fade">
        </div>
        <div id="i2" class="tab-pane fade">
        </div>
    </div>
</div>
    <script>
	    $(function() {
		$(".nav").on("click", "li", function() {
		    var listItem = $(this);
		    //check if content has already been filled 		    
		    if (!listItem.hasClass("filled")) {
			fillData(listItem);
		    }
		})
	    });

	    function fillData(listItem) {
		    //get index from list item "data-id" attribute
		    var id = listItem.data('id');
		    //send id through to tab-data.php through ajax request
		    var request = $.ajax({
			url: "tab-data.php",
			type: "POST",
			dataType: "json",
			data: {id: id}
		    });
		    request.done(function(data) {
			$('#i'+id).html(data.content);
			listItem.addClass("filled");
			console.log("Filled section "+id);
		    });
		    request.fail(function(jqXHR, textStatus) {
			console.log("Request failed: " + textStatus);
		    });
	    }
	</script>
</body>
</html>                 
