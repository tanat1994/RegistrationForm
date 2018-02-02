<!-- Required Stylesheets -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

<!-- Required Javascript -->
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/treeView/bootstrap-treeview.js')}}"></script>


<script>
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
</script>