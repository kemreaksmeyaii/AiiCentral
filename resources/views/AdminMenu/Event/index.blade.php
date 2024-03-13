<div class="col-xl-12">
    <div id="panel-1" class="panel">
        <div class="panel-hdr">
            <h2>
                Events Article<span class="fw-300"><i>List</i></span>
            </h2>
            <div class="panel-toolbar">
                <button class="btn btn-primary btn-sm waves-effect waves-themed" onclick="create()">Add New</button>
            </div>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                <!-- datatable start -->
                <table id="datalist" class="table table-bordered table-hover table-striped w-100"
                    style="font-size: 12px;border:1px solid #eee;">
                    <thead>
                        <tr>
                            <th style="text-align:center!important">id</th>
                            <th style="text-align:center!important">Ttile</th>
                            <th style="text-align:center!important">Category</th>
                            <th style="text-align:center!important">Date Khmer</th>
                            <th style="text-align:center!important">Date English</th>
                            <th style="text-align:center!important">Expiration Date</th>
                            <th style="text-align:center!important">Create Date</th>
                            <th style="text-align:center!important">Action</th>
                        </tr>
                    </thead>
                    <tbody style="border:1px solid #eee;"></tbody>
                </table>
                <!-- datatable end -->
            </div>
        </div>
    </div>
