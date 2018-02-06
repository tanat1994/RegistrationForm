<!-- Required Stylesheets -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

<!-- Required Javascript -->
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/treeView/bootstrap-treeview.js')}}"></script>

<div id="treeview-selectable"></div>
<script>
        function getTree() {
            // Some logic to retrieve, or generate tree structure
            var tree = [
            {
                text: "Parent 1",
                nodes: [
                {
                    text: "Child 1",
                    nodes: [
                    {
                        text: "Grandchild 1"
                    },
                    {
                        text: "Grandchild 2"
                    }
                    ]
                },
                {
                    text: "Child 2"
                }
                ]
            },
            {
                text: "Parent 2"
            },
            {
                text: "Parent 3"
            },
            {
                text: "Parent 4"
            },
            {
                text: "Parent 5"
            }
            ];
            return tree;
          }
          
          //$('#tree').treeview({data: getTree()});
          var initSelectableTree = function() {
            return $('#treeview-selectable').treeview({
              data: getTree(),
              multiSelect: $('#chk-select-multi').is(':checked'),
              onNodeSelected: function(event, node) {
                //$('#selectable-output').prepend('<p>' + node.text + ' was selected</p>');
                console.log(node.text);
                },
              onNodeUnselected: function (event, node) {
                $('#selectable-output').prepend('<p>' + node.text + ' was unselected</p>');
              }
            });
          };
          var $selectableTree = initSelectableTree();
</script>


{{--  <script>
    var arr = [
        {'id':1 ,'parent' : 0},
        {'id':4 ,'parent' : 2},
        {'id':3 ,'parent' : 1},
        {'id':5 ,'parent' : 0},
        {'id':6 ,'parent' : 0},
        {'id':2 ,'parent' : 1},
        {'id':7 ,'parent' : 4},
        {'id':8 ,'parent' : 1}
      ];
    function unflatten(arr) {
      var tree = [],
          mappedArr = {},
          arrElem,
          mappedElem;

      // First map the nodes of the array to an object -> create a hash table.
      for(var i = 0, len = arr.length; i < len; i++) {
        arrElem = arr[i];
        mappedArr[arrElem.id] = arrElem;
        mappedArr[arrElem.id]['children'] = [];
      }


      for (var id in mappedArr) {
        if (mappedArr.hasOwnProperty(id)) {
          mappedElem = mappedArr[id];
          // If the element is not at the root level, add it to its parent array of children.
          if (mappedElem.parent) {
            mappedArr[mappedElem['parent']]['children'].push(mappedElem);
          }
          // If the element is at the root level, add it to first level elements array.
          else {
            tree.push(mappedElem);
          }
        }
      }
      return tree;
    }

var tree = unflatten(arr);
console.log(tree);
</script>  --}}