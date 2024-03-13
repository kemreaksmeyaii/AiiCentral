<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative"
            data-toggle="modal" data-target="#modal-shortcut">
            <!-- <img src="{{ asset('plugin/img/ais.png') }}" alt="AII Language Center" aria-roledescription="logo"
                style="width:56px!important;height:28px!important;"> -->
            <span class="page-logo-text mr-1"> Aii Language Center</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control"
                    tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off"
                    data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <img src="" class="profile-image rounded-circle" id="leftpaneluserphoto">

            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                    <span class="text-truncate text-truncate-sm d-inline-block" id="leftpanelusername">
                        Adminitrator
                    </span>
                </a>
                <!--<span class="d-inline-block text-truncate text-truncate-sm" id="leftpanelbranch">Branch : </span>-->
            </div>
            <img src="{{ asset('plugin/img/card-backgrounds/cover-2-lg.png') }}" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle"
                data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <!--
            TIP: The menu items are not auto translated. You must have a residing lang file associated with the menu saved inside dist/media/data with reference to each 'data-i18n' attribute.
        -->
        <ul id="js-nav-menu" class="nav-menu">

            <li class="nav-title">System Menu</li>

            <li name='panelList' data-access-to="DashboardBackend-DashboardBackend">
                <a href="{{url('/admin/home')}}" title="Home" data-filter-tags='{"anchor":"single","role":"parent"}'
                    onclick='PanelLinkActive(this);'>
                    <i class="fal fa-home"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>

            {{-- article --}}
            <li name='panelList' data-access-to="parent">
                <a href="javascript:void(0);" title="Setting" data-filter-tags='{"anchor":"miltiple","role":"parent"}'>
                    <i class="fal fa-file-alt"></i>
                    <span class="nav-link-text">Articles</span>
                </a>
                <ul>
                    <li name='panelList' data-access-to="Article-index">
                        <a href="javascript:void(0);" title="Assets Info" id="articleList"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}' onclick='PanelLinkActive(this);viewArticle()'
                            class=" waves-effect waves-themed">
                            <span class="nav-link-text">Content List</span>
                        </a>
                    </li>

                    <li name='panelList' data-access-to="CategoryArticle-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewCategoryArticle()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Category List</span>
                        </a>
                    </li>
                    <!-- <li name='panelList' data-access-to="Article-viewTeachers">
                        <a href="javascript:void(0);" title="Assets Info" id="teachersList"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}' onclick='PanelLinkActive(this);viewTeachers()'
                            class=" waves-effect waves-themed">
                            <span class="nav-link-text">Related Teachers</span>
                        </a>
                    </li> -->
                </ul>
            </li>

            {{-- Menus --}}
            <li name='panelList' data-access-to="parent">
                <a href="javascript:void(0);" title="Setting" data-filter-tags='{"anchor":"miltiple","role":"parent"}'>
                    <i class="fal fa-list"></i>
                    <span class="nav-link-text">Menus</span>
                </a>
                <ul>
                    <li name='panelList' data-access-to="Menu-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewMenuItems()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">All Menu Items</span>
                        </a>
                    </li>
                    {{-- <li name='panelList' data-access-to="Menu-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewTypeConfig()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Type Config</span>
                        </a>
                    </li> close by sh --}}
                    {{-- <li name='panelList' data-access-to="Type-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewType()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Type</span>
                        </a>
                    </li> close by sh --}}
                </ul>
            </li>

            {{-- Event --}}
            <li name='panelList' data-access-to="parent">
                <a href="javascript:void(0);" title="Setting" data-filter-tags='{"anchor":"miltiple","role":"parent"}'>
                    <i class="fal fa-calendar-alt"></i>
                    <span class="nav-link-text">Events</span>
                </a>
                <ul>
                    <li name='panelList' data-access-to="Event-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewEvent()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Event Lists</span>
                        </a>
                    </li>
                    <li name='panelList' data-access-to="CategoryEvent-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewCategoryEvent()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Categories Lists</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Alumni --}}
            <!-- <li name='panelList' data-access-to="parent">
                <a href="javascript:void(0);" title="Setting" data-filter-tags='{"anchor":"miltiple","role":"parent"}'>
                    <i class="fal fa-calendar-alt"></i>
                    <span class="nav-link-text">Alumni</span>
                </a>
                <ul>
                    <li name='panelList' data-access-to="Event-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewAlumni()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Alumni Lists</span>
                        </a>
                    </li>
                    <li name='panelList' data-access-to="CategoryEvent-index">
                        <a href="javascript:void(0);" title="Assets Setting"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewCategoryAlumni()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Categories Lists</span>
                        </a>
                    </li>
                </ul>
            </li> -->

            {{-- List Menu --}}
            <li name='panelList' data-access-to="parent">
                <a href="javascript:void(0);" title="Setting" data-filter-tags='{"anchor":"miltiple","role":"parent"}'>
                    <i class="fal fa-phone-laptop"></i>
                    <span class="nav-link-text">Site Info</span>
                </a>
                <ul>
                    <li name='panelList' data-access-to="Slide-index">
                        <a href="javascript:void(0);" title="Assets Info"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}' onclick='PanelLinkActive(this);viewSlide()'
                            class=" waves-effect waves-themed">
                            <span class="nav-link-text">Slides</span>
                        </a>
                    </li>
                    <li name='panelList' data-access-to="PopupHome-index">
                        <a href="javascript:void(0);" title="Assets Info"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}' onclick='PanelLinkActive(this);viewPopupHome()'
                            class=" waves-effect waves-themed">
                            <span class="nav-link-text">Popup Home</span>
                        </a>
                    </li>
                    <li name='panelList' data-access-to="VideoEmbed-index">
                        <a href="javascript:void(0);" title="Assets Info"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}' onclick='PanelLinkActive(this);viewVideoEmbed()'
                            class=" waves-effect waves-themed">
                            <span class="nav-link-text">Video Embed</span>
                        </a>
                    </li>
                    <li name='panelList' data-access-to="Info-index">
                        <a href="javascript:void(0);" title="Assets Info"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}' onclick='PanelLinkActive(this);viewInfo()'
                            class=" waves-effect waves-themed">
                            <span class="nav-link-text">Info</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- System Setting --}}
            <li name='panelList' data-access-to="parent">
                <a href="javascript:void(0);" title="Setting" data-filter-tags='{"anchor":"miltiple","role":"parent"}'>
                    <i class="fal fa-user-cog"></i>
                    <span class="nav-link-text">System Setting</span>
                </a>
                <ul>
                    <li name='panelList' data-access-to="Admin-viewUser">
                        <a href="javascript:void(0);" title="User"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewUser()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">User</span>
                        </a>
                    </li>
                    <li name='panelList' data-access-to="Admin-viewroles">
                        <a href="javascript:void(0);" title="Role"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewroles()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Role</span>
                        </a>
                    </li>
                    <li name='panelList' data-access-to="Admin-viewPermission">
                        <a href="javascript:void(0);" title="Permission"
                            data-filter-tags='{"anchor":"miltiple","role":"child"}'
                            onclick='PanelLinkActive(this);viewPermission()' class=" waves-effect waves-themed">
                            <span class="nav-link-text">Permission</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
    {{-- <!-- NAV FOOTER -->
    <div class="nav-footer shadow-top">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify"
            class="hidden-md-down">
            <i class="ni ni-chevron-right"></i>
            <i class="ni ni-chevron-right"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone"></i>
                </a>
            </li>
        </ul>
    </div> <!-- END NAV FOOTER --> --}}