</div>
@include('AdminMenu.Event.form')
<script>
    {
        var idEdit = null;
        function valueFil(val = null) {
            // debugger
            let title_kh = null;
            let title_en = null;
            let feature = null;
            let parent_category_id = null;
            let date_kh = null;
            let date_en = null;
            let expire_date = null;
            let schedule =null;
            let description_kh = null;
            let description_en = null;
            if(val === null){
                title_kh = $('#title_kh').val();
                title_en = $('#title_en').val();
                feature = $('#feature').is(':checked')?1:0;
                parent_category_id = $('#parent_category_id').val();
                date_kh = $('#date_kh').val();
                date_en = $('#date_en').val();
                expire_date = $('#expire_date').val();
                schedule = $('#schedule').val();
                description_kh = CKEDITOR.instances['description_kh'].getData();
                description_en =  CKEDITOR.instances['description_en'].getData();
                expire_date = expire_date?expire_date.split("-"):[null, null]; //dateRange
                return {
                    'title_kh': title_kh,
                    'title_en': title_en,
                    'feature': feature,
                    'parent_category_id': parent_category_id,
                    'date_kh': date_kh,
                    'date_en': date_en,
                    'start_date': expire_date[0],
                    'end_date': expire_date[1],
                    'schedule': schedule,
                    'description_kh': description_kh,
                    'description_en': description_en,
                }
            }
            if(val === 'clear'){
                $('#title_kh').val('');
                $('#title_en').val('');
                $('#feature').val('');
                $('#parent_category_id').val('');
                $('#date_kh').val('');
                $('#date_en').val('');
                $('#expire_date').val('');
                // $('#schedule').val('');
                $('#description_kh').val('');
                $('#description_en').val('');
            }

        }

        $(document).ready(function() {
            $('#btnUpdate').hide();
            getdata();

        });

        function getdata() {
            $.ajax({
                url: "{{ url('api/admin/event') }}",
                type: "GET",
                beforeSend: function(xhr) {
                    blockagePage('Please Wait...');
                    xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
                },
                success: function(response) {
                    if (response.status == "error") {
                        sweetToast(response.msg, response.icon);
                        return;
                    }
                    dataList(response.data);
                    unblockagePage();
                },
                error: function(e) {
                    if (e.status = 401) //unauthenticate not login
                    {
                        Msg('Login is Required', 'error');
                    }
                    unblockagePage();
                }
            });
        }
        function getdataCategory(oldId = null) {
            $.ajax({
                url: "{{ url('api/admin/category-event') }}",
                type: "GET",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
                },
                success: function(response) {
                    if (response.status == "error") {
                        sweetToast(response.msg, response.icon);
                        return;
                    }
                    let txt = '';
                    response.data.map((val, index) => {
                        txt += `<option value="${val.id}" ${selectDataUpdate(oldId, val.id, index)}>${val.name_en}</option>`;
                    });
                    $('#parent_category_id').html(txt);
                    unblockagePage();
                },
                error: function(e) {
                    if (e.status = 401) //unauthenticate not login
                    {
                        Msg('Login is Required', 'error');
                    }
                    unblockagePage();
                }
            });
        }
        function selectDataUpdate(oldId, id, index){
            let selected = '';
            if(oldId == null){
                if(index == 0){
                    selected = 'selected="selected"';
                }
            }else{
                if(oldId == id){
                    selected = 'selected="selected"';
                }
            }
            return selected;
        }

        // open form popup
        function create() {
           valueFil('clear');
            $('#btnUpdate').hide();
            $('#formModal').modal();
            getdataCategory();
        }

        function save() {

            if (0 === 0) {
                $.ajax({
                    url: "{{ url('/api/admin/event') }}",
                    type: "POST",
                    data: valueFil(),
                    beforeSend: function(xhr) {
                        blockagePage('Please Wait...');
                        xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
                    },
                    success: function(response) {
                        if (response.status == "error") {
                            validationMgs(response);
                            return;
                        }
                        $("#formModal").modal('hide');
                        sweetToast(response.status, response.icon);
                        unblockagePage();
                        dataList(response.data);
                    },
                    error: function(e) {
                        Msg('Error Saving User', 'error');
                        unblockagePage();
                    }
                });
            }
        }

        function edit(id) {
            idEdit = id;
            let data = getRowData(id);
            $('#formModal').modal();
            $('#title_kh').val(data.title_kh);
            $('#title_en').val(data.title_en);
            $('#date_kh').val(data.date_kh);
            $('#date_en').val(data.date_en);
            $('#feature').attr( 'checked', data.feature == 0?false:true); // checkebox update
            CKEDITOR.instances['description_kh'].setData(data.description_kh);
            CKEDITOR.instances['description_en'].setData(data.description_en);

            getdataCategory(data.parent_category_id); // select update
            // update date range
            $('#expire_date').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY/MM/DD'
                },
                timePicker: true,
                startDate: data.start_date,
                endDate: data.end_date
            });

            $('#btnSave').text('Add New');
            $('#btnUpdate').show();
        }

        function getRowData(id) {
            var table = $('#datalist').DataTable();
            var selectRow = table.row($('#datalist #' + id));
            return selectRow.data();
        }

        function update() {
            valueFil();
            if (0 === 0) {
                $.ajax({
                    url: "{{ url('/api/admin/event') }}/"+idEdit,
                    type: "PUT",
                    data: valueFil(),
                    beforeSend: function(xhr) {
                        blockagePage('Please Wait...');
                        xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
                    },
                    success: function(response) {
                        if (response.status == "error") {
                            validationMgs(response);
                            return;
                        }
                        idEdit = null;
                        $("#formModal").modal('hide');
                        $('#btnUpdate').hide();
                        unblockagePage();
                        sweetToast(response.status, response.icon);
                        dataList(response.data);
                    },
                    error: function(e) {
                        Msg('Error Saving User', 'error');
                        unblockagePage();
                    }
                });
            }
        }

        function destroy(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to Deleted now!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('/api/admin/event') }}/"+id,
                        type: "DELETE",
                        beforeSend: function(xhr) {
                            blockagePage('Please Wait...');
                            xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
                        },
                        success: function(response) {
                            if (response.status == "error") {
                                validationMgs(response);
                                return;
                            }
                            idEdit = null;
                            unblockagePage();
                            sweetToast(response.status, response.icon);
                            dataList(response.data);
                        },
                        error: function(e) {
                            Msg('Error Saving User', 'error');
                            unblockagePage();
                        }
                    });
                }
            });
        }

        // datatable data
        function dataList(data) {
            var cols = [
                {
                    "data": "id",
                    "name": "id",
                    "searchable": true,
                    "orderable": true,
                    "visible": false,
                },
                {
                    "data": "title_en",
                    "name": "title_en",
                    "searchable": true,
                    "orderable": true,
                    "visible": true,
                    render: function(title_en, type, row){
                        return `${title_en} - [${row.title_kh}]`;
                    }
                },
                {
                    "data": "category.name_en",
                    "name": "category",
                    "searchable": true,
                    "orderable": true,
                    "visible": true,
                },
                {
                    "data": "date_kh",
                    "name": "date_kh",
                    "searchable": true,
                    "orderable": true,
                    "visible": true,
                },
                {
                    "data": "date_en",
                    "name": "date_en",
                    "searchable": true,
                    "orderable": true,
                    "visible": true,
                },
                {
                    "data": "start_date",
                    "name": "start_date",
                    "searchable": true,
                    "orderable": true,
                    "visible": true,
                    render: function(start_date, type, row){
                        return start_date+` - `+row.end_date;
                    }
                },
                {
                    "data": "created_at",
                    "name": "created_at",
                    "searchable": true,
                    "orderable": true,
                    "visible": true,
                    render: function(created_at, type, row) {
                        return moment(created_at).format('DD-MMM-YYYY');
                    }
                },
                {
                    "data": null,
                    "name": "Action",
                    "searchable": false,
                    "orderable": false,
                    "visible": true,
                    "class": "dt-center",
                    render: function(data, type, row, meta) {
                        //return JSON.stringify(data);

                        var str =
                            '<div class="dropdown">' +
                            '<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fal fa-cog" aria-hidden="true"></i></button>' +
                            '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' +
                            `<a class="dropdown-item" href="javascript:void(0);" onclick="edit(${row.id})"> <i class="fal fa-pencil" aria-hidden="true"></i> Edit</a>` +
                            '<a class="dropdown-item" href="javascript:void(0);" onclick="destroy(' + row.id +
                            ')"> <i class="fal fa-trash" aria-hidden="true"></i> Remove</a>' +
                            '</div>' +
                            '</div>';
                        return str;
                    }

                }, //
            ];



            var btn = [
                // {
                //     extend: 'print',
                //     text: 'Print',
                //     titleAttr: 'Print Table',
                //     className: 'btn-outline-primary btn-sm'
                // }
            ];
            if ($.fn.DataTable.isDataTable('#datalist')) {
                $('#datalist').DataTable().clear();
                $('#datalist').DataTable().destroy();
            }
            //////INT TABLE//////
            var table = $('#datalist').DataTable({
                "data": data,
                "columns": cols,
                "buttons": btn,
                "order": [0, 'desc'],
                "rowId": "id",
                "responsive": "true",
                dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            });
            //////INT TABLE//////
        }
    }
</script>
<script>
     var options = {
            height: 230,
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
        };
        $('#description_kh').each(function () {
            CKEDITOR.replace($(this).prop('id'), options);
            CKEDITOR.config.allowedContent = true;
        });
        $('#description_en').each(function () {
            CKEDITOR.replace($(this).prop('id'), options);
            CKEDITOR.config.allowedContent = {
                $1: {
                    elements: CKEDITOR.dtd,
                    attributes: true,
                    styles: true,
                    classes: true
                }
            };
            CKEDITOR.config.disallowedContent = 'script; *[on*]';
        });
</script>
