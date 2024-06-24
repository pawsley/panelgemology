        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2023 © AKIRA | DEVELOPERS</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?=base_url()?>assets/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?=base_url()?>assets/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?=base_url()?>assets/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="<?=base_url()?>assets/assets/js/scrollbar/simplebar.js"></script>
    <script src="<?=base_url()?>assets/assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?=base_url()?>assets/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?=base_url()?>assets/assets/js/sidebar-menu.js"></script>

    <script src="<?=base_url()?>assets/assets/js/slick/slick.min.js"></script>
    <script src="<?=base_url()?>assets/assets/js/slick/slick.js"></script>
    <script src="<?=base_url()?>assets/assets/js/header-slick.js"></script>

    <script src="<?=base_url()?>assets/assets/js/clock.js"></script>
    <script src="<?=base_url()?>assets/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?=base_url()?>assets/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?=base_url()?>assets/assets/js/chart/apex-chart/moment.min.js"></script>
    
    <script src="<?=base_url()?>assets/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?=base_url()?>assets/assets/js/dashboard/default.js"></script>
    <script src="<?=base_url()?>assets/assets/js/notify/index.js"></script>
    <script src="<?=base_url()?>assets/assets/js/height-equal.js"></script>
    <script src="<?=base_url()?>assets/assets/js/animation/wow/wow.min.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?=base_url()?>assets/assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script>new WOW().init();</script>
    <script>
        // growth chart
        var growthoptions = {
        series: [{
        name: 'Memos',
        data: [10, 5, 15, 0, 15, 12, 29, 29, 29, 12, 15,5]
        }],
        chart: {
            height: 200,
            type: 'line',
            toolbar: {
            show: false
            },
            dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 5,
            left: 0,
            blur: 4,
            color: '#7366ff',
            opacity: 0.22
            },
        },
        grid: {
        yaxis: {
            lines: {
                show: false
            }
        },  
        },
        colors: ["#5527FF"],
        stroke: {
        width: 3,
        curve: 'smooth'
        },
        xaxis: {
        type: 'category',
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
        tickAmount: 10,
        labels: {
            style: {
                fontFamily: 'Rubik, sans-serif',
            },
        },
        axisTicks: {
            show: false
        },
        axisBorder: {
            show: false
        },
        tooltip: {
            enabled: false,
        },
        },
        fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            gradientToColors: [ '#5527FF' ],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            colorStops: [
            {
                offset: 0,
                color: "#5527FF",
                opacity: 1
            },
            {
                offset: 100,
                color: "#E069AE",
                opacity: 1
            },
            ]
            // stops: [0, 100, 100, 100]
        },
        },
        yaxis: {
        min: -10,
        max: 40,
        labels: {
            show: false
        }
        }
        };
        var growthchart = new ApexCharts(document.querySelector("#growthchart"), growthoptions);
        growthchart.render();
    </script>
    <script>
        $(document).ready(function () {
            var segment1 = "<?php echo $this->uri->segment(1); ?>";
            var segment2 = "<?php echo $this->uri->segment(2); ?>";

            // Remove "active" class from all elements
            $(".dash, .memo, .bmemo, .dmemo, .webs").removeClass("active");

            // Add "active" class based on URI segments
            if (segment1 == "") {
                $(".dash").addClass("active");
            } else if (segment1 == "memo") {
                $(".memo").addClass("active");
                if (segment2 == "buat-baru") {
                    $(".bmemo").addClass("active");
                    $(".sidebar-list.memo").addClass('active');
                    $(".sidebar-list.memo .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
                    $(".sidebar-list.memo ul.sidebar-submenu").slideDown('normal');                    
                }
                
            } else if (segment1 == "websites") {
                $(".webs").addClass("active");
            }
        });
    </script>
  </body>
</html>