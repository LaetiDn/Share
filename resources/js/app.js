require('./bootstrap');

// Modal delete


$( document ).ready(function() {

    // Modal delete
function handleDelete(id) {
    var form = document.getElementById('deleteCategoryForm')
    form.action = '/categories/' + id
    $('#deleteModal').modal('show')
  }

});

