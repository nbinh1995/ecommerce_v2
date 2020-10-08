<!-- Modal -->
<div class="modal fade" id="common-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog {{$sizeModal ?? ''}}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__($titleModal ?? '')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__($contentModal ?? '')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="{{$idForm ?? ''}}" class="btn btn-primary">{{__($btnName ?? '')}}</button>
            </div>
        </div>
    </div>
</div>