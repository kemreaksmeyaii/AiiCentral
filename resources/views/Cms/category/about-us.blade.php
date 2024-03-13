@extends('Cms.master-page')
@section('metatag')
    <?php
        $logo = '';
        foreach ($menuFooterItems as $key => $value) { if($value->key == 'logo'){$logo = $value->image; }}
    ?>
    <meta property="og:image" content=" {{ $logo }} " />
    <meta property="og:title"  content="{{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }} - Aii Language Center" />
    <meta property="og:description" content="Aii Language Centers (Aii) are North American Standard based centers specializing in languages. Aii offers a series of English, Chinese and Thai language programs. TOEFL preparation course is also offered to meet the needs of a variety of different learner’s needs." />
@endsection
@section('content')
    <div class="container-fluid p-0 m-0">
        <div style="position:relative;overflow:hidden;height:800px;">
            <img style="object-fit:cover;height:800px; background-size:cover;background-position:left !important;background-repeat:no-repeat;width:100%;height:100%;" src="{{ asset('FrontEnd/image/about-bg.jpg') }}" alt="">
        </div>
        <div class="container my-5 py-5" style="position:absolute;left:0;right:0;bottom:0;">
            <div class="row justify-content-center">
                <div class="col-lg-12 my-5">
                    <div>
                        <div class="d-flex">
                            <h1 style="background-color:#fff;" class="p-3 fw-bold text-uppercase" style="font-size:48px;">
                            {{ App::getLocale() == 'en' ? $data['category']->name_en : $data['category']->name_kh }}
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="bg-white p-3">{{ App::getLocale() == 'kh' ? 'មជ្ឈមណ្ឌលភាសា​ ​អេ​ ​អាយ​ ​អាយ​ គឺជា​មជ្ឈមណ្ឌល​ដែលមាន​មូលដ្ឋាន​លើ​ស្តង់ដា​អាមេរិក​ខាងជើង​ដែល​មាន​ឯកទេស​ផ្នែកភាសា។​ ​មជ្ឈមណ្ឌលភាសា​ ​អេ​ ​អាយ​ ​អាយ​ ផ្តល់​ជូន​វគ្គ​បណ្តុះ​បណ្តាល​ភាសា​អង់គ្លេស​ ​ភាសាចិន ភាសាថៃ​ និងវគ្គ​ត្រៀម​ប្រឡង​ថលហ្វល​ដើម្បី​ឆ្លើយតប​នឹង​តម្រូវការ​ផ្សេងៗ​របស់​សិស្សានុសិស្ស​គ្រប់វ័យ។​':'Aii Language Centers (Aii) are North American Standard based centers specializing in languages. Aii offers a series of English, Chinese and Thai language programs. TOEFL preparation course is also offered to meet the needs of a variety of different learner’s needs.' }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5" style="background: linear-gradient( 90deg ,rgba(20, 94, 138, 1), rgba(85, 182, 225, 1));">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12 my-5" >
                    <div class="row">
                        <div class="col-lg-4">
                            <h1 class="text-white fw-bold">{{ App::getLocale() == 'kh' ? 'មជ្ឈមណ្ឌលភាសា Aii តាមរយៈទិន្នន័យ' : 'The Aii story through data' }} </h1>
                        </div>
                        <div class="col-lg-8">
                            <p class="text-white" style="font-size:1.5rem;line-height:32px;">{{ App::getLocale() == 'kh' ? 'មជ្ឈមណ្ឌលព័ត៌មានអនុញ្ញាតឱ្យអ្នកស្វែងយល់ពីប្រធានបទសំខាន់ៗដូចជា ការចុះឈ្មោះនិស្សិត អត្រាបញ្ចប់ការសិក្សា និងលទ្ធផលអតីតនិស្សិតនៅទូទាំង 10 សាខារបស់យើង។':'The Information Center lets you explore key topics like student enrollment, graduation rates and alumni outcomes across our 10 campuses.' }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 my-5">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h1 class="text-white fw-bold" style="font-size:4.5rem;">83%</h1>
                                    <h5 class="text-white">Undergrads from California</h5>
                                </div>
                                <div class="col-lg-4">
                                    <h1 class="text-white fw-bold" style="font-size:4.5rem;">4.17</h1>
                                    <h5 class="text-white">Average years to degree for freshmen</h5>
                                </div>
                                <div class="col-lg-4">
                                    <h1 class="text-white fw-bold" style="font-size:4.5rem;">86%</h1>
                                    <h5 class="text-white">Freshman graduation rate</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid m-0 p-0" style="background-color:#55B6E1;">
        <div class="row">
            <div class="col-lg-6">
                <div style="min-height:820px;">
                    <img style="object-fit:cover;" width="100%" height="820px" src="{{ asset('FrontEnd/image/assets/default-16-9.png') }}" data-src="{{ asset('FrontEnd/image/8.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row w-100 h-100 d-flex justify-content-center align-items-center">
                    <div class="col-lg-10">
                        <div class="m-5">
                            <h1 class="fw-bold">{{ App::getLocale() == 'kh' ? 'សមធម៌ និងការដាក់បញ្ចូល':'Equity and inclusion' }} </h1>
                            <p style="font-size:1.2rem;" class="my-4">{{ App::getLocale() == 'kh' ? 'មនុស្សគ្រប់រូបមានសិទ្ធិធ្វើការ និងសិក្សាក្នុងបរិយាកាសរួមបញ្ចូល ដែលគោរព និងអបអរសាទរភាពចម្រុះនៃសមាជិករបស់ខ្លួន។':'Everyone has the right to work and study in an inclusive environment that respects and celebrates the diversity of its members.' }} </p>
                            <a href="" class="btnAll btnAboutUC">See how we reflect vibrant diversity</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container-fluid py-5" style="background-color:#0B3347;">
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-lg-5">
                    <div>
                        <h3 style="color:#FFD271;">Aii's Budget</h3>
                        <h1 class="text-white fw-bold">State support is essential to our success</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10">
                            <div>
                                <p class="text-white" style="font-size:1.2rem;">And it returns big dividends to the people of California. See where our funds come from and how we use them.</p>
                                <a href="" target="_blank" class="btnAll btnAboutUC">See Aii's 2021-22 budget (PDF)</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
