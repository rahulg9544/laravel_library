@extends('layout')

@section('content')
         <!-- Content -->
         <div class="page-content bg-white">
            <!-- inner page banner -->
            <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url(images/inner-banner.jpg);">
               <div class="container">
                  <div class="dz-bnr-inr-entry">
                     <h1>Dashboard</h1>
                     <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html"> Home</a></li>
                           <li class="breadcrumb-item">Dashboard</li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
            <!-- contact area -->
            <div class="content-block">
               <!-- Browse Jobs -->
               <section class="content-inner bg-white">
                  <div class="container">
                     <div class="row">
                        <div class="col-xl-3 col-lg-4 m-b30">
                           <div class="sticky-top">
                              <div class="shop-account">
                                 <ul class="account-list">
                                    <li>
                                       <a href="{{ route('category') }}" class="active">
                                       <span>Category</span></a>
                                    </li>
                                    <li>
                                       <a href="shop-cart.html">
                                       <span>Menu 2</span></a>
                                    </li>
                                    <li>
                                       <a href="{{ route('logout') }}">
                                       <span>Logout</span></a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 m-b30">
                           <div class="shop-bx shop-profile">
                              <div class="shop-bx-title clearfix">
                                 <h5 class="text-uppercase">Category Upload</h5>
                              </div>
                              <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="row m-b30">
                                    <div class="col-lg-6 col-md-6">
                                       <div class="mb-3">
                                          <input type="file" class="form-control" id="formcontrolinput1" placeholder="Alexander Weir" name="mycsv">
                                       </div>
                                    </div>
                                   
                                 </div>
                   
                                 <button class="btn btn-primary btnhover">Save</button>
                              </form>
                           </div>
                        </div>

                               
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- Browse Jobs END -->
            </div>
         </div>
         <!-- Content END-->
@endsection