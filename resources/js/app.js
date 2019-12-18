require('./bootstrap');

// change role user


$( document ).ready(function() {

// change role user
function handleDelete(id) {
    var form = document.getElementById('deleteCategoryForm')
    form.action = '/categories/' + id
    $('#deleteModal').modal('show')
  }

});

