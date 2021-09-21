<!DOCTYPE html>
<html lang="en">

<head>
    
    {{-- Include Css --}}
    @include('Admin.layouts.css')
    @include('Admin.layouts.style')  

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
                        <h1 class="h3 mb-2 text-gray-800">Page  Penduduk</h1>
                    </div>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between ">
                            <div class="">
                                <h6 class="m-0 font-weight-bold text-success">DataTables Data Penduduk</h6>
                            </div>
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
                                        <a class="text-black text-decoration-none" href="{{ route('penduduk-export') }}">
                                            <span class="text-dark text-md">Export</span>
                                        </a>
                                      </li>
                                      <li class="my-1 ml-2">
                                        <i class="fas fa-upload"></i>
                                        <a class="text-black text-decoration-none" data-toggle="modal" data-target="#exampleModal" href="{{ route('penduduk-import') }}" method="post" enctype="multipart/form-data">
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
                                     href="{{ route('residents-create') }}"
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
                                            <th>Name</th>
                                            <th>Nik</th>
                                            <th>Marital_status</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Nik</th>                                           
                                            <th>Marital_status</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      @foreach ($data as $item)
                                      <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->number_id }}</td>
                                        <td>{{ $item->marital_status }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('resident-edit',$item->id) }}" class="btn btn-info btn-sm mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                             <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus data ini?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('resident-delete',$item->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>&nbsp; Hapus Data
                                                            </button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a       
                                                id="detail"
                                                href={{ route('resident',$item->id) }}
                                                data-remote="detail"
                                                data-toggle="modal"
                                                data-target="#modal-detail{{ $item->id }}"
                                                data-title="Detail Transaksi"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form action="{{ route('penduduk-import') }}" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            {{ csrf_field() }}
                                                            <div class="from-group">
                                                                <input type="file" name="file" required="required">
                                                                <a href="{{ route('penduduk-template') }}" class="text-dark">
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
                                            <div class="modal" id="modal-detail{{ $item->id }}" tabindex="-1" role="dialog" >
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Penduduk</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <td><span id="id">{{ $item->id }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nik</th>
                                                                    <td><span id="number_id">{{ $item->number_id }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <td><span id="name">{{ $item->name }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>place_of_birth</th>
                                                                    <td><span id="place_of_birth">{{ $item->place_of_birth }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>date_of_birth</th>
                                                                    <td><span id="date_of_birth">{{ $item->date_of_birth }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>gender</th>
                                                                    <td><span id="gender">{{ $item->gender }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>village</th>
                                                                    <td><span id="village">{{ $item->village }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>blood_group</th>
                                                                    <td><span id="blood_group">{{ $item->blood_group }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>rt</th>
                                                                    <td><span id="rt">{{ $item->rt }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>rw</th>
                                                                    <td><span id="rw">{{ $item->rw }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>relegion</th>
                                                                    <td><span id="relegion">{{ $item->religion }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>marital_status</th>
                                                                    <td><span id="marital_status">{{ $item->marital_status }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>work</th>
                                                                    <td><span id="work">{{ $item->work }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>status</th>
                                                                    <td><span id="status">{{ $item->status }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>education</th>
                                                                    <td><span id="status">{{ $item->education }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>contact</th>
                                                                    <td><span id="contact">{{ $item->contact }}</span></td>
                                                                </tr>  
                                                                <tr>
                                                                    <th>age</th>
                                                                    <td><span id="contact">{{ $item->age }}</span></td>
                                                                </tr>  
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            @include('sweetalert::alert')
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

    {{-- Modal --}}
    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              
            </div>
            <div class="modal-body">
              <i class="fas fa-spiner fa-spin"></i>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal Filter -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content " style="width: 500px;">
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
                                <div class="row ">
                                    <div class="form-group col-6">
                                        <label>Gender</label>
                                        {{-- <input type="text" class="form-control" name="gender" placeholder="Filter Gender" value="{{ request()->get('gender') }}"> --}}
                                        <select class="custom-select w-100" id="inputGroupSelect01" name="gender" value="{{ request()->get('gender') }}" >
                                            <option value="0" selected>Choose...</option>
                                            <option value="Pria" {{ request()->get('gender') == 'Pria'? 'selected': null }}>Pria</option>
                                            <option value="Wanita" {{ request()->get('gender') == 'Wanita'? 'selected': null }}>Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label >Marital_status</label>
                                        {{-- <input type="text" class="form-control" name="gender" placeholder="Filter Gender" value="{{ request()->get('gender') }}"> --}}
                                        <select class="custom-select w-100" id="inputGroupSelect01" name="marital_status" value="{{ request()->get('marital_status') }}" >
                                            <option value="0" selected>Choose...</option>
                                            <option value="Nikah" {{ request()->get('marital_status') == 'Nikah'? 'selected': null }}>Nikah</option>
                                            <option value="Single" {{ request()->get('marital_status') == 'Single'? 'selected': null }}>Single</option>
                                            <option value="Janda" {{ request()->get('marital_status') == 'Janda'? 'selected': null }}>Janda</option>
                                            <option value="Duda" {{ request()->get('marital_status') == 'Duda'? 'selected': null }}>Duda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Religion</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="religion" value="{{ request()->get('religion') }}" >
                                            <option value="0" selected>Choose...</option>
                                            <option value="Islam" {{ request()->get('religion') == 'Islam'? 'selected': null }}>Islam</option>
                                            <option value="Kristen" {{ request()->get('religion') == 'Kristen'? 'selected': null }}>Kristen</option>
                                            <option value="Buddha" {{ request()->get('religion') == 'Buddha'? 'selected': null }}>Buddha</option>
                                            <option value="Hindu" {{ request()->get('religion') == 'Hindu'? 'selected': null }}>Hindu</option>
                                            <option value="Dll" {{ request()->get('religion') == 'Dll'? 'selected': null }}>Dll</option>
                                        </select>
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="basic-url" class="form-label">Date_Of_Birth</label>
                                        <input 
                                            type="date" 
                                            class="form-control"
                                            name="date_of_birth"
                                            value="{{ request()->get('date_of_birth') }}" 
                                            placeholder="Name" 
                                            aria-label="Username" 
                                            aria-describedby="addon-wrapping"
                                            >
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="basic-url" class="form-label">Place_of_birth</label>
                                        <input 
                                            type="text" 
                                            class="form-control "
                                            name="place_of_birth"
                                            value="{{ request()->get('place_of_birth') }}" 
                                            placeholder="Cth: Jambi-Pandang" 
                                            aria-label="Username" 
                                            aria-describedby="addon-wrapping"
                                            >
                                    </div>
                                    <div class="from-group col-6 mb-3">
                                        <label for="basic-url" class="form-label">Work</label>
                                        <input 
                                            type="text" 
                                            class="form-control "
                                            name="work"
                                            value="{{ request()->get('work') }}" 
                                            placeholder="Cth:Developer" 
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
                        <button type="submit" formaction="{{ route('resident') }}" class="btn btn-primary">Terapkan</button>
                        <button type="submit" formaction="{{ route('resident-reset') }}" class="btn btn-danger float-right">Reset</button>
                       </div>
                   </form>
            </div>
        </div>
        </div>
    </div>

    {{-- Include Js --}}
    @include('Admin.layouts.js')
    @push('after-script')
    <script>
        $("#filter").fireModal({
        title:'Filter Data',
        body: `        
        `});
        <script>
        jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal',function(e){
            var button =  $(e.relatedTarget);
            var modal  = $(this);

            modal.find('.modal-body').load(button.data('remote'));
            modal.find('.modal-title').html(button.data('title'));
            });
        });
        </script>

    
    </script>
    @endpush

</body>

</html>