</aside>

<script>
    function PanelLinkActive(element) {
        var data = JSON.parse(element.getAttribute('data-filter-tags'));
        var panelList = document.getElementsByName('panelList');
        for (var i = 0; i < panelList.length; i++) {
            panelList[i].className = "";
        }

        if (data.anchor == 'single') {
            element.parentElement.classList.add("active");
        } else {
            element.parentElement.parentElement.parentElement.classList.add("active");
            element.parentElement.parentElement.parentElement.classList.add("open");
            element.parentElement.classList.add("active");
        }
    }
</script>

<script>

    // Article
    function viewArticle() {
        $.ajax({
            url: "{{ url('/api/admin/article/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }
    // function viewTeachers() {
    //     $.ajax({
    //         url: "{{ url('/api/admin/article/teachers/view') }}",
    //         type: "GET",
    //         beforeSend: function(xhr) {
    //             blockagePage('Please Wait...');
    //             xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
    //         },
    //         success: function(response) {
    //             $('#containerDiv').html(response);
    //             unblockagePage();
    //         },
    //         error: function(xhr) {
    //             Msg('Error GET controller", "error');
    //             unblockagePage();
    //         }
    //     });
    // }
    function viewCategoryArticle() {
        $.ajax({
            url: "{{ url('/api/admin/category-article/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }

    // Menu
    function viewMenuItems() {
        $.ajax({
            url: "{{ url('/api/admin/menu/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }
    function viewTypeConfig() {
        $.ajax({
            url: "{{ url('/api/admin/type-config/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }
    function viewType() {
        $.ajax({
            url: "{{ url('/api/admin/type/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }

    // Event
    function viewEvent() {
        $.ajax({
            url: "{{ url('/api/admin/event/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }
    function viewCategoryEvent() {
        $.ajax({
            url: "{{ url('/api/admin/category-event/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }

     // Alumni
    //  function viewAlumni() {
    //     $.ajax({
    //         url: "{{ url('/api/admin/alumni/view') }}",
    //         type: "GET",
    //         beforeSend: function(xhr) {
    //             blockagePage('Please Wait...');
    //             xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
    //         },
    //         success: function(response) {
    //             $('#containerDiv').html(response);
    //             unblockagePage();
    //         },
    //         error: function(xhr) {
    //             Msg('Error GET controller", "error');
    //             unblockagePage();
    //         }
    //     });
    // }
    // function viewCategoryAlumni() {
    //     $.ajax({
    //         url: "{{ url('/api/admin/category-alumni/view') }}",
    //         type: "GET",
    //         beforeSend: function(xhr) {
    //             blockagePage('Please Wait...');
    //             xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
    //         },
    //         success: function(response) {
    //             $('#containerDiv').html(response);
    //             unblockagePage();
    //         },
    //         error: function(xhr) {
    //             Msg('Error GET controller", "error');
    //             unblockagePage();
    //         }
    //     });
    // }

    // Size Info
    function viewSlide() {
        $.ajax({
            url: "{{ url('/api/admin/slide/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }
    function viewPopupHome() {
        $.ajax({
            url: "{{ url('/api/admin/popupHome/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }
    function viewVideoEmbed() {
        $.ajax({
            url: "{{ url('/api/admin/videoEmbed/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }
    function viewInfo() {
        $.ajax({
            url: "{{ url('/api/admin/info/view') }}",
            type: "GET",
            beforeSend: function(xhr) {
                blockagePage('Please Wait...');
                xhr.setRequestHeader('Authorization', 'Bearer ' + AuthToken);
            },
            success: function(response) {
                $('#containerDiv').html(response);
                unblockagePage();
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
                unblockagePage();
            }
        });
    }

    // System Setting
    function viewUser() {
        $.ajax({
            url: "{{ url('admin/viewUser') }}",
            type: "GET",
            success: function(response) {
                $('#containerDiv').html(response);
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
            }
        });
    }
    function viewPermission() {
        $.ajax({
            url: "{{ url('admin/viewPermission') }}",
            type: "GET",
            success: function(response) {
                $('#containerDiv').html(response);
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
            }
        });
    }
    function viewroles() {
        $.ajax({
            url: "{{ url('admin/viewroles') }}",
            type: "GET",
            success: function(response) {
                $('#containerDiv').html(response);
            },
            error: function(xhr) {
                Msg('Error GET controller", "error');
            }
        });
    }
</script>
