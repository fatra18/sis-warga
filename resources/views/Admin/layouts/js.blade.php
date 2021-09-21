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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

 <!-- Page level custom scripts -->
 <script src="/js/demo/datatables-demo.js"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
  <script>
     ClassicEditor
             .create( document.querySelector( '.ckeditor' ) )
             .then( editor => {
                     console.log( editor );
             } )
             .catch( error => {
                     console.error( error );
             } );
 </script>
{{-- 
<div class="modal" id="mymodal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title "></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div> --}}
{{-- <script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
            var Id = $('id').text();
            var number_id = $('number_id').text();
            var name = $('name').text();
            var place_of_birth = $('place_of_birth').text();
            var data_of_birth = $('data_of_birth').text();
            var gender = $('gender').text();
            var village = $('village').text();
            var address = $('address').text();
            var rt = $('rt').text();
            var rw = $('rw').text();
            var relegion = $('relegion').text();
            var marital_status = $('marital_status').text();
            var status = $('status').text();
            var button = $(e.relatedTarget);
            var modal = $(this);

            modal.find('.modal-body').load(button.data('remote'))
            modal.find('.modal-title').html(button.data('title'))
        })
    })
</script> --}}

