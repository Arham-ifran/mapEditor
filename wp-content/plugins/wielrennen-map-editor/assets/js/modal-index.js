jQuery(document).ready(function($) {
  $(document).on('click','.delete_map',function() {
    let id = $(this).data('value');
    
      $.post(ajax_object.ajax_url, {action: 'delete_custom_map', id:id }).done(response => {
          alert('Map has deleted Successfully');
          setTimeout(function() {
            location.reload();
        },1000)
      });

  });
    $(document).on('click','.edit_gpx_info',function() {
        let id = $(this).data('id');
        modal('Custom Map','loading','','',false,function(modal_Id){
            $.post(ajax_object.ajax_url, {action: 'gpx_file_modal', id:id }).done(response => {
                $('#'+modal_Id).find('.modal-body').html(response);
            });

        });
    });
    $(document).on('click','.gpx_product_update',function() {
        var file_data = $('#product_image').prop('files')[0];
        let id = $(this).data('id');
        let title = $('.product_title').val();
        let active = $('.product_status').val();
        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('title', title);
        form_data.append('active', active);
        form_data.append('file', file_data);
        form_data.append('action', 'update_gpx_product_info');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            contentType: false,
            processData: false,
            data: form_data,
            success: function (response) {
                response = JSON.parse(response);
                alert(response.msg);
        
                setTimeout(function() {
                    location.reload();
                },1000)
            }
        });
        
        
      
    });
});


function modal(header, body, footer, size, center, callback,classes) {
    header = header !== undefined ? header : 'Modal header';
    body = body !== undefined ? body : 'Modal body';
    footer = footer !== undefined ? footer : 'Modal footer';
    center = center !== undefined ? 'modal-dialog-centered' : '';
    size = size !== undefined ? size : '';
    classes = classes !== undefined ? classes : '';
    let closeBtn = `<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`;
    let $modalId = new Date().getSeconds();
    let $modal = `<div class="modal fade ${classes}" tabindex="-1" role="dialog" id="modal-${$modalId}">
      <div class="modal-dialog ${center} ${size}" role="document">
        <div class="modal-content border-orange">
          <div class="modal-header">
            ${header}${closeBtn}
          </div>
          <div class="modal-body">
            ${body}
          </div>
        </div>
      </div>
    </div>`;

    jQuery(document.body).append($modal);
    jQuery('#modal-'+$modalId).modal('show');

    jQuery(document).on('hidden.bs.modal', '#modal-'+$modalId, function(e) {
      jQuery('#modal-'+$modalId).remove();
    });
    if (callback !== undefined && typeof callback == 'function') {
      return callback('modal-'+$modalId);
    }
}