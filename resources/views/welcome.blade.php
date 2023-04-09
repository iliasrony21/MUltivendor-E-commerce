<!DOCTYPE html>
<html class="no-js" lang="en">

@include('include.head')

<body>
    <!-- Modal -->

    <!-- Quick view -->
    @include('include.quickview')
    <!-- Header  -->
   @include('include.header')

   <!-- End Header  -->
    @include('include.mobile-header')
    <!--End header-->

 <main class="main">
       <!--start hero slider-->
        @include('include.hero-slider')
        <!--End hero slider-->

        <!--start category slider-->
        @include('include.category-slider')
        <!--End category slider-->

         <!--start banners-->
        @include('include.banner')
        <!--End banners-->

        <!--Products Tabs start-->
        @include('include.product-tab')
        <!--Products Tabs end-->

        <!--start Best Sales feature product-->
         @include('include.featureproduct')
        <!--End Best Sales feature product-->

        <!-- TV Category -->
         @include('include.tv-category')
        <!--End TV Category -->


        <!-- Tshirt Category -->
         @include('include.tshirt-category')
        <!--End Tshirt Category -->

        <!-- Computer Category -->
         @include('include.computer-category')
        <!--End Computer Category -->

       <!--End 4 columns hot deal-->
         @include('include.hotdeal')
        <!--End 4 columns hot deal-->

         <!--Vendor List -->
         @include('include.vendorlist')
        <!--End Vendor List -->

 </main>

            @include('include.footer')
            <!-- Preloader Start -->
            @include('include.preloader')
            <!-- Vendor JS-->
            @include('include.js')
</body>

</html>
