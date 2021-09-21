<!DOCTYPE html>
<html lang="en">

<head>

    @include('Admin.layouts.css')
    
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
                        <h1 class="h3 mb-2 text-gray-800">Page Pindah</h1>
                    </div>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between ">
                            <h6 class="m-0 font-weight-bold text-success">DataTables Data Pindah</h6>
                            <div class="d-flex mt-3 align-items-center ">
                               
                            </div>    
                        </div>
                     
                        <div class="card-body">
                            
                            <div class="d-flex d-flex justify-content-end align-items-center">
                                <div class="dropdown">
                                    <a class="btn btn-secondary " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Export & Import
                                    </a>
                                  
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <li class="my-1 ml-2">
                                        <i class="fas fa-download"></i>
                                        <a class="text-black text-decoration-none" href="{{ route('move-export') }}">
                                            <span class="text-dark text-md">Export</span>
                                        </a>
                                      </li>
                                      <li class="my-1 ml-2">
                                        <i class="fas fa-upload"></i>
                                        <a class="text-black text-decoration-none" data-toggle="modal" data-target="#exampleModal" href="{{ route('move-import') }}" method="post" enctype="multipart/form-data">
                                            <span class="text-dark">Import</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                <div class="mx-1 my-3 btn btn-success btn-inline">
                                    <a   
                                     href="{{ route('family-card') }}"
                                     data-toggle="modal" 
                                     data-target="#filterModal" 
                                     class="text-white text-decoration-none"
                                     >
                                     Filter
                                     </a>
                                     <i class="fas fa-filter"></i>
                                </div>
                                <div class="mx-1 my-3 btn btn-primary btn-inline " style="width: 200px;">
                                    <a   
                                     href="{{ route('move-create') }}"
                                     class="text-white text-decoration-none "
                                     >
                                     Create
                                     </a>
                                </div>
                               
                              
                            </div>
                            
                            <div class=" table-responsive">
                                <table class="order-table ov-h table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Resident</th>
                                            <th>Date_move</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Resident</th>
                                            <th>Date_move</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($move as $item )
                                      <tr>
                                        <td>{{ $item->resident->name }}</td>
                                        <td>{{ $item->date_move }}</td>
                                        <td>{{ $item->reason }}</td>
                                       
                                        <td class="d-flex">
                                            <a href="{{ route('move-edit',$item->id) }}" class="btn btn-info btn-sm mr-1">
                                                <i class="fas fa-pencil-alt "></i>
                                            </a>
                                            <form action="{{ route('move-delete',$item->id) }}" class="mr-1" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" ><i  class="fas fa-trash"></i></button>
                                                @method('DELETE')
                                               
                                            </form>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form action="{{ route('move-import') }}" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="from-group">
                                                                <input type="file" name="file" required="required">
                                                                <a href="{{ route('move-template') }}" class="text-dark">
                                                                    <i class="fas fa-paperclip"></i>
                                                                    <span>Download template</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                                                            <button type="submit" class="btn btn-primary">Import</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            
                                            {{-- <a href="" class="btn btn-warning btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a> --}}
                                           
                                        </td>
                                    </tr>
                                      @endforeach
                                       
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
 <!-- Modal Filter -->
 <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content " style="width: 450px;">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filter Data Resident</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="row d-flex justify-content-center">                
                                    <div class="from-group col-6">
                                        <label>Resident</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="residents_id" value="{{ request()->get('residents_id') }}" >
                                            <option value="0" selected>Choose...</option>
                                            @foreach ($move as $data )
                                            <option value="{{ $data->resident->id }}" >{{ $data->resident->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="basic-url" class="form-label">Date_move</label>
                                        <input 
                                            type="date" 
                                            class="form-control"
                                            name="date_move"
                                            value="{{ request()->get('date_move') }}" 
                                            placeholder="Name" 
                                            aria-label="Username" 
                                            aria-describedby="addon-wrapping"
                                            >
                                    </div>    
                                </div>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" formaction="{{ route('move') }}" class="btn btn-primary">Terapkan</button>
                        <button type="submit" formaction="{{ route('move-reset') }}" class="btn btn-danger float-right">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   @include('Admin.layouts.js')
   @include('sweetalert::alert')


</body>

</html>