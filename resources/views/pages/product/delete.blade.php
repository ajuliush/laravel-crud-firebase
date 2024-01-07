  <!-- Delete Model -->
  <form action="" method="POST" class="users-remove-record-model">
      <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog"
          aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-dialog-centered" style="width:55%;">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                      <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal"
                          aria-hidden="true">×
                      </button>
                  </div>
                  <div class="modal-body">
                      <p>Do you want to delete this record?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                          data-dismiss="modal">Close
                      </button>
                      <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </form>
