@extends('layouts.app')
@section('title', 'Home - Bursa Kerja Khusus STMJ')
@section('content')
{{--  Y  --}}
<section style="background-color: #EFF7FE;" class="about section-padding pb-0" id="about">
    <div class="container">
         <div class="row">

              <div class="col-lg-7 mx-auto col-md-10 col-12">
                   <div class="about-info">

                        <h2  data-aos="fade-up">BURSA <strong>KERJA</strong> KHUSUS</h2>
                        <h4 class="mb-4" data-aos="fade-up" data-aos-delay="100">smkn 1 jenangan</h4>

                        <p class="mb-0" data-aos="fade-up">
                            Bursa Kerja Khusus (BKK) adalah sebuah lembaga yang dibentuk di Sekolah Menengah Kejuruan Negeri dan Swasta, sebagai unit pelaksana yang memberikan pelayanan dan informasi lowongan kerja, pelaksana pemasaran, penyaluran dan penempatan tenaga kerja, merupakan mitra Dinas Tenaga Kerja dan Transmigrasi.
                        </p>
                   </div>

                   <div class="about-image mt-5" data-aos="fade-up" data-aos-delay="200">

                    <img width="300" src="images/work.svg" class="img-fluid" alt="office">
                  </div>
              </div>

         </div>
    </div>
</section>
{{--   END Y  --}}
<div class="container">
    {{--  KEPALA SEKOLAH  --}}
    <section class="testimonial section-padding">
        <div class="container">
             <div class="row">

                  <div class="col-lg-6 col-md-5 col-12">
                      <div class="contact-image" data-aos="zoom-in" data-aos-delay="100">

                        <img src="{{ asset('pjono.png') }}" class="img-fluid" alt="website">
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-7 col-12">
                    <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">smkn 1 jenangan</h4>

                    <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">SMKN 1 Jenangan adalah SMKN Adiwiyata yang menjadi rujukan untuk sekolah SMK yang ada di Indonesia.</h2>

                    <p data-aos="fade-up" data-aos-delay="400">
                      <strong>Sujono M.Pd</strong>

                      <span class="mx-1">/</span>

                      <small>Kepala sekolah SMKN 1 Jenangan</small>
                    </p>
                  </div>

             </div>
        </div>
   </section>
</div>
    {{--  END KEPALA SEKOLAH  --}}
    {{--  NEWS BARU  --}}
    <section class="project section-padding" id="project">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <h6 class=" text-center" data-aos="fade-up">
                        BERITA
                    </h6>
                    <h2 class="mb-5 text-center" data-aos="fade-up">
                        <strong>INFORMASI TERKINI</strong>
                    </h2>
                    <div class="container">
                        <div class="row">
                            @foreach ($news as $n)
                            <div class="col-md-4">
                                <div class="container mb-2 mt-2">
                                    <div class="card" data-aos="fade-up" style="width: 18rem;">
                                        <img src="{{ asset('Storage/'.$n->thumbnail) }}" height="250" width="250" class="card-img-top" alt="...">
                                        <div class="card-body">
                                          <a href=""><h5 class="card-title">{{ Str::limit($n->title, 20) }}</h5></a>
                                          <p class="card-text">{{ Str::limit($n->description, 100) }}</p>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--   END NEWS BARU  --}}
    {{--  <div style="background-image: url({{ asset('bck.jpg') }}); padding:50px;" >  --}}
        
        <div class="container" id="visimisi">
        <section class="testimonial section-padding">
    <div class="row">
        <div class="col-md-6 ">
            <h3 class="mb-3" data-aos="fade-right" style="border-bottom: 1px solid #999" ><strong>VISI</strong></h3>            
            <p data-aos="fade-right" data-aos-delay="200">Menjadi penyalur tamatan serta menjembatani antara pencari kerja dengan pemberi kerja untuk menyiapkan dan mendapatkan sumber daya manusia yang berkualitas sesuai dengan kompetensinya dan berkarakter baik.</p>
        </div>
        <div class="col-md-6">
            <h3 class="mb-3" data-aos="fade-left" style="border-bottom: 1px solid #999" ><strong>MISI</strong></h3>
            <p data-aos="fade-left" data-aos-delay="100"><i class="fas fa-arrow-right"></i> Meningkatkan kerjasama dengan industri dalam hal rekruitmen tenaga kerja maupun kerjasama lain secara kontinyu yang bermanfaat bagi kedua belah pihak. </p>
            <p data-aos="fade-left" data-aos-delay="200"><i class="fas fa-arrow-right"></i> Berperan sebagai pusat pelayanan pencari kerja lulusan, dan industri dalam rangka rekruitmen tenaga kerja baik dalam negeri maupun luar negeri. </p>
            <p data-aos="fade-left" data-aos-delay="300"><i class="fas fa-arrow-right"></i> Meningkatkan komunikasi dengan alumni untuk berperan dalam pengembangan BKKk khususnya dan sekolah pada umumnya. </p>
            <p data-aos="fade-left" data-aos-delay="400"><i class="fas fa-arrow-right"></i> Meningkatkan kemampuan dan keterampilan SDM pengelolah bkk dalam hal pelayanan, baik yang bersifat administratif maupun personaliti yaitu “tanggap, tepat, ramah dan peduli”. </p>
        </div>
    </div>
        </section>
        
            
    </div>
@endsection
</div>