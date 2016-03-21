      <div class="page-header">
      </div>
      <ul class="nav nav-tabs" role="tablist">
		  
		  <?php
		  
		  if(isset($_REQUEST['activeTab']))
		  {
		  		$activeTab = $_REQUEST['activeTab'];
		  }
		  else
		  {
			  $activeTab = 'Home';	
		  }
		  
		 
		  $tabs = array('Home', 'Customers', 'Stock');
		  
		  foreach($tabs as $tab)
		  {
			  if($tab == $activeTab)
			  {
				  $tabClass = 'active';
			  }
			  else
			  {
				  $tabClass = '';
			  }
			  
			  if($tab == 'Home')
			  {
				  $focus = 11;
		
			  }
			  
			  if($tab == 'Customers')
			  {
				  $focus = 12;
				  $v = 'spec12WithAForm';
			  }
			  
			  if($tab == 'Stock')
			  {
				  $focus = 11;
				  $v = 'spec11';
			  }
		  	
			  print "<li role=\"presentation\" class=\"$tabClass\"><a href=\"?focus=$focus&amp;v=$v&amp;activeTab=$tab\">$tab</a></li>";
			
			
			
		  }
		  
		  			
			
		  ?>
		  
		
		
      </ul>
	  
	  
	  <p>('Home' is 1/1 default ; 'Customers' is 1/2 specific ; 'Stock' is 1/1 specific, etc.)</p>