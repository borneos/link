// $(document).ready(function(){

//     $('.editData').on('click', function(){

//         const id = $(this).data('id')

//         // $.ajax({
//         //     url: `/links/${id}/edit`,
//         //     data: {id : id},
//         //     method: 'get',
//         //     dataType: 'json',
//         //     success: function(data){
//         //         // console.log(data)
//         //         // $('#id').val(data.id)
//         //         // $('#formEdit').attr('action', `!{{ route('links.update', ${id}) }}!`)
//         //         $('#name').val(data.name)
//         //         $('#link').val(data.link)
//         //     }
//         // })

//         $.get(`links/${id}/edit`, function (data) {
//             // $('#modelHeading').html("Edit Product");
//             // $('#saveBtn').val("edit-user");
//             // $('#ajaxModel').modal('show');
//             $('#id').val(data.id)
//             $('#name').val(data.name)
//             $('#link').val(data.link)
//         })

//     })
// })
