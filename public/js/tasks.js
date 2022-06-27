
$( document ).ready(function() {
    $("#todo-list").sortable(
      {
        revert: false,
        opacity: 0.5,
        start: function(event, ui) {
            var start_pos = ui.item.index()+1;
        },
        change: function(event, ui){
            // var start_pos = ui.item.data('start_pos'),
            // index = ui.placeholder.index()+1;
            // // SavePos(start_pos, index);
            // console.log("index"+start_pos+index);
        },
        stop: function(event, ui) {
          var start_pos = ui.item.data('start_pos'),
          index =  ui.item.index()+1;
          var id = ui.item.attr('id');
          /*todo  realizar la actualizacion de orden*/
          // console.log("update"+" "+start_pos+" "+index +" "+ id);

        }
    }
    );


    var todoListItem = $('.todo-list');
    var type = $('#type');
    data= chargeList("","api/tasks");
    // todoListItem.append(`${data}`);

    todoListItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
          $(this).removeAttr('checked');
        } else {
          $(this).attr('checked', 'checked');
        }
  
        $(this).closest("li").toggleClass('completed');
  
      });


      $(document).on('change', '#type', function(event) {
        filter($("#type option:selected").text());
   });
});


function filter(type) {
       // accion del filtro
         chargeList({filter:type},'api/tasks/filter');  
}


function add() {
   var task = $('.todo-list-input').val();
   console.log(task);
    if (task) {
         chargeList({title:task},'api/tasks','POST');
         $('.todo-list-input').val(" ");
    };  
}

function deleteTask(id) {
    chargeList({id:id},`api/tasks/delete/${id}`,'GET');  
}


function complete(checked,id) {
    chargeList({isCompleted:checked},`api/tasks/update/${id}`,'GET');  
    
}


 function  chargeList(params="",url="",type="GET") {
    var todoListItem = $('.todo-list');
    var list="";
        // url="api/tasks";
        $.ajax({
            type: type,
            async:false,
            url: url,
           data: params,
            success: function(response)
            {
                // console.log(response); 
                if ((response.data).length>0) {
                    // console.log(response); 
                    items=response.data;                                     
                   items.forEach(item => {
                 
                    list=list+(`
                    <li id=${item.id} class="${item.isCompleted===1?"completed":""}" >
                    <div class='form-check'>
                    <label class='form-check-label'>
                    <input class='checkbox' type='checkbox' ${item.isCompleted===1?"checked":""}
                     onclick='complete(${item.isCompleted===1?0:1},${item.id})'/> ${item.title} 
                    <i class='input-helper'></i>
                    </label>
                    </div>
                    <i class='remove mdi mdi-close-circle-outline' onclick="deleteTask(${item.id})">

                    </i>
                    </li>
                    `);
                   });                       

                   todoListItem.empty();
                   todoListItem.append(`${list}`); 
                
                }else{
                  if (params.filter) {
                    list="<h2>no records</h2>"
                    todoListItem.empty();
                    todoListItem.append(`${list}`);
                  }
                 
                }
              
             }
       });
 //   }

    return list;
  }

 

(function($) {
    $(function() {
      var todoListItem = $('.todo-list');
      var todoListInput = $('.todo-list-input');

    //   $('.todo-list-add-btn').on("click", function(event) {
    //     event.preventDefault();
  
    //     var item = $(this).prevAll('.todo-list-input').val();
  
    //     if (item) {
    //       todoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
    //       todoListInput.val("");
    //     }
  
    //   });
  
    
  
   
  
    });
  })(jQuery);

 