<?php use \App\Http\Controllers\groupController; ?>

<!-- Required Javascript -->
{{--  <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>  --}}
<script src="{{asset('js/treeView/bootstrap-treeview.js')}}"></script>

<div id="treeview-selectable"></div>
{{--  <h2>Events</h2>
<div id="selectable-output"></div>  --}}

<?php
    $init_check = true;
    $groupArry = groupController::getAllGroup();
    $groupArry = json_encode($groupArry);
?>
<script>
    // var groupArry  = <?php //echo($groupArry); ?>;
    var groupArry = "PATRON GROUP";

    function treeBuilder(arr){
        var tree = [],
          mappedArr = {},
          arrElem,
          mappedElem;

      // First map the nodes of the array to an object -> create a hash table.
      for(var i = 0, len = arr.length; i < len; i++) {
        arrElem = arr[i];
        mappedArr[arrElem.groupId] = arrElem;
        mappedArr[arrElem.groupId]['nodes'] = [];
      }


      for (var id in mappedArr) {
        if (mappedArr.hasOwnProperty(id)) {
            mappedElem = mappedArr[id];
            // If the element is not at the root level, add it to its parent array of children.
            if (mappedElem.parent) {
                mappedArr[mappedElem["parent"]]["nodes"].push(mappedElem);
            }
          // If the element is at the root level, add it to first level elements array.
            else {
                tree.push(mappedElem);
            }
        }
      }
      return tree;
    }

    // var tree = treeBuilder(groupArry);

    //Selectable Tree
    var initSelectableTree = function() {
            return $('#treeview-selectable').treeview({
                data : [{
                    text: "PATRON GROUP"
                }]
                // data: tree,
                // multiSelect: $('#chk-select-multi').is(':checked'),
                // onNodeSelected: function(event, node) {
                //     //$('#selectable-output').prepend('<p>' + node.text + ' was selected</p>');
                //     $.ajax({
                //         url : 'http://127.0.0.1/Website-NAT/public/index.php/groupController/getGroupInfoByName/' + node.text,
                //         //url:  config('pathConfig.pathREST') +'checkLogin/check'
                //         type : 'get',
                //         success : function(response){
                //             response_data = JSON.stringify(response);
                //             var responseArray = JSON.parse(response_data);

                //             var newRows;
                //             newRows += "<tr><td>" + responseArray[0]["groupId"] + "</td>"
                //             newRows += "<td>" + responseArray[0]["text"] + "</td>"
                //             newRows += "<td>0</td>"
                //             newRows += "<td>" + responseArray[0]["date_create"] + "</td>"
                //             newRows += "<td>" + responseArray[0]["user_create"] + "</td>"
                //             $("#data-group-fetch").html(newRows);
                //         // alert(responseArray["0"]["text"]);
                //         }
                //     });
                //     },
                // onNodeUnselected: function (event, node) {
                //     //$('#selectable-output').prepend('<p>' + node.text + ' was unselected</p>');
                // }
            });
    }
    var $selectableTree = initSelectableTree();
    console.log(tree);
</script>