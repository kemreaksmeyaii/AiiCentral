<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userFormLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="userForm">
                    @csrf
                    <div class="form-group row" id="divMenu">
                        <label for="title_kh" class="col-sm-4 col-form-label">Title [Khmer] <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title_kh" name='title_kh' {{old('title_kh')}}
                                autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group row" id="divMenu">
                        <label for="title_en" class="col-sm-4 col-form-label">Title [English] <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title_en" name='title_en' {{old('title_en')}}
                                autocomplete="off" />
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="col-sm-4 form-label" for="thumbnail">Image <span class="text-danger">*</span> </label>
                        <div class="col-sm-8">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white" style="border-radius: none; position: absolute;">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                            <input id="thumbnail" class="form-control" type="text" name="thumbnail" {{old('thumbnail')}}>
                            <div id="holder" style="margin-top:15px;max-height:100px; margin-bottom:15px;"></div>
                            {{-- show image when selected --}}
                        </div>
                    </div>
                    <div class="form-group row" id="divMenu">
                        <label for="link_slide" class="col-sm-4 col-form-label">Link</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="link_slide" name='link_slide' {{old('link_slide')}}
                                autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group row" id="divMenu">
                        <label for="ordering" class="col-sm-4 col-form-label">Ordering <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="ordering" name='ordering' {{old('ordering')}} autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_kh" class="col-sm-4 col-form-label">Description [Khmer]</label>
                        <div class="col-sm-8">
                            <textarea name="description_kh" class="form-control" id="description_kh" rows="3">{{old('description_kh')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_en" class="col-sm-4 col-form-label">Description [English]</label>
                        <div class="col-sm-8">
                            <textarea name="description_en" class="form-control" id="description_en" rows="3">{{old('description_en')}}</textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
                <button type="button" class="btn btn-primary" id="btnUpdate" onclick="update()">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    var route_prefix = "/filemanager";
   $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
