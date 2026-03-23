$(document).ready(function () {

    $(document).on('click', '.delet' , function (e) {
        var id =$(this).val();
        //  alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "delete.php",
                    data: {
                        'l_id':id,
                        'delet':true
                    },
                    success: function (response) {
                        // console.log(response);
                       if (response == 200 )
                       {
                        swal("Success!", "Leave type deleted successfully!", "success");
                        $("#container").load(location.href + " #container")
                       }
                       else if(response == 500)
                       {
                        swal("Error!", "something went wromg!", "error");
                       }
                    }
              });
            }
          });

    });

    $(document).on('click', '.delete_employee' , function (e) {
        e.preventDefault();

        var id =$(this).val();
        //  alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "delete.php",
                    data: {
                        'id':id,
                        'delete_employee':true
                    },
                    success: function (response) {
                        // console.log(response);
                       if (response == 200 )
                       {
                        swal("Success!", "Employee deleted successfully!", "success");
                        $("#container").load(location.href + " #container")
                       }
                       else if(response == 500)
                       {
                        swal("Error!", "something went wromg!", "error");
                       }
                    }
              });
            }
          });

    });

    $(document).on('click', '.delete' , function (e) {
        e.preventDefault();

        var id =$(this).val();
        //  alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "delete.php",
                    data: {
                        'id':id,
                        'delete':true
                    },
                    success: function (response) {
                        // console.log(response);
                    if (response == 200 )
                    {
                        swal("Success!", "Department deleted successfully!", "success");
                        $("#container").load(location.href + " #container")
                    }
                    else if(response == 500)
                    {
                        swal("Error!", "something went wromg!", "error");
                    }
                    }
            });
            }
        });

    });

    $(document).on('click', '.delete_leave' , function (e) {
        e.preventDefault();

        var id =$(this).val();
        //  alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "delete.php",
                    data: {
                        'id':id,
                        'delete_leave':true
                    },
                    success: function (response) {
                        // console.log(response);
                    if (response == 200 )
                    {
                        swal("Success!", "Department deleted successfully!", "success");
                        $("#container").load(location.href + " #container")
                    }
                    else if(response == 500)
                    {
                        swal("Error!", "something went wromg!", "error");
                    }
                    }
            });
            }
        });

    });

});