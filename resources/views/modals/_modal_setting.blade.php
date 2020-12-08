<!-- Modal -->
<div class="modal fade" id="mdlSetting" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleSetting">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="frmSetting">
              <input type="hidden" name="masterId" id="masterSettingsId" value="" />
              @yield("content_form_setting_modal")
          </form>
          @yield("content_other_setting_modal")
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn-setting">Guardar</button>
      </div>
    </div>
  </div>
</div>