<div id="form-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Book</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
        <form class="form-horizontal" id="book-form">
            <div class="form-group">
                <label class="col-md-12 control-label" for="book-title">Title</label>  
                <div class="col-md-12">
                    <input id="book-title" name="book-title" type="text" placeholder="Title" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12 control-label" for="book-isbn">ISBN</label>  
                <div class="col-md-12">
                    <input id="book-isbn" name="book-isbn" type="text" placeholder="ISBN" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12 control-label" for="book-author">Author</label>  
                <div class="col-md-12">
                    <input id="book-author" name="book-author" type="text" placeholder="Author" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12 control-label" for="book-publisher">Publisher</label>  
                <div class="col-md-12">
                    <input id="book-publisher" name="book-publisher" type="text" placeholder="Publisher" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12 control-label" for="book-year">Year Published</label>  
                <div class="col-md-12">
                    <input id="book-year" name="book-year" type="Text" placeholder="Year Published" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12 control-label" for="book-category">Category</label>  
                <div class="col-md-12">
                    <input id="book-category" name="book-category" type="text" placeholder="Category" class="form-control input-md" required="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label class="checkbox-inline" for="checkboxes-0">
                    <input type="checkbox" name="archived" id="archived" checked="false" value="false"> Archived
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label" for="btn-submit">Submit Form</label>
                <div class="col-md-12">
                    <button id="btn-submit" type="submit" name="btn-submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default modal-close" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>