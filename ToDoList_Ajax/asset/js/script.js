function loadData() {
  $.ajax({
    url: './list.php',
    type: 'GET',
    success: function(data){
      $('#task').val('');
      $('.list-group').html(data);
      if(data == ''){
        $('.manipulate').html('');
      } else {
        $('.manipulate').html('<button type="button" class="btn btn-success" onclick="return clearList();">Clear List</button>');
      }
    }
  });
}

function insertTask()
{
  console.log('submit');
  $.ajax({
    url: './insert.php',
    type: 'POST',
    data: $('#insert-form').serialize(),
    success: function(data){
      const response = JSON.parse(data);
      if(response.status == 'success'){
        $('.message').html(response.message);
      }else if(response.status == 'error'){
        $('.message').html(response.message);
      }else{
        $('.message').html('');
      }
      loadData();
    }
  });  
  return false;
}

function clearList(){
  $.ajax({
    url: './clear.php',
    type: 'GET',
    success: function(data){
      loadData();
      cancelEdit();
      if(data == 'success'){
        $('.message').html('<p class="text-success">List Cleared!</p>');
        $('.manipulate').html('');
      }else{
        $('.message').html('Error');
      }
    }
  });
  return false;
}

function deleteTask(id){
  var answer = confirm("Are you sure you want to delete this task?");
  if(answer){
    $.ajax({
      url: './delete.php',
      type: 'POST',
      data: {id: id},
      success: function(data){
        if(data == 'success'){
          $('.message').html('<p class="text-success">Task Deleted Successfully!</p>');
          loadData();
        }else{
          $('.message').html('<p class="text-danger">Something went Wrong!</p>');
        }
      }
    });
  }
  return false;
}

function editTask(id, task){
  var form_html = '<input type="text" class="form-control mb-3" id="task" aria-describedby="emailHelp" name="task" placeholder="Enter you Task" required >';
  form_html += '<button type="submit" class="btn btn-primary ms-1" onclick="return updateTask('+id+');">Update</button>';
  form_html += '<button type="button" class="btn btn-danger ms-1" onclick="return cancelEdit();">Cancel</button>';
  $('.form').html(form_html);
  $('#task').val(task);
  return false;
}

function cancelEdit() {
  var form_html = '<input type="text" class="form-control mb-3" id="task" aria-describedby="emailHelp" name="task" placeholder="Enter you Task" required >';
  form_html += '<button type="submit" class="btn btn-primary ms-1">Submit</button>';
  $('.form').html(form_html);
  return false;
}

function updateTask(id){
  $.ajax({
    url: './update.php',
    type: 'POST',
    data: {id: id, task: $('#task').val()},
    success: function(data){
      if(data == 'success'){
        $('.message').html('<p class="text-success">Task Updated Successfully!</p>');
        loadData();
        cancelEdit();
      }else if(data == 'error'){
        $('.message').html('<p class="text-danger">Something went Wrong!</p>');
        cancelEdit();
      }else if(data == "same") {
        $('.message').html('<p class="text-danger">Task Already Exists!</p>');
      }
    }
  });
  return false;
}

loadData();