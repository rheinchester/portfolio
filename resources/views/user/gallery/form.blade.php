<form role="form" action="GalleriesController@store" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="box-body">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" val id="title" name="title" placeholder="Title">
      </div>
      
      <div class="form-group">
        <label for="subtitle">Post Sub Title</label>
        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title">
      </div>
      
      <div class="form-group">
        <label for="slug">Post Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
      </div>
      
    </div>
    <div class="col-lg-6">
      <div class="form-group" >
        <label>Select Tags</label>
        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
          {{-- @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach --}}
          </select>
        </div>
        <div class="form-group" >
          <label>Select Category</label>
          <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
            {{-- @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach --}}
            </select>
          </div>
          <br>
          <div class="form-group">
            <div class="pull-right">
              <label for="image">File input</label>
              <input type="file" name="cover_image" id="image">
            </div>
            <div class="checkbox pull-left">
              <label>
                <input type="checkbox" name="status" value="1"> Publish
              </label>
            </div>
          </div>
          <br>
          
        </div>
      </div>
      <!-- /.box-body -->
      
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Write Post Body Here
            <small>Simple and fast</small>
          </h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form>
              <textarea  class="textarea" id="editor1" name="body" value="" rows="10" cols="80">
                
              </textarea>
            </form>
          </div>
        </div>
        
        <div class="box-footer">
          <input type="submit" class="btn btn-primary">
          <a href='' class="btn btn-warning">Back</a>
        </div>
      </form>