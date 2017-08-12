<div class="form-group message_modal modal modal-default fade" id="tweet">
    <div class="modal-dialog">
        <div class="modal-content">
                    <h3 style="color:#1E90FF; text-align:center"  class="modal-title">Tweet</h3>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/posts/store" method="post"  >
                    {{csrf_field()}}
                    <div class="row">
                        
                        <div class="col-lg-12">
                            
                            <label for="msg_title" class="mb-10">content</label>
                            <input id="msg_title" name="content" type="text" class="branch_address3 form-control mb-20" />
                        </div>

                        
                    </div>  
                    
                
            </div>
            <div class="modal-footer">
                <div class="col-lg-2 col-lg-offset-3">
                    <input type="submit" class="btn btn-info btn-md" value="tweet" />
                </div>
                <div class="col-lg-2 col-lg-offset-1">
                    <button type="button" class="btn btn-info btn-md" data-dismiss="modal">cancel</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


