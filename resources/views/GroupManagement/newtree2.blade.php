<?php use \App\Http\Controllers\groupController; ?>
<!-- Required Stylesheets -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

<!-- Required Javascript -->
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/treeView/bootstrap-treeview.js')}}"></script>

<?php
    $init_check = true;
    $groupArry = groupController::getAllGroup();
    $groupArry = json_encode($groupArry);
?>
<script>
    var groupArry  = <?php echo($groupArry); ?>;
    var groupArry2 = [
        {'groupId': 1, 'parent' : 0},
        {'groupId': 2, 'parent' : 0},
        {'groupId': 3, 'parent' : 1}
    ];
    //console.log(groupArry);

    function treeBuilder(arr){
        var tree = [],
          mappedArr = {},
          arrElem,
          mappedElem;

      // First map the nodes of the array to an object -> create a hash table.
      for(var i = 0, len = arr.length; i < len; i++) {
        arrElem = arr[i];
        mappedArr[arrElem.groupId] = arrElem;
        mappedArr[arrElem.groupId]['children'] = [];
        //console.log(mappedArr);
      }


      for (var id in mappedArr) {
        if (mappedArr.hasOwnProperty(id)) {
          mappedElem = mappedArr[id];
          // If the element is not at the root level, add it to its parent array of children.
          if (mappedElem.parent) {
            mappedArr[mappedElem["parent"]]["children"].push(mappedElem);
          }
          // If the element is at the root level, add it to first level elements array.
          else {
            tree.push(mappedElem);
          }
        }
      }
      return tree;
    }

    var tree = treeBuilder(groupArry);
    console.log(tree);
</script>