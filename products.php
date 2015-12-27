<!DOCTYPE html>

<?php 
	include("functions/functions.php");
?>

<html>
<head>
	<meta charset='utf-8'>
	<title>TECHstore</title>
	<meta name="description" content="TECHstore"> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/categories-style.css">

</head>
<body>
<div class="container-fluid">
	<!-- NAVBAR -->
	<?php include ("navbar.php"); ?>
	<header>
		<div class="jumbotron">
	        <h1>Bootstrap Affix</h1>
	        <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
	    </div>
    </header>



<div class="row">
	<div class="col-md-3">
		<div class="list-group" id="sidebar">
	  			<div class="list-group-item">
	      			<h3 class="list-group-item-heading">Categories</h3>
	    		</div>


	    		<ul class="list-group">


				<?php 
					$rows = getCategoryRows();
					getCategory($rows);

 				?>
<!-- 
	    		    <li class="list-group-item"><a data-toggle="collapse" data-target="#collapse1">ITEM #1</a></li>
	    		    	<div id="collapse1" class="panel-collapse collapse">
		      				<ul class="list-group">
						        <li class="list-group-item">One</li>
						        <li class="list-group-item">Two</li>
						        <li class="list-group-item">Three</li>
		      				</ul>
	    				</div>



	    		    <li class="list-group-item"><a data-toggle="collapse" data-target="#collapse2">ITEM #2</a></li>
	    		    	<div id="collapse2" class="panel-collapse collapse">
	      					<ul class="list-group">
				        		<li class="list-group-item">One</li>
				        		<li class="list-group-item">Two</li>
				        		<li class="list-group-item">Three</li>
	      					</ul>
	    				</div>


	    		    <li class="list-group-item"><a data-toggle="collapse" data-target="#collapse3">ITEM #2</a></li>
	    		    	<div id="collapse3" class="panel-collapse collapse">
		      				<ul class="list-group">
					       		<li class="list-group-item">One</li>
					        	<li class="list-group-item">Two</li>
					        	<li class="list-group-item">Three</li>
		      				</ul>
	    				</div>

-->
	    		</ul> 




 <!-- TOTO JE STRASNE MESSY  -->

	    		<!-- <div class="list-group-item">
	        			<a data-toggle="collapse" data-target="#collapse1">ITEM #1</a>
	    		</div>
	    		<div id="collapse1" class="panel-collapse collapse">
	      			<ul class="list-group">
				        <li class="list-group-item">One</li>
				        <li class="list-group-item">Two</li>
				        <li class="list-group-item">Three</li>
	      			</ul>
	    		</div>

	    		<div class="list-group-item">
	      
	        			<a data-toggle="collapse" data-target="#collapse2">ITEM #2</a>
	      			
	    		</div>
	    		<div id="collapse2" class="panel-collapse collapse">
	      			<ul class="list-group">
				        <li class="list-group-item">One</li>
				        <li class="list-group-item">Two</li>
				        <li class="list-group-item">Three</li>
	      			</ul>
	    		</div>


	    		<div class="list-group-item">
	      
	        			<a data-toggle="collapse" data-target="#collapse3">ITEM #2</a>
	      			
	    		</div>
	    		<div id="collapse3" class="panel-collapse collapse">
	      			<ul class="list-group">
				        <li class="list-group-item">One</li>
				        <li class="list-group-item">Two</li>
				        <li class="list-group-item">Three</li>
	      			</ul>
	    		</div> -->

	    		
		</div>
	</div>


	<div class="col-md-9">
		<div class="row">
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
			<div class="col-md-3">
				<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
			</div>
		</div>


	</div>
	</div>

</div>

<script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$('#sidebar').affix({
	      offset: {
	        top: $('header').height()
	      }
		});	


	</script>

</body>
</html>

<!-- 
		<div class="list-group list-group-all">
	  			<div class="list-group-item">
	      			<h3 class="list-group-item-heading">Categories</h3>
	    		</div>

	    		<div class="list-group-item list-group-item-color">
	        			<a data-toggle="collapse" data-target="#collapse1">ITEM #1</a>

	      			<span class="glyphicon glyphicon-search"></span>
	    		</div>
	    		<div id="collapse1" class="panel-collapse collapse">
	      			<ul class="list-group">
				        <li class="list-group-item">One</li>
				        <li class="list-group-item">Two</li>
				        <li class="list-group-item">Three</li>
	      			</ul>
	    		</div>

	    		<div class="list-group-item list-group-item-color">
	      
	        			<a data-toggle="collapse" data-target="#collapse2">ITEM #2</a>
	      			
	    		</div>
	    		<div id="collapse2" class="panel-collapse collapse">
	      			<ul class="list-group">
				        <li class="list-group-item">One</li>
				        <li class="list-group-item">Two</li>
				        <li class="list-group-item">Three</li>
	      			</ul>
	    		</div>


	    		<div class="list-group-item list-group-item-color">
	      
	        			<a data-toggle="collapse" data-target="#collapse3">ITEM #2</a>
	      			
	    		</div>
	    		<div id="collapse3" class="panel-collapse collapse">
	      			<ul class="list-group">
				        <li class="list-group-item">One</li>
				        <li class="list-group-item">Two</li>
				        <li class="list-group-item">Three</li>
	      			</ul>
	    		</div>

	    		
		</div>
 -->



<!-- KDYBY NECO
	<div class="row">
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
		<div class="col-md-3">
			<img src="img/categories/mobile2.svg" alt="alt" class="img-category">
		</div>
	</div> -->