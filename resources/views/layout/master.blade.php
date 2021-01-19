<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!--Head-->
@include('frontend.includes.head')
<!--//Head-->

<body>
    <!-- Navigation -->
    @include('frontend.includes.nav')
    <!-- //Navigation -->

<!-- header -->
@include('frontend.includes.header')
<!-- //header -->

<!-- Slider -->
@include('frontend.includes.sidebar')
<!-- //Slider -->

    <!-- content-starts-here -->
    @yield('content')
    <!-- content-starts-here -->

    <!--footer section start-->
    @include('frontend.includes.footer')
    <!--footer section end-->

    <!-- Navigation-Js-->
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/classie.js"></script>
    <!-- //Navigation-Js-->
    <!-- js -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-select.js"></script>


    <script>
      $(document).ready(function () {
        var mySelect = $('#first-disabled2');

        $('#special').on('click', function () {
          mySelect.find('option:selected').prop('disabled', true);
          mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function () {
          mySelect.find('option:disabled').prop('disabled', false);
          mySelect.selectpicker('refresh');
        });

        $('#basic2').selectpicker({
          liveSearch: true,
          maxOptions: 1
        });
      });
    </script>
    <!-- language-select -->
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link href="css/jquery.uls.css" rel="stylesheet"/>
    <link href="css/jquery.uls.grid.css" rel="stylesheet"/>
    <link href="css/jquery.uls.lcd.css" rel="stylesheet"/>
    <!-- Source -->
    <script src="js/jquery.uls.data.js"></script>
    <script src="js/jquery.uls.data.utils.js"></script>
    <script src="js/jquery.uls.lcd.js"></script>
    <script src="js/jquery.uls.languagefilter.js"></script>
    <script src="js/jquery.uls.regionfilter.js"></script>
    <script src="js/jquery.uls.core.js"></script>
    <script>
                $( document ).ready( function() {
                    $( '.uls-trigger' ).uls( {
                        onSelect : function( language ) {
                            var languageName = $.uls.data.getAutonym( language );
                            $( '.uls-trigger' ).text( languageName );
                        },
                        quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
                    } );
                } );
            </script>
    <!-- //language-select -->
    <script type="text/javascript" src="js/jquery.flexisel.js"></script><!-- flexisel-js -->
                <script type="text/javascript">
                     $(window).load(function() {
                        $("#flexiselDemo3").flexisel({
                            visibleItems:1,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 5000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint:480,
                                    visibleItems:1
                                },
                                landscape: {
                                    changePoint:640,
                                    visibleItems:1
                                },
                                tablet: {
                                    changePoint:768,
                                    visibleItems:1
                                }
                            }
                        });

                    });
                   </script>
    <!-- Slider-JavaScript -->
        <script src="js/responsiveslides.min.js"></script>
         <script>
        $(function () {
          $("#slider").responsiveSlides({
            auto: true,
            pager: false,
            nav: true,
            speed: 500,
            maxwidth: 800,
            namespace: "large-btns"
          });

        });
      </script>
    <!-- //Slider-JavaScript -->
    <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                    var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear'
                    };
                */

                $().UItoTop({ easingType: 'easeOutQuart' });

                });
        </script>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
    <!-- //here ends scrolling icon -->
</body>
</html>


