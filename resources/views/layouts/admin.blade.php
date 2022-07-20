<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Borneos Link</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.svg') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link
        href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @livewireStyles


</head>

<body id="page-top">

    @include('sweetalert::alert')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @yield('sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        @yield('user')

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        @yield('content')
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                        </div>

                        <div class="col-lg-6 mb-4">

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Borneos Link 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/generate.js') }}"></script>
    <script src="{{ asset('js/validate.js') }}"></script>
    <script src="{{ asset('js/check-prefix-landing.js') }}"></script>
    <script src="{{ asset('js/links.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    // <!-- Page level custom scripts -->
    {{-- <script src="{{ url('js/demo/chart-area-demo.js') }}"></script> --}}


    <script>

        $(document).ready( function () {
            let id = 1
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: '{{ url('data') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'prefix', name: 'prefix' },
                    { data: 'value', name: 'value' },
                    { data: 'shortUrl', name: 'shortUrl', render:function(data){
                        return "<a href='" +data+ "' target='_blank'>"+data+"</a>"
                    }},
                    { data: 'visited', name: 'visited' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).ready(function(){
            $('#title').keyup(function (){
                let value = $('#title').val()
                $('#text-title').text(value)
            }).keyup()
        });
        $(document).ready(function(){
            $('#description').keyup(function (){
                let value = $('#description').val()
                $('#text-desc').text(value)
            }).keyup()
        });

        $(document).ready(function() {
            $('#btnSave').prop('disabled', true);
            $('.item').keyup(function() {
                if( $(this).val() != '' ) {
                    $('#btnSave').prop('disabled', false);
                } else {
                    $('#btnSave').prop('disabled', true);
                }
            });
        });

        $(document).ready(function(){
            let idNumber = 0
            $("#add").click(function(){
                idNumber++
                let card =`<div class='itemCard' id='itemCard${idNumber}' class='card mb-3 mt-3'><div class='card-body'><input type='text' name='text[]' id='itemText${idNumber}' class='form-control mb-2' placeholder='Item Text'><input type='text' name='url[]' id='itemUrl${idNumber}' class='form-control mb-2' placeholder='Item Link URL'><button type='button' class='btn btn-outline-danger btndelete' id='btnDeleteItem${idNumber}'>Hapus</button></div></div> `

                let button = `<button type='button' class='btn btn-light my-2 py-3 btn-lg'> </button>`

                $("#item").append(card)
                // $(".item-preview").append(button)
            });

            $('#itemText').keyup(function (){
                let value = $('#itemText').val()
                $('#btnItem').text(value)
            }).keyup();
        });

        // $(document).on('click', '.btndelete', function(){
        //     $(this).parents('.itemCard').remove()
        // });

        // function deleteItem(){
        //     // $(`.itemCard${id}`).remove()

        // }

        // function editItem(id){

        //     // let btnEdit = "<button type='submit' class='btn btn-success'> Simpan Perubahan </button>"

        //     $(`.itemCard${id} .itemUrl`).attr('readonly', false)
        //     $(`.itemCard${id} .itemText`).attr('readonly', false)
        //     // $(`.itemCard${id} .btnUpdate`).empty().append(btnEdit)
        //     // $(`.itemCard${id}`).removeAttr('readonly')
        // }


        $('.show_confirm').click(function(e){
            let form = $(this).closest("#deleteForm")
            e.preventDefault();
            // let id = $(this).data('id')
            // console.info('y')
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    form.submit()
                }
            })
        });

        function preview() {
            imgpreview.src=URL.createObjectURL(event.target.files[0])
        }

        $("#text, #url").on('keyup', function() {
            $("#btnSave").prop("", this.value.length);
        });

        let Clipboard = new ClipboardJS('#btncopy')

        $('.editData').on('click', function(){

            let id = $(this).data('id')
            let url = "{{ route('links.update', ":id") }}"
            url = url.replace(':id', id)

            $.ajax({
                url: `/links/${id}/edit`,
                data: {id : id},
                method: 'get',
                dataType: 'json',
                success: function(data){
                    // console.log(id)
                    // $('#id').val(data.id)
                    $('#formEdit').attr("action", url)
                    $('#name').val(data.name)
                    $('#link').val(data.link)
                }
            })

        })

</script>

@livewireScripts
</body>

</html>
