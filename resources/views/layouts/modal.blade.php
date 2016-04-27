<!-- Modal -->
<div class="modal fade" id="{{$modalId}}" tabindex="-1" role="dialog" aria-labelledby="{{$modalLabel}}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Закрити</span></button>
                <h4 class="modal-title" id="myModalLabel">{{$modalName}}</h4>
            </div>
            @yield('modalContent')
        </div>
    </div>
</div>