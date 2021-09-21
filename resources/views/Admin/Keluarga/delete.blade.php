<form action="{{ route('family-delete',$item->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
           <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Family Delete') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">You sure you want to delete? <b>{{ $item->family_card_number }}</b></div>
            <div class="modal-footer">
                <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-outline-danger">{{ __('Delete') }}</button>
            </div>  
           </div>
        </div>
    </div>
</form>   