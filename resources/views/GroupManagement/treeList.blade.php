<?php use App\Http\Controllers\groupController; ?>

	<ul id="demo1" class="navi">

		<?php 
			$master_tree = groupController::groupSearch('0'); 
			foreach($master_tree as $tree){
			echo "<ul>";
				echo "<li><a href=\"https://www.google.com\">".$tree['groupName']."</a>";
				$hasChild = groupController::groupSearch($tree['groupId']);

				if(count($hasChild) != 0){
					//echo $tree['groupId']."  = HAS CHILD";
					echo "<ul>";
					$treeView = groupController::groupSearch($tree['groupId']); 				
		?>
				@include('GroupManagement.recursiveGroup',['groupRecord'=>$treeView])
		<?php 
				}else{
					//echo $tree['groupId']."  = NO CHILD";
				}
				echo "</li></ul>";	
			}

		?>

	</ul>
	

	</div>

	<script>
		$(document).ready(function() {
			$("#demo2").navgoco({accordion: true});
		});
	</script>
