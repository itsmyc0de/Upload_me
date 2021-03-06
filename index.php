<html>
<head>
	<title>Data Searching Without Page Refresh</title>
</head>
<body>
<!-- 
we will preload the loader image 
to show it instantly on search 
-->
<div style='display:none;'>
	<img src="images/ajax-loader.gif" />
</div>

<form name = "form">
	
	<div>Enter name then click the Search Button or just press Enter</div>
	
	<!-- where our search value will be entered -->
	<input type="text" name="name" id="fn" />
	
	<!-- This button will call our JavaScript Search functions -->
	<input type="submit" value="Search" id="search-btn" />
</form>

<div id = "s-results">
	<!-- This is where our search results will be displayed -->
</div>

<!-- import jQuery file -->
<script type='text/javascript' src='js/jquery-1.4.2.min.js'></script>

<script type = "text/javascript">
$(document).ready(function(){
	//load the current contents of search result
	//which is "Please enter a name!"
	$('#s-results').load('search_results.php').show();
	
	
	$('#search-btn').click(function(){
		showValues();
	});
	
	$(function() {
		$('form').bind('submit',function(){
			showValues(); 
			return false; 
		});
	});
		
	function showValues() {
		//loader will be show until result from
		//search_results.php is shown
		$('#s-results').html('<p><img src="images/ajax-loader.gif" /></p>');  
		
		//this will pass the form input
		$.post('search_results.php', { name: form.name.value },
		
		//then print the result
		function(result){
			$('#s-results').html(result).show();
		});
	}
		
});
</script>
</body>
</html>