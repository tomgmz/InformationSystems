$(document).on('click','#btnDelete', function (e)
{
    e.preventDefault();
    var id = $(this).val();
    console.log(id);
    if(confirm("Are you sure to delete this item?")){
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {
                'delete_data': true,
                'data_id': id
            },
            success: function(response){
                var result = jQuery.parseJSON(response);
                if(result.status == 500){
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "success",
                    title: result.message
                });
                }else{
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "danger",
                    title: result.message
                });
                    $("#information-table").load(location.href+ " #information-table");
                }
            }
        });
    }
});

$(document).on('submit', '#save_information', function (e)
{
    e.preventDefault();

    var formData = new FormData(this);
    formData.append('save_data', true);

    $.ajax({
        type: 'POST',
        url: "action.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response){
            var result = JSON.parse(response)
            if (result.status == 200)
            {
                $('#information-table').load(location.href + " #information-table")
                $("#save_data").modal("hide");
                $("#save_information")[0].reset();

                const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "success",
                    title: result.message
                });
            }
        }
    });
});

$(document).ready(function() {
    $("#information-table").DataTable({
        responsive: true
    })
});