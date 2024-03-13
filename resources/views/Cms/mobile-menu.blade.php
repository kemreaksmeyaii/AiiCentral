<div style="background-color:#1b5f8b;padding-bottom:-60px !important;" class="offcanvas offcanvas-start d-block d-lg-none" data-bs-scroll="false"  tabindex="-1" id="offcanvasMenu"  aria-labelledby="offcanvas">
    {{-- Logo --}}
    <div class="offcanvas-header">
        <a href="{{ url(App::getLocale() == 'en' ? '/' : 'kh') }}">
            <?php
                $logo = '';
                foreach ($menuFooterItems as $key => $value) { if($value->key == 'logo'){$logo = $value->image; }}
            ?>
            <img src="{{$logo}}" alt="Aii_Logo.png" height="72">
        </a>
        <button type="button" class="btn-close text-reset btn-close-white mt-3" style="margin-right:15px;" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    {{-- End Logo --}}
    <div class="offcanvas-body" style="height:100%;padding-bottom:120px;">
        <div class="mb-3">
            <form class="menu-search" action="{{ url(App::getLocale() == 'en' ? 'search' : 'kh/search') }}" method="GET">
                <?php
                    $search_placeholder = App::getLocale() == 'en' ? 'Search' : 'ស្វែករក';
                ?>
                <input type="search" name="search" id="search" placeholder="{{$search_placeholder}}" autocomplete="off">
                <button type="submit" style="margin-right:0;" class="btn btn-sm btn-general btn-secondary-contained"><i class="fa-solid fa-magnifying-glass text-dark"></i></button>
            </form>
        </div>
        {{-- main menu --}}
        <?php
        $str = "<ul class='navbar-nav mobile-navbar'>";
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
                    if($item->id == 201){
                        $str = $str . " <a class='dropdown-item $aClass ' href='" . $externalLink . "' target='_blank'><img style='height:22px;margin-right:8px;margin-top:0px;' src='../public/storage/photos/default/lazyloading-rooster.png' data-src= ". $rooster ." alt='the rooster icon'> " . $menuName . ' <spna class="icon-external_link"></span></a>';
                    }else{
                        $str = $str . " <a class='dropdown-item $aClass ' href='" . $externalLink . "' target='_blank'> " . $menuName . ' <spna class="icon-external_link"></span></a>';
                    }
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
                                $str = $str . " <a class='dropdown-item $aClass ' href='" . url('/') . '/' . $item->slug . "' $aDropdown> " . $menuName . '</a>';
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

        

        $str = $str ."</ul>";
        echo $str;
        ?>

        <?php
            $str = " <ul class='navbar-nav mobile-navbar'>";
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

                if ($changeLanguage && $item->slug == 'english') {
                    $str =
                        $str .
                        " <a class='nav-link' href='" . url($slugLanguage) . "'>
                            <img src='".'../../FrontEnd/Image/flag_english.png'."' alt='flag_english.png' width='20px' style='aspect-ratio:1/0.7;'> " . $menuName . '</a>';
                }
                if ($changeLanguage && $item->slug == 'khmer') {
                    $str =
                        $str .
                        " <a class='nav-link' href='" . $urlKh . "'>
                            <img src='" . json_decode($item->param1)->khmer->file_icon . "' alt='flag_khmer.png' width='20px' style='aspect-ratio:1/0.7;'> " . $menuName . '</a>';
                }
                

                if ($hasExternalUrl && !$changeLanguage) {
                    $externalLink = $item->link;
                    
                    if($item->id == 283){
                        $str = $str . " <a style='border-radius:25px; max-width:170px; padding:1px 12px !important; font-weight:600; background-color:#fff;color:#145E8A !important;' class='dropdown-item $aClass ' href='" . $externalLink . "' target='_blank'><img style='height:20px;margin-right:0px;margin-top:0px;' src='../public/storage/photos/default/lazyloading-rooster.png' data-src= ". $rooster ." alt='the rooster icon'> " . $menuName . ' <spna class="icon-external_link"></span></a>';
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

        $str = $str . '</ul>';
        echo $str;
        ?>

    </div>
</div>









