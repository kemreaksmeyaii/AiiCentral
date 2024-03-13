
<style>
    .navbar-nav .nav-item .nav-link {
        color: #FFF;
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: #1b5f8b;
    }

    .navbar-nav .nav-link {
        color: #FFF !important;
        font-weight: 400;
        font-size: 16px;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:active {
        color: rgba(255, 255, 255, 0.5) !important;
        font-weight: 400;
        font-size: 16px;
    }


    .mobile-navbar .nav-item .dropdown-item{
        padding: 0.8rem;
    }

    .mobile-navbar .dropdown-menu {
        background-color:transparent;
        border:0 !important;
        padding-top: 0;
        padding-bottom: 0;
        margin-top: 0;
        margin-bottom: 0;
    }
    .mobile-navbar .dropdown-menu .dropdown .dropdown-item{
        padding: 0.8rem !important;
    }

    .mobile-navbar .dropdown-menu .dropdown .dropdown-menu .dropdown .dropdown-item{
        padding: 0.8rem !important;
    }

</style>



<nav class="stickyNav">
    <div class="wrapper">
        <div class="container-xl">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid appBar">
                    {{-- Logo ( show only computer and tablet screen ) --}}
                    <div>
                        <a class="navbar-brand logo_large" href="{{ url(App::getLocale() == 'en' ? '/' : 'kh') }}">
                            <?php
                                $logo = '';
                                foreach ($menuFooterItems as $key => $value) { 
                                    if($value->key == 'logo'){
                                        $logo = $value->image; 
                                    }
                                    if($value->key == 'rooster'){
                                        $rooster = $value->image;
                                    }
                                }
                            ?>
                            <img src="{{$logo}}" alt="Aii_Logo.png">
                        </a>
                    </div>
                    {{-- d-block d-xl-none  --}}
                    <div>
                        <a aria-label="Humber icon for display mobile menu" class="btn text-white d-block d-lg-none" style="font-size:2rem;" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasExample">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </div>
                    {{-- d-none d-xl-block --}}
                    <div class="menuBar d-none d-lg-block" tabindex="0" id="openDrawing" aria-labelledby="openDrawingLabel">
                        {{-- Top Menu --}}
                        <?php
                        $str = " <ul class='navbar-nav topNav'>";

                        foreach ($topMenu as $i => $item) {
                            $aClass = '';
                            $aDropdown = '';
                            $externalLink = '';
                            $slug = '';
                            $hasChild = $item->right - $item->left > 1;
                            $hasExternalUrl = $item->link != null;
                            $changeLanguage = $item->menu_type == 'change_language';
                            $menuName = App::getLocale() == 'en' ? $item->menu_en : $item->menu_kh;
                            // $hasIconLanguage = ($item->param1 !='' && $item->menu_type == 'change_language');
                            $urlKh = url('kh/' . $slugLanguage);
                            $str = $str . "<li class='nav-item'>";

                            if ($hasChild) {
                                $aClass = 'dropdown-toggle';
                                $aDropdown = "id='navbarDropdown' role='button' data-bs-toggle='dropdown'
                                            data-bs-auto-close='outside'";
                            }

                            if(App::getLocale() == 'kh'){
                                if ($changeLanguage && $item->slug == 'english') {
                                    $str =
                                        $str .
                                        " <a class='nav-link' href='" . url($slugLanguage) . "'>
                                            <img src='".'../../FrontEnd/Image/flag_english.png'."' alt='flag_english.png' width='18px' style='aspect-ratio:1/0.6;'> " . $menuName . '</a>';
                                }
                            }else{
                                
                                if($changeLanguage && $item->slug == 'khmer') {
                                    $str =
                                        $str .
                                        " <a class='nav-link' href='" . $urlKh . "'>
                                            <img src='" . json_decode($item->param1)->khmer->file_icon . "' alt='flag_khmer.png' width='20px' style='aspect-ratio:1/0.6;'> " . $menuName . '</a>';
                                }
                            }
                            

                            if ($hasExternalUrl && !$changeLanguage) {
                                $externalLink = $item->link;
                                
                                if($item->id == 283){
                                    $str = $str . " <a style='border-radius:25px; padding:1px 12px !important; font-weight:600; background-color:#fff;color:#145E8A !important;' class='dropdown-item $aClass ' href='" . $externalLink . "' target='_blank'><img style='height:22px; margin-right:0px;margin-top:0px;' src='../public/storage/photos/default/lazyloading-rooster.png' data-src= ". $rooster ." alt='the rooster icon'> " . $menuName . ' <spna class="icon-external_link"></span></a>';
                                }else{

                                    $str =
                                        $str . " <a class='nav-link $aClass ' target='_blank' href='" . $externalLink . "'> " . $menuName . ' <spna class="icon-external_link"></span></a>';
                                }
                            }

                            if (!$hasExternalUrl && !$changeLanguage) {
                                $slug = $item->slug;

                                if (App::getLocale() == 'kh') {

                                   
                                        if($item->menu_type=='approval_ipo_mjqe'){
                                            $str =
                                            $str .
                                            " <a class='nav-link $aClass focused-btn' href='" . url('/') . '/' . 'kh/' . $item->slug . "' $aDropdown> " . $menuName . '</a>';
                                        }else{
                                            $str =
                                            $str .
                                            " <a class='nav-link $aClass ' href='" . url('/') . '/' . 'kh/' . $item->slug . "' $aDropdown> " . $menuName . '</a>';
                                        }

                                } else {

                                        if($item->menu_type=='approval_ipo_mjqe'){
                                            $str =
                                            $str .
                                            " <a class='nav-link $aClass focused-btn' href='" . url('/') . '/' . $item->slug . "' $aDropdown> " . $menuName . '</a>';
                                        }else{
                                            $str =
                                            $str .
                                            " <a class='nav-link $aClass ' href='" . url('/') . '/' . $item->slug . "' $aDropdown> " . $menuName . '</a>';
                                        }
                                    
                                }
                                
                            }

                            if ($item->deeper) {
                                $str =
                                    $str .
                                    "<ul class='deeper dropend dropdown-menu drop-fade-down border-0 shadow' aria-labelledby='navbarDropdown'>";
                            } elseif ($item->shallower) {
                                $str = $str . '</li>';
                                $str = $str . str_repeat("</ul>
                                                            </li>", $item->level_diff, );
                            }
                            else {
                                $str = $str . '</li>';
                            }
                        }

                        $str =
                            $str ."
                                    <li class='nav-item smallscreen-hidden' style='padding-top:8px;'>
                                        <a alt='search anything on website' class='nav-link' role='button'  data-bs-toggle='modal' data-bs-target='#searchPopup'
                                        style='display: flex; justify-content: center; text-align: center;'>
                                        <i class='fa-solid fa-magnifying-glass' style='font-size: 0.9rem;'></i>
                                        </a>
                                    </li>
                                </ul>";

                        // $str = $str . '</ul>';
                        echo $str;
                        ?>
                        
                        {{-- main menu --}}
                        

                        <?php
                        $str = "<ul class='navbar-nav mainNav'>";
                        foreach ($mainMenu as $i => $item) {
                            $aClass = '';
                            $aDropdown = '';
                            $externalLink = '';
                            $slug = '';
                            $hasChild = $item->right - $item->left > 1;
                            $hasExternalUrl = $item->link != null;
                            $changeLanguage = $item->menu_type == 'change_language';
                            $menuName = App::getLocale() == 'en' ? $item->menu_en : $item->menu_kh;
                            $urlKh = url('kh/' . $slugLanguage);
                            $str = $str . "<li class='nav-item dropdown'>";

                            if ($hasChild) {
                                $aClass = 'dropdown-toggle';
                                $aDropdown = "role='button' data-bs-toggle='dropdown' data-bs-auto-close='outside' aria-expanded='false'";
                            }
                            if ($changeLanguage && $item->slug == 'English') {
                                $str = $str . " <a class='nav-link' href='" . url($slugLanguage) . "'> " . $menuName . '</a>';
                            }
                            if ($changeLanguage && $item->slug == 'Khmer') {
                                $str = $str . " <a class='nav-link' href='" . $urlKh . "'> " . $menuName . '</a>';
                            }
                            if ($hasExternalUrl && !$changeLanguage) {
                                $externalLink = $item->link;
                                
                                    $str = $str . " <a class='dropdown-item $aClass ' href='" . $externalLink . "' target='_blank'> " . $menuName . ' <spna class="icon-external_link"></span></a>';
                                
                               
                            }
                            if (!$hasExternalUrl && !$changeLanguage) {
                                $slug = $item->slug;
                                if (App::getLocale() == 'kh') {
                                   
                                        if($item->menu_type=='main_page'){
                                            $str =
                                            $str .
                                            " <a class='dropdown-item  $aClass ' href='" . url('/') . '/' . 'kh' . "' $aDropdown> " . $menuName . '</a>';
                                        }else {
                                            $str = $str . " <a class='dropdown-item $aClass ' href='" . url('/') . '/' . 'kh/' . $item->slug . "' $aDropdown> " . $menuName . '</a>';
                                        }
                                    
                                } else {
                                   
                                        if($item->menu_type=='main_page'){
                                            $str =
                                            $str .
                                            " <a class='dropdown-item  $aClass ' href='" . url('/') . "' $aDropdown> " . $menuName . '</a>';
                                        }else {
                                            $str = $str . " <a class='dropdown-item $aClass ' href='" . url('/') . '/' . $item->slug . "' $aDropdown> ". $menuName . '</a>';
                                        }
                                    
                                }
                            }
                            if ($item->deeper) {
                                $str = $str . "<ul class='dropdown-menu submenu drop-fade-up'>";
                            } elseif ($item->shallower) {
                                $str = $str . '</li>';
                                $str = $str . str_repeat('</ul></li>', $item->level_diff);
                            } else {
                                $str = $str . '</li>';
                            }
                        }

                        
                        echo $str;
                        ?>
                    </div>


                    <!-- mobile navbar -->
                    @include('Cms.mobile-menu')

                </div>
            </nav>
        </div>
    </div>
</nav>

{{-- Search Popup --}}
<div class="modal fade search-popup" style="backdrop-filter: blur(10px);" id="searchPopup" tabindex="-1" aria-labelledby="searchPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
            <div class="modal-body" style="background-color:#fff; !important;">
                <form class="menu-search"   action="{{ url(App::getLocale() == 'en' ? 'search' : 'kh/search') }}" method="GET">
                    <?php
                        $search_placeholder = App::getLocale() == 'en' ? 'Search...' : 'ស្វែករក...';
                    ?>
                    <input style="border:1px solid #145079;margin-right:0;" type="search" name="search" id="search" placeholder="{{$search_placeholder}}" autocomplete="off">
                    <button type="submit" style="margin-right:0;" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

