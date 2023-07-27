<script>
import ApexCharts from 'apexcharts'
</script>
<script type="text/javascript">
    $(() => {
        init()

    })
    init = async () => {
        await loadchartatas();
        await loadchartbawah();
        unblockPage();
    }

    $(document).ready(function() {
        // Check if the user has visited the welcome page before
        const hasVisitedWelcomePage = localStorage.getItem('hasVisitedWelcomePage');

        // If the user hasn't visited the welcome page, show the popup
        if (!hasVisitedWelcomePage) {
            // Load the welcome page as a full-size popup
            let timerInterval
            Swal.fire({
                icon: 'warning',
                title: "Welcome Admin!",
                html: "Any actions you take on this portal have a <b>significant impact</b> on the sustainability of this website!! <br><br> This Warning Will Close In <span></span> Second ",
                timer: 10000, // 5 seconds
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('span')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
            // Set the flag in local storage to indicate that the user has visited the welcome page
            localStorage.setItem('hasVisitedWelcomePage', 'true');
        }
    });

    function closeWelcomePopup() {
        $('#welcomePopup').remove();
    }
    loadchartatas = () => {
        var options = {
            series: [{
                name: 'Total Registered Applicants',
                data: [100, 200, 300, 400, 500, 600, 900]
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'month',
                categories: ["january","February","March","April","May","June","July","August"
                ]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#totalapplicants"), options);
        chart.render();
    }
    loadchartbawah = () => {
        var options = {
            series: [{
                name: 'Total Accepted Applicants',
                data: [320, 400, 200]
            }, {
                name: 'Total Rejected Applicants',
                data: [200, 350, 110]
            }],
            chart: {
                type: 'bar',
                height: 400
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['January','February', 'March'],
            },
            colors: ["#1B61AD", "#D0D5DD"],
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#totalacc"), options);
        chart.render();

    }
</script>
