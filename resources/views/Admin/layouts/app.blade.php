<!DOCTYPE html>
<html lang="en">

<head>

    @include('Admin.layouts.style')

   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        @include('Admin.layouts.sidebar')
        
        <div id="content-wrapper" class="d-flex flex-column">
           <div id="content">
           @include('Admin.layouts.navbar')
           <div class="container-fluid">
               <section>
                   @yield('content')
               </section>
               <div class="mt-5">
                   @include('Admin.layouts.footer')
                   @stack('addon-script')
               </div>
           </div>
           </div> 
        </div>
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('sweetalert::alert')
    
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

   {{-- Include Link Script --}}
   @stack('before-script')
   @include('Admin.layouts.script')
   @stack('after-script')
   <div class="d-flex justify-content-end">
   @include('Admin.layouts.js')
   </div>

</body>

</html>