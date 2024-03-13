<style>
    .menu_footer_wrapper .nav-item{
        padding:3px 0 !important;
    }
    .menu_footer_wrapper .nav-item i{
        font-size:14px !important;
    }
    .menu_footer_wrapper .nav-item .menu_item{
        font-size:16px !important;
    }
    
</style>

<footer>
    <div class="container-fluid pt-5" style="color: #FFF !important;
    background: rgb(43,147,200);
    background: linear-gradient(90deg, rgba(23,84,130,1) 0%, rgba(43,147,200,1) 100%);">
        <div class="container-xl pt-5 pb-4">
            <div class="row menu_footer_wrapper">
                <div class="col-xl-4 col-lg-4">
                    <a href="{{ url(App::getLocale() == 'en' ? '/' : 'kh') }}">
                        <?php
                            $logo = '';
                            foreach ($menuFooterItems as $key => $value) { if($value->key == 'logo'){$logo = $value->image; }}
                        ?>
                        <img class="ml-0 p-0" width="268px" src="{{$logo}}" alt="Aii Language Center Logo">
                    </a>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <ul style="display: grid;">
                                <!-- <?php
                                $str = '';
                                if (App::getLocale() == 'en') {
                                    $menuName = 'Contact';
                                    $language = '';
                                } else {
                                    $menuName = 'ទំនាក់ទំនង';
                                    $language = '/kh';
                                }
                                echo $str = $str . "<li><a>" . $menuName . "</a> </li>";
                                ?> -->

                                @foreach($menuFooterItems as $menuFooterItem)
                                    @if($menuFooterItem->key == 'address')
                                    <li>
                                        <div class="text-white mb-4" style="font-size: 16px; line-height:26px;max-width:380px;">
                                            {{App::getLocale() == 'en'?$menuFooterItem->value_en:$menuFooterItem->value_kh}}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="text-white" style="font-size: 16px; line-height:26px;">
                                            {!! App::getLocale() == 'en'?$menuFooterItem->description_en:$menuFooterItem->description_kh !!}
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div style="font-size: 17px;">{{ App::getLocale() == 'kh' ? 'តាមដានយើងតាមរយៈ​':'Follow Us' }} </div>
                            <ul class="icon-group py-2">
                                @foreach($menuFooterItems as $key=>$menuFooterItem)
                                    @if($menuFooterItem->key == 'facebook')
                                    <li><a href="{{App::getLocale() == 'en'?$menuFooterItem->value_en:$menuFooterItem->value_kh}}" target="_blank"><img style="width:30px;" src="{{$menuFooterItem->image}}" alt="facebook icon"></a></li>
                                    @endif

                                    @if($menuFooterItem->key == 'youtube')
                                    <li><a href="{{App::getLocale() == 'en'?$menuFooterItem->value_en:$menuFooterItem->value_kh}}" target="_blank"><img style="width:30px;" src="{{$menuFooterItem->image}}" alt="youtube icon"></a></li>
                                    @endif

                                    @if($menuFooterItem->key == 'linkedin')
                                    <li><a href="{{App::getLocale() == 'en'?$menuFooterItem->value_en:$menuFooterItem->value_kh}}" target="_blank"><img style="width:30px;" src="{{$menuFooterItem->image}}" alt="linkedin icon"></a></li>
                                    @endif

                                    @if($menuFooterItem->key == 'tiktok')
                                    <li><a href="{{App::getLocale() == 'en'?$menuFooterItem->value_en:$menuFooterItem->value_kh}}" target="_blank"><img style="width:30px;" src="{{$menuFooterItem->image}}" alt="tiktok icon"></a></li>
                                    @endif

                                    @if($menuFooterItem->key == 'instagram')
                                    <li><a href="{{App::getLocale() == 'en'?$menuFooterItem->value_en:$menuFooterItem->value_kh}}" target="_blank"><img style="width:30px;" src="{{$menuFooterItem->image}}" alt="instagram icon"></a></li>
                                    @endif

                                    @if($menuFooterItem->key == 'telegram')
                                    <li><a href="{{App::getLocale() == 'en'?$menuFooterItem->value_en:$menuFooterItem->value_kh}}" target="_blank"><img style="width:30px;" src="{{$menuFooterItem->image}}" alt="telegram icon"></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="row">
                        <?php
                        $countParent = null;
                        $str = "<div class='col-xl-4 col-lg-4 col-md-6'> <ul>";
                        foreach ($bottomMenu as $i => $item) {
                            $externalLink = '';
                            $aClass = '';
                            $lClass = '';
                            $hasChild = ($item->right - $item->left) > 1;
                            $hasExternalUrl = ($item->link != null);
                            if($item->level == 1){
                                $countParent = $countParent + 1;
                            }
                            if (App::getLocale() == 'en') {
                                $menuName = $item->menu_en;
                                $language = '';
                            } else {
                                $menuName = $item->menu_kh;
                                $language = 'kh/';
                            }
                            if ($hasChild) {
                                $lClass = 'dropdown';
                                $aClass = 'dropdown-item dropdown-toggle';
                                $aDropdown = "id='navbarDropdown' role='button' data-bs-toggle='dropdown' data-bs-auto-close='outside'";
                            }
                            if($countParent == 2){
                                $str = $str ."</div> <div class='col-xl-4 col-lg-6 col-md-6 px-2'> <ul>";
                                $countParent++;
                            }
                            if($countParent == 4){
                                $str = $str ."</div> <div class='col-xl-4 col-lg-6 col-md-6 px-2'> <ul>";
                                $countParent++;
                            }
                            $str = $str . "<li class='nav-item'>";
                            if ($hasExternalUrl) {
                                $externalLink = $item->link;
                                $str = $str . " <a class='menu_item' target='_blank' href='" . $externalLink . "'><i class='fa-solid fa-angle-right'></i> " . $menuName . "</a>";
                            }
                            if (!$hasExternalUrl) {
                                $slug = $item->slug;
                                if($item ->level == 1){
                                    $str = $str . " <label class='menu_footer_title'> " . $menuName . "</label>";
                                }else {
                                    $str = $str . " <a class='menu_item' href='" . url('/') . '/' .$language . $item->slug . "'><i class='fa-solid fa-angle-right'></i> " . $menuName . "</a>";
                                }
                            }
                            if ($item->deeper) {
                                $str = $str . "<ul>";
                                } elseif ($item->shallower) {
                                    $str = $str . "</li>";
                                    $str = $str . str_repeat("</ul></li>", $item->level_diff);
                                } else {
                                    $str = $str . "</li>";
                                }
                            }
                        $str = $str . "</ul></div>";
                        echo $str;
                        ?>
                        </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid" style="color: #FFF !important;
    /* background-color: #145079; */
    
    background: rgb(43,147,200);
    background: linear-gradient(90deg, rgba(23,84,130,1) 0%, rgba(43,147,200,1) 100%);">
        <div style="border-top:1px solid #eee;" class="container-xl pt-3 d-flex flex-wrap justify-content-between align-items-center">
            <div class="copy-right d-table">
                @foreach($menuFooterItems as $key=>$menuFooterItem)
                    @if($menuFooterItem->key == 'copyright')
                        <?php
                            $str = '';
                            $year = date('Y');
                            if (App::getLocale() == 'en') {
                                $menuName = 'Copyright ©' . $year . ' Aii Language Center';
                                $language = '';
                            } else {
                                $menuName = '©' . $year . ' រក្សា​សិទ្ធិ​ដោយ មជ្ឈមណ្ឌលភាសា អេ​ អាយ​ អាយ';
                                $language = '/kh';
                            }
                            echo $str = $str . "<p class='d-table-cell'>" . $menuName . "</p>";
                        ?>
                    @endif
                @endforeach
            </div>
            <div>
                <ul class="d-flex">
                    <li style="margin-right:20px;font-size: 16px; line-height:26px;"><i class="fa-solid fa-user"></i>
                        {{ App::getLocale() == 'en' ? 'Visit Today' : 'ទស្សនាថ្ងៃនេះ' }}:
                        <strong>{{ $countDate['day'] }}</strong>
                    </li>
                    <li style="font-size: 16px; line-height:26px;"><i class="fa-solid fa-users"></i>
                        {{ App::getLocale() == 'en' ? 'Total Visit' : 'ទស្សនាសរុប' }}:
                        <strong>{{ $countDate['all'] }}</strong>
                    </li><br>

                </ul>
            </div>
            
        </div>
    </div>
</footer>
