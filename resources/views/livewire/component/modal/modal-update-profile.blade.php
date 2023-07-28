<div>
  <div class="induk">
        <!-- Modal -->
        <div class="modal fade {{$is_show == true ? 'show' : ''}}" style="{{$is_show == true ? 'background-color: #00000073;display:block' : 'display:none'}}" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
             <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Update Profile</h5>
                  <a  class="close" data-dismiss="modal" aria-label="Close" wire:click="modal_toggle(false)">
                  <span aria-hidden="true">&times;</span>
                  </a>
             </div>
             <div class="modal-body">
             {!!$modalBody !!}
             </div>
          
             <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" wire:click="modal_toggle(false)">Tutup</button>
                  <button type="button" class="btn btn-primary" wire:click="modal_save('profile')">Simpan</button>
             </div>
             </div>
             </div>
        </div>
  </div>
</div>
