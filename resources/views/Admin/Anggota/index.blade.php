<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('Admin.layouts.sidebar')
        <!-- End of Sidebar -->
      

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Admin.layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Page Anggota Keluarga</h1>
                    </div>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between ">
                            <div class="mt-4">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Anggota Keluarga</h6>
                            </div>
                            <div class="d-flex mt-3 align-items-center ">
                                <a href="{{ route('member-create') }}" class="btn bg-primary mb-3 text-sm text-white px-5 mr-3">
                                    <i class="fas fa-plus">
                                    </i>
                                    Create
                                </a>
                                <a href="" class="btn btn-primary mb-3 text-sm px-4">
                                    <i class="fas fa-filter">
                                    </i>
                                    Filter
                                </a>            
                            </div>    
                        </div>
                     
                        <div class="card-body">
                            
                            <div class="d-flex d-flex justify-content-end">
                               <div class="mx-1 my-3 btn btn-info btn-inline">
                                 <a class="text-white text-decoration-none " href="">Export</a>
                                 <i class="fas fa-download"></i>
                               </div>
                               <div class="mx-1 my-3 btn btn-success btn-inline">
                                 <a class="text-white text-decoration-none " href="">Import</a>
                                 <i class="fas fa-upload"></i>
                               </div>
                               
                              
                            </div>
                            <div class=" table-responsive">
                                <table class="order-table ov-h table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>id_family_card</th>
                                            <th>id_resident</th>
                                            <th>connection</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>id_family_card</th>
                                            <th>id_resident</th>
                                            <th>connection</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>8635252616</td>
                                            <td>Bambang</td>
                                            <td>Telaga</td>
                                           
                                            <td>
                                                <a href="{{ route('member-edit') }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                
                                                {{-- <a href="" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a> --}}
                                                <a  href="#mymodal"
                                                data-remote="{{ route('member-detail') }}"
                                                data-title="Detail Keluarga"
                                                data-toggle="modal"
                                                data-target="#mymodal1"
                                                class="btn btn-info btn-sm"
                                                >
                                                <i class="fa fa-eye"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('Admin.layouts.footer')
            @include('sweetalert::alert')
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
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
           <div class="modal-footer">
               
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <form action="{{ url('/logout') }}" method="post">
                   @csrf
                   <button type="hidden" class="btn btn-primary">
                       Logout
                   </button>
               </form>
           </div>
       </div>
   </div>
</div>

 <!-- Bootstrap core JavaScript-->
 <script src="/vendor/jquery/jquery.min.js"></script>
 <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="/js/demo/datatables-demo.js"></script>
</body>

</html>