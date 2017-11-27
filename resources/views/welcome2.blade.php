@extends('core')
<?php use App\Http\Controllers\groupController; ?>
@section('more_script')
  <style>
    /* level 1*/
    .list-group .collapse .list-group-item  {
      padding-left:20px;
    }

    /* level 2*/
    .list-group .collapse > .collapse .list-group-item {
      padding-left:30px;
    }

    /* level 3*/
    .list-group .collapse > .collapse > .collapse .list-group-item {
      padding-left:40px;
    }
  </style>
@endsection

@section('content')
<!--<div class="container-fluid">
  <div class="row">
    <div class="col-md-3" id="sidebar">

      <a href="#menu1" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">Item 1 <i class="fa fa-caret-down"></i></a>
        <div class="collapse" id="menu1">
          <a href="#" class="list-group-item" data-parent="#menu1">3.1</a>
          <a href="#menu1sub2" class="list-group-item" data-toggle="collapse">3.2 <i class="fa fa-caret-down"></i></a>
            <div class="collapse" id="menu1sub2">
                <a href="#" class="list-group-item" data-parent="#menu1sub2">3.2 a</a>
                <a href="#" class="list-group-item" data-parent="#menu1sub2">3.2 b</a>
                <a href="#" class="list-group-item" data-parent="#menu1sub2">3.2 c</a>
            </div>
          <a href="#" class="list-group-item" data-parent="#menu1">3.3</a>
        </div>

    </div>
  </div>
</div>-->




	<?php 
    $menu = 1;
    $sub = 1;
    echo "<div class='col-md-3' id='sidebar'>";
    echo "<div class='list-group panel'>";
		$master_tree = groupController::groupSearch('0'); 
		foreach($master_tree as $tree){
            $treeView = groupController::groupSearch($tree['groupId']);
            if(count($treeView) != 0){
                echo "<a href='#menu".$menu."' class='list-group-item' data-toggle='collapse' data-parent='#sidebar'>".$tree['groupName']."<i class='fa fa-caret-down'></i></a>";
                echo "<div class='collapse' id='menu".$menu."'>";
            }else{
                echo "<a href='#menu".$menu."' class='list-group-item' data-toggle='collapse' data-parent='#sidebar'>".$tree['groupName']."</a>";
            } 
    ?>
        @include('GroupManagement.recursiveGroup2',['groupRecord'=>$treeView, 'menu'=>$menu, 'sub'=>$sub])
    <?php
        //echo "</div>";
        $menu++;
        $sub = 1;
      }
        echo "</div>";
    echo "</div>";
    ?>
      
      <?php
			/*	echo "<li><a href=\"https://www.google.com\">".$tree['groupName']."</a>";
				$hasChild = groupController::groupSearch($tree['groupId']);

				if(count($hasChild) != 0){
					//echo $tree['groupId']."  = HAS CHILD";
					echo "<ul>";
					$treeView = groupController::groupSearch($tree['groupId']); 				*/
		?>
				{{--  @include('GroupManagement.recursiveGroup',['groupRecord'=>$treeView])  --}}
		<?php 
				/*}else{
					//echo $tree['groupId']."  = NO CHILD";
				}
				echo "</li></ul>";	
			}*/

		?>


{{--  @section('content')

        <div class="col-md-3" id="sidebar">
            <div class="list-group panel">
                <a href="#menu3" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">Item 3 <i class="fa fa-caret-down"></i></a>
                <div class="collapse" id="menu3">
                    <a href="#" class="list-group-item" data-parent="#menu3">3.1</a>
                    <a href="#menu3sub2" class="list-group-item" data-toggle="collapse">3.2 <i class="fa fa-caret-down"></i></a>
                    <div class="collapse" id="menu3sub2">
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 b</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 c</a>
                    </div>
                    <a href="#" class="list-group-item" data-parent="#menu3">3.3</a>
                </div>
            </div>
        </div>  --}}


@endsection