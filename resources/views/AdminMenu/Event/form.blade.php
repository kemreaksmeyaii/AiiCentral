<div class="modal fade" id="formModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userFormLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="" id="userForm">
                            @csrf
                            <!--create token-->
                            <div class="form-group row">
                                <label for="title_kh" class="col-sm-4 col-form-label">Title [Khmer]<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title_kh" name='title_kh' value="{{old('title_kh')}}"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="parent_category_id" class="col-sm-4 col-form-label">Category<span class="text-danger">*</span></label>
                                <div class="col-md-8 mb-3">
                                    <select class="custom-select form-control" name="parent_category_id" id="parent_category_id">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_kh" class="col-sm-4 col-form-label">Date Khmer</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="date_kh" name='date_kh' value="{{old('date_kh')}}"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="feature">Featured </label>
                                <div class="col-md-8 mb-1 custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="feature" id="feature" autocomplete="off" />
                                    <label class="custom-control-label" for="feature"></label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="" id="userForm">
                            @csrf
                            <!--create token-->
                            <div class="form-group row">
                                <label for="title_en" class="col-sm-4 col-form-label">Title [English]<span class="text-danger"></span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title_en" name='title_en' value="{{old('title_en')}}"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="schedule" class="col-sm-4 col-form-label">Expiration Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="expire_date" id="expire_date" placeholder="Select Expiration Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_en" class="col-sm-4 col-form-label">Date English</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="date_en" name='date_en' value="{{old('date_en')}}"
                                        autocomplete="off" />
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="description_kh" class="col-sm-2 col-form-label">Description [Khmer]</label>
                    <div class="col-sm-10">
                        <textarea name="description_kh" class="form-control" id="description_kh" rows="3">{{old('description_kh')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description_en" class="col-sm-2 col-form-label">Description [English]</label>
                    <div class="col-sm-10">
                        <textarea name="description_en" class="form-control" id="description_en" rows="3">{{old('description_en')}}</textarea>
                    </div>
                </div>
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
    $('#expire_date').daterangepicker(
    {
        opens: 'left',
        locale: {
            format: 'YYYY/MM/DD'
        },
    }, function(start, end, label)
    {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
</script>
